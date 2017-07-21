<div id="franchise">
  <div class="icon">
   <img src="{{ url('aihms/images/icon-franchises.png')}}"/>
 </div>
 <div class="booking">
  <h6>For Franchise booking</h6>
  <h4>Call  +91 9446919191</h4>
</div>
</div>


 <!-- Modal -->
<div id="mail_status_dialog" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
  {{--     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title title"></h4>
      </div> --}}
      <div class="modal-body">
        <p class="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<form id="followupForm" class="hover">
<div class="row" style="display:none" >
    <a id="followupClose" href="javascript:void(0)"><i class="fa fa-times fa-2x pull-right"></i></a>
  </div>
  <div class="header">
    <h4>Keep in touch!</h4>
    <h4><small>we love to hear from you</small></h4>
  </div>

  <div class="form-group row">
    <div class="col-md-12">
      <label class="required" >Message: </label>
      <textarea type="text" name="message" required placeholder="Type your message here" class="form-control"  rows="3"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="row">
      <div class="col-md-12">
        <label class="required" for="">Name: </label>
        <input name="name" type="text" class="form-control" placeholder="Name" required></div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <label for="">Telephone: </label>
        <input name="phone" required type="number" class="form-control" placeholder="phone">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <label class="required" for="">Email: </label>
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <button id="SendBtn" name="submit" value="submit" class="ftr-btn btn btn-block send_btn acd-mr">SEND</button>
    </div>
  </form>

<script>
  var mouseleave = function(){
    $('#followupForm').css("bottom","-412px");
  }
  $('#followupForm').hover(function(){
    $('#followupForm').css("bottom","0px");
  },mouseleave);

  $('#followupForm .form-control').focus(function(){
    $('#followupForm').css('bottom','0px');
    $('#followupForm').off("mouseleave");
    $('#followupClose').parent().show();
  });

  $('#followupClose').click(function(event) {
    $('#followupForm').css('bottom','-412px');
    $('#followupForm').on("mouseleave",mouseleave);
    $('#followupClose').parent().hide();
  });
</script>

<script type="text/javascript">
  
  $(function(){
    $('#followupForm').submit(function(event) {
      event.preventDefault();
      var sendButton = $('#followupForm #SendBtn');
      sendButton.html('Sending...');
      sendButton.prop('disabled', true);
      var formData = {
        'name'       : $('input[name=name]').val(),
        'email'      : $('input[name=email]').val(),
        'phone'      : $('input[name=phone]').val(),
        'message'    : $('textarea[name=message]').val()
      };
      var message;
      $.ajax({
        type        : 'POST',
        url         : '{{url('contact')}}',
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true,
        success: function(data){
          if(data.status=="success"){
            message= "Thank you! We will contact you soon.";
          }
          else{
            message= "Sorry! Couldnot send the mail.";
          }
        },
        error: function(){
          message = "Failed! Couldnot send the mail.";
        },
        complete: function(){
          popup(message);
          sendButton.prop('disabled', false);
          sendButton.html('SEND');
          $('#followupForm')[0].reset();
           $('#followupClose').click();
        }
      })
    });
  });

</script>
<script type="text/javascript">
  $(document).ready(function() {
      popup = function(message){
          $('#mail_status_dialog .message').html(message);
          $('#mail_status_dialog').modal();
      };
  });
