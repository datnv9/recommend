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
            return $movie->Genre1.'&nbsp;&nbsp;&nbsp;&nbsp;'.$movie->Genre2.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$movie->Genre3;
        }
        else {
            return '';
        }
    }
    
    public function getRate($video_id,$option) {
         $r = Rate::where('video_id',$video_id)->where('option',$option)->get()->first();
         return $this->rating($r->rating);
    }
    
    public function rating($val, $max=5) {
        $r = '';
        $v = round($val);
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
