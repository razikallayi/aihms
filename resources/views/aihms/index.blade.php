@extends('aihms.layout.master')

@section('content')
	<div class="slider">

    <div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>	<!-- SLIDE  -->


@if(!$banners->isEmpty())
@foreach($banners as $banner)
				<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="{{url(App\Models\Banner::IMAGE_LOCATION.'/'.$banner->image)}}"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption medium_thin_grey skewfromrightshort customout"
						data-x="80"
						data-y="150"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="800"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 4">{{$banner->title_small}}
					</div>


					<!-- LAYER NR. 2 -->
					<div class="tp-caption large_bold_grey skewfromleftshort customout"
						data-x="80"
						data-y="198"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="300"
						data-start="1100"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 7">{{$banner->title}}
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption small_thin_grey customin customout"
						data-x="80"
						data-y="272"
						data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="1300"
						data-easing="Power4.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 8">{{$banner->description}}
					</div>

										<!-- LAYER NR. 4 -->
										<div class="tp-caption customin customout tp-resizeme"
							data-x="80"
							data-y="340"
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="600"
							data-start="1700"
							data-easing="Power4.easeOut"
							data-endspeed="600"
							data-endeasing="Power0.easeIn"
							style="z-index: 4"> <a href="{{url('about')}}" class="bnr-mr">Learn More <i class="fa fa-angle-right"></i></a>
						</div>



				</li>



@endforeach

@else


				<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="{{ url('aihms/images/slider/slider1.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption medium_thin_grey skewfromrightshort customout"
						data-x="80"
						data-y="150"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="800"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 4">The State of
					</div>


					<!-- LAYER NR. 2 -->
					<div class="tp-caption large_bold_grey skewfromleftshort customout"
						data-x="80"
						data-y="198"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="300"
						data-start="1100"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 7">Well Being
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption small_thin_grey customin customout"
						data-x="80"
						data-y="272"
						data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="1300"
						data-easing="Power4.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 8">To deliver specialized treatment and cure for chronic and acute <br> diseases with Homeopathy ...
					</div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption customin customout tp-resizeme"
							data-x="80"
							data-y="340"
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="600"
							data-start="1700"
							data-easing="Power4.easeOut"
							data-endspeed="600"
							data-endeasing="Power0.easeIn"
							style="z-index: 4"> <a href="{{url('about')}}" class="bnr-mr">Learn More <i class="fa fa-angle-right"></i></a>
						</div>



				</li>

                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="{{ url('aihms/images/slider/slider2.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption medium_thin_grey skewfromrightshort customout"
						data-x="80"
						data-y="150"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="800"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 4">The State of
					</div>


					<!-- LAYER NR. 2 -->
					<div class="tp-caption large_bold_grey skewfromleftshort customout"
						data-x="80"
						data-y="198"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="300"
						data-start="1100"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 7">Well Being
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption small_thin_grey customin customout"
						data-x="80"
						data-y="272"
						data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="1300"
						data-easing="Power4.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 8">To deliver specialized treatment and cure for chronic and acute <br> diseases with Homeopathy ...
					</div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption customin customout tp-resizeme"
							data-x="80"
							data-y="340"
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="600"
							data-start="1700"
							data-easing="Power4.easeOut"
							data-endspeed="600"
							data-endeasing="Power0.easeIn"
							style="z-index: 4"> <a href="{{url('about')}}" class="bnr-mr">Learn More <i class="fa fa-angle-right"></i></a>
						</div>



				</li>

                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="{{ url('aihms/images/slider/slider3.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption medium_thin_grey skewfromrightshort customout"
						data-x="80"
						data-y="150"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="800"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 4">The State of
					</div>


					<!-- LAYER NR. 2 -->
					<div class="tp-caption large_bold_grey skewfromleftshort customout"
						data-x="80"
						data-y="198"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="300"
						data-start="1100"
						data-easing="Back.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 7">Well Being
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption small_thin_grey customin customout"
						data-x="80"
						data-y="272"
						data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="500"
						data-start="1300"
						data-easing="Power4.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeIn"
						data-captionhidden="on"
						style="z-index: 8">To deliver specialized treatment and cure for chronic and acute <br> diseases with Homeopathy ...
					</div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption customin customout tp-resizeme"
							data-x="80"
							data-y="340"
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="600"
							data-start="1700"
							data-easing="Power4.easeOut"
							data-endspeed="600"
							data-endeasing="Power0.easeIn"
							style="z-index: 4"> <a href="{{url('about')}}" class="bnr-mr">Learn More <i class="fa fa-angle-right"></i></a>
						</div>



				</li>

				<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
	<!-- MAIN IMAGE -->
	<img src="{{ url('aihms/images/slider/slider4.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
	<!-- LAYERS -->

	<!-- LAYER NR. 1 -->
	<div class="tp-caption medium_thin_grey skewfromrightshort customout"
		data-x="80"
		data-y="150"
		data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
		data-speed="500"
		data-start="800"
		data-easing="Back.easeOut"
		data-endspeed="500"
		data-endeasing="Power4.easeIn"
		data-captionhidden="on"
		style="z-index: 4">The State of
	</div>


	<!-- LAYER NR. 2 -->
	<div class="tp-caption large_bold_grey skewfromleftshort customout"
		data-x="80"
		data-y="198"
		data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
		data-speed="300"
		data-start="1100"
		data-easing="Back.easeOut"
		data-endspeed="500"
		data-endeasing="Power4.easeIn"
		data-captionhidden="on"
		style="z-index: 7">Well Being
	</div>

	<!-- LAYER NR. 3 -->
	<div class="tp-caption small_thin_grey customin customout"
		data-x="80"
		data-y="272"
		data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
		data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
		data-speed="500"
		data-start="1300"
		data-easing="Power4.easeOut"
		data-endspeed="500"
		data-endeasing="Power4.easeIn"
		data-captionhidden="on"
		style="z-index: 8">To deliver specialized treatment and cure for chronic and acute <br> diseases with Homeopathy ...
	</div>

						<!-- LAYER NR. 4 -->
						<div class="tp-caption customin customout tp-resizeme"
			data-x="80"
			data-y="340"
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="600"
			data-start="1700"
			data-easing="Power4.easeOut"
			data-endspeed="600"
			data-endeasing="Power0.easeIn"
			style="z-index: 4"> <a href="{{url('about')}}" class="bnr-mr">Learn More <i class="fa fa-angle-right"></i></a>
		</div>



