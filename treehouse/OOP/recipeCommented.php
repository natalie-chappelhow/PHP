<?php
  //access modifier is used to limit access to a property of method.
  /*  Access modifiers:
  //public - variable/function can be read and written anywhere (inside and outside of a class)
  //private - variable/function can only be visible inside of the class - cannot read or write outside of the class
  protected - variable/function visible in all classes, extended classes, and parent classes  */
  

//creating a class
  class recipe{
    //adding properties (variables) to the class
    private $title;//empty property/variable
    public $ingredients = array();//creating an empty array - ingredients will be stored in an array
    public $source = "Natalie";
    public $instructions = array();
    public $yield;
    public $category;
    public $tag = array();
    private $measurements = array ( //private becasue we don't want the measurements to change
      "ml",
      "l",
      "tsp",
      "tbsp",
      "cup",
      "fl oz",
      "oz",
      "lb",
      "pint",
      "gallon"
    );//says what measurements can be accepted/allowed
   
    
    //adding a method/function
    public function displayRecipe(){
      return $this->title . "by" . $this->source; //object references itself ($this). Want to use its properties or methods within the class scope. Return the title and the source of the current object.
    }
    
    //setter method - used to access private properties - used with a getter method
    //set property name
    public function setTitle($title){
      $this->title = ucwords($title);//access the objects property. Title without the keyword $this gives the past argument. ucwords - uppercase words
    }
    
    
    //getter method - used to access private properties - used with a setter method
    public function getTitle($title){
      return $this->title;
    }
    
    
    
    //setter with an associate array - allows ingredients to be boken up into parts to take better control of the items
    
    //adding individual ingredients
    public function addIngredient($item, $amount = null, $measure = null){ //only item is required, hence null for the $amount and $measure
      /*indexed arrays - arrays with a numeric index
      e.g. $cars = array("Mustang", "Camero", "Viper");
      echo "I like" . $cars[0];
      */
      /*associative array - arrays that use named keys that you assign to them
      e.g. $age = array("Jim"=>35, "Hazel"=>38, "Clark"=>42);
      or
      $age["Jim"] = "35";
      $age["Hazel"] = "38";
      $age["Clark"] = "42";
      to loop through an associative array you could use a foreach (only works on arrays) loop
      foreach ($array as $value);
      */
      
      //check to see if a float or integer is passed
      if($amount != null && !is_float($amount) && !is_int($amount)){ //is_float is used to find whether a variable is a float. is_int is used to find whether a variable is an integer
        exit("The amount must be a float or an integer" . getType($amount) . " $amount given");//exit stops the script from executing. getType is used to show what variable type has been used
      }
      
      
      //see if measurement entered is valid (matches what has been defined)
      if($measurement !=null && !in_array($measurement, $this->measurement)){ //in_array() searches an array for a specific value. Looks for the measurements in the measurement array
        exit("please enter a valid measurement:" . implode (", ", $this->measurements));//implode() returns a string from the elements of an array - used to show what measurements are valid
      }
        $this->ingredients[] = array(
        "item" =>$item,
        "item"=>$amount,
        "item"=>$measure);
    }
    
  
  
  }
  




//DISPLAYING METHODS ETC.


  $recipe1 = new recipe();//creating an object that is an instance of the recipe class
  //var_dump($recipe1);//shows that it is an object from (instance of) the recipe class

  //accessing the properties of the object
  //echo $recipe1->source;//property name does not start with an '$' - only the object name does. Displaying the property 

  //setting the property
  $recipe1->source = "Beth";// -> is used to access a property or method of an object. accessing the source property of the recipe object
  //echo $recipe1->source;//displaying the source of object recipe1
  $recipe1->setTitle("my first recipe");//setting titles for the recipe
  $recipe1->addIngredient("egg", 1);

  //creating a second object from the recipe class
  //$recipe2 = new recipe();
  //$recipe2->source = "Jim";//displaying the source of object recipe2
  //$recipe2->title = "My Second Recipe";
  
  //echo $recipe1->source . $recipe2->source;

  echo $recipe1->displayRecipe();//displaying the displayRecipe function. Reference the object that it belongs to
  //echo $recipe2->displayRecipe();

  echo $recipe1->getTitle();//calling getTitle()






?>



