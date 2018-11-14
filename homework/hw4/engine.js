var hot_01;
var gameTimer;
var output;
var numGrab= 0;
var gameWindow;
function init(){
    hot_01= document.getElementById('hot_01');
    output= document.getElementById('output');
    gameWindow = document.getElementById('gameWindow');
    gameTimer= setInterval(gameloop, 50);
    placeHot();
}
function gameloop(){
   var y= parseInt(hot_01.style.top) - 10;
   if(y < -100){
       
       placeHot();
   }
   else{
      hot_01.style.top = y + 'px'; 
   } 
  
}
function placeHot(){
    var x= Math.floor(Math.random()*421);
    hot_01.style.left = x + 'px';
    hot_01.style.top = '350px';
}
function grabHot(){
    numGrab++;
    output.innerHTML= numGrab;
    output.innerHTML= numGrab;
    if(numGrab==5) {
        alert('CONGRATS! YOU WON');
        clearInterval(gameTimer);
    }
    placeHot();
}