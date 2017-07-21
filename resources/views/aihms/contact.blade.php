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
	<h4 class="breadcrumb_title">Contact</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{ url('/')}}">Home</a>
		<span class="breadcrumb-item active">Contact</span>
	</nav>
</section>

<section style="padding-top:30px;" id="career" class="text-lg-center ">
	<h3 class="text-lg-center">Send an Email</h3>
	<div class="col-md-10 col-lg-10 col-md-offset-1 offset-md-1" >
		 <div class="arrow_up"></div>
		<div class="career_form">


		<form id="ContactForm">
			<div class="form-group clearfix">
				<div class="row">
					<div class="col-md-12 xs-margin-bottom-15">
						<label class="required" for="">Name</label>
						<input name="name" type="text" class="form-control" placeholder="" required></div>

					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
						<label for="">Telephone</label>
							<input name="phone" required type="number" class="form-control" placeholder="">
						</div>

						<div class="col-md-6">
							<label class="required" for="">Email</label>
							<input type="email" name="email" class="form-control" placeholder="">
						</div>
						</div>
				</div>
				<div class="form-group row">
				<div class="col-md-12">
					<label class="required" >Message</label>
					<textarea type="text" name="message" required placeholder="Type your message here" class="form-control"  rows="5"></textarea>
				</div>
				</div>
				<div class="form-group">
					<button id="SendBtn" name="submit" value="submit" class="ftr-btn send_btn acd-mr">SEND<i class="fa fa-angle-right"></i></button>
				</div>

			</form>

	</div>
		</div>
	</section>
		<div class="clearfix">

</div>
<div id="address" class="address_wraper">

@if(!$locations->isEmpty())
@foreach($locations as $location)
	<div class="col-md-3 col-lg-3 text-lg-left border-right rs-bor">
		<h5 class="district">{{$location->name}}</h5>
		<p class="address">{!! nl2br($location->address)!!}<br><br>
			PH: {{$location->phone}}<br><br>
			Email : {{$location->email}}
		</p>
	</div>
@endforeach
@else
	<div class="col-md-3 col-lg-3 text-lg-left border-right rs-bor">
		<h5 class="district">Kannur</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-right pl-30 rs-bor">
		<h5 class="district">Kozhikode</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-right pl-30 rs-bor">
		<h5 class="district">Kochi</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left  pl-30 rs-bor">
		<h5 class="district">Thiruvanathapuram</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-right border-top pt-30  rs-bor">
		<h5 class="district">Perinthalmanna</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-right border-top pl-30 pt-30 rs-bor">
		<h5 class="district">Trissur</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-right border-top pl-30 pt-30 rs-bor">
		<h5 class="district">Palakkad</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

	<div class="col-md-3 col-lg-3 text-lg-left border-top  pl-30 pt-30">
		<h5 class="district">Thiruvalla</h5>
		<p class="address">Ground Floor, J.R Complex
			Near Chettipeedika, Kannur 670004<br><br>
			PH: 0497 2768333, 0497 3203025<br><br>
			Email :
		</p>
	</div>

@endif
</div>

 <div id="map">
	 <div class="container">
		 <div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15652.164994320905!2d75.794846!3d11.258376!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x74b0cb33cb801353!2sAIHMS+Homoeopathy!5e0!3m2!1sen!2sin!4v1478927348770" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
  </div>
 </div>
 <div style="float: left; width: 100%; margin-top: -3px; margin-bottom: 3px;">
 	   @include('aihms.layout.partials.form')
</div>
</div>

@endsection

@section('scripts')
@parent
<script type="text/javascript">
	
	$(function(){
	  $('#ContactForm').submit(function(event) {
	    event.preventDefault();
	    $('#SendBtn').html('Sending...<i class="fa fa-angle-right"></i>');
	    $('#SendBtn').prop('disabled', true);
	    var formData = {
	      'name'       : $('input[name=name]').val(),
	      'email'      : $('input[name=email]').val(),
	      'phone'      : $('input[name=phone]').val(),
	      'message'    : $('textarea[name=message]').val()
	    };
	    var message;
	    $.ajax({
	      type        : 'POST',
	      url         : '{{url('contact')}}',
	      data        : formData, // our data object
	      dataType    : 'json', // what type of data do we expect back from the server
	      encode          : true,
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

@endsection
