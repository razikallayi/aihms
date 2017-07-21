@extends('aihms.layout.master')
@section('content')
<section id="breadcrumb" class="card">
	<h4 class="breadcrumb_title">About Us</h4>
	<nav class="breadcrumb  float-xs-right">
		<a class="breadcrumb-item" href="index.php">Home</a>
		<span class="breadcrumb-item active">About Us</span>
	</nav>
</section>
<section id="about_us">
	<div class="text-lg-center">
		<h2 class="uppercase title"><span class="text-light">about</span> aihms</h2>
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<p style="font-size: 16px;font-weight: bold; width: 84%;  margin: 0 auto;
				margin-bottom: 31px;">Rising standards in quality healthcare delivery, research outcome, high academic standards & credibility of Homoeopathy as a genuine therapeutic science seen from the last quarter of the 20th century has constantly reflected into innovations in advanced medical treatments & patient care modalities with Homoeopathy at par and ahead of other streams of medical disciplines.</p>
				<img style="margin-bottom:25px;" src="{{ url('aihms/images/Doctors.jpg')}}" class="img-fluid"/>
			</div>

		</div>

	</div>
	<div class="row no-margin">
		<div class="col-md-6 col-lg-6 text-justify">
			<p>An innovative venture from a group of Homoeopaths near a decade ago, who were contemporaries in medical colleges, Aditya Insitute of Homoeopathic Medical Sciences (AIHMS) stands tall on its cause for humanity with its special touch with Homoeopathy in restoration of health of the sick and the suffering.<br><br>

				The first Multispecialty Clinics under corporate governance in Kerala and the second in India, AIHMS Homoeopathy rolled out 24 specialties 8 years ago to the ailing masses across Kerala and Middle East. AIHMS today is the undoubtedly the prime referral standard to primary, secondary and tertiary care in the entire Homoeopathic discipline in Kerala.</p>
			</div>
			<div class="col-md-6 col-lg-6 text-justify">
				<p>The advanced infrastructure standards of the clinics, the extreme resources of the participating army of near 100 highly qualified clinicians, researchers & International speakers and the pharma alliance with Dr Reckeweg & Co, Germany make AIHMS Homoeopathy a unique vision in Homoeopathy delivering excellent results & advanced patient care standards which was the need of the hour.<br><br>
					AIHMS today operates across 7 centers in Kerala and at Middle East in alliance. AIHMS Academy, the academic wing of AIHMS Homoeopathy undertakes frequent trainings sessions, research programmes and organized events in Homoeopathy for Indian and International Homoeopaths.</p>
				</div>
			</div>



		</section>


	</div>

	<div id="mission" class="no-padding-top">
		<div class="container">
			<div class="row no-margin">
				<div class="col-md-12 col-lg-6 col-sm-12 col-xs-12 no-padding-right no-padding-left" >
					<img src="{{ url('aihms/images/about/about_green.jpg')}}" class="img-fluid"/>
					<div class="download_brochure">
						<div class="down_icon">
							<a href="brochure/aihms_brchr_2013.pdf"><img src="{{ url('aihms/images/about/download_icon.png')}}"/></a>
						</div>
						<div class="down_text">
							<p style="margin-bottom:0px; color:#000;">Know more about us</p>
							<a href="brochure/aihms_brchr_2013.pdf" download><h4>Download Brochure</h4></a>
						</div>
					</div>
				</div>
				<div id="mission_vision" class="col-md-12 col-lg-6 col-sm-12 col-xs-12" >
					<div class="mission row ">

						<div class="col-md-11 pl-100 text-xs-center text-lg-left ">
							<div class="mission_icon "><img src="{{ url('aihms/images/about/mission_icon.png')}}"/></div>
							<h6>OUR</h6>
							<h3>MISSION</h3>
							<p>To take Homeopathy to the next level empowering it with specialties, research, advanced infrastructure, standards, quality & the use of worldclass pharmaceuticals.<p>
							</div>
						</div>
						<div class="vision row">

							<div class="col-md-11 pl-100 text-xs-center text-lg-left">
								<div class="vision_icon "><img src="{{ url('aihms/images/about/vision_icon.png')}}"/></div>
								<h6>OUR</h6>
								<h3>VISION</h3>
								<p>To deliver specialized treatment and cure for chronic and acute diseases with Homeopathy by pooling resources from doctors with rich clinical expertise & with the use of quality medications of international standarda in the concerned domains. To set a new example and model in Homeopathic hwalthcare delivery.<p>
								</div>
							</div>
						</div>





					</div>
				</div>
			</div>

		</div>



		<div style="margin-top:-15px; margin-bottom:3px;" class="container">
			<div class="">
				@include('aihms.layout.partials.form')
			</div>
		</div>




	</div>
</div>
</div>
@endsection


