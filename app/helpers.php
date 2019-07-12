<?php
function chunk($model, $size)
{
    $ans = [];
    $tmp = [];
    foreach ($model as $item) {
        $tmp[] = $item;
        if (count($tmp) == $size) {
            $ans[] = $tmp;
            $tmp = [];
        }
    }
    if (!empty($tmp)) {
        $ans[] = $tmp;
    }
    return $ans;
}
