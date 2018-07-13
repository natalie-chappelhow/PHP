<?php
  require_once('functions.php');
  
  if(isset($_POST['submit'])) {
    $from_month = $_POST['from_month'];
    $from_day = $_POST['from_day'];
    $from_year = $_POST['from_year'];
    $from_hour = $_POST['from_hour'];
    $from_minute = $_POST['from_minute'];
    
    $from_time = $from_year."/".$from_month."/".$from_day." ";
    $from_time .= $from_hour.":".$from_minute;
    
    $from_tz = $_POST['from_tz'];
    $to_tz = $_POST['to_tz'];
    
    $tz_idents = timezone_identifiers_list();
    if(in_array($from_tz, $tz_idents) && in_array($to_tz, $tz_idents)) {
      $from_tz_obj = new DateTimeZone($from_tz);
      $to_tz_obj = new DateTimeZone($to_tz);
      $converted_time = new DateTime($from_time, $from_tz_obj);
      $converted_time->setTimezone($to_tz_obj);
    }
  }
  
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
            <select name="from_month">
              <?php echo month_select_options($from_month); ?>
            </select>
            <select name="from_day">
              <?php echo day_select_options($from_day); ?>
            </select>
            <select name="from_year">
              <?php echo year_select_options($from_year); ?>
            </select>
            -
            <select name="from_hour">
              <?php echo hour_select_options($from_hour); ?>
            </select>
            :
            <select name="from_minute">
              <?php echo minute_select_options($from_minute); ?>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>From Time Zone:</dt>
          <dd>
            <select class="timezone" name="from_tz">
              <?php echo timezone_select_options($from_tz); ?>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>To Time Zone:</dt>
          <dd>
            <select class="timezone" name="to_tz">
              <?php echo timezone_select_options($to_tz); ?>
            </select>
          </dd>
        </dl>
        
        <?php if(isset($converted_time)) { ?>
        <dl>
          <dt>Converted Time:</dt>
          <dd>
            <?php echo $converted_time->format('F j, Y \a\t g:i a')?>
          </dd>
        </dl>
        <?php } // if(isset($converted_time)) ?>
        
        <br />
        <div class="controls">
          <input type="submit" name="submit" value="Submit" />
        </div>
      </form>
  
    </div>

  </body>
</html>