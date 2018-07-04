<?php

	include "recipe.php";
	include "render.php";
	include "recipeCollection.php";
	include "include.php";

	/*
	$recipe1 = new recipe("my first recipe");
	//echo $recipe1->title;//property name does not start with '$' - only object name does
	$recipe1->setTitle("hello world");
	//echo $recipe1->title;

	$recipe1->addIngredient("egg", 1);
	$recipe1->addIngredient("flour", 2, "cups");

	$recipe2 = new recipe("my second recipe");
	$recipe2->title = "Goodbye World";
	//echo $recipe1->title;
	//echo $recipe2->title;

	/*echo $recipe1->displayRecipe();
	echo $recipe2->displayRecipe();
	echo $recipe1->getTitle();
	foreach ($recipe1->getIngredients() as $ing) {
		echo "\n" . $ing["amount"] . " " . $ing["measure"] . " " .  $ing["item"]; //"/n" = new line
	}

	$recipe1->addInstruction("This is my first instruction");
	$recipe1->addInstruction("This is my second instruction");

	//echo implode("/n", $recipe1->getInstructions());


	$recipe1->addTag("Breakfast");
	$recipe1->addTag("Dinner");
	$recipe1->addTag("Tea");

	//echo implode(" , ", $recipe1->getTags());

	$recipe1->setYield("6 servings");
	//echo $recipe1->getYield();

	//var_dump($recipe1);

	//calling the render class and the displayRecipe method and getting it to show on screen
	//echo render::displayRecipe($recipe1);

	echo new render(); //see results of the render object
	*/

	$cookbook = new recipeCollection("Recipe Collection");
	$cookbook->addRecipe($lemon_chicken);
	$cookbook->addRecipe($granola_muffins);
	$cookbook->addRecipe($belgian_waffles);
	$cookbook->addRecipe($pepper_casserole);
	$cookbook->addRecipe($lasagna);
	$cookbook->addRecipe($dried_mushroom_ragout);
	$cookbook->addRecipe($rabbit_catalan);
	$cookbook->addRecipe($grilled_salmon_with_fennel);
	$cookbook->addRecipe($pistachio_duck);
	$cookbook->addRecipe($chili_pork);
	$cookbook->addRecipe($crab_cakes);
	$cookbook->addRecipe($beef_medallions);
	$cookbook->addRecipe($silver_dollar_cakes);
	$cookbook->addRecipe($french_toast);
	$cookbook->addRecipe($corn_beef_hash);
	$cookbook->addRecipe($granola);
	$cookbook->addRecipe($spicy_omelette);
	$cookbook->addRecipe($scones);

	var_dump($cookbook);
	//echo render::listRecipes($cookbook->getRecipeTitles());
	//echo render::displayRecipe($belgium_waffles);
	$week1 = new recipeCollection("Meal Plan Week 1");
	$week1->addRecipe($cookbook->filterById(2));
	$week1->addRecipe($cookbook->filterById(3));
	$week1->addRecipe($cookbook->filterById(6));
	$week1->addRecipe($cookbook->filterById(16));
	echo render::listRecipes($week1->getRecipeTitles());
	//echo render::displayRecipe($cookbook->filterById(2));



	$breakfast = new recipeCollection("favourite breakfasts");
	foreach ($cookbook->filterByTag("breakfast")as $recipe){
		$breakfast->addrecipe($recipe);
	}

	echo "\n\n Shopping List\n\n";
	//echo render::listRecipes($breakfast->getRecipeTitles());
	echo render::listShopping($breakfast->getCombinedIngredients());//displaying the shopping list
	//echo render::listRecipes($cookbook->getRecipeTitles());
?>