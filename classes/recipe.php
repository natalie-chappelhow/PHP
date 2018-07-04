<?php


	class recipe{
		private $title;
		private $ingredients = array();//ingedients will be stored in an array
		private $instructions = array();
		private $yield;
		private $category = array();

		private $measurements = array(
			"ml",
			"l",
			"tsp",
			"tbsp",
			"cup",
			"oz",
			"lb",
			"pint",
			"gallon");


		//Magic Methods and Constructs
		public function __constuct($title = null){
			if(empty($title)){
				$this->$title = null;
			} else {
				$this->setTitle($title);
			}
		}



		public function __toString(){
			$output = "You are calling a" . __CLASS__ . "object with the title \""; //__CLASS__ gives name of the class
			$output .= $this->getTitle() . "\"";
			$output .= "\nit is stored in" . basename(__FILE__) . "at" . __DIR__; //__FILE__ gives full path with file name. Combine with basename function to get just the filename.
			//__DIR__ is used to link to another file within the same directiry as the current file, even if this file is included in another file
			$output .= "\n This display is from line" . __LINE__ . "in method" . __METHOD__; 
			$output .= "The following methods are available for objects of this class: \n";
			$output .= implode("\n", get_class_methods(__CLASS__));//get_class_methods is used to retrieve a list of the methods for the current class
			return $output;
			//return $this->getTitle();
		}


		public function setTitle($title){
			$this->title = ucwords($title); //ucwords = uppercase words
		}


		public function getTitle(){
			return $this->title;
		}

		public function setYield($yield){
			$this->yield = $yield;
		}

		public function getYield(){
			return $this->yield;
		}

		public function setCategory($category){
			$this->category = $category;
		}

		public function getCategory(){
			return $this->category;
		}


		public function addIngredient($item, $amount = null, $measure = null){
			
			if ($amount !=null && !is_float($amount) && !is_int($amount)){
 				exit("The number must have a decimal point:" .gettype($amount) . "$amount given");
			}
			if ($measure !=null && !in_array($measure, $this->$measurements)) {
				exit("Please enter a valid measurement:". implode(", ", $this->measurements));
				//implode() returns a string from the elements of an array
			}


			$this->ingredients[] = array (
				"item" =>$item,
				"amount" =>$amount,
				"measure" =>$measure
			);
		}



		public function getIngredients(){
			return $this->ingredients;
		}


		public function addInstruction($string){
			$this->instructions[] = $string;
		}

		public function getInstructions(){
			return $this->instructions;
		}


		public function addTag($tag){
			$this->tags[] = strtolower($tag);
		}


		public function getTags(){
			return $this->tags;
		}


	}



?>