@extends('aihms.layout.master')

@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">AIHMS Academy</h4>
	<nav class="breadcrumb float-xs-right">
		<a class="breadcrumb-item" href="{{url('/')}}">Home</a>
		<span class="breadcrumb-item active">Academy</span>
	</nav>
</section>

<section id="academy">

	<div class="caption col-md-6 pull-right">
    <h2>AIHMS Academy</h2>
	  <ul>
     <li>A platform for continual education for Homeopaths and students of Homeopathy across the world.</li>
		 <li>We conduct conferences, seminars, workshops & CME's in India and abroad.</li>
		 <li>We also extend organized clinical trainings for qualified Homeopaths from India & abroad in our specialties.</li>
		</ul>
		<a href="contact.php" class="acd-mr">Know More <i class="fa fa-angle-right"></i></a>
	</div>
</section>
<div style="margin-top:1px; margin-bottom:3px;" class="container">
		<div class="row ">
			 @include('aihms.layout.partials.form')
		</div>
</div>

</div>

</div>
</div>
</div>

@endsection
