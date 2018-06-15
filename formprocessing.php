<?php
		//regex baby
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		//THIS IS SERVER SIDE VALIDATION!!!!!!!!
		if (preg_match('/[^A-Za-z]/', $_POST['firstName'])) {
			echo 'Invalid Name. Must Contain Only Letters.';
		}
		else if (strlen($_POST['firstName']) > 30 ||  strlen($_POST['firstName']) < 3){
			echo 'Invalid Name. Must be between 3 and 30 characters (inclusive)';
		}
		else if (preg_match('/[^0-9]/',$_POST['day'])) {
			echo 'Invalid Day. Must be a digit';
		}
		else if ($_POST['day'] > 31 || $_POST['day'] < 1) {
			echo 'Invalid Day. Must be an integer between 1 and 31 (inclusive)';
		}
		else if (preg_match('/[^0-9]/',$_POST['year'])) {
			echo 'Invalid Year. Must be a digit';
		}
		else if ($_POST['year']	> 2018 || $_POST['year'] < 1920) {
			echo 'Invalid Year. Must be an integer between 1920 and 2018 (inclusive)';
		}
		else if (strlen($_POST['email']) > 60 ||  strlen($_POST['email']) < 10) {
			echo 'Invalid Email. Must be between 10 and 60 characters (inclusive)';
		}
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo "Invalid Email. Format must be: 'formatlettersnums@somesite.com'";
		}
		else{
			$name = $_POST['firstName']; 
			$email = $_POST['email'];
			$color = $_POST['color'];

			$monthOptions = array(
				'1' => 'January',
				'2' => 'February',
				'3' => 'March',
				'4' => 'April',
				'5' => 'May',
				'6' => 'June',
				'7' => 'July',
				'8' => 'August',
				'9' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December'
			);
			
			$monthVal = $_POST['monthlist'];
			$day = $_POST['day'];
			$year = $_POST['year'];
			$superOptions = array(
				'1' => 'Batman',
				'2' => 'Flash',
				'3' => 'Superman ',
				'4' => 'Ironman',
				'5' => 'Mom',
				'6' => 'Dad'
			);
			
			$superheroVal = $_POST['herolist'];
			$hobbies = $_POST['comments'];
			echo '<h3>~Your Information~</h3>'; 
			echo 'Your name is: 		   ' . $name . '<br>';
			echo 'Your birthday:           ' . $monthOptions[$monthVal] . ' ' . $day . ', ' . $year .'<br>';
			echo 'Your email is:		   ' . $email . '<br>';
			echo 'The color you chose:     ' . $color . '<br>';
			echo 'Your favorite superhero: ' . $superOptions[$superheroVal] . '<br>';
			echo 'About your hobbies: <br> ' . $hobbies . '<br>';
			exit; 
		} 

/*
NOTES TO SELF FROM STACK OVERFLOW ABOUT POST AND GET (pp SUCKS)

If I had to choose, I would probably not use $_REQUEST, and I would choose $_GET or $_POST
 -- depending on what my application should do (i.e. one or the other, but not both) : 
generally speaking :

You should use $_GET when someone is requesting data from your application.
And you should use $_POST when someone is pushing (inserting or updating ; or deleting) 
data to your application.
Either way, there will not be much of a difference about performances : 
the difference will be negligible, compared to what the rest of your script will do.

GET vs. POST

1) Both GET and POST create an array (e.g. array( key => value, key2 => value2, key3 => value3, ...)). This array holds key/value pairs, where keys are the names of the form controls and values are the input data from the user.

2) Both GET and POST are treated as $_GET and $_POST. These are superglobals, which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.

3) $_GET is an array of variables passed to the current script via the URL parameters.

4) $_POST is an array of variables passed to the current script via the HTTP POST method.

When to use GET?

Information sent from a form with the GET method is visible to everyone (all variable names and values are displayed in the URL). GET also has limits on the amount of information to send. The limitation is about 2000 characters. However, because the variables are displayed in the URL, it is possible to bookmark the page. This can be useful in some cases.

GET may be used for sending non-sensitive data.

Note: GET should NEVER be used for sending passwords or other sensitive information!
*/


?>

