<?php
  session_start();
  
  $tz_idents = timezone_identifiers_list();
  // $tz_idents = DateTimeZone::listIdentifiers();
  
  function format_hours_minutes($float) {
    $hours = floor($float);
    $minutes = ($float - $hours) * 60;
    return sprintf("%+02d:%02d", $hours, $minutes);
  }
  
  $user_tz_ident = NULL;
  
  if($_POST['submit']) {
    // Save the TZ choice
    $tz_choice = $_POST['tz_choice'];
    // Only accept value if it is in the list
    if(in_array($tz_choice, $tz_idents)) {
      $_SESSION['user_tz_ident'] = $tz_choice;
      $user_tz_ident = $tz_choice;
    }
  } else {
    // Check for previous TZ settings
    if(isset($_SESSION['user_tz_ident'])) {
      $user_tz_ident = $_SESSION['user_tz_ident'];
    }
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Time Zone Selection</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="main-content">

      <h1>Time Zone Selection</h1>
  
      <form action="" method="post">
        
        Preferred Time Zone:
        <select name="tz_choice">
          <?php
          $dt = new DateTime('now');
          foreach($tz_idents as $zone) {
            $this_tz = new DateTimeZone($zone);
            $dt->setTimezone($this_tz);
            // divide by 3600 for offset in hours
            // $offset = $dt->getOffset() / 3600;
            // $offset = format_hours_minutes($dt->getOffset() / 3600);
            $offset = $dt->format('P');
            
            echo "<option value=\"{$zone}\"";
            if($user_tz_ident == $zone) { echo " selected"; }
            echo ">";
            echo $zone . " (UTC/GMT {$offset})";
            echo "</option>";
          }
          ?>
        </select>

        <br />
        <div class="controls">
          <input type="submit" name="submit" value="Submit" />
        </div>
      </form>
  
    </div>

  </body>
</html>