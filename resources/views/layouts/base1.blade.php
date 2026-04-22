<!DOCTYPE html>
<html lang="en">

 


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <meta name="viewport" content="width=1200">
    <link rel="shortcut icon" href="{{ asset('storage/app/public/'.$settings->favicon)}}" type="image/x-icon">
    <!-- Title -->
    <title>{{$settings->site_name}} Company and Cargo Services</title>
	<meta name="description" content="{{$settings->site_name}} Company service all over the world">
    <meta name="author" content="{{$settings->site_name}}">
    <meta name="keywords" content="{{$settings->site_name}}Company and Cargo Services Delivery Deliveries">
    <!-- Favicon -->
    

    <!-- Stylesheet -->
    <link rel="stylesheet" href="temp/custom2/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-start ">
                        <!-- Logo Area -->
                        <div class="logo ">
                            <a href="/"><img src="{{ asset('storage/app/public/'.$settings->logo)}}"  style="height:50px;" alt=""></a>
                        </div>
                      
                        <!-- Top Contact Info -->
                     <div   class=" col top-contact-info d-flex align-items-center justify-content-end pl-5 ml-5">
                        
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{$settings->locations}}"><img src="temp/custom2/img/core-img/placeholder.png" alt=""> <span>{{ $settings->locations }}</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{$settings->contact_email}}"><img src="temp/custom2/img/core-img/message.png" alt=""> <span>{{$settings->contact_email}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
       
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        
                    </nav>
                </div>
            </div>
        </div>
        
        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </header>
    @yield('content')


    
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="temp/custom2/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="temp/custom2/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="temp/custom2/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="temp/custom2/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="temp/custom2/js/active.js"></script>
</body>
<script type="text/javascript">

    $(document).ready(function() {

    	function indicator(){

    		$("#pointer_img").css({'left' : ''});
    		$("#pointer_img").css({'right' : ''});
    		$("#movingline").css({'width': '0%'});
    		
    		
    		
	    	var moving_guage = {{ $courier->percentage_complete	 }} ;
			var moving_guage2 = {{ $courier->percentage_complete	 }} ;


	    	// var moving_guage = 45;
	    	

			
			

			if(moving_guage > 100){
				moving_guage = 100;
			}

			if(moving_guage < 0){
				moving_guage = 0;
			}

			if(moving_guage2 > 98){
				moving_guage2 = 98;
			}

			if(moving_guage2 < 0){
				moving_guage2 = 0;
			}

			if(moving_guage2 > 50){
				moving_guage2 = 100 - moving_guage2 - 5;
				$("#pointer_img").css({'left' : ''});
				$("#pointer_img").animate({'right' : moving_guage2+'%'}, 5000);
			}else{
				$("#pointer_img").css({'right' : ''});
				$("#pointer_img").animate({'left' : moving_guage2+'%'},5000);
			}

			$("#movingline").animate({'width': moving_guage+'%'}, 5000);






			var perc_num = 0;
			var interval = 5000/moving_guage;

			var counterLoop = window.setInterval(function(){
				perc_num += 1;

				if(perc_num >= moving_guage){
					perc_num = 0;
					// $("#perc_count").text(perc_num + "%");
					clearInterval(counterLoop);
					window.setTimeout(function(){
			    		// countPerc();
					}, 2000)
				}else if(perc_num < 10){
					$("#perc_count").text("0" + perc_num + "%");
				}else{
					$("#perc_count").text(perc_num + 1 + "%");
				}

			}, interval)
    	}

    	indicator();

    	window.setInterval(function(){
    		indicator();
		}, 7000)



	});

</script>
@if($settings->tido)
    <script src="//code.tidio.co/{{$settings->tido}}.js" async></script>
    @endif
    
    
    <!-- GetButton.io widget -->
    @if($settings->whatsapp)
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{$settings->whatsapp}}", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
  @endif

</html>