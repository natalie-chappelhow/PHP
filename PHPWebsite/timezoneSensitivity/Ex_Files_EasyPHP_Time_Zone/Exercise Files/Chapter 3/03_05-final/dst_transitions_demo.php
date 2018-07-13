<?php
// PHP knows about DST transitions
$tz = new DateTimeZone('America/New_York');

$dt = new DateTime('March 13, 2016', $tz);
echo $dt->format('G:i (P, T)') . "<br />";

$dt->modify('+1 day');
echo $dt->format('G:i (P, T)') . "<br />";
?>
<hr />
<?php 
// View DST transitions for this year
$this_year = (int) date('Y');
$timestamp_start = mktime(0,0,0,1,1,$this_year);
$next_year = $this_year + 1;
$timestamp_end = mktime(0,0,0,1,1,$next_year);

$tz = new DateTimeZone('America/New_York');
$transitions = $tz->getTransitions($timestamp_start, $timestamp_end); 
?>
<pre>
<?php print_r($transitions); ?>
</pre>

<hr />

<?php
// Tranistions are maintained in UTC
// View transistions using DateTime to make them TZ aware
//
// Append "@" to use a timestamp with DateTime
// Timestamps are always UTC, other TZ settings are ignored
$dst_starts = new DateTime("@".($transitions[1]['ts']-1));
$dst_starts->setTimezone($tz);
$dst_ends = new DateTime("@".($transitions[2]['ts']-1));
$dst_ends->setTimezone($tz);
$format_string = 'l, F j, Y H:i:s';

echo "DST starts: " . $dst_starts->format($format_string) . "<br />";
echo "DST ends: " . $dst_ends->format($format_string) . "<br />";

?>
