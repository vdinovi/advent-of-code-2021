#!/usr/bin/env php
<?php
$grid = array();
while ($line = fgets(STDIN)) {
    $chars = str_split(rtrim($line));
    $row = array();
    foreach ($chars as $char) {
        array_push($row, (int)$char);
    }
    array_push($grid, $row);
}
$height = sizeof($grid);
$width = sizeof($grid[0]);

//print_r($grid);
$risk_levels = array();
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $h = $grid[$y][$x];
        if ($y > 0           && $grid[$y - 1][$x] < $h) { continue; }
        if ($x < $width - 1  && $grid[$y][$x + 1] < $h) { continue; }
        if ($y < $height - 1 && $grid[$y + 1][$x] < $h) { continue; }
        if ($x > 0           && $grid[$y][$x - 1] < $h) { continue; }
        array_push($risk_levels, $h + 1);
    }
}

//print_r($risk_levels);
printf("%d\n", array_sum($risk_levels));
?>