</script>
<script>
  // CSRF protection
  $.ajaxSetup(
  {
    headers:
    {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

<footer>
  <div class="container">
   <div class="col-md-12 no-padding">
    <div class="col-md-6 no-padding">
     <div class="col-md-7 no-padding">
      <div class="ftr-health">
        <div class="qute">“</div>
        <h2> The Greatest wealth is <br> <span> health </span> </h2>
        <h4>Follow us on social media</h4>
        <ul class="list-unstyled">

          <li><a target="_blank" style="background-color:#3b5998;" href="https://www.facebook.com/AIHMSHomeopathymultispecialityclinics/"><i class="fa fa-facebook" ></i></a></li>
          <li><a target="_blank" href="https://twitter.com/AihmsHomeopathy" style="background-color:#00aced;"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" style="background-color:#4875B4;"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>

    <div class="col-md-5 no-padding">
      <div class="ul">
       <h4> <span> Useful </span> Links</h4>
       <ul class="list-unstyled">
         <li><a href="{{url('/')}}">Home</a></li>
         <li><a href="{{url('about')}}">About Us</a></li>
         <li><a href="{{url('clinics')}}">Clinics</a></li>
         <li><a href="{{url('gallery')}}">Gallery</a></li>
         <li><a href="{{url('doctors')}}">Doctors</a></li>
         <li><a href="{{url('career')}}">Career</a></li>
         <li><a href="{{url('contact')}}">Contact Us</a></li>
       </ul>
     </div>
   </div>

 </div>


 <div class="col-md-6">
  <div class="ftr-bran clearfix">
   <div class="tabs">
     <h4> <span> Our </span>  Branches</h4>

@inject('locations','App\Models\Location')
  @if(!$locations::all()->isEmpty())
    @foreach($locations::all() as $location)
      <div class="tab">
      <button class="tab-toggle">{{$location->name}}</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul >
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span>{!! nl2br($location->address) !!}</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> {!! str_replace(',','<br/>',$location->phone) !!}</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> {!! str_replace(',','<br/>',$location->email) !!}</li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>{{$location->name}} <br>  <span>{{$location->working_time}}</span></h3></div>
      </div>
    </div>
    @endforeach

    @else

     <div class="tab">
      <button class="tab-toggle">Kannur</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul >
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> Ground Floor, J.R Complex <br> Near Chettipeedika, <br> Kannur 670004</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 0497 2768333,<br> 0497 3203025</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Kannur <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>

    <div class="tab">
      <button class="tab-toggle">Kozhikode</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> Near Soubhagya Apartments, <br> Parayancheri, Mavoor Road  <br> Kozhikode 673004</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 0495 3248636, <br> 0495 3261988</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Kozhikode <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>


    <div class="tab">
      <button class="tab-toggle">Thissur</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> First Floor, <br> Premier Tower <br> M.G Road, Thrissur-1</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 9387168444,  <br> 9387168445</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Thissur <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>

    <div class="tab">
      <button class="tab-toggle">Kochi</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> G 321, KC Abrahan master Road <br> Panambilly Nagar , <br>  Cochi-36</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 0484 3068440-44 , <br> 0484-3274747</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Kochi <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>

    <div class="tab">
      <button class="tab-toggle">Thiruvanathapuram</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> Enchakkal House, <br> Enchakkal junction, <br> Thiruvananthapuram 695008</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 0471 3203333, <br> 9633863333</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Trivandrum <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>

    <div class="tab">
      <button class="tab-toggle">Palakkad</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> Pooppas Arcade, <br> Co operative college Road <br> Olavakkode, Palakkad</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 8281365990  <br> <br></li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com   </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Palakkad <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>

    <div class="tab">
      <button class="tab-toggle">Thiruvalla</button>
    </div>
    <div class="content">
      <h4> <span> CONTACT </span>   US</h4>
      <ul>
        <li> <span><img src="{{ url('aihms/images/loc-map.png')}}"></span> Near Head Post Office <br> Mc Road, <br> Thiruvalla, 689101</li>
        <li> <span><img src="{{ url('aihms/images/phone.png')}}"></span> 0469 2700038, <br> 9633066100</li>
        <li> <span><img src="{{ url('aihms/images/msg.png')}}"></span> aihhms@gmail.com  </li>
      </ul>
      <div class="tme clearfix">
        <div class="tme-lft"><img src="{{ url('aihms/images/clock.png')}}"></div>
        <div class="tme-lft"><h3>Thiruvalla <br>  <span>9.00</span> am to  <span>7.00</span> pm</h3></div>
      </div>
    </div>
@endif

  </div>
</div>
</div>
</div>
</div>
</footer>

<div class="ftr-btm">
  <div class="container">
   <div class="col-md-12 no-padding">
    <div class="ftr-lft">© 2016 AIHMS. All Rights Reserved.</div>
    <div class="ftr-rgt">Powerd by  <a href="http://www.whytecreations.com/" target="_blank" rel="dofollow" title="Webdesign Comapny Qatar"> <img src="{{ url('aihms/images/whyte.png')}}">  Whyte Company </a></div>
  </div>
</div>
</div>

<div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
  <ul class="jq-dropdown-menu">
    <li><a href="#">9387168445</a></li>
  </ul>
</div>


