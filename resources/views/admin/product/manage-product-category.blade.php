@extends('admin.layout.master')
@section('title','Product Category')
@section('styles')
@parent
<link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">

		<div class="body table-wrapper">
			@if (session()->has('status'))
			<div class="alert alert-danger">
				<ul>
					<li>{{ session()->get('status')}}</li>
				</ul>
			</div>
			@endif

			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th>SL NO:</th>
						<th>Product Category</th>
						
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
				@foreach($category as $i=>$category)
					
					<tr>
						<td>{{++$i}}</td>
						<td>{{$category->category}}</td>
						
						<td><a href="{{url('admin/edit-product-category/'.$category->id)}}"><i class="material-icons">edit</i></a></td>
						<td><a href="{{url('admin/delete-product-category/'.$category->id)}}" onclick="event.preventDefault();
                                                 document.getElementById('delete-form-{{$category->id}}').submit();">
                                                 <form id="delete-form-{{$category->id}}" action="{{ url('admin/delete-product-category/'. $category->id) }}" method="post" style="display: none;">
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
   $("#mnu-product").addClass('active').find('a').click();
});
</script>


@endsection