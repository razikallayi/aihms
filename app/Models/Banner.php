<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	const IMAGE_LOCATION ="uploads/banner";


	public static function getBanner($id=null)
	{
		if($id == null)
		{
			return self::get();
		}
		else
		{
			return self::findOrFail($id);
		}
	}

	// update 

	public function updateBanner($request)
	{
		$banner = Banner::findOrFail($request->id);
		$banner->title_small = $request->title_small;
		$banner->title = $request->title;
		$banner->description = $request->description;
		$banner->image = $request->image[0];
		$banner->save();
		return true;

	}



}
