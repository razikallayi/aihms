@extends('admin.layout.master')

@section('title','Location')
@section('active_menu','mnu-location')
@section('active_submenu','manage')

@section('styles')
@parent
<link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection


@section('content')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">

		<div class="body table-wrapper">
			<table class="table table-bordered table-responsive table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th>Location</th>
						<th>Address</th>
						<th>Contact Number</th>
						<th>Email</th>
						<th>Working Time</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					
					
	@foreach($locations as $i=>$location)

	<tr>
		<td>{{$location->name}}</td>
		<td>{!!nl2br($location->address)!!}</td>
		<td>{!!str_replace(',','<br/>',$location->phone)!!}</td>
		<td>{!!str_replace(',','<br/>',$location->email)!!}</td>
		<td>{{$location->working_time}}</td>
		<td><a href="{{url('admin/edit-location/'.$location->id)}}"><i class="material-icons">edit</i></a></td>
		<td width="5px"><a href="{{url('admin/location/'.$location->id)}}" onclick="event.preventDefault();
	                             document.getElementById('delete-form-{{$location->id}}').submit();">
	                             <form id="delete-form-{{$location->id}}" action="{{ url('admin/location/'. $location->id) }}" method="post" style="display: none;">
	                    {{ csrf_field() }}
	                    {{ method_field('DELETE') }}
	                </form><i class="material-icons">delete</i></a></td>
	</tr>
	@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

@endsection

@section('scripts')
@parent

@endsection

