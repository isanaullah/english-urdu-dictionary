//var image="http://localhost/helloseekers/images/love2.gif"
var image = location.protocol + '//' + location.host + '/images/love2.gif';
var no = 5; // No of images should fall
var time = 0; // Configure whether image should disappear after x seconds (0=never):
var dist = "pageheight"; // Configure how much love should drop down before fading ("windowheight" or "pageheight")
var i, dwidth = 700, dheight = 500; 


if(document.all){
	var ie4up = 1;
}else{
	var ie4up = 0;
}

if(document.getElementById && !document.all){
	var ns6up = 1;
}else{
	var ns6up = 0;
}

function iecompattest()
{
	if(document.compatMode && document.compatMode!="BackCompat")
	{
		return document.documentElement;
	}else{
		return document.body;
	}
	
}
if (ns6up) {
	dwidth = self.innerWidth;
	
	dheight = self.innerHeight;
	;
} 
else if (ie4up) {
	dwidth = iecompattest().clientWidth;
	dheight = iecompattest().clientHeight;
}


var cv = new Array();
var px = new Array();       //position variables
var py = new Array();      //position variables
var am = new Array();     //amplitude variables
var sx = new Array();    //step variables
var sy = new Array();   //step variables

for (i = 0; i < no; ++ i) {  
	cv[i] = 0;
	px[i] = Math.random()*(dwidth-100);  // set position variables
	py[i] = Math.random()*dheight;     // set position variables
	am[i] = Math.random()*20;         // set amplitude variables
	sx[i] = 0.02 + Math.random()/10;  // set step variables
	sy[i] = 0.7 + Math.random();    // set step variables
	document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px;LEFT: 15px;\"><img src='"+image+"' border=\"0\"><\/div>");
}

function animation() {  // animation function
	for (i = 0; i < no; ++ i) {  // iterate for every dot
		py[i] += sy[i];
      		if (py[i] > dheight-50) {
        		px[i] = Math.random()*(dwidth-am[i]-100);
        		py[i] = 0;
        		sx[i] = 0.02 + Math.random()/10;
        		sy[i] = 0.7 + Math.random();
      		}
      		cv[i] += sx[i];
      		document.getElementById("dot"+i).style.top=py[i]+"px";
      		document.getElementById("dot"+i).style.left=px[i] + am[i]*Math.sin(cv[i])+"px";  
    	}
    	atime=setTimeout("animation()", 10);
}

function hideimage(){
	if (window.atime) clearTimeout(atime)
		for (i=0; i<no; i++) 
			document.getElementById("dot"+i).style.visibility="hidden"
}
if (ie4up||ns6up){
animation();
if (time>0)
	setTimeout("hideimage()", time*1000)
}
