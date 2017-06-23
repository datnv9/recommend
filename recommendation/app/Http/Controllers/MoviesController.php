<?php

namespace App\Http\Controllers;

use Session;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Movie;

use App\History;

use App\Rate;

class MoviesController extends Controller 
{
    private static function compare($a, $b){
        $a['sum'] = $a['good'] + $a['bad'];
        $b['sum'] = $b['good'] + $b['bad'];
        $a['sub'] = abs($a['good'] - $a['bad']);
        $b['sub'] = abs($b['good'] - $b['bad']);
        if ($a['sub'] == $b['sub']){
            if (($a['sum']) == ($b['sum'])){
                return 0;
            }
            return ($a['sum'] < $b['sum']) ? -1:1;
        }
        return ($a['sub'] < $b['sub']) ? -1:1;
    }

    public function index(Request $request, Movie $movie,Rate $rate){
        $movies1 = $movie->whereBetween('id', [1, 500])->paginate(5);
        $movies2 = $movie->where('id','>',500)->paginate(5);
        if ($request->ajax()) {
            return view('movies', array("item1" => $movies1, "item2" => $movies2));
        }
        $request->session()->put('option', '1');
        if (!$request->session()->has('genres_table')){
            $genres_table = [];
            $genres_table['Action'] = array("good" => 0, "bad" => 0);
            $genres_table['Adventure'] = array("good" => 0, "bad" => 0);
            $genres_table['Animation'] = array("good" => 0, "bad" => 0);
            $genres_table['Children'] = array("good" => 0, "bad" => 0);
            $genres_table['Comedy'] = array("good" => 0, "bad" => 0);
            $genres_table['Crime'] = array("good" => 0, "bad" => 0);
            $genres_table['Documentary'] = array("good" => 0, "bad" => 0);
            $genres_table['Drama'] = array("good" => 0, "bad" => 0);
            $genres_table['Fantasy'] = array("good" => 0, "bad" => 0);
            $genres_table['Film-Noir'] = array("good" => 0, "bad" => 0);
            $genres_table['Horror'] = array("good" => 0, "bad" => 0);
            $genres_table['Musical'] = array("good" => 0, "bad" => 0);
            $genres_table['Mystery'] = array("good" => 0, "bad" => 0);
            $genres_table['Romance'] = array("good" => 0, "bad" => 0);
            $genres_table['Sci-Fi'] = array("good" => 0, "bad" => 0);
            $genres_table['Thriller'] = array("good" => 0, "bad" => 0);
            $genres_table['War'] = array("good" => 0, "bad" => 0);
            $genres_table['Western'] = array("good" => 0, "bad" => 0);
            $request->session()->put('genres_table',$genres_table);
            
        }
	    // print_r($movies);
	    // die();
	    $page = isset($_GET['page'])  ? intval($_GET['page']) : 0;
        if ($page <= 0) $page = 0;
        $limit = 10;
        $total = $users = DB::table('movies')->count('id');
        $offset = $page*$limit;
        if ($offset < $total) {
              $users = DB::table('movies')->skip($offset)->take($limit)->get()->toArray();
        } else {
          $users = [];
        }
        $data['item1'] = $movies1;
        $data['item2'] = $movies2;
        $data['page'] = $page;
        $data['next'] = $offset < $total;
        $uid = Auth::id();
        $result = $rate->where('user_id',$uid)->where('option',1)->get();
        $r = array();
        foreach ($result as $value ) {
           $r[] = $value->video_id;
        }
        $data['rate'] = $movie->findMany($r);
        $request->session()->put('pageSession', $page);
        return view('step1',$data);
     }

