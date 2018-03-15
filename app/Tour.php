<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Tour;
//use App\TourImage;

class Tour extends Model
{
    //
	protected $fillable = [
        'title',
        'price',
        'offer',
        'package',
        'destination_id',
        'category_id',
        'body',
        'includes'
    ];
	
	public function tourimage(){
        return $this->belongsTo('App\TourImage');
    }
	
	public function tourimages(){
        return $this->hasMany('App\TourImage')->selectRaw('tour_images.*');
    }
	
	public function image(){
        return $this->hasMany('App\TourImage')->selectRaw('tour_images.*');
    }

    public function destination(){
        return $this->belongsTo('App\Destination');
	}
	
	public function category(){
        return $this->belongsTo('App\Category');
    }
}