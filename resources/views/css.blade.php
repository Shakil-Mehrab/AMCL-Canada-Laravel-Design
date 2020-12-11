Breakpoint prefix	Minimum width	CSS
sm	640px	@media (min-width: 640px)//tablet
md	768px	@media (min-width: 768px) 
lg	1024px	@media (min-width: 1024px)//laptop
xl	1280px	@media (min-width: 1280px)//destop
2xl	1536px	@media (min-width: 1536px)

<!-- font -->
em //relative to parent element
rem //relative to root element
background-image:url() no-repeat / 200px auto;
background-repeat:no-repeat,repeat-x,repeat-y
background-position:top left,top center,top righr
background-position:fixed,scroll

auto????????????????????????????

<!-- border -->
dotted,dashed,ridge/inset(3d type),
 <!-- outline -->
 like border 
 outline-offset:10px //gap between border and outline
 <!-- a tag -->
 text-decoration:underline
 text-decoration:overline
 text-decoration:line-though

<!-- text -->
text-transform:uppercase
text-transform:lowercase
text-indent:50px;//paragraph first line er start a space hobe
letter-spaching:5px;
word-spaching:5px;
line-height:1 /5px
text-shadow:1px 1px red //first ta dane bame.2nd ta upore niche.
font-style:italic / normal
font-weight:normal
font-weight:bold
a:visited,a:hover;a:active

<!-- list -->
list-style-type:upper-roman/lower-roman/none/lower-alpha/
list-style-image:url()
list-style-position:inside / outside
list-style: insde url()

<!-- display  -->
display:inline-block / inline;//only nijer jayga dokhol kore
display:block //full screen width dokhol kore

<!-- width -->
with:50%; margin:auto; //text 2  pase jayga rekhe majhe asbe

//position
top:0;left:0;right:0;margin:auto; //tahole top a majhen asbe
top:0;left:0;right:0;bottom:0;margin:auto; //tahole screen er majhen asbe
position:sticky;top:0;//jekhanei thakuk top a jaoa matro sticky hoye jabe;
position:fixed;//jekhane ache okhanei fixed 


overflow:visible;//default
overflow:hidden / scroll /auto //auto r scroll pray ek;

<!-- float -->
float:left; ekhetre nicher content dane ase.
jodi nicher div 
clear:left  deya hoy tahole eta nichei thakbe
div{
	float:left;
	float:right:
}tahole nicher tag a
div{
	clear:both
}

<div style="height: 200px;background:gray;color:white;">
   <p style="align-items: center;display: flex;justify-content: flex-start;height: 100%;">Hi am shakil</p>
</div>
<!-- 32 no video -->
.box{
	width:100px;height:100px;
	transition : width 1s,height 1s, transform 2s / transition-duration:1s;//transform 2s only for hover transformer time
	transition-delay:2s;
	transition-timing-function:ease;//speed ta nirdesh kore

}
.box:hover{
	width:200px;
	height:200px;
	transform:rotate(180deg)
}

<!-- 34 no video -->
.box{
	width:100px;
	height:100px;
	background:red;
	animation-name:shakil;
	animation-duration:2s;
	animation-delay:2s;
	<!-- //for rotation -->
	animation-iteration-count:3 or infinite
	position:relative;
	animation-diraction:reverse or alternate   //alter nate like spandan
}
@keyframes shakil{
	from {background-color:red} to {background-color:yellow}  or 
	<!-- for rotation -->
	0%{
	background-color:red;
	top:0
	left:0
	}
	25%{
	background-color:green;
	top:0;
	left:200px;
	}
	........

	100%{

}

}