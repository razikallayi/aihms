<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Models\Clinic;
use App\Helpers\Helper;
class ClinicController extends Controller
{
	/**
     * Display a listing of the clinic.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$clinics=Clinic::orderBy('name')->get();
		
		return view('admin.clinic.manage-clinic',compact('clinics'));
	}

    /**
     * Show the form for creating a new clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//  $clinics = new Clinic;
			//  $clinics->saveClinic($request);

    	return view('admin.clinic.add-clinic');
    }



		    public function store(Request $request)
		    {
		       //Validatie
		    	$validator = Validator::make($request->all(), [
						'name' => 'required|max:255',
		        'description' => 'required',
		        'image' => 'required',
		        ])->validate();

		    	$clinic = new Clinic();
					$clinic->name = $request->name;
					$clinic->description = $request->description;
					$clinic->image = $request->image[0];
		    	$clinic->save();
		    	return back();
		    }

		public function uploadImage(Request $request){
			$this->validate($request, [
				'image' => 'required',
				'location' => 'required' ,
			]);

			$uploadImage=$request->image;
			$location=$request->location;

			$imageData = Helper::uploadImage($uploadImage, $location);
			return $imageData;
		}





    public function edit($id=null)
    {
   	
    		$result=Clinic::getClinic($id);
    		return view('admin.clinic.edit-clinic', ['clinic' => $result]);
    
    }



    public function update(Request $request)
    {
        // //Validatie
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                //'image' => 'required_without:videoSwitch',
                //'video' => 'required_with:videoSwitch|max:100000',
                ]);
            // $validator->sometimes(['video'], 'mimes:mp4', function($input) {
            //     $clinic = Clinic::find($input->id);
            //     return $input->video != $clinic->video;
            // });

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $clinic = new Clinic();
        $clinic->updateClinic($request);
        return back();
    }

    public function destroy($id=null){
    	if($id!=null){
    		$clinic = Clinic::findOrFail($id);
    		$clinic->delete();
    	}

    	return back();
    }

    /**
     * @param  Request
     * @return Clinic
     */
    public function sort(Request $request)
    {
            //Validatie
        $this->validate($request, [
            'sort' => 'required|array',
            ]);
        return Clinic::sortClinics($request->sort);
    }





    // delete image through ajax
    public function deleteImage(Request $request){

        $this->validate($request, [
          'filename' => 'required',
          'location' => 'required',
          ]);
        $location = str_finish($request->location, '/');
        $filename = $request->filename;

          unlink($location.$filename);


      return response()->json(['status'=>'success']);
  }


}
