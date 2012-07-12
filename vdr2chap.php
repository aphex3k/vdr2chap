#!/usr/bin/php
<?php
    empty($_SERVER['SHELL']) && die('shells only please');
/**
 * Description:
 * 
 * Description goes here...
 * 
 * @author Michael Henke (aphex3k@gmail.com)
 * 
 * Info
 
MP4Box -chap <file>
http://uzzikie.livejournal.com/17048.html

 * Source

0:03:08.23 detected logo start (4722)*
0:10:18.25 detected logo stop (15474)
0:15:18.01 detected logo start (22950)*
0:28:21.22 detected logo stop (42546)
0:33:20.20 detected logo start (50019)*
0:39:06.25 detected logo stop (58674)
0:44:36.01 detected logo start (66900)*
1:00:01.15 detected logo stop (90039)

 * 
 * Target: 
  
CHAPTER01=00:00:00.000
CHAPTER01NAME=Intro
CHAPTER02=00:00:45.000
CHAPTER02NAME=Track 1
CHAPTER03=00:07:48.000
CHAPTER03NAME=Track 2
CHAPTER04=00:12:25.000
CHAPTER04NAME=Track 3
CHAPTER05=00:17:47.000
CHAPTER05NAME=Track 4
CHAPTER06=00:23:34.000
CHAPTER06NAME=Track 5
CHAPTER07=00:28:26.000
CHAPTER07NAME=Track 6
CHAPTER08=00:32:27.000
CHAPTER08NAME=Track 7
CHAPTER09=00:39:03.000
CHAPTER09NAME=Track 8
CHAPTER10=00:45:49.000
CHAPTER10NAME=Track 9
CHAPTER11=00:49:52.000
CHAPTER11NAME=Track 10

 */

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
