<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Rate;

class Movie extends Model
{

    public $timestamps = false;
    public function getCategory($video_id) {
        $movie = Movie::find($video_id);
        if ($movie) {
            return $movie->Genre1.'&nbsp;&nbsp;&nbsp'.$movie->Genre2.'&nbsp;&nbsp;&nbsp;'.$movie->Genre3;
        }
        else {
            return '';
        }
    }
    
    public function getRate($video_id,$option,$uid) {
         $r = Rate::where('video_id',$video_id)->where('option',$option)->where('user_id',$uid)->get()->first();
         //var_dump($r->rating);
         return $this->rating($r->rating);
    }
    public function getRating($video_id,$option) {
         $r = Rate::where('video_id',$video_id)->where('option',$option)->get()->first();
         return $r->rating;
    }
    
    public function rating($val, $max=5) {
        $r = '';
        $v = round($val);
        //var_dump($v);
        for ($i=0; $i<$max; $i++) {
          if ($i < $v) {
            $r .= '<span class="glyphicon glyphicon-star"></span>';
          } else {
            $r .= '<span class="glyphicon glyphicon-star-empty"></span>';
          }
        }
        $r .= ' (' . round($val, 1) . ')';
        return $r;
    }
}
