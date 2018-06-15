/*


JAVASCRIPT NOTES: WHEN A VARIABLES TYPE IS IN DOUBT, YOU CAN EMPLOY THE '.TYPEOF' OPERATOR:


*/
//do not run this ever.
function fatal() {
	document.body.innerHTML = "";
}

function tellConfirm() {
	for(var i=0; i<arguments.length;i++){
		confirm(arguments[i]);
	}
}

function changeColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  document.getElementById("reverse").style.color = color;
}

function reversePrompt() {
	var userString = prompt(arguments[0]);
	var reversedString = userString.split("").reverse().join("");
	var reverse = document.getElementById("reverse");
	reverse.innerHTML = reversedString;
}

function reverseAgain() {
	var reverse = document.getElementById("reverse");
	reverse.innerHTML = reverse.innerHTML.split("").reverse().join("");
}


function changeFont() {
	var fontType = ["Palatino","Times New Roman","Helvetica","Arial", "Verdana", "Courier","Comic Sans MS","Impact","sans-serif","Trebuchet MS","Calibri","Century Gothic","Consolas","Courier","Dejavu Sans","Dejavu Serif"];
	var aString = document.getElementById("reverse");
	aString.style.fontFamily = fontType[Math.floor(Math.random() * fontType.length)];
}


function increaseFont() {
	txt = document.getElementById('reverse');
	style = window.getComputedStyle(txt, null).getPropertyValue('font-size');
	currentSize = parseFloat(style);
	txt.style.fontSize = (currentSize +2) +'px'
}



function decreaseFont(){
	txt = document.getElementById('reverse');
	style = window.getComputedStyle(txt, null).getPropertyValue('font-size');
	currentSize = parseFloat(style);
	txt.style.fontSize = (currentSize -1) +'px'
}




function reset(){
	document.getElementById("reverse").style.color = 'white';
	document.getElementById("reverse").innerHTML = "";
	document.getElementById('reverse').style.fontSize = "16px";
}



function compute() {
	var input1 = document.getElementById("num1");
	var input2 = document.getElementById("num2");
	var answer = document.getElementById("answer");
	var result = input1.value * input2.value;
	answer.innerHTML = result;	//again, this changes the html that was already there, so put a placeholder there from before
}


//my advanced funcs



function quadratic(){
	var input1 = document.getElementById("num1");
	var input2 = document.getElementById("num2");
	var input3 = document.getElementById("num3");
	var answer = document.getElementById("answer");
	var isQuad1 = -input2.value + Math.sqrt(input2.value*input2.value - (4*input1.value*input3.value)) / (2*input1.value);
	var isQuad2 = -input2.value - Math.sqrt(input2.value*input2.value - (4*input1.value*input3.value)) / (2*input1.value);
	answer.innerHTML = "(x = "+isQuad1+", x = "+isQuad2+")";
	//notice we don't need a return because innerHTML
}













