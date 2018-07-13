<?php
  require_once('functions.php');
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Time Zone Calculator</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="main-content">

      <h1>Time Zone Calculator</h1>
  
      <form action="" method="post">
        
        <dl>
          <dt>From Time:</dt>
          <dd>
            <input type="text" name="from_time" size="40" value=""/>
          </dd>
        </dl>
        <dl>
          <dt>From Time Zone:</dt>
          <dd>
            <select name="from_tz">
              <?php echo timezone_select_options(); ?>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>To Time Zone:</dt>
          <dd>
            <select name="to_tz">
              <?php echo timezone_select_options(); ?>
            </select>
          </dd>
        </dl>
        
        <br />
        <div class="controls">
          <input type="submit" name="submit" value="Submit" />
        </div>
      </form>
  
    </div>

  </body>
</html>