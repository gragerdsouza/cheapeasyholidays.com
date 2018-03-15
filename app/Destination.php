<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $fillable = [
        'title',
        'photo_id'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
	
	/*public function tour(){
        return $this->hasMany('App\Tour');
    })*/
}
