<?php
function greetTime(){
//Messages for time of day
$morning = "Good morning! Coffee?";
$afternoon = "Good afternoon! Lunch yet?";
$evening = "Good evening! Take some break!";

//morning from 6 to 12pm
if (date("H") >= 6 && date("H") <= 12) {
echo $morning;
}
//afternoon 12:01 to 5pm
elseif (date("H") > 12 && date("H") <= 17) {
echo $afternoon;
}
//evening from 5pm to 11pm
elseif (date("H") > 17 && date("H") <= 23) {
echo $evening;
}

else{
  $notime = "Where are you? Pluto?"
  return $notime;
}
}
 ?>
