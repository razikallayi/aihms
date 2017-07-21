<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = ['name','address','phone','email','working_time','latitude','longitude'];
    // save location

	public static function saveLocation($request)
	{
		$loc  = new Location;
		$loc->name = $request->name;
		$loc->address = $request->address;
		$loc->phone = $request->contact;
		$loc->email = $request->email;
		$loc->working_time = $request->working_time;
		$loc->latitude = $request->latitude;
		$loc->longitude = $request->longitude;
		$loc->save();
		return true;

	}

	// get the data 

	public static function getLocation($id=null)
	{
		if($id==null)
		{
			return self::get();
		}
		else
		{
			return self::findOrFail($id);
		}
	}

	// update location

	public static function updateLocation($request)
	{
		$loc= Location::findOrFail($request->id);
		$loc->name = $request->name;
		$loc->address = $request->address;
		$loc->phone = $request->contact;
		$loc->email = $request->email;
		$loc->working_time = $request->working_time;
		$loc->latitude = $request->latitude;
		$loc->longitude = $request->longitude;
		$loc->save();
		return true;
	}

	// delete location 

	public static function deleteLocation($id)
	{
		$loc = Location::findOrFail($id);
		$loc->delete();
		return true;
	}
}
