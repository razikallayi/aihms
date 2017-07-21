@extends('aihms.layout.master')

@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">Doctor's Talks</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{url('/')}}">Home</a>
		<span class="breadcrumb-item active">Doctor's talks</span>
	</nav>
</section>

<section id="clinics">
<div class="grid">
		@foreach($talks as $talk)
		<div class="clinic-item col-md-6 col-sm-12 col-xs-12 text-justify border-right bg  grid-item">
			<div class="clinic_thumb">
				<iframe width="100%" height="360" src="{{$talk->getSource()}}" frameborder="0" allowfullscreen></iframe>
		  </div>
			<h5>{{$talk->title}}</h5>
			<p>{{$talk->description}}</p>
		</div>

		@endforeach
</div>
		<nav class="col-sm-12">
			{{ $talks->links('vendor.pagination.bootstrap-4') }}
		</nav>

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