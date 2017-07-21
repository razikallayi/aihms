<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Place;

class PlaceController extends Controller
{
    //
    public function index()
    {
    	return view('admin.place.add-place');
    }

    // save

    public function savePlace(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		]);
    	Place::savePlaces($request);
    	return back();
    }


    // manage

    public function manage()
    {
    	$result = Place::getPlace();
    	return view('admin.place.manage-place',['places'=>$result]);

    }

    // edit

    public function edit($id=null)
    {
    	$result = Place::getPlace($id);
    	return view('admin.place.edit-place',['place'=>$result]);
    }

    // update

    public function update(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		]);
    	Place::updatePlaces($request);
    	return back();
    }

    // delete 

    public function delete($id)
    {
    	Place::deletePlace($id);
    	return back();
    }
}
