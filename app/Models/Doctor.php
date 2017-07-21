<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
// use Session;
use App\Models\Department;
class Doctor extends Model
{

	const IMAGE_LOCATION = "uploads/doctors";

	protected $fillable = ['name','qualification','designation','image','description','visiting_place','department_id','slug'];



	public function department()
	{
		return $this->hasOne('App\Models\Department','id','department_id');
	}




	public static function saveDoctor($request)
	{
		
		$doc = new Doctor;
		$doc->name = $request->name;
		$doc->qualification = $request->qualification;
		$doc->designation = $request->designation;
		$doc->description = $request->description;
		$doc->visiting_place = $request->place;
		$doc->department_id = $request->department;
		$doc->image = $request->image[0];
		$doc->slug="";

		$doc->save();
		return true;
	}


	// get data 

	public static function getDoctors($id = null)
	{
		if($id==null)
		{
			return self::orderBy('name')->get();
		}
		else
		{
			return self::findOrFail($id);
		}
	}


	public static function updateDoctor($request)
	{
		$doc = Doctor::findOrFail($request->id);
		$doc->name = $request->name;
		$doc->qualification = $request->qualification;
		$doc->designation = $request->designation;
		$doc->description = $request->description;
		$doc->visiting_place = $request->place;
		$doc->department_id = $request->department;
		$doc->image = $request->image[0]?$request->image[0]:$doc->image;
		$doc->slug="";
		
		$doc->save();
		return true;
	}


	public function deleteDoctor($id)
	{
		$doc =Doctor::findOrFail($id);
		$doc->delete();
		return true;
	}


	// get data by dept and location here

	public static function getDoctorByDepart($dept_name,$loc_name)
	{
		$dept_name = Department::where('name',$dept_name)->first();
		$dept_id = $dept_name->id ;

		$doctors = self::where('department_id','=',$dept_id )
		->where('visiting_place','LIKE','%'.$loc_name.'%')
		->get();

		return $doctors;
		
	}
}
