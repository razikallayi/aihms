@extends('aihms.layout.master')

@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">Our Clinics</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{url('/')}}">Home</a>
		<span class="breadcrumb-item active">Our Clinics</span>
	</nav>
</section>

<section id="clinics">
@foreach($clinics as $clinic)
	@endforeach
		<div class="clinic-item col-md-8 col-xs-12 text-justify border-right bg">
			<div class="clinic_thumb">
			  <a class="fancybox" href="{{url(App\Models\Clinic::IMAGE_LOCATION.'/'.$clinic->image)}}">
					<img class="img-fluid" src="{{url(App\Models\Clinic::IMAGE_LOCATION.'/'.$clinic->image)}}"/>
					<div class="expand_icon">
            <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
					</div>
				</a>
		  </div>
			<h5>{{$clinic->name}}</h5>
			<p>{{$clinic->description}}</p>
		</div>

{{-- @endforeach --}}


<div class="col-md-4">
	@foreach($clinics as $clinic)
	<h6><a href="">{{$clinic->name}}</a></h6>
@endforeach
</div>
		
		<div style="margin-top:5px; margin-bottom:3px;" class="container">
			<div class="row ">
		   @include('aihms.layout.partials.form')
			</div>
		</div>
</section>


</div>

</div>
</div>
</div>

@endsection



@section('scripts')
@parent

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js" type="text/javascript"></script>

<script>
	 $(".grid").imagesLoaded(function(){
		$('.grid').masonry({
		  // options
		  itemSelector: '.grid-item',
		});
	 });

</script>

@endsection