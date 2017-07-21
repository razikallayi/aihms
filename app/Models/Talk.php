<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'url','listing_order'
    ];


    public function getSource(){
		$youtube_link = $this->url;
    	$iframe_src = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","//www.youtube.com/embed/$1",$youtube_link);
    	return $iframe_src;
    }

}
