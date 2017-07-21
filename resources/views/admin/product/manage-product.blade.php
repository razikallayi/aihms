@extends('admin.layout.master')
@section('title','Product')
@section('styles')
@parent
<link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
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
						<th>image</th>
						<th>Product</th>
						<th>Category</th>
						<th>Shopable</th>
						<th>Price</th>
						<th>Discount</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				
				@foreach($product as $product)
					
					<tr>
						<td>{{$loop->iteration}}</td>
						 <td><img src="{{url(App\Models\Product::IMAGE_LOCATION."/".$product->images()->first()->image)}}" width="50"></td>
						<td>{{$product->product_name}}</td>
						<td>{{$product->category->category}}</td>
						<td>{{$product->isShopable()?"Yes":"No"}}</td>
						<td>{{$product->price}}</td>
						<td>{{$product->discount}}%</td>
						<td><a href="{{url('admin/edit-product/'.$product->id)}}"><i class="material-icons">edit</i></a></td>
						<td><a href="{{url('admin/delete-product/'.$product->id)}}" onclick="event.preventDefault();
                                                 document.getElementById('delete-form-{{$product->id}}').submit();">
                                                 <form id="delete-form-{{$product->id}}" action="{{ url('admin/delete-product/'. $product->id) }}" method="post" style="display: none;">
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