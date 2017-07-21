<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	const IMAGE_LOCATION ="uploads/gallery";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'title', 'image', 'video','listing_order'
	];



}
