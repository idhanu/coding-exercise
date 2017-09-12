<?php
/**
 * This is just a test script
 */

$height = 20;
$width = 40;
$density = 2; // More the number lesser dense

for ($i = 0; $i < $height; $i++) {
    echo "\n";
    for ($j = 0; $j < $width; $j++) {
        if (rand(0, $density) > 1) {
            echo "O";
        } else {
            echo " ";
        }
    }
}
echo "\n";