    public function dynamic(Request $request, Movie $movie){
        if ($request->ajax()) {
            $genres_table = $request->session()->get('genres_table');
            if ($request->session()->has('seen_list')) $blacklist = $request->session()->get('seen_list');
            else $blacklist = array();
            $templist = $request->input('blacklist');
            if ($templist) $blacklist = array_merge($blacklist, $templist);
            $showlist = array();
            usort($genres_table,array($this,'compare'));
            $count = 0;
            $data = array();
            $movies = array();
            $genres = array_keys($genres_table);
            foreach ($genres as $genre){
                if ($count == 10) break;
                $score = $genres_table[$genre];         
                $condition = (($score['good'] - $score['bad']) > 0) ? '0' : '1';
                $m = $movie->where('Country',$condition)->where(function ($query) use ($most_genre){
                    return $query->where('Genre1',$genre)->orWhere('Genre2',$genre)->orWhere('Genre3',$genre);
                })->whereNotIn('MovieLensId',array_merge($blacklist,$showlist))->first();
                $movies[] = $m;
                $showlist[] = $m->MovieLensId;
                $count++;
            }
            $request->session()->put('seen_list', $blacklist);
            return view('dynamic',array('item'=>$movies, 'blacklist' => json_encode($showlist)));
        }
    }

     //
     public function view(Request $request,Movie $movie,Rate $rate){
        $uid = Auth::id();
        $rates = $rate->where('user_id',$uid)->where('option',2)->get();
        $data['rate'] = $rates;
        $r = array();
        foreach ($rates as $value ) {
           $r[] = $value->video_id;
        }
        //$data['movie'] = $movie->findMany($r);
        $recommend = $request->session()->get('recommend');
        $list = $recommend['itemScores'];
        foreach ($movie->findMany($r) as $item ){
            foreach ($list as $value) {
                //print_r($value->item);
                //print_r(" ");
                if($value->item == $item->MovieLensId){
                    $movie->where('MovieLensId',$value->item)->update(['AverageRating'=>$value->rating]);
                    //print_r($value->rating);
                }		
            }
        }
        
	    $data['movie'] = $movie->findMany($r);
        return view('table',$data);
     }

     //
     public function recommend(Request $request,Rate $rate, Movie $movie){

        $recommend = array();
        if (isset($_POST['irecommend'])) {
            $recommend = (array) json_decode($_POST['irecommend']);
            $request->session()->put('option', '2');
            $request->session()->put('recommend',$recommend);
        }
        if(empty($request->session()->get('recommend')))
        {
            return redirect()->route('index');
        }
        $page = isset($_GET['page'])  ? intval($_GET['page']) : 0;
        if ($page <= 0) $page = 0;
        $limit = 10;    
        $offset = $page*$limit;
        $recommend = $request->session()->get('recommend');
        $list = $recommend['itemScores'];
        
        // todo: change recommend data
        $data['item'] = $movie->paginate(12);
        $data['page'] = $page;
        $total = count($data['item']);
        $data['next'] = $offset < $total;
        $uid = Auth::id();
        $result = $rate->where('user_id',$uid)->where('option',2)->get();
        $history = $rate->where('user_id',$uid)->where('option',1)->get();
        $r = array();
        $genres = array();
        $blacklist = array();
        foreach ($history as $value){
            $m = Movie::find($value->video_id);
            if ($value->rating > 3) {
                    if ($m->Genre1 != NULL && array_key_exists($m->Genre1,$genres)) {
                            $genres[$m->Genre1] ++;
                    }
                    else {
                            $genres[$m->Genre1] = 1;
                    }
                    if ($m->Genre2 != NULL && array_key_exists($m->Genre2,$genres)) {
                            $genres[$m->Genre2] ++;
                    }
                    else {
                            $genres[$m->Genre2] = 1;
                    }
                    if ($m->Genre3 != NULL && array_key_exists($m->Genre3,$genres)) {
                            $genres[$m->Genre3] ++;
                    }
                    else {
                            $genres[$m->Genre3] = 1;
                    }
            }
            $blacklist [] = $value->video_id;
        }
        foreach ($result as $value ) {
            $r[] = $value->video_id;
        }
        arsort($genres);
        $most_genre = key($genres);
        $i = array();
        foreach($list as $value){
            $i[] = $value->item;
        }
        //print_r($genres);
        //die();
        $data['rate'] = $movie->findMany($r);
        $data['item'] = $movie->wherein('MovieLensId',$i)->whereNotIn('MovieLensId',$blacklist)->where(function ($query) use ($most_genre){
            return $query->where('Genre1',$most_genre)->orWhere('Genre2',$most_genre)->orWhere('Genre3',$most_genre);
        })->paginate(10);
        $request->session()->put('pageSession', $page);
        return view('recommend',$data);
    }

