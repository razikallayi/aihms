<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Models\Banner;
use App\Helpers\Helper;
class BannerController extends Controller
{
	/**
     * Display a listing of the banner.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$banners=Banner::all();
		//dd($banners);
		//$banners = "";
		return view('admin.banner.manage-banner',compact('banners'));
	}

    /**
     * Show the form for creating a new banner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//  $banners = new Banner;
			//  $banners->saveBanner($request);

    	return view('admin.banner.add-banner');
    }



    public function store(Request $request)
    {
		       //Validatie
     $validator = Validator::make($request->all(), [
      'title_small' => 'required|max:50',
      'title' => 'required|max:50',
      'description' => 'required|max:100',
      'image' => 'required',
      ])->validate();

     $banner = new Banner();
     $banner->title_small = $request->title_small;
     $banner->title = $request->title;
     $banner->description = $request->description;
     $banner->image = $request->image[0];
     $banner->save();
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

    $result = Banner::getBanner($id);
    return view('admin.banner.edit-banner', ['banner' => $result]);

  }



  public function update(Request $request)
  {
        // //Validatie
    $validator = Validator::make($request->all(), [
      'title' => 'required|max:50',
      'description' => 'required|max:50',
      'image' => 'required_without:videoSwitch|max:50000',
      //'video' => 'required_with:videoSwitch|max:100000',
      ]);
    // $validator->sometimes(['video'], 'mimes:mp4', function($input) {
    //   $banner = Banner::find($input->id);
    //   return $input->video != $banner->video;
    // });

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }

    $banner = new Banner();
    $banner->updateBanner($request);
    return back();
  }

  public function destroy($id=null){
   if($id!=null){
    $banner = Banner::find($id);
    $banner->delete();
  }

  return back();
}

    /**
     * @param  Request
     * @return Banner
     */
    public function sort(Request $request)
    {
            //Validatie
      $this->validate($request, [
        'sort' => 'required|array',
        ]);
      return Banner::sortBanners($request->sort);
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
