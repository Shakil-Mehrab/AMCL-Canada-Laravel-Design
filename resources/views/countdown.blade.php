//download j query
https://code.jquery.com
{{-- js file --}} 
//download the git file.extract it and collect the countdown.js file
https://github.com/hilios/jQuery.countdown
src/countdown.js
{{-- css file --}} 
 <link href="{{asset('style/admin/countdown/css/countdown.css')}}" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">
<head>
    <title>BazaarBari</title>
    <link href="{{asset('style/admin/countdown/css/countdown.css')}}" rel="stylesheet">
</head>
<body class="common-home res layout-4">
	<div class="center">
	<h1><span>2019</span><br> New Year Countdown</h1>
    <div id="clock"></div>
</div>

 <script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 <script src="{{ asset('style/admin/countdown/js/countdown.js') }}"></script>
 <script type="text/javascript">
 	$('#clock').countdown('2020/1/1',function(event){

        var $this=$(this).html(event.strftime(''
      		+'<div><span>%w</span><span>Weeks</span></div>'
      		+'<div><span>%d</span><span>Days</span></div>'
      		+'<div><span>%H</span><span>Hr</span></div>'
      		+'<div><span>%M</span><span>Min</span></div>'
      		+'<div><span>%S</span><span>Sec</span></div>'

      	));

 	})
 </script>
</body>
</html>


{{-- css file --}} 
    <script type="text/javascript" src="{{asset('style/admin/togglebar/js/toggle.js')}}"></script>

body{
	margin: 0;
	padding: 0;
	font-family: 'Poppins',sans-serif;
	background: #262626;
}
.center{
	position: absolute;
	top:50%;
	width: 100%;
	transform: translateY(-50%);
	text-align: center;
}
h1{
	text-align: center;
	text-transform: uppercase;
	color: #fff;
	font-size: 3em;
}
h1 span{
	line-height: .8em;
	font-size: 4em;
}
#clock{
	display: flex;
	width: 570px;
	margin: 0 auto;
}
#clock div{
	position: relative;
	width: 100px;
	padding: 20px;
	margin: 0 5px;
	background: #262626;
	color: #fff;
	border: 2px solid #000;
}
#clock div:last-child{
	background: #e91e63;
}
#clock div:before{
	content: ' ';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 50%;
	background: rgba(255,255,255,.2)
}
#clock div span{
	display: block;
	text-align: center;
}
#clock div span:nth-child(1){
	font-size: 48px;
	font-weight: 800;
	
}
#clock div span:nth-child(2){
	font-size: 18px;
	font-weight: 800;
	margin-top: -10px;
	
}