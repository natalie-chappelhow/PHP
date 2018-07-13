<?php
  $tz_idents = timezone_identifiers_list();
  // $tz_idents = DateTimeZone::listIdentifiers();
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
          foreach($tz_idents as $zone) {
            echo "<option value=\"{$zone}\">";
            echo $zone;
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