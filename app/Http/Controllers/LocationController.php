<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Location;


class LocationController extends Controller
{
    // index

	public function index()
	{
		return view('admin.location.location');
	}

    // add 

	public function add(Request $request)
	{

		$this->validate($request,[
			'name' =>' required',
			'address' => 'required',
			'contact' => 'required',
			'email' => 'required',
			//'latitude' => 'required',
			//'longitude' => 'required',
			]);
		$save = Location::saveLocation($request);
		return back();

	}

	// manage

	public function manage()
	{
		$result = Location::getLocation();
		return view('admin.location.manage-location',['locations' => $result]);

	}

	// edit

	public function edit($id=null)
	{
		$result=Location::getLocation($id);
		return view('admin.location.edit-location',['location'=>$result]);
	}
	// update

	public function update(Request $request)
	{
		$this->validate($request,[
			'name' =>' required',
			'address' => 'required',
			'contact' => 'required',
			'email' => 'required',
			//'latitude' => 'required',
			//'longitude' => 'required',
			]);
		$save = Location::updateLocation($request);
		return back();


	}

	// delete 

	public function delete($id)
	{
		Location::deleteLocation($id);
		return back();
	}
}
