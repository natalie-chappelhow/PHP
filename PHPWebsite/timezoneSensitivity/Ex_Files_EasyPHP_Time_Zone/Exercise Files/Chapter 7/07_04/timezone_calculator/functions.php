<?php

function timezone_select_options($selected_timezone=NULL) {
  $tz_idents = timezone_identifiers_list();
  // $tz_idents = DateTimeZone::listIdentifiers();

  $output = "";

  $dt = new DateTime('now');
  foreach($tz_idents as $zone) {
    $this_tz = new DateTimeZone($zone);
    $dt->setTimezone($this_tz);
    $offset = $dt->format('P');
    
    $output .= "<option value=\"{$zone}\"";
    if($selected_timezone == $zone) { $output .= " selected"; }
    $output .= ">";
    $output .= $zone . " (UTC/GMT {$offset})";
    $output .= "</option>";
  }
  return $output;
}

?>
