<?php

namespace App\Http\Controllers;

use Mail;
use Validator;
use App\Models\Talk;
use App\Models\Place;
use App\Models\Banner;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\Location;
use App\Mail\CareerMail;
use App\Models\Department;
use App\Mail\OnlineBooking;
use App\Mail\ContactEnquiry;
use Illuminate\Http\Request;

class MasterController extends Controller
{

  public function index()
  {
    $banners = Banner::all();
    $clinics = Clinic::orderBy('name')->get();
    return view('aihms.index', compact('banners','clinics'));
  }

  public function about()
  {
   return view('aihms.about');
 }
 public function blog()
 {
   $clinics = Clinic::orderBy('name')->get();
   return view('aihms.blog',compact('clinics'));
 }

 public function clinics()
 {

  $clinics = Clinic::orderBy('name')->get();
  return view('aihms.clinics',compact('clinics'));
}

public function gallery()
{
  $gallery=Gallery::orderBy('listing_order','desc')->get();
  return view('aihms.gallery',compact('gallery'));
}

public function talks()
{
  $talks=Talk::orderBy('listing_order','desc')->paginate(20);
  return view('aihms.talks',compact('talks'));
}

public function doctors(Request $request)
{
  $doctors = Doctor::query();

  if($request->has('department')){
    $department = Department::where('name','like','%'.$request->department.'%')->first(['id']);
    if(null != $department){
      $doctors->where('department_id',$department->id);
    }
  }

  if($request->has('location')){
      $doctors->where('visiting_place','like','%'.$request->location.'%');
  }

  $doctors= $doctors->orderBy('name')->paginate(20);

  return view('aihms.doctors',compact('doctors'));
}


public function booking()
{
  return view('aihms.booking');
}

public function onlineBooking(Request $request){
  Mail::to(OnlineBooking::getDestinationEmail())
  ->send(new OnlineBooking($request));

  // return view('emails.contact-enquiry')->with(['request'=> $request]);
  if( count(Mail::failures()) > 0 ) {
    return response()->json(["status"=>"failed"]);
  } else {
    return response()->json(["status"=>"success"]);
  }
}


public function career()
{
  return view('aihms.career');
}

public function careerMail(Request $request){
  //Validatie
 $validator = Validator::make($request->all(), [
              'name'  => 'required',
              'email'  => 'required|email',
              'phone'  => 'required',
              'ressume' => 'required|mimes:doc,docx,pdf,ppt,pptx',
              ])->validate();

  Mail::to(CareerMail::getDestinationEmail())
      ->send(new CareerMail($request));

  // return view('emails.career')->with(['request'=> $request]);
  if( count(Mail::failures()) > 0 ) {
    return response()->json(["status"=>"failed"]);
  } else {
    return response()->json(["status"=>"success"]);
  }
}

public function contact()
{
  $locations = Location::all();
  return view('aihms.contact',compact('locations'));
}

public function contactEnquiry(Request $request){
  Mail::to(ContactEnquiry::getDestinationEmail())
  ->send(new ContactEnquiry($request));

  // return view('emails.contact-enquiry')->with(['request'=> $request]);
  if( count(Mail::failures()) > 0 ) {
    return response()->json(["status"=>"failed"]);
  } else {
    return response()->json(["status"=>"success"]);
  }
}


public function location()
{
  return view('aihms.location');
}

}
