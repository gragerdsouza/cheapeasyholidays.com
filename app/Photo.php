<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Photo extends Model
{
    //
    protected $uploads = '/images/medias/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
        //return $photo; //removed path from here
    }

    public function player(){
        return $this->belongsTo('App\Player');
    }
}
