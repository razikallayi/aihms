<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

	protected $fillable = ['name'];

	public static function saveDepartment($request)
	{
		$dept = new Department;
		$dept->name = $request->name;
		$dept->save();
		return true;
	}

	// get data

	public static function getDepartment($id=null)
	{
		if($id == null)
		{
			return self::orderBy('name')->get();
		}
		else
		{
			return self::findOrFail($id);
		}
	}

	// update data

	public static function updateDepartment($request)
	{
		$dept =  Department::findOrFail($request->id);
		$dept->name = $request->name;
		$dept->save();
		return true;
	}

	// delete department

	public static function deleteDepartment($id)
	{
		$dept = self::findOrFail($id);
		$dept->delete();
		return true;
	}

}
