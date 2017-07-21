@extends('admin.layout.master')

@section('title','Manage Department')

@section('active_menu','mnu-department')
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
						
						<th>Department</th>
						
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>


					@foreach($departments as $department)


					<tr>
						

						<td>{{$department->name}}</td>
						

						<td><a href="{{url('admin/department/'.$department->id.'/edit')}}"><i class="material-icons">edit</i></a></td>
						<td><a data-toggle="modal" href="#deleteModal-{{$department->id}}" >
                                                 <form id="delete-form-{{$department->id}}" action="{{ url('admin/department/'. $department->id) }}" method="post" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form><i class="material-icons">delete</i></a></td>

					</tr>

					<div id="deleteModal-{{$department->id}}" class="modal fade"  tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
									<div class="modal-content">
											<div class="modal-header">
													<h4 class="modal-title" >Delete</h4>
											</div>
											<div class="modal-body">
												 Are you sure to delete?
											</div>
											<div class="modal-footer">
													<button onclick="event.preventDefault;document.getElementById('delete-form-{{$department->id}}').submit();" type="button" class="btn btn-link waves-effect">DELETE</button>
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

@section('scripts')
@parent
<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-dept").addClass('active').find('a').click();
});
</script>
@endsection