     public function getRateVideo(Rate $rate, Movie $movie) {
         $uid = Auth::id();
         $result = $rate->where('user_id',$uid)->get();
         $r = array();
         foreach ($result as $value ) {
            $r[] = $value->video_id;
         }
         return $movie->findMany($r);
     }
     
     public function create(){
        echo 'create';
     }

     public function store(Request $request, Rate $rate){
        //  write to rate   
        $r = array('Not sure','1. Bad','2. Not good','3. What ever','4. Very Good','5. Great');
        $uid = Auth::id();
        $id = $_POST['id'];
        $rating = $_POST['rate'];
        $option = $request->session()->get('option');
        
        $genres_table = $request->session()->get('genres_table');
        $genres = array_keys($genres_table);
        $m = Movie::find($id);
        if (in_array($m->Genre1, $genres)) {
            $g = $genres_table[$m->Genre1];
            if ($rating > 3) $g['good']++;
            else if ($rating < 3) $g['bad']++;
        }
        if (in_array($m->Genre2, $genres)) {
            $g = $genres_table[$m->Genre2];
            if ($rating > 3) $g['good']++;
            else if ($rating < 3) $g['bad']++;
        }
        if (in_array($m->Genre3, $genres)) {
            $g = $genres_table[$m->Genre3];
            if ($rating > 3) $g['good']++;
            else if ($rating < 3) $g['bad']++;
        }

        $update = $rate->where('user_id','=',$uid)->where('video_id','=',$id)->get();

        if(count($update) != 0)
        {
            $rate->where('user_id','=',$uid)->where('video_id','=',$id)->update(array('rating' =>$rating));
            echo session()->get('pageSession');
            return;
        }

        if ((intval($id)>0) && (intval($option)>0) ) {
            $rate->video_id = $id;
            $rate->user_id = $uid;
            $rate->rating = $rating;
            $rate->option = $option;
            $rate->save();
            echo session()->get('pageSession');
        }
        else {
            echo "fail";
        }
     }

    public function search(Request $request, Movie $movie){
        $page = isset($_GET['page'])  ? intval($_GET['page']) : 0;
        $key = '';
        $key = $request->input('key');
        if (!$key) {
            $key = isset($_GET['key'])?$_GET['key']:'';
        }
        $limit = 15;
        $offset = $page*$limit;
        $data['item'] = $movie->orWhere('Genre1','like','%'.$key.'%')->orWhere('Genre2','like','%'.$key.'%')->orWhere('Genre3','like','%'.$key.'%')->orWhere('MovieName','like','%'.$key.'%')->skip($offset)->take($limit)->get();
        $data['page'] = $page;
        $total = count($data['item']);
        $data['next'] = $offset < $total;
        $data['key'] = isset($_POST['key'])?$_POST['key']:$_GET['key'];
        return view('search',$data);
    }

    public function detail(Request $request)
    {
        if ($request->ajax()) {
            $uid = Auth::id();
            $id = $request->input('id');
            $option = $request->session()->get('option');
            $movie = Movie::find($id); 
            $data['movie'] = $movie;
            $data['option'] = $option;
            return view('detail',$data);
        }
     }

     public function edit($id){
        echo 'edit';
     }
     public function update(Request $request, $id){
        echo 'update';
     }

     public function deleteallhistory(Rate $rate, $id){
        if($id == 1)
        {
            $rate->where('option',1)->delete();
            return redirect()->route('index');
        }
        

        $rate->where('option',2)->delete();
        return redirect()->route('recommend');        
     }
}
