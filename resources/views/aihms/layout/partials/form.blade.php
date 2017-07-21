<div class="slider-btm clearfix">
  <div class="col-md-12 no-padding">
  
   <div class="col-md-2 no-padding">
    <a href="{{url('clinics')}}">
     <div class="faci">
      <img src="{{ url('aihms/images/facilities.png')}}">
      <h4>Clinics</h4>
    </div>
  </a>
</div>

<div class="col-md-2 no-padding">
  <a href="{{url('talks')}}">
   <div class="faci">
    <img src="{{ url('aihms/images/ask-doctor.png')}}">
    <h4>Doctor's Talks</h4>
  </div>
</a>
</div>

<div class="col-md-2 no-padding">
 <div class="faci inline-form">
  <img src="{{ url('aihms/images/network.png')}}">
  <h4>Find a Doctor</h4>
</div>
</div>

<div class="col-md-4 no-padding">
 <div class="fdoct-sec">
 <form method="get" action="{{url('/doctors')}}">
    <div class="form-group clearfix">
      <select class="wide" name="department">
        <option value="">Search By  Department</option>
        @inject('departments', 'App\Models\Department')
        @foreach($departments->all() as $department)
        <option value="{{$department->name}}">{{$department->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group clearfix">
      <select class="wide" name="location">
        <option value="">Search By  Place</option>
        @inject('locations', 'App\Models\Location')
        @foreach($locations->get(['name']) as $location)
        <option value="{{$location->name}}">{{$location->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group clearfix">
{{--       <div class="col-md-9 no-padding">
        <select class="wide" name="doctor">
          <option value=""> Choose a Doctor </option>
          @inject('doctors', 'App\Models\Doctor')
          @foreach($doctors->all() as $doctor)
          <option value="{{$doctor->name}}">{{$doctor->name}}</option>
          @endforeach
        </select>
      </div> --}}
      <div class="col-md-12 no-padding text-xs-center">
        <button class="bt-mr" type="submit" value="search" name="search">Find Doctor</button>
      </div>
    </div>

  </form>
</div>
</div>

<div class="col-md-2 no-padding">
 <a href="{{url('booking')}}">
   <div class="faci">
    <img src="{{ url('aihms/images/online-booking.png')}}">
    <h4>Online Booking</h4>
  </div>
</a>
</div>

</div>
</div>
