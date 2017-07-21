@extends('admin.layout.master')

@section('title','Manage Banner')

@section('active_menu','mnu-banner')
@section('active_submenu','manage')

@section('styles')
@parent
<!-- jquery sortable Plugin Css -->
<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">

@endsection

@section('content')

<div class="row">

	@if(!$banners->isEmpty())
	<div class="col-sm-12 connectedSortable">
		@foreach($banners as $banner)

		<div id="sort_{{$banner->id}}" class="col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header" >
					<h2 style="white-space: nowrap;overflow:hidden">
						<span>{{$banner->title}}</span>
						<small>{{$banner->description}}</small>
					</h2>

					<ul class="header-dropdown m-r--5">
						<li><a href="{{url('admin/banner/'. $banner->id.'/edit')}}"><i class="material-icons">edit</i></a></li>
						<li><a href="{{url('admin/banner/'.$banner->id)}}" onclick="event.preventDefault();
							document.getElementById('delete-form-{{$banner->id}}').submit();">
							<form id="delete-form-{{$banner->id}}" action="{{ url('admin/banner/'. $banner->id) }}" method="post" style="display: none;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								</form><i class="material-icons">delete</i></a></li>
						</ul>
					</div>
					<div class="body">
						<div  id="carousel-{{$banner->id}}"  class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">

								<div style="min-height:100px;" class="item active">
									@if($banner->image!=NULL)
									<img style="margin:auto;" src="{{url(App\Models\Banner::IMAGE_LOCATION.'/'.$banner->image)}}" />
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
					<a href="{{url('admin/banners/add')}}" class="btn btn-info pull-right">Add Banner</a>
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
    		$.post("{{url('admin/banners/sort')}}", order)
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


@endsection
