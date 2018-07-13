<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Time Zone Sensitivity</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="main-content">

      <h1>Time Zone Sensitivity</h1>

      <div id="current-time">
        Current Time: 
        <span class="time">
          <?php
          $dt = new DateTime('now');
          echo $dt->format('F j, g:i a T');
          ?>
        </span>
      </div>
  
    </div>

  </body>
</html>