</li>

@endif
				<!-- SLIDE  -->


			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</div>
    </div>

    @include('aihms.layout.partials.form')


     </div>

  </div>
</div>




<div class="abt-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="row">
           <div class="col-md-4 ai no-padding aos-item" data-aos="fade-up"><img src="{{ url('aihms/images/abt-lft.jpg')}}" class="img-fluid"></div>
           <div class="col-md-8 aa aos-item" data-aos="fade-down">
              <h2><span>about</span> aihms</h2>
              <p>Rising standards in quality healthcare delivery, research outcome, high academic standards & credibility of Homoeopathy as a genuine therapeutic science seen from the last quarter of the 20th century has constantly reflected into innovations in advanced...</p>
              <div class="col-md-12 no-padding">
                 <div class="row">
                    <div class="col-md-6">
                       <div class="om clearfix">
                       	 <a href="{{url('about')}}">
                          <div class="om-icon"><img src="{{ url('aihms/images/om.png')}}"> <i class="fa fa-angle-right"></i></div>
                          <div class="om-txt">
                            <h4> <span> OUR </span> <br> MISSION</h4>
                          </div>
                          </a>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="om clearfix">
                       	 <a href="{{url('about')}}">
                          <div class="om-icon"><img src="{{ url('aihms/images/ov.png')}}"> <i class="fa fa-angle-right"></i></div>
                          <div class="om-txt">
                            <h4> <span> OUR </span> <br> VISION</h4>
                          </div>
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

