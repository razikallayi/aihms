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
	<h4 class="breadcrumb_title">Career</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{ url('/')}}">Home</a>
		<span class="breadcrumb-item active">Career</span>
	</nav>
</section>

<section id="career" class="text-lg-center">
	<h2 class="uppercase title text-lg-center">WORK WITH US</h2>
	<h5>Apply Online or send in your resume today and we will get back to you.</h5>


	<div class="col-md-10 col-lg-10 col-md-offset-1 offset-md-1" >
		 <div class="arrow_up"></div>
		<div class="career_form">

		<p>We are looking for specialists doctors, allied staff with enthusiasm and a minimum experience of 3 years to add to our work force. You can upload your detailed cv to get in touch with you.</p>
		<form id="CareerForm"  enctype="multipart/form-data">
			<div class="form-group clearfix">
				<div class="row">
					<div class="col-md-6 xs-margin-bottom-15">
						<label class="required" for="">Applicant Name</label>
						<input name="name" type="text" class="form-control" placeholder="" required>
					</div>
					<div class="col-md-6">
						<label class="required" for="">Your Email</label>
						<input type="email" name="email" required class="form-control" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label class="required"  for="">Your Phone</label>
						<input name="phone" type="number" required class="form-control">
					</div>

					<div class="col-md-6">
						<label class="required" for="">Resume (*.doc, *.docx, *.pdf, *.ppt, *.pptx)</label>
						<input id="custom-file-input" name="ressume" required type="file" class="form-control" accept=".pdf,.ppt,.pptx,.doc,.docx">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label  for="">Remarks</label>
				<textarea type="text" name="remarks" placeholder="" class="form-control"  rows="5"></textarea>
			</div>
			<div class="form-group">
				<button id="SendBtn" name="submit" value="submit" class="ftr-btn send_btn acd-mr">SEND<i class="fa fa-angle-right"></i></button>
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
      <div class="modal-body">
        <p class="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('scripts')
@parent
<script type="text/javascript">
	
	$(function(){
	  $('#CareerForm').submit(function(event) {
	    event.preventDefault();
	    $('#SendBtn').html('Uploading and Sending...<i class="fa fa-angle-right"></i>');
	    $('#SendBtn').prop('disabled', true);
	    var form = document.getElementById("CareerForm"); 
		var formData = new FormData(form);
	    var message;
	    $.ajax({
	    	type        : 'POST',
	    	url         : '{{url('career')}}',
	    	data        : formData,
	    	encode      : true,
	    	dataType: 'json',
	    	processData: false,
	    	contentType: false,
	    	success: function(data){
	    		if(data.status=="success"){
	    			message= "Thank you! We will contact you soon.";
	    			document.getElementById("CareerForm").reset();
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
