@extends('aihms.layout.master')

@section('styles')
@parent
<style>
.top-sec {
    background: url({{url('aihms/images/banner-bg.jpg')}});
	background-repeat: repeat-y !important;
}
/* gallery grid
---------------------------------------------------------------------- */
/*.grid-item { width: 300px; }*/
.mix.grid-item {
  float: left;
	width:20%;
	border: 2px solid #fff;
}

@media(max-width:767px){
	.mix.grid-item {
		width:50%;
	}
}
</style>
@endsection


@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">AIHMS Gallery</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="index.php">Home</a>
		<span class="breadcrumb-item active">Gallery</span>
	</nav>
</section>

<section id="academy">

<div class="container">
	<div class="row">
		<!-- <div class="controls text-lg-center text-xs-center">

			<button type="button" class="control" data-filter="all">All</button>
			<button type="button" class="control" data-filter=".category1">Category 1</button>
			<button type="button" class="control" data-filter=".category2">Category 2</button>
			<button type="button" class="control" data-filter=".category3">Category 3</button>


		</div> -->

	<div class="Container">
		<div class="grid text-xs-center">

		@if(!$gallery->isEmpty())
			@foreach($gallery as $item)
			<div class="mix category1 grid-item">
				<a class="fancybox"  rel="gallery" href="{{ url(App\Models\Gallery::IMAGE_LOCATION."/".$item->image)}}">
					<img class="img-fluid"  src="{{ url(App\Models\Gallery::IMAGE_LOCATION."/".$item->image)}}">
					<div class="expand_icon">
					 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
					</div>
				</a>
			</div>
			@endforeach
		@else

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/01.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/01.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/02.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/02.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/03.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/03.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/04.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/04.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/05.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/05.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>











					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/06.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/06.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/07.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/07.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/08.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/08.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/09.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/09.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/10.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/10.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/11.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/11.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/12.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/12.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/13.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/13.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/14.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/14.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/15.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/15.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/16.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/16.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/17.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/17.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/18.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/18.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/19.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/19.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/20.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/20.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/21.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/21.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="mix category1 grid-item">
						<a class="fancybox"  rel="gallery" href="{{ url('aihms/images//gallery/22.jpg')}}">
							<img class="img-fluid"  src="{{ url('aihms/images//gallery/22.jpg')}}">
							<div class="expand_icon">
							 <i class="fa fa-search-plus fa-3x" aria-hidden="true"></i>
							</div>
						</a>
					</div>

			@endif







					</div>


				</div>




			</div>
</div>
	</div>

</section>
<div style="margin-top:1px; margin-bottom:3px;" class="container">
		<div class="row ">
			@include('aihms.layout.partials.form')
		</div>
</div>

</div>

</div>
</div>
</div>








<!--<div class="doctor-sec">
<div class="container">
<div class="col-md-12 no-padding">
<h2> <span> our </span> doctors</h2>
<div id="owl-demo" class="owl-carousel">
<div class="item"><img src="{{ url('aihms/images//owl1.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl2.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl1.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl2.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl1.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl2.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl1.jpg')}}"></div>
<div class="item"><img src="{{ url('aihms/images//owl2.jpg')}}"></div>
</div>
</div>
</div>
</div>-->


@endsection


@section('scripts')
@parent
<script src="{{url('aihms/js/mixitup.js')}}"></script>
<script>
    var containerEl = document.querySelector('.Container');
    var mixer = mixitup(containerEl);
</script>


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