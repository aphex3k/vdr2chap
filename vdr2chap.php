#!/usr/bin/php
<?php
    empty($_SERVER['SHELL']) && die('shells only please');

$nLine = 0;
chap("00:00:00.000","Intro\n");

$in = fopen('php://stdin', 'r');
while(!feof($in)){
    $line = fgets($in, 4096);
    $split = preg_split("/ /", $line);
    $timecode = array_shift($split);
    $text = implode(" ", $split);
    chap($timecode, $text);
}
exit(0);

function chap($timecode, $title) {
    global $nLine;
    
    $nLine++;
    
    $time = preg_split("/:/", $timecode);
    if(isset($time[2])) {
        $s = array_shift(preg_split("/\./", $time[2]));
        $ms = intval((array_pop(preg_split("/\./", $time[2]))))*10;

        printf("CHAPTER%02d=%02d:%02d:%02d.%03d\nCHAPTER%02dNAME=%s",$nLine,$time[0],$time[1],$s,$ms,$nLine,$title);
    }
}
