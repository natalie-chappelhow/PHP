<?php
  session_start();
  
  // If you don't have a selection form, like the one 
  // the last chapter, you can cheat by setting a value
  // manually.
  // $_SESSION['user_tz_ident'] = 'America/Los_Angeles';
  
  function get_user_timezone() {
    if(isset($_SESSION['user_tz_ident'])) {
      $user_tz_ident = $_SESSION['user_tz_ident'];
      $user_timezone = new DateTimeZone($user_tz_ident);
    }
    return $user_timezone;
  }

  $user_timezone = get_user_timezone();
  
?>
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
          $dt = new DateTime('now', $user_timezone);
          echo $dt->format('F j, g:i a T');
          ?>
        </span>
      </div>
  
    </div>

  </body>
</html>
