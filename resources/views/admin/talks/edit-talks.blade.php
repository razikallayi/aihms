@extends('admin.layout.master')

@section('title','Doctor\'s Talks')
@section('active_menu','mnu-talks')

@section('content')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="body">

			<form id="form_validation" method="POST" action="{{url('admin/talks/'.$talk->id)}}" enctype="multipart/form-data">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<label>Title</label>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" value="{{$talk->title}}" name="title" class="form-control" required autofocus="">
							</div>
						</div>
					</div>
				</div>

				<label>Description</label>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<textarea name="description" rows="4" maxlength="500" class="form-control">{{ $talk->description}}</textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-sm-12">
					<label>Youtube Link</label>
					<small class="help-block">Copy youtube url and paste it here.</small>
						<div class="form-group ">
							<div class="form-line">
								<input  onchange="loadVideo(this.value)"  type="url" value="{{$talk->url}}" name="url" class="form-control" required placeholder="eg:https://www.youtube.com/watch?v=y_zav986tHc">
							</div>
						</div>
					</div>
					<div id="videoResult" class="col-md-3">
						<iframe width="360" height="240" src="{{$talk->getSource()}}" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>


				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="">
								<input type="submit" id="saveButton" name="save" value="Save Data" class="btn btn-success waves-effect" >
							</div>
						</div>
					</div>
				</div>

			</form>			
		</div>
	</div>

</div>
</div>


@endsection


@section('scripts')
@parent

<script>
	function loadVideo(url){
		var videoResult = document.getElementById('videoResult');
		
		var videoId = getYoutubeVideoId(url);
		if(videoId == 'error'){
			videoResult.innerHTML = '<small>Video cannot be loaded!</small>';
			return;
		}
		var iFrame = '<iframe width="360" height="240" src="//www.youtube.com/embed/' 
		+ videoId + '" frameborder="0" allowfullscreen></iframe>';
		videoResult.innerHTML = iFrame;
	}

	function getYoutubeVideoId(url) {
		var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
		var match = url.match(regExp);

		if (match && match[2].length == 11) {
			return match[2];
		} else {
			return 'error';
		}
	}
</script>
@endsection
