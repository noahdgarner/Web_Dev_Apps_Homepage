<?php
	//NOTE: I did not need a constructor, as I am not passing any parameters on object creation
	//since utilities are, well, utilities. We aren't saving or manipulating data here. Maybe lab 5?
	class phpUtilities {

		/*note this is for lists only, written purely functional. Produce side effects, avoid print?*/
		public function printFilesInAFolder($someFolder){
			if(file_exists($someFolder)){
				foreach (scandir($someFolder) as $filename)
					if($filename != "." && $filename != "..") //we don't want to show the ~Null~ extensions
						print "<li>$filename</li>";
			}
			else print "$someFolder could not be located.<br>Please type a proper folder name.";
		}
		
		/*note this is for lists only, written purely functional. Produce side effects, avoid print?*/
		public function printLinesInAFile($someFile){
			if(file_exists($someFile)){
				foreach (file($someFile) as $line) 
					if(strlen($line) > 2 && strlen($line) < 50)
						print "<li>$line</li>";
			}
			else
				print "$someFile could not be located.<br>Please type a proper file name.";
		}
		
		/*very simple calendar, not formatted to the extreme.. fix later potentially? minimize variable usage. */
		public function createCalendar(){
			//change this depending on what you want to show the users
			date_default_timezone_set('America/Los_Angeles');
			//get current month and year and days for our table
			$year = date('Y');
			$month = date('n');
			$days = array(date('j') => array(null, null,'<div id="today">' . date('j') . '</div>'));
			$monthHref = NULL; //get months
			$pn = array('&laquo;' => date('n') - 1, '&raquo;' => date('n') + 1); //this will be for changing month left right
			$firstOfMonth = mktime(0, 0, 0, $month, 1, $year); //initialize first of month
			
			//generate all the day names according to the current locale
			$dNames = array();
			for ($n = 0, $t = 3 * 86400; $n < 7; $n++, $t+=86400)
				$dNames[$n] = ucfirst(gmstrftime('%A', $t));
			//explode is really cool, we split the strftime() by ',', felt like usign it idk
			list($month, $year, $monthName, $weekday) = explode(',', strftime('%m, %Y, %B, %w', $firstOfMonth));
			$weekday = ($weekday + 7) % 7; //adjust for $first_day
			$title = htmlentities(ucfirst($monthName)) . $year;  //note that some locales don't capitalize month and day names

			//attempting Shift Month
			@list($p, $pl) = each($pn); @list($n, $nl) = each($pn); //previous and next links, if applicable
			if($p) $p = '<span class="calendar-prev">' . ($pl ? '<a href="' . htmlspecialchars($pl) . '">' . $p . '</a>' : $p) . '</span>&nbsp;';
			if($n) $n = '&nbsp;<span class="calendar-next">' . ($nl ? '<a href="' . htmlspecialchars($nl) . '">' . $n . '</a>' : $n) . '</span>';
			$calendar = "<div class=\"mini_calendar\">\n<table>" . "\n" . 
				'<caption class="calendar-month">' . $p . ($monthHref ? '<a href="' . htmlspecialchars($monthHref) . '">' . $title . '</a>' : $title) . $n . "</caption>\n<tr>";
			//take days of week as 'sun' 'mon' 'tue' 'wed' 'thu' fri' 'sat' 3 letters)
			foreach($dNames as $d)
				$calendar  .= '<th abbr="' . htmlentities($d) . '">' . htmlentities(substr($d,0,3)) . '</th>';
			$calendar  .= "</tr>\n<tr>";
			//check week day
			if($weekday > 0)
				for ($i = 0; $i < $weekday; $i++)
					$calendar  .= '<td>&nbsp;</td>'; //initial 'empty' days
			//add days, compare gainst the actual number in the month, start a week
			for($day = 1, $numDayInMonth = date('t',$firstOfMonth); $day <= $numDayInMonth; $day++, $weekday++){
				if($weekday == 7){
					$weekday   = 0;
					$calendar  .= "</tr>\n<tr>";
				}
				if(isset($days[$day]) and is_array($days[$day])){
					@list($link, $classes, $content) = $days[$day];
					if(is_null($content))  $content  = $day;
					$calendar  .= '<td' . ($classes ? ' class="' . htmlspecialchars($classes) . '">' : '>') . 
						($link ? '<a href="' . htmlspecialchars($link) . '">' . $content . '</a>' : $content) . '</td>';
				}
				else $calendar  .= "<td>$day</td>";
			}
			//final check
			if($weekday != 7) $calendar  .= '<td id="emptydays" colspan="' . (7-$weekday) . '">&nbsp;</td>'; //remaining "empty" days
			//return our 'perfect' calendar.
			return $calendar . "</tr>\n</table>\n</div>\n";
		}
	}
?>