<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	protected $fillable = ['place','slug'];

	public static function savePlaces($request)
	{
		$place = new Place;
		$place->place = $request->name;
		$place->slug = str_slug($request->name);
		$place->save();
		return true;
	}

	// get data 

	public static function getPlace($id=null)
	{
		if($id == null){
			return self::get();
		}
		else
		{
			return self::findOrFail($id);
		}
	}

	// update

	public static function updatePlaces($request)
	{
		$place =Place::findOrFail($request->id);
		$place->place = $request->name;
		$place->slug = str_slug($request->name);
		$place->save();
		return true;
	}

	// delete

	public static function deletePlace($id)
	{
		$place =Place::findOrFail($id);
		$place->delete();
		return true;
	}
}
