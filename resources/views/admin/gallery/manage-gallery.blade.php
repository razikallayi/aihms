@extends('admin.layout.master')

@section('title','Manage Gallery')

@section('active_menu','mnu-gallery')
@section('active_submenu','manage')

@section('styles')
@parent
<!-- jquery sortable Plugin Css -->
<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">

@endsection

@section('content')


{{-- Manage Products --}}
<div class="row">
	@if(!$gallery->isEmpty())
	<div class="col-sm-12 connectedSortable">
		@foreach($gallery as $item)

		<div id="sort_{{$item->id}}" class="col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header" >
					<h2 style="white-space: nowrap;overflow:hidden">
						<span>{{$item->title}}</span>
						<small>{{$item->description}}</small>
					</h2>

					<ul class="header-dropdown m-r--5">
						<li><a href="{{url('admin/gallery/'.$item->id)}}" onclick="event.preventDefault();
							document.getElementById('delete-form-{{$item->id}}').submit();">
							<form id="delete-form-{{$item->id}}" action="{{ url('admin/gallery/'. $item->id) }}" method="post" style="display: none;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
							</form><i class="material-icons">delete</i></a></li>
						</ul>
					</div>
					<div class="body">
						<div  id="carousel-{{$item->id}}"  class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">

								<div style="min-height:100px;" class="item active">
									@if($item->video!=NULL)
									<video width="100%" controls><source src="{{url(App\Models\Gallery::VIDEO_LOCATION.'/'.$item->video)}}" type="video/mp4">Your browser does not support the video tag.</video>
									@else
									<img style="margin:auto;" src="{{url(App\Models\Gallery::IMAGE_LOCATION.'/'.$item->image)}}" />
									@endif
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="body">
					No data to display.
					<a href="{{url('admin/gallery/add')}}" class="btn btn-info pull-right">Add Gallery</a>
				</div>
			</div>
		</div>
		@endif
	</div>

	@endsection


	@section('scripts')
	@parent
	<!-- Jquery sortable Plugin Js -->
	<script src="{{url('md/plugins/jquery-sortable/jquery-sortable.min.js')}}"></script>
	<script type="text/javascript">
    	//Make the dashboard widgets sortable Using jquery UI
    	$(".connectedSortable").sortable({
    		connectWith: ".connectedSortable",
    		revert: 200,
    		handle: ".card",
    		zIndex: 999999
    	});
    	$(".connectedSortable .card").css("cursor", "move");
    	$(".connectedSortable").on( "sortupdate", function( event, ui ) {
    		var order = $(this).sortable("serialize") + '&action=updateCategoryListings';
    		$.post("{{url('admin/gallery/sort')}}", order)
    		// 	, function(theResponse){
    		// 	$("#contentRight").html(theResponse);
    		// });
    	});
    </script>
    {{--Sorting Ends--}}

<script>
	// CSRF protection
	$.ajaxSetup(
	{
		headers:
		{
			'X-CSRF-Token': $('input[name="_token"]').val()
		}
	});
</script>

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-ban").addClass('active').find('a').click();
});
</script>

@endsection
