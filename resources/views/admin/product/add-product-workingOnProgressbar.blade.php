@extends('admin.layout.master')

@section('title','Product')

@section('styles')
@parent
<!-- Bootstrap Select Css -->
<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<!--cropper -->
<link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">

@endsection


@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/product')}}" enctype="multipart/form-data">
				{{csrf_field()}}

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<h2 class="card-inside-title">Product Category</h2>
				<div class="row clearfix">
					<div class="form-group col-sm-12">
						<select required class="form-control show-tick" name="category">
							<option value="">-- Select Category --</option>
							@foreach($category as $category)
							@if($category->id== old('category'))
							<option value="{{$category->id}}" selected>{{$category->category}}</option>
							@else
							<option value="{{$category->id}}">{{$category->category}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>



				<h2 class="card-inside-title">Product Name</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" maxlength="60" value="{{old('productname')}}" name="productname" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Description</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<textarea id="" name="description"  maxlength="450" class="form-control" required>{{old('description')}}</textarea>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Video<span><small>[Note: Please enter Youtube url for video]</small></span></h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<input type="url" maxlength="2000" value="{{old('url')}}" name="url" required class="form-control" >
							</div>
							<p class="help-block"><small>Eg: https://www.youtube.com/watch?v=j-2EtAvAFTc</small></p>
						</div>
					</div>
				</div>


				<h2 class="card-inside-title">Price</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="number" min="1" max="100000"  value="{{old('price')}}" name="price" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				
				<h2 class="card-inside-title">Discount [in percentage]<span><small>[Optional]</small></span></h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="number" value="0" min="0" max="100" value="{{old('discount')}}" name="discount" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				@php
				$checkedMenu= "checked";
				$checkedShop= "checked";
				if(old('category') !=null ){
					$checkedMenu= old('publishmenu')==1?"checked":"";
					$checkedShop= old('publishshop')==1?"checked":"";
				}
				@endphp

				<div class="demo-checkbox">
				<input type="checkbox" name="publishmenu" id="md_checkbox_30"  class="filled-in chk-col-pink" value="1" {{$checkedMenu}} />
					<label for="md_checkbox_30">Publish in Menu</label>
				</div>

				<!-- <h2 class="card-inside-title">Publish in Shop</h2> -->
				<div class="demo-checkbox">
					<input type="checkbox" name="publishshop" id="md_checkbox_31"  value="1" class="filled-in chk-col-pink" {{$checkedShop}} />
					<label for="md_checkbox_31">Publish in Shop</label>

				</div>





				<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Add Image :</label>
						<input id="ImageInput" type="file" style="max-width:75px; max-height:70px; overflow:hidden;cursor:pointer;font-size: 5em;" accept="image/*" name="image" class="col-indigo glyphicon glyphicon-picture fa-5x">
						
						<div class="progress m-t-10 m-b-10" >
							<div class="progress-bar" role="progressbar" style="width: 0%;">
								<span class="sr-only"></span>
							</div>
						</div>

						<div id="result" class="img-preview preview-lg row">
							@if(null != old('image'))
								@foreach(old('image') as $imageName)
								<input type="hidden" id="image-input-{{substr($imageName,0,-4)}}" name = "image[]" value="{{$imageName}}">
								<div id="image-preview-{{substr($imageName,0,-4)}}" class="col-md-3" style="min-height:240px"><span><button type="button" onclick="deleteImage('{{$imageName}}')" class="btn btn-xs  waves-effect btn-danger pull-right"><i class="material-icons">close</i></button><img class="img-responsive" src="{{url(App\Models\Product::IMAGE_LOCATION)."/".$imageName}}"></span></div>
								@endforeach
							@endif
						</div>
					</div>
				</div>







					<div class="col-sm-12">
						<div class="form-group">
							<div class="">
								<input id="saveButton" type="submit" name="save" value="Save Data" class="btn btn-success waves-effect" >
							</div>
						</div>
					</div>
		

			</form>			
		</div>
	</div>

</div>



	 <!-- Modal -->
	 <div id="CropperModal" class="modal fade" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
	 	<div class="modal-dialog" role="document">
	 		<div class="modal-content">
	 			<div class="modal-header">
	 				<h4 class="modal-title" id="modalLabel">Crop the image</h4>
	 			</div>
	 			<div class="modal-body">
	 			
	 			<div class="featured_image">
	 			  <img id="CropperImage" alt="Crop Image" />
	 			</div>


	 			</div>
	 			<div class="modal-footer">
	 				<button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Crop</button>
	 			</div>
	 		</div>
	 	</div>
	 </div>

@endsection


@section('scripts')
@parent

<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    {{-- cropper --}}
    <script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
    <script>
    $(function() {
        result = $('#result');

    	$("#ImageInput").change(function() {
    		if (this.files && this.files[0]) {
    			displayCropper(this);
    		}
    	});

    	function displayCropper(input) {
    		//Set src of Modal as input Image
    		var reader = new FileReader();
    		reader.onload = function(e) {
    			$('#CropperImage').attr("src", e.target.result);
    			$('#CropperModal').modal({
    				backdrop: 'static',
    				keyboard: false
    			});
    		}
    		if (input instanceof File) {
    			reader.readAsDataURL(input);
    		} else {
    			reader.readAsDataURL(input.files[0]);
    		}
    	}

	var $image = $(".featured_image > img");
	$('#CropperModal').on('shown.bs.modal', function() {
		$image.cropper({
			aspectRatio: 1/1,
			autoCrop: true,
			autoCropArea: 1.0,
			background: false,
			checkImageOrigin: true,
			dragCrop: false,
			guides: false,
			highlight: false,
			modal: true,
			movable: false,
			mouseWheelZoom: false,
			resizable: false,
			responsive: false,
			strict: true,
			touchDragZoom: false,
			zoomable: false
		});
	}).on('hidden.bs.modal', function() {
		$("#saveButton").attr('disabled',true);
		result.append('<div id="ImageLoading" class="col-sm-3 text-center"><h3>loading...</h3></div>');

		var location= "{{App\Models\Product::IMAGE_LOCATION}}";

		// Crop
		$('#ImageInput_cropdata').val(JSON.stringify($image.cropper('getCropBoxData')));

		$.ajax({
			url : "{{url('admin/product/upload-image')}}", 
			type: "POST",
			data:  {
				image: $image.cropper("getCroppedCanvas").toDataURL(),
				location:location,
			},
			xhr: function(e)
			 {
			   var xhr = new window.XMLHttpRequest();
			   //Upload progress
			   xhr.upload.addEventListener("progress", function(evt){
			   	var percentComplete = 0;
			     if (evt.lengthComputable) {
			       percentComplete = evt.loaded / evt.total;
			       $('.progress .progress-bar').css('width',percentComplete*100+'%')
			     }
			   }, false);
			   //Download progress
			  /* xhr.addEventListener("progress", function(evt){
			     if (evt.lengthComputable) {
			     	console.log("Loaded:",evt.loaded);
			     	console.log("Total:",evt.total);
			       var percentComplete = evt.loaded / evt.total;
			       //Do something with download progress
			       console.log("down",percentComplete);
			       $('.progress .progress-bar').css('width',percentComplete*100+'%')
			     }
			   }, false);*/
			   return xhr;
			 },
			success:function(data) {
				$('#ImageInput').val("");
				if(data.filename!=null){
					$('<input>').attr('type','hidden')
							.attr('id','image-input-'+data.filename.slice(0,-4))
							.attr('name','image[]')
							.attr('value',data.filename)
							.appendTo('#result');


					// Show
					result.append('<div id="image-preview-'+data.filename.slice(0,-4)+'" class="col-md-3" style="min-height:240px"><span><button type="button" onclick="deleteImage(\''+data.filename+'\')" class="btn btn-xs  waves-effect btn-danger pull-right"><i class="material-icons">close</i></button><img class="img-responsive" src="' + data.src + '"></span></div>');
				}else{
					alert("Sorry! Upload Failed ");
					$("#saveButton").attr('disabled',false);
	    			$('#ImageLoading').remove();
				}
			},
			error: function(){
	    			console.log('failed to upload image');
	    		},
			complete: function(){
					$("#saveButton").attr('disabled',false);
	    			$('#ImageLoading').remove();
	    		}
		});
		$image.cropper('destroy');
	});
});
	var deleteImage = function(filename){
		$.ajax({
		    url: "{{ url('admin/product/delete')}}",
		    type: 'DELETE',
		    data:{location:"{{App\Models\Product::IMAGE_LOCATION}}",
		    		filename:filename
		 			},
		    success: function(){
		    	$('#image-input-'+filename.slice(0,-4)).remove();
		    	$('#image-preview-'+filename.slice(0,-4)).remove();
		    },
		    error: function(){
		    	alert('failed');
		    }
		});
	}
    </script>



<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-product").addClass('active').find('a').click();
});
</script>


<script type="text/javascript">
//Used for all Ajax posts
// CSRF protection
	$.ajaxSetup({
	headers: {
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>


@endsection