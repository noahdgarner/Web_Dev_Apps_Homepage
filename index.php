<!DOCTYPE html>
<?php 
	include "phpfuncs.php";
	$usefulFuncs = new phpUtilities();
?>

<!-- 

NOTE: JS IS LESS PROCEDURAL, MORE OBJECT ORIENTED.

JS FOCUSES ON USER INTERFACES AND INTERFACING WITH A DOCUMENT;

PHP IS GEARED TOWARD HTML OUTPUT AND FILE/FORM PROCESSING (NOTE OUR LAB 4, CALENDAR, DIRECTORY LIST, ETC

JS CODE RUNS ON THE CLIENTS BROWSER (IMPORTANT TO NOTE)
PHP RUNS ON THE WEB SERVER.
	-CLIENT CANNOT SEE PHP SOURCE CODE

-->




<html lang="en">

	<head>
		<title>Lab6</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
		<script src="interactive.js" type="text/javascript"></script
	</head>
	
	<body id="background"> 
		<div id="layer">
		
				<h1 id="hName">~NOAH GARNER~</h1>
				
				<!--These 2 are just below on left and right side of my name-->
				<img id="dork" src="dork.JPG" alt="dork" class="center" style="width:200px;height:200px;">
				<div id="calendar">
					<?php print $usefulFuncs->createCalendar();?><br>
					<?php print "Date: ";print date('l, d M, Y');?><br>
					<?php print "Time: ";print date('H:i:s');?>
				</div>

				<!--These two are dependent of the above 2 calls-->
				<div id="floatFilesLeft">
					<span class="floatLeftTitle">Relevant Coursework:</span>
					<ol>
						<?php $usefulFuncs->printLinesInAFile("recentcourses.txt");?>
					</ol>
				</div>

				
				
				
				
				<!--MY BUTTONS WITH JAVASCRIPT!!!!! VERY SHORT LITTLE THING-->
				<div class="button">
					<span class="floatRightJavascript">Some Javascripted Buttons n' Stuff</span>

					<br><br>
					&nbsp;<button onclick="fatal();"class="buttonDeets">Don't click this button.(Refresh Inc)</button><br><br>
					
					<!--simple -->
					<br><br>
					&nbsp;<button onclick="tellConfirm('I','LOVE','CODING.');"class="buttonDeets">Click me! (Confirm)</button>
					
					<br><br>
					&nbsp;<button onclick="reversePrompt('Input a String To Reverse');"class="buttonDeets">Click me! (Prompt)</button><br>
					&nbsp;<span id="reverse">__________________</span><br><br>
					<br><br>
					
					&nbsp;<button onclick="reverseAgain();"class="buttonDeets">Reverse me Back!</button><br>
					&nbsp;<button onclick="changeColor();"class="buttonDeets">Change Color!</button><br>
					&nbsp;<button onclick="changeFont()"class="buttonDeets">Change Font!</button>
					<button onclick="increaseFont()"class="buttonDeets"style="width: 70px;"> Inc font</button>
					<button onclick="decreaseFont()"class="buttonDeets" style="width: 70px;">Dec font</button><br>
					&nbsp;<button onclick="reset()"class="buttonDeets">Reset!</button><br><br><br>
					
					&nbsp;Displays quadratic roots (terminating): <br>
				    &nbsp;(Hint, Input 1 for (x^2), 3 for(x), 2 for(_)) <br><br>
					&nbsp;<input id="num1" type="text" size="1" />(x^2) + 
					&nbsp;<input id="num2" type="text" size="1" />(x) +
					&nbsp;<input id="num3" type="text" size="1" /><br><br>
					&nbsp;<button onclick="quadratic();"class="buttonDeets">Compute!</button>
					&nbsp;<span id="answer">_____________</span><br><br> 		<!--NOTE The _ is the placeholder here -->
					<br><br>

				</div>

				<div id="floatFilesRight">
					<span class="floatRightTitle">Files in my ~Lab4~ Directory:</span>
					<ul><!--This floats my list of classes in text file php function(check .css)-->
						<br>
						<?php $usefulFuncs->printFilesInAFolder("../lab4");?>
					</ul>
				</div>
				
				<p id="infoGraph">
						I like going for jogs, coding projects outside of class, going out for dinner on Friday,
						and I also enjoy playing video games late night (Witcher, Dark Soul 3, WoW, any rpg).
						If anyone wants to have a coding session with me I am more than down this summer especially.
						I am in the bay, and I code in Java, Scala, and work with Apache Spark for Big Data analysis.
				</p>

				<div class="practicewithforms"> <!-- Give our form a webpage to go to -->
					<form action="formprocessing.php" method="post">
						<h3 class="Titles">&nbsp;Now, tell me about yourself :D (No Framework)</h3>
						<p style="color: #9f0000;">&nbsp;* are required fields </p>
						<!--Notice the *required field. This is client side validation -->
						&nbsp;*First name:<br>&nbsp;<input type="text" name="firstName" id="popUpYes" required/> <br>
						<br>
						
						&nbsp;Date of Birth:<br>
						&nbsp;<select name="monthlist" id="popUpYes">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September&nbsp;&nbsp;</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12" selected="selected">December</option>
						</select>
						<input type="text" name="day" id="popUpYes" value="17" style="width:20px"/>
						<input type="text" name="year" id="popUpYes" value="1994" style="width:40px"/>
						<br><br>

						&nbsp;*Email Address:<br>&nbsp;<input type="text" name="email" id="popUpYes" size="5" maxlength="20" value="format@somesite.com" required/>
						<br>
						<br>
						
						<div class="superhero" style>
							&nbsp;Choose a color:
							<label><input type="radio" name="color" value="red" /> Red </label>
							<label><input type="radio" name="color" value="green" /> Green </label>
							<label><input type="radio" name="color" value="purple" checked="checked" /> Purple </label>
							<label><input type="radio" name="color" value="blue" /> Blue </label>
							<label><input type="radio" name="color" value="yellow" /> Yellow </label>
						</div>
						<br>
						<br>
						
						&nbsp;Choose a Superhero!
						<br><br>
						&nbsp;<select name="herolist" size="4" multiple="multiple">
						<br> <!-- look i made a switch statement with php and html, im smarte-->
							<option value="1" selected="selected">Batman</option>
							<option value="2">Flash</option>
							<option value="3">Superman&nbsp;&nbsp;&nbsp;</option>
							<option value="4">Ironman</option>
							<option value="5">Mom</option>
							<option value="6">Dad</option>
						</select>
						<br>
						<br>
						
						&nbsp;Tell me about one of your hobbies: <br />
						&nbsp;<textarea name="comments" id="popUpYes" rows="4" cols="50" style="resize:none">Type Your Comments here.
						</textarea>
						<br/>
						&nbsp;<input type="submit" name="submit" id="popUpYes" />&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" id="popUpYes" />
					</form>
				</div>
		
				<div class="attributes">
					<h3 class="Titles">&nbsp;Attributes:</h3>
					<p>					
						&nbsp;&nbsp;&nbsp;Major: <span class="attributesUnderlines">Computer Science</span>
						<br>
						&nbsp;&nbsp;&nbsp;Concentration: <span class="attributesUnderlines">Networking & Security</span>
					</p>
				</div>

				<div class="attributes">
					<h3 class="Titles">&nbsp;Favorite Classes taken thus far (ranked):</h3>
					<ol>
						<li id="structuresList">Data Structures (These are links, except bullet #4) 
							<ul>
										<li><a href="https://en.wikipedia.org/wiki/Binary_tree">Trees</a></li>
										<li><a href="https://en.wikipedia.org/wiki/Recursion">Recursion</a></li>
										<li><a href="https://en.wikipedia.org/wiki/Graph_theory">Graphs</a></li>
										<li>Lots of Coding</li>
							</ul>
						</li>
						<li>Analysis of Algorithms</li>
						<li>Programming Languages</li>
						<li>Computer Systems and Networks</li>
					</ol>
				</div>
				
				<div class="attributes">
					<h3 class="Titles">&nbsp;My <span class="emphasisfav">favorite</span> websites (these are links):</h3>
					<ul class="myattributes">
						<li><a href="https://www.youtube.com">Youtube</a></li>
						<li><a href="https://www.google.com">Google</a></li>
						<li><a href="https://www.worldofwarcraft.com">WorldOfWarcraft</a></li>
					</ul>
				</div>

				<div class="attributes">
					<h3 class="Titles">&nbsp;My <span class="emphasisfav">favorite</span> Movies (not links):</h3>
					<ul>
						<li>Pirates of the Carribean<br/></li>
						<li>Any Star Wars (except the newest trilogy)<br/></li>
						<li>Any Harrison Ford movie.<br/></li>
					</ul>
				</div>
				
				<div class="floatingimages">
					<img id="dorks" src="dorks.PNG" alt="I_am_dork" class="center" style="width:200px;height:200px;">
					<img id="dorky" src="dorky.PNG" alt="I_am_dork" class="center" style="width:200px;height:200px;">
				</div>
				
				<div class="attributes">
					<h3 class="Titles">&nbsp;Something Interesting:</h3>
					<p> 
						 &nbsp;&nbsp;&nbsp;Every day I have a routine where I code for atleast an hour,<br>
						 &nbsp;&nbsp;&nbsp;then I workout,<br>
						 &nbsp;&nbsp;&nbsp;and then I code again.<br>
					</p>
				</div>
				
				<div class="attributes">
					<h3 class="Titles">&nbsp;My validation (these are links):</h3>
					<ul>
						<li><a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Ftraining.pacificescience.com%2Fngarner%2F">CHECK MY HTML</a></li>
						<li><a href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Ftraining.pacificescience.com%2Fngarner%2F&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=en">CHECK MY CSS</a></li>
					</ul>
				</div>
					
				<div class="attributes">
					<p><a href="#hName">&nbsp;&nbsp;&nbsp;Click me to go to the top of the page!</a></p>
				</div>
		</div>
	</body>
</html>