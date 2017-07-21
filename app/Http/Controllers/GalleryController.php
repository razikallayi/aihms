<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Gallery;
use App\Helpers\Helper;
class GalleryController extends Controller
{
	/**
     * Display a listing of the gallery.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$gallery=Gallery::orderBy('listing_order','desc')->get();
		return view('admin.gallery.manage-gallery',compact('gallery'));
	}

    /**
     * Show the form for creating a new gallery.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.gallery.add-gallery');
    }



    public function store(Request $request)
    {
      //Validatie
     $validator = Validator::make($request->all(), [
      'image' => 'required|array',
      ])->validate();

     foreach ($request->image as $image) {
       $imageData = Helper::uploadImage($image, Gallery::IMAGE_LOCATION);
       $gallery = new Gallery();
       $gallery->image = $imageData->getData()->filename;
       $gallery->listing_order = Gallery::max('listing_order')+1;
       $gallery->save();
     }
     return back();
   }

  public function destroy($id=null){
     if($id!=null){
      $gallery = Gallery::findOrFail($id);
      $gallery->delete();
    }
    return back();
  }

    /**
     * @param  Request
     * @return Gallery
     */
    public function sort(Request $request)
    {
            //Validatie
      $this->validate($request, [
        'sort' => 'required|array',
        ]);
      $counter = Gallery::count();
      foreach ($request->sort as $galleryId) {
        Gallery::where('id', $galleryId)
          ->update(['listing_order' => $counter--]);
      }
      return;
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
