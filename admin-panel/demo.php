<?php

$a = 1;
$b = 0;

try {
    $c = $a / $b;
    echo $c;
} catch (Exception $error) {
    echo $error->getMessage();
}
