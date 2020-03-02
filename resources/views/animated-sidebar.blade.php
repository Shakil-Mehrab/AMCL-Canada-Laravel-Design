
<html>
<head>
    <title>BazaarBari</title>
  
    <link rel="stylesheet" href="{{ asset('style/admin/togglebar/css/toggle.css') }}">

</head>
<body>
     <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </div>
       <ul>
           <li>home</li>
           <li>About</li>
           <li>Login</li>

       </ul>
     </div>
    <script type="text/javascript" src="{{asset('style/admin/togglebar/js/toggle.js')}}"></script>
</body>
</html>
//css
<link rel="stylesheet" href="{{ asset('style/admin/togglebar/css/toggle.css') }}">

*{
	margin:0px;
	padding: 0px;
	font-family: sans-serif;

}
#sidebar{
	position: fixed;
	width: 200px;
	height: 100%;
	background: red;
	left: -200px;
	transition: all 500ms linear;
}
#sidebar.active{
	left: 0px;

	
}
#sidebar ul li{
	color: rgba(230,230,230,0.9);
	list-style: none;
	padding: 15px 10px;
	border-bottom: 1px solid rgba(100,100,100,0.3);
	
}
#sidebar .toggle-btn{
	position: absolute;
	left: 230px
	top:20px;
	
	
}
#sidebar .toggle-btn span{
	display: block;
	width: 30px;
	height: 5px;
	background: blue;
	margin:5px 0px;
	margin-left: 230px;

}

//js
 function toggleSidebar(){
	document.getElementById("sidebar").classList.toggle('active');
}