<div class="clinic">
  <div class="container">
		<div class="row">
     <div class="col-md-12 no-padding">
        <div class="col-md-6 no-padding">
           <h2> <span> Our </span> Clinics</h2>
           <ul class="col-md-6 no-padding aos-item list-unstyled" data-aos="fade-left">
              <li>ALLERGY & ASTHMA CLINIC</li>
              <li>MIGRAINE & HEADACHES</li>
              <li>SKIN & COSMETIC</li>
              <li>CANCER CLINIC</li>
              <li>OBESITY CLINIC</li>
              <li>BACKACHE</li>
              <li>ENT</li>
              <li>PAEDIATRIC</li>
              <li>DE ADDICTION</li>
              <li>UROLOGY CLINIC</li>
           </ul>
           <ul class="col-md-6 no-padding aos-item list-unstyled" data-aos="fade-right">
              <li>THYROID CLINIC</li>
              <li>GERIATRIC</li>
              <li>INFERTILITY</li>
              <li>ARTHRITIS</li>
              <li>HAIR</li>
              <li>PSYCHIATRY</li>
              <li>CARDIOLOGY</li>
              <li>DIABETES</li>
              <li>GYNAECOLOGY</li>
              <li>GASTRO & PILES CLINIC</li>
           </ul>
        </div>
     </div>
	 </div>
  </div>
</div>



<div class="netwrk-sec">
  <div class="container">
     <div class="col-md-12 no-padding">

     	<div class="netwrk-con clearfix">
           <a  id="location" href="{{url('contact#address')}}" class="net-loc"> <img src="{{url('aihms/images/net-loc.png')}}"> Locate in map</a>
           <a  id="phone"    href="" class="net-tel"> <img src="{{url('aihms/images/net-tel.png')}}">0495 3261988</a>
        </div>

        	<div class="circle">
            	<ul id="Clinics" class="clearfix list-unstyled">

                   <li class="aos-item active" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='0495 3261988'><p>Kozhikode </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='9387 168444'><p>Thrissur </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='0484-3274747'><p>Kochi </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='0497 2768333'><p>Kannur </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='8281 365990 '><p>Palakkad </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='0469 2700038'><p>Thiruvalla </p><div class="rud"></div> </a></li>
                   <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='0471 3203333'><p>Thiruvananthapuram </p><div class="rud"></div> </a></li>
				  <li class="aos-item" data-aos="fade-up"><a href="" data-loc='{{url('contact#address')}}' data-phone='Coming Soon'><p>Manjeri(Coming Soon)</p><div class="rud"></div> </a></li>
				  
                </ul>
               <h4>AIHMS <br> <span>networks</span></h4>
            </div>
     </div>
  </div>
</div>


<!--<div class="doctor-sec">
   <div class="container">
      <div class="col-md-12 no-padding">
         <h2> <span> our </span> doctors</h2>
         <div id="owl-demo" class="owl-carousel">
                <div class="item"><img src="{{ url('aihms/images/owl1.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl2.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl1.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl2.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl1.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl2.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl1.jpg')}}"></div>
                <div class="item"><img src="{{ url('aihms/images/owl2.jpg')}}"></div>
              </div>
      </div>
   </div>
</div>-->
@endsection


@section('scripts')
@parent


<script>
$("#Clinics li a").click(function(event) {
  event.preventDefault();
  $("#Clinics li").removeClass("active");
  $(this).parent().addClass("active");
var locationHref = $(this).data('loc');
var phone = $(this).data('phone');
$("#location").attr('href',locationHref);
$("#phone").html('<img src="{{url('aihms/images/net-tel.png')}}">'+ phone);
$('#phone').stop().css({"right": "20px"}).html(function (_, oldText) {

}).animate({
	"right": "0px"
}, 500);

// $('#location').stop().css({"left": "20px"}).html(function (_, oldText) {

// }).animate({
//          "left": "0px"
//        }, 500);
});
</script>

@endsection


