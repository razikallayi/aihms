<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Place;
use App\Helpers\Helper;

class DoctorController extends Controller
{
    //

	public function index()
	{
		$place = Place::getPlace();
		$dept = Department::getDepartment();
		return view('admin.doctor.add-doctor',['depts'=>$dept,'places' => $place] );
	}


	public function add(Request $request)
	{
		
		Doctor::saveDoctor($request);
		return back();
	}

	public function upload(Request $request)
	{
		$this->validate($request, [
			'image' => 'required',
			'location' => 'required',
			]);

		$uploadImage=$request->image;
		$location=$request->location;

		$imageData = Helper::uploadImage($uploadImage, $location);
		
		return $imageData;
	}

	public function manage()
	{
		$doctors = Doctor::getDoctors();
		return view('admin.doctor.manage-doctor',['doctors'=>$doctors]);

	}

	public function edit($id=null)
	{
		$place = Place::getPlace();
		$dept = Department::getDepartment();
		$doctors = Doctor::getDoctors($id);
		return view('admin.doctor.edit-doctor',['doctor'=>$doctors,'depts'=>$dept,'places' => $place]);
	}

	public function update(Request $request)
	{
		Doctor::updateDoctor($request);
		return back();
	}

	public function delete($id)
	{
		$doc = new Doctor;
		$doc->deleteDoctor($id);
		return back();
	}
}
