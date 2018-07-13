<?php
  $tz_idents = timezone_identifiers_list();
  // $tz_idents = DateTimeZone::listIdentifiers();
  
  function format_hours_minutes($float) {
    $hours = floor($float);
    $minutes = ($float - $hours) * 60;
    return sprintf("%+02d:%02d", $hours, $minutes);
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
            
            echo "<option value=\"{$zone}\">";
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