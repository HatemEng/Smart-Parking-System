
var img ;
var lotWidth = 44 ,lotHeight=72;
//number of lots
var Amax = 20 ,Bmax = 17,CDmax = 12,Emax = 6 ;
//reservation 
var resA = [],resB = [] , resC = [] , resD = [] , resE = [] ;
//for(var i = 0 ; i<Emax ; i++){
//	if(i==1 | i==3) resE[i]=1 ;
//	else resE[i]=0 ;
//}

function reservation (id) {
	
	var group = id.substr(0,1) ;
	var ID = id.substr(1,2) ;
	
	ID-- ;
	if(group == "A"){
		
		for(var i = 0 ; i<Amax ; i++){
			if(i== ID) {resA[i]=1 ;  }
			else resA[i]=0 ;
		}
		drawALots(Amax) ;
	}
	if(group == "B"){
		
		for(var i = 0 ; i<Bmax ; i++){
			if(i== ID) {resB[i]=1 ;  }
			else resB[i]=0 ;
		}
		drawBLots(Bmax) ;
	}
	if(group == "C"){
		
		for(var i = 0 ; i<CDmax ; i++){
			if(i== ID) {resC[i]=1 ; }
			else resC[i]=0 ;
		}
		drawCLots(CDmax) ;
	}
	if(group == "D"){
		
		for(var i = 0 ; i<CDmax ; i++){
			if(i== ID) {resD[i]=1 ; }
			else resD[i]=0 ;
		}
		drawDLots(CDmax) ;
	}
	if(group == "E"){
		
		for(var i = 0 ; i<Emax ; i++){
			if(i== ID) {resE[i]=1 ; }
			else resE[i]=0 ;
		}
		drawELots(Emax) ;
	}

}
//initialize lots coordinates
var prev ,offset;
var inc = 45 ;
//A lots coordinates
var aLots = [] ;
aLots.push({x:0,y:526}) ;
for(var i= 1 ; i<Amax ; i++){
	prev  = aLots[i-1].x ;
	aLots.push({x:prev+inc,y:526}) ;
	console.log(aLots[i].x + " & " + aLots[i].y) ;
}
//B lots coordinates
var bLots = [] ;
bLots.push({x:0,y:1}) ;
for(var i= 1 ; i<Bmax ; i++){
	prev  = bLots[i-1].x ;
	bLots.push({x:prev+inc,y:1}) ;
	console.log(bLots[i].x + " & " + bLots[i].y) ;
}
//C lots coordinates
var cLots = [] ;
cLots.push({x:0,y:151}) ;

for(var i=1 ; i<CDmax ; i++){
	prev =  cLots[i-1].x ;
	if(i<7)cLots.push({x:prev+inc,y:151}) ;
	if(i==7) cLots.push({x:316,y:225}) ;
	if(i>7) { prev =  cLots[i-1].y ; cLots.push({x:316,y:prev+inc}) ; }
	
}
//D lots coordinates
var dLots = [] ;
dLots.push({x:609,y:398}) ;
for(var i= 1 ; i < CDmax ; i++) {
	prev = dLots[i-1].y ;
	if(i<6)	dLots.push({x:609,y:prev-inc}) ;
	if(i==6)dLots.push({x:489,y:173}) ;
	if(i>6) {
		dLots.push({x:489,y:prev+inc}) ;
	}
}
//E lots coordinates 
var eLots = [] ;
eLots.push({x:915.5,y:480}) ;
for(var i= 1 ; i<Emax ; i++) {
	prev = eLots[i-1].y ;
	eLots.push({x:915.5,y:prev-inc}) ;
}

function preload() {
      img = loadImage("http://localhost/Parking_System/includes/drawing/park.png");
    }

function setup () 
{
	createCanvas(img.width,img.height) ;
	image(img,0,0) ;
	fill(255,0)
	strokeWeight(2) ; 
	stroke(255,0,0); strokeWeight(4);
}

function mousePressed() {
	print(mouseX,mouseY);
	console.log(getLotId()) ;
	reservation(getLotId()) ;
	
}


function draw () {
	drawALots(Amax);
	drawBLots(Bmax);
	drawCLots(CDmax);
	drawDLots(CDmax);
	drawELots(Emax);
}




function drawALots(size) {
	for(var i= 0 ; i <size ; i++) {
		if(resA[i]==1){
		rect(aLots[i].x,aLots[i].y,lotWidth,lotHeight);}
	}
}

function drawBLots(size) {

	
	for(var i=0 ; i<size; i++){ 
		if(resB[i]==1)  {stroke(255,0,0); strokeWeight(4);
			rect(bLots[i].x,bLots[i].y,lotWidth,lotHeight); } 
		
		
	}
}
function drawCLots(size) {
	for(var i= 0 ; i <size ; i++){
		if(resC[i]==1){

			if(i<7) rect(cLots[i].x,cLots[i].y,lotWidth,lotHeight) ;
			else rect(cLots[i].x,cLots[i].y,lotHeight,lotWidth) ;
		}
	}
}
function drawDLots (size) {
	for( var i = 0 ; i< size ; i++) {
		if(resD[i]==1){
		rect(dLots[i].x,dLots[i].y,lotHeight,lotWidth) ;
	}
	}
}
function drawELots(size) {
	for(var i= 0 ; i<size ; i++){
		if(resE[i]==1){
		rect(eLots[i].x,eLots[i].y,lotHeight,lotWidth) ;}
	}
}


function getLotId() {
	x = mouseX ; 
	y = mouseY ;
	
	//search A lots 
 	for(var i=0 ; i <Amax ; i++){
	 	if(((x > aLots[i].x)&&(x<(aLots[i].x+lotWidth)))&&((y > aLots[i].y)&&(y<(aLots[i].y+lotHeight))))
	 		return ("A" + (i+1));
 	}
	//search B lots
	for(var i=0 ; i <Bmax ; i++){
	 	if(((x > bLots[i].x)&&(x<(bLots[i].x+lotWidth)))&&((y > bLots[i].y)&&(y<(bLots[i].y+lotHeight))))
	 	 return ("B" + (i+1));
 	}
 	//search C & D lots
 	for(var i=0 ; i<CDmax ; i++){
 		if(((x > cLots[i].x)&&(x<(cLots[i].x+lotWidth)))&&((y > cLots[i].y)&&(y<(cLots[i].y+lotHeight)))&&i<7)
	 	 return("C" + (i+1));
	 	else if(((x > cLots[i].x)&&(x<(cLots[i].x+lotHeight)))&&((y > cLots[i].y)&&(y<(cLots[i].y+lotWidth)))&&i>=7)
	 	 return("C" + (i+1));
	 	if(((x > dLots[i].x)&&(x<(dLots[i].x+lotHeight)))&&((y > dLots[i].y)&&(y<(dLots[i].y+lotWidth))))
	 	 return("D" + (i+1));
 	}
 	//search E lots 
 	for(var i= 0 ; i <Emax ; i++){
 		if(((x > eLots[i].x)&&(x<(eLots[i].x+lotHeight)))&&((y > eLots[i].y)&&(y<eLots[i].y+lotWidth)))
 			return("E" + (i+1));
 	}

 	
}
