<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	//get a list of timezones as a function
	function timezoneSelectOptions($selectedTimezone = NULL){
		$timezoneList = timezone_identifiers_list();

		$output = "";

		$dateTime = new DateTime('now');//creating a DateTime object. Uses the default time of the system - 'now'  
		foreach($timezoneList as $zone){
			//include time zone offset. Shows the user the difference between the timezone selected and UTC
			$this_timezone = new DateTimeZone($zone);
			$dateTime->setTimezone($this_timezone);
			//divide by 3600 to get offset in hours
			//$offset = $dateTime->getOffset() / 3600;
			//$offset = formatHoursMinutes($dateTime->getOffset() / 3600);
			//creating a dropdown that shows the user a list of all the timezone options. User selects and option then presses submit
			

			//another way to format the offset - just this line is needed
			$offset = $dateTime->format('P');

			$output .= "<option value =\"{$zone}\""; // .= append
			//see if an option has been selected or not
			if($selectedTimezone == $zone){
				$output .= " selected";
			}
			$output .=  ">";
			$output .= $zone . " (UTC/GMT {$offset})"; 
			$output .= "</option>";
		}
		return $output;
	}



	//date selectors
	function selectOptionsFor($associativeArray ,$selectedValue = NULL){

		$output = "";

		

		foreach($associativeArray as $optionValue => $label){

			$output .= "<option value =\"{$optionValue}\""; // .= append
			//see if an option has been selected or not
			if($selectedValue == $optionValue){
				$output .= " selected";
			}
			$output .=  ">";
			$output .= $label; 
			$output .= "</option>";
		}
		return $output;
	}

	//month selector
	function monthSelectOptions($selectedMonth = NULL){
		$months = array(
			1 => 'January',
			2 => 'Feburary',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December'
			);

		if(is_null($selectedMonth)){
			$selectedMonth = date('n');
		}

		return selectOptionsFor($months, $selectedMonth);
	}


	//day selector
	function daySelectOptions($selectedDay = NULL){
		$range = range(1, 31);
		$days = array_combine($range, $range);//$range is the key and the value
		//array_combined() creates an array by using the elements of a 'keys' array and a 'values' array 

		if(is_null($selectedDay)){
			$selectedDay = date('d');
		}

		return selectOptionsFor($days, $selectedDay);
	}

	//year selector
	function yearSelectOptions($selectedYear = NULL){
		$startYear = (int) date('Y'); //from the current year
		$endYear = $startYear + 10;
		$range = range($startYear, $endYear);//$range is the key and the value
		$year = array_combine($range, $range);//array_combined() creates an array by using the elements of a 'keys' array and a 'values' array 

		if(is_null($selectedYear)){
			$selectedYear = date('Y');
		}

		return selectOptionsFor($year, $selectedYear);
	}




	//time selectors

	//minute selector
	function minuteOptionFormat($minute){
		return str_pad($minute, 2, '0', STR_PAD_LEFT); //pads the left side of the $minute with a 0. pass the variable, the amount of characters/digits, what is to be padded and whether it pads to to left or right of $minute (automatically set to pad to the right). This applies to values with 1 digit
	}

	function minuteSelectOptions($selectedMinute = NULL){
		$range = range(0, 59);
		$labels = array_map('minuteOptionFormat', $range);//array_map() sends each value of an array to a user made function and return an array with the new values, given by tge user made function
		$minute = array_combine($range, $labels);//$range is the key and $labels the value
		//array_combined() creates an array by using the elements of a 'keys' array and a 'values' array 

		if(is_null($selectedMinute)){
			$selectedMinute = date('i');
		}

		return selectOptionsFor($minute, $selectedMinute);
	}


	//hour selector
	function hourOptionFormat($hour){
		return str_pad($hour, 2, '0', STR_PAD_LEFT); //pads the left side of the $minute with a 0. pass the variable, the amount of characters/digits, what is to be padded and whether it pads to to left or right of $minute (automatically set to pad to the right). This applies to values with 1 digit
	}

	function hourSelectOptions($selectedHour = NULL){
		$range = range(1, 23);
		$labels = array_map('hourOptionFormat', $range);
		$hour = array_combine($range, $labels);//$range is the key and $ labels the value
		//array_combined() creates an array by using the elements of a 'keys' array and a 'values' array 

		if(is_null($selectedHour)){
			$selectedHour = date('G');
		}

		return selectOptionsFor($hour, $selectedHour);
	}
?>