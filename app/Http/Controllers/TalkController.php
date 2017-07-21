<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Talk;

class TalkController extends Controller
{
	/**
     * Display a listing of the talks.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$talks=Talk::orderBy('listing_order','desc')->paginate(20);
		return view('admin.talks.manage-talks',compact('talks'));
	}

    /**
     * Show the form for creating a new talks.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.talks.add-talks');
    }



    public function store(Request $request)
    {
      //Validatie
     $validator = Validator::make($request->all(), [
      'title' => 'required|max:255',
      'description' => 'max:500',
      'url' => 'required',
      ])->validate();

     $talk = new Talk();
     $talk->title = $request->title;
     $talk->description = $request->description;
     $talk->url = $request->url;
     $talk->listing_order = Talk::max('listing_order')+1;
     $talk->save();
     return back();
   }



   public function edit($id=null)
   {
      $talk=Talk::findOrFail($id);
      return view('admin.talks.edit-talks',compact('talk'));
   
   }


   public function update($id, Request $request)
   {
       //Validatie
       $validator = Validator::make($request->all(), [
           'title' => 'required|max:255',
           'description' => 'max:500',
           'url' => 'required',
           ])->validate();

       $talk = Talk::findOrFail($id);
       $talk->title = $request->title;
       $talk->description = $request->description;
       $talk->url = $request->url;
       $talk->save();
       return back();
   }


  public function destroy($id=null){
     if($id!=null){
      $talk = Talk::findOrFail($id);
      $talk->delete();
    }
    return back();
  }

    /**
     * @param  Request
     * @return Talk
     */
    public function sort(Request $request)
    {
            //Validatie
      $this->validate($request, [
        'sort' => 'required|array',
        ]);
      $counter = Talk::count();
      foreach ($request->sort as $talkId) {
        Talk::where('id', $talkId)
          ->update(['listing_order' => $counter--]);
      }
      return;
    }


  }
