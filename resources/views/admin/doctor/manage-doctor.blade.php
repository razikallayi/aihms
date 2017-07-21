@extends('admin.layout.master')

@section('title','Doctor')
@section('active_menu','mnu-doctor')
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
							<th>Image</th>
							<th>Name</th>
							<th>Qualification</th>
							<th>Department</th>
							<th>Visiting Place</th>
							<th>Visiting Days</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>


						@foreach($doctors as $i=>$doctor)

						@php
						$specialchars = array(",");
						@endphp
						<tr>
							<td><img src="{{url('uploads/doctors/'.$doctor->image)}}" width="90" alt="no-image" height="90"></td>
							<td>{{$doctor->name}}</td>
							<td>{{$doctor->qualification}}</td>
							<td>{{$doctor->department->name}}</td>
							<td>{!!str_replace($specialchars, '<br/>', $doctor->visiting_place)!!}</td>
							<td>{!! nl2br($doctor->description) !!}</td>

							<td><a href="{{url('admin/edit-doctor/'.$doctor->id)}}"><i class="material-icons">edit</i></a></td>
							<td width="5px"><a href="{{url('admin/doctor/'.$doctor->id)}}" onclick="event.preventDefault();
								document.getElementById('delete-form-{{$doctor->id}}').submit();">
								<form id="delete-form-{{$doctor->id}}" action="{{ url('admin/doctor/'. $doctor->id) }}" method="post" style="display: none;">
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

