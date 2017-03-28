#!/usr/bin/php
<?php
// load spotify URLs
// get song names
// create directory
// DL songs via youtube-dl -f bestvideo+bestaudio -x --audio-format mp3 --audio-quality 0 "ytsearch1:porter robinson - flicker"
// add adding of ID3 tags

echo "Please enter spotify URLs".PHP_EOL;
echo "One URL per line.".PHP_EOL;
echo "enter: \"end\" to finalize input or press CTRL-C to quit".PHP_EOL;

$items = array();

while($f = trim(fgets(STDIN))){
    if(empty($f)) continue;
    if($f === "end") break;
    if (!filter_var($f, FILTER_VALIDATE_URL) !== false) continue;
    $items[] = trim($f);
}

$items = array_unique($items);

print_r($items);

foreach($items as $item){
    $temp = file_get_contents($item);
    $temp1 = explode('og:title" content="', $temp, 2);
    $temp2 = explode('"', $temp1[1]);

    $temp3 = explode('og:description" content="', $temp, 2);
    $temp4 = explode('"', $temp3[1]);

    $temp5 = explode('owner-name hdr-l">', $temp, 2);
    $temp6[0] = "";
    if(isset($temp5[1])) $temp6 = explode('<', $temp5[1]);

    $name = $temp2[0];
    $desc = $temp4[0];
    $artist = $temp6[0];
    $temp7 = explode(', a song by', $desc);
    $name2 = $temp7[0];
    $temp8 = explode(' on Spotify', $temp7[1]);
    $artist2 = $temp8[0];


    if(empty($name)) {
        echo "Failed to get $item".PHP_EOL;
        continue;
    }

    $string = trim("$artist2 - $name2");
    echo "$artist2 - $name2".PHP_EOL;
    passthru('youtube-dl -c --add-metadata --restrict-filenames -w --console-title -f bestaudio -x --audio-format mp3 --audio-quality 0 "ytsearch1:'.$string.'"');
}