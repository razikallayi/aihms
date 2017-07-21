<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
	const IMAGE_LOCATION ="uploads/clinic"; 

	public static function getClinic($id=null)
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


	// update 

	public function updateClinic($request)
	{
		$clinic = Clinic::findOrFail($request->id);
		$clinic->name = $request->title;
		$clinic->description = $request->description;
		if($request->has('image')){
			$clinic->image = $request->image[0];
		}
		$clinic->save();
		return true;
	}
}
