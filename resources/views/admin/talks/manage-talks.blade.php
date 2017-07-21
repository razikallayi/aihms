@extends('admin.layout.master')

@section('title','Manage Talks')

@section('active_menu','mnu-talks')
@section('active_submenu','manage')

@section('styles')
@parent
<!-- jquery sortable Plugin Css -->
<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">

@endsection

@section('content')

<div class="row">
	@if(!$talks->isEmpty())
	<div class="connectedSortable">
		@foreach($talks as $talk)

		<div id="sort_{{$talk->id}}" class="col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header" >
					<h2 style="white-space: nowrap;overflow:hidden">
						<span>{{$talk->title}}</span>
					</h2>

					<ul class="header-dropdown m-r--5">
						<li><a href="{{url('admin/talks/'. $talk->id.'/edit')}}"><i class="material-icons">edit</i></a></li>
						<li><a href="{{url('admin/talks/'.$talk->id)}}" onclick="event.preventDefault();
							document.getElementById('delete-form-{{$talk->id}}').submit();">
							<form id="delete-form-{{$talk->id}}" action="{{ url('admin/talks/'. $talk->id) }}" method="post" style="display: none;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
							</form><i class="material-icons">delete</i></a></li>
						</ul>
					</div>
					<div class="body">
						<div  id="carousel-{{$talk->id}}"  class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div style="min-height:100px;" class="talk active">
								<iframe width="100%" height="280" src="{{$talk->getSource()}}" frameborder="0" allowfullscreen></iframe>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
			@endforeach

			<nav class="col-sm-12">
				{{ $talks->links('vendor.pagination.bootstrap-4') }}
			</nav>
			
		</div>
		@else
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="body">
					No data to display.
					<a href="{{url('admin/talks/add')}}" class="btn btn-info pull-right">Add Doctor's Talks</a>
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
    		$.post("{{url('admin/talks/sort')}}", order)
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
