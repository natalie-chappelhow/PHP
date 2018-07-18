<?php

	class recipeCollection
	{
		private $title;
		private $recipes = array();


		public function __constuct($title = null){
			$this->setTitle($title);
			}


		public function setTitle($title){
			if(empty($title)){
				$this->$title = null;
			} else {
				$this->title = ucwords($title); //ucwords = uppercase words
			}
		}


		public function getTitle(){
			return $this->title;
		}
	

		public function addRecipe($recipe){
			$this->recipes[] = $recipe;
		}

		
		public function getRecipes(){
			return $this->recipes;
		}
	

		public function getRecipeTitles(){
			$titles = array();
			foreach ($this->recipes as $recipe){
				$titles[] = $recipe->getTitle();
			}
			return $titles;
		}

		public function filterByTag($tag){
			$taggedRecipies = array();
			foreach ($this->recipes as $recipe){
				if (in_array(strtolower($tag), $recipe->getTags())){
					$taggedRecipies[] = $recipe;
				}
			}
			return $taggedRecipies;
		}


		//create master list of ingredients
		public function getCombinedIngredients(){
			$ingredients = array();
			foreach ($this->recipes as $recipe)}
				foreach ($recipe->getIngredients() as $ing) {
					$item = $ing["item"];
					if (strpos($item, ",")){ //strpos - check for the string position. Looking for a comma.
						$item = strstr($item, ",", true);//true is used to return the first part. If true was not used then it will return the part after the comma
					}
					//want to check if it appears in the array as a singular or as a plural
					if(in_array($item."s", $ingredients)){
						$item .="s"
					} elseif(in_array(substr($item, 0, -1), $ingredients)){ //0 and -1 is used to remove the last character from the string - assume the last character is an "s"
						$item = substr($item, 0, -1);
					}

					$ingredients["item"]] = array(
						$ing["amount"],
						$ing["measure"]
					);
				}
				return $ingredients;
		}

	}







?>