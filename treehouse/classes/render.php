<?php

	class render{

		public function __toString(){
			$output .= "The following methods are available for" . __CLASS__. " objects: \n";
			$output .= implode("\n", get_class_methods(__CLASS__)); //get_class_methods is used to retrieve a list of the methods for the current class
			return $output;
			//return $this->getTitle();
		}


		public static function listShopping($ingredientsList){
			ksort($ingredientsList);
			return implode("\n", array_keys($ingredientsList));
		}

		public static function listRecipes($titles){
			asort($titles);
			return implode("\n", $titles);
		}



		public static function listIngredients($ingredients){
			$output = "";
			foreach ($ingredients() as $ing){
				$output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
				$output .="\n";
			} 
			return $output;
		}

		public static function displayRecipe($recipe){
			
			$output = "";
			$output .= $recipe->getTitle(); //. "by" . $recipe->getIngredients();
			$output .= "\n";
			$output .= implode(", ", $recipe->getTags());
			$output .= "\n\n";
			$output .= self::listIngredients($recipe->getIngredients());
			foreach ($recipe->getIngredients() as $ing){
				$output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
				$output .="\n";
			} 

			$output .="\n";
			$output .= implode("\n", $recipe->getInstructions());
			$output .="\n";
			$output .= $recipe1->getYield();
			return $output;
		}




	}

	/*
	$render = new Render();
	$render->listIngredients($ingredients);

	render::listIngredients($ingredients);
	*/









?>