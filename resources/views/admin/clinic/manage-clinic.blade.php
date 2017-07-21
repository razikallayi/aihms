@extends('admin.layout.master')

@section('title','Manage clinic')
@section('active_menu','mnu-clinic')
@section('active_submenu','manage')

@section('styles')
@parent
<link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">

		<div class="body table-wrapper">
			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th>Clinic Image</th>
						<th>Clinic Name</th>
						<th>Description</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>


					@foreach($clinics as $clinic)


					<tr>
						<td> <img style="width:100px;" class="img-fluid" src="{{url(App\Models\Clinic::IMAGE_LOCATION.'/'.$clinic->image)}}"/></td>

						<td>{{$clinic->name}}</td>
						<td>{{$clinic->description}}</td>

						<td><a href="{{url('admin/clinic/'.$clinic->id.'/edit')}}"><i class="material-icons">edit</i></a></td>
						<td><a data-toggle="modal" href="#deleteModal-{{$clinic->id}}" >
                                                 <form id="delete-form-{{$clinic->id}}" action="{{ url('admin/clinic/'. $clinic->id) }}" method="post" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form><i class="material-icons">delete</i></a></td>

					</tr>

					<div id="deleteModal-{{$clinic->id}}" class="modal fade"  tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
									<div class="modal-content">
											<div class="modal-header">
													<h4 class="modal-title" >Delete</h4>
											</div>
											<div class="modal-body">
												 Are you sure to delete?
											</div>
											<div class="modal-footer">
													<button onclick="event.preventDefault;document.getElementById('delete-form-{{$clinic->id}}').submit();" type="button" class="btn btn-link waves-effect">DELETE</button>
													<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
											</div>
									</div>
							</div>
					</div>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection
