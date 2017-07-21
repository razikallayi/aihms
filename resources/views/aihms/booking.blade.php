@extends('aihms.layout.master')


@section('styles')
@parent
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0;
    }
</style>
@endsection


@section('content')

<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">Online Booking</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{url('/')}}">Home</a>
		<span class="breadcrumb-item active">Online booking</span>
	</nav>
</section>

<section id="career" class="text-lg-center">
	<h2 class="uppercase title text-lg-center">BOOK OUR DOCTOR</h2>
	<h5>Apply Online and we will get back to you.</h5>


	<div class="col-md-10 col-lg-10 col-md-offset-1 offset-md-1" >
		<div class="arrow_up"></div>
		<div class="career_form">

			<form id="ContactForm" action="" method="post">
				<div class="form-group clearfix">
					<div class="row">
						<div class="col-md-6 xs-margin-bottom-15">
							<label class="required" for="">Your Name</label>
							<input name="name" type="text" class="form-control" placeholder="" required>
						</div>
						<div class="col-md-6 xs-margin-bottom-15">
							<label class="required" for="">Your Place</label>
							<input name="place" type="text" class="form-control" placeholder="" required>
						</div>

					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label class="required" for="">Your Email</label>
							<input type="email" name="email" required class="form-control" placeholder="">
						</div>
						<div class="col-md-6">
							<label class="required"  for="">Your Phone</label>
							<input name="phone" required type="number" class="form-control" placeholder="">
						</div>

					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
						<label for="">Department</label>
							<select name="department" class="wide form-control">
								<option>Choose Departments</option>
								@inject('departments', 'App\Models\Department')
								@foreach($departments->all() as $department)
								<option>{{$department->name}}</option>
								@endforeach
							</select>
						</div>


						<div class="col-md-6">
						<label class="required"  for="">Doctor</label>
							<select name="doctor" class="wide form-control" >
								<option value="">Choose a Doctor</option>
								@inject('doctors', 'App\Models\Doctor')
								@foreach($doctors->get(['name']) as $doctor)
								<option>{{$doctor->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
						<label class="required"  for="">Location</label>
							<select name="location" class="wide form-control">
								<option value="" >Location</option>
								@inject('locations', 'App\Models\Location')
								@foreach($locations->get(['name']) as $location)
								<option>{{$location->name}}</option>
								@endforeach
							</select>
						</div>


					<div class="col-md-6 ">
					<label class="required"  for="">Prefered Time</label>
							<div class='input-group date ' id='datetimepicker1'>
                    <input required type='text' name="time" class="form-control" placeholder="Time" />
                    <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label  for="">Your Message</label>
					<textarea type="text" name="message" class="form-control"  rows="5" placeholder="Your message here."></textarea>
				</div>
				<div class="form-group">
					<button id="SendBtn" name="submit" value="submit" class="ftr-btn send_btn acd-mr">SEND<i class="fa fa-angle-right"></i></button>
					<div id="mail-status"></div>
				</div>

			</form>

		</div>
	</div>
	<div style="margin-top:1px; margin-bottom:3px;" class="container">
		<div class="row ">
			@include('aihms.layout.partials.form')
		</div>
	</div>
</section >


</div>

</div>
</div>
</div>


			<!-- Modal -->
<div id="mail_status_dialog" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
  {{--     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title title"></h4>
      </div> --}}
      <div class="modal-body">
        <p class="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



@endsection

@section('scripts')
@parent
<link rel="stylesheet" href="{{url('aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
<link rel="stylesheet" href="{{url('aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker-standalone.css')}}" />


<script type="text/javascript" src="{{url('aihms/bower_components/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript">
         $(function () {
             $('#datetimepicker1').datetimepicker({
             	format: 'DD-MMM-YYYY h:m a',
             });
         });
     </script>

<script type="text/javascript">

	$(function(){
	  $('#ContactForm').submit(function(event) {
	    event.preventDefault();
	    $('#SendBtn').html('Sending...<i class="fa fa-angle-right"></i>');
	    $('#SendBtn').prop('disabled', true);
	    var formData = {
	      'first_name'  : $('input[name=first_name]').val(),
	      'last_name'  	: $('input[name=last_name]').val(),
	      'email'  		: $('input[name=email]').val(),
	      'phone'  		: $('input[name=phone]').val(),
	      'department'  : $('select[name=department]').val(),
	      'doctor'  	: $('select[name=doctor] ').val(),
	      'location'  	: $('select[name=location]').val(),
	      'time'  		: $('input[name=time]').val(),
	      'message'  	: $('textarea[name=message]').val()
	    };
	    var message;
	    $.ajax({
	      type        : 'POST',
	      url         : '{{url('booking')}}',
	      data        : formData, // our data object
	      dataType    : 'json', // what type of data do we expect back from the server
	      encode      : true,
	      success: function(data){
	        if(data.status=="success"){
	          message= "Thank you! We will contact you soon.";
	        }
	        else{
	          message= "Sorry! Couldnot send mail.";
	        }
	      },
	      error: function(){
	        message = "Failed! Couldnot send mail.";
	      },
	      complete: function(){
	        popup(message);
	        $('#SendBtn').prop('disabled', false);
	        $('#SendBtn').html('SEND<i class="fa fa-angle-right"></i>');
	        document.getElementById("ContactForm").reset();
	      }
	    })
	  });
	});

</script>

<script type="text/javascript">
  $(document).ready(function() {
      popup = function(message){
          $('#mail_status_dialog .message').html(message);
          $('#mail_status_dialog').modal();
      };
  });
</script>

<script>
	// CSRF protection
	$.ajaxSetup(
	{
		headers:
		{
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

@endsection
