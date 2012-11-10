<?php

require_once 'Numbers/Words.php';

function to_words($num, $lang) {
    $nw = new Numbers_Words();
    return $nw->toWords($num, $lang);
}