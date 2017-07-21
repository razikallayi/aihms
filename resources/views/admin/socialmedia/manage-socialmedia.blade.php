@extends('admin.layout.master')

@section('title','Social Media')

@section('styles')
@parent
<link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

<link href="{{url('md/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">

		<div class="body table-wrapper">
			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th>SL NO:</th>
						<th>Socialmedia</th>
						<th>URL</th>
					
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
				@foreach($socialmedia as $socialmedias)
					
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><i class="{{$socialmedias->social_media}} fa-3x"></i></td>
						<td>{{$socialmedias->url}}</td>
						
						<td><a href="{{url('admin/edit-socialmedia/'.$socialmedias->id)}}"><i class="material-icons">edit</i></a></td>
						<td><a href="{{url('admin/delete-socialmedia/'.$socialmedias->id)}}" onclick="event.preventDefault();
                                                 document.getElementById('delete-form-{{$socialmedias->id}}').submit();">
                                                 <form id="delete-form-{{$socialmedias->id}}" action="{{ url('admin/delete-social-media/'. $socialmedias->id) }}" method="post" style="display: none;">
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

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-social").addClass('active').find('a').click();
});
</script>

@endsection