<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\TourImage;

class TourImage extends Model
{
    //
	protected $uploads = '/images/tours/';

    protected $fillable = ['file','tour_id'];

    public function getFileAttribute($tourimage){
        return $this->uploads . $tourimage;
        //return $tourimage; //removed path from here
    }
	
	public function tour(){
        return $this->belongsTo('App\Tour');
    }
}
