<?php
function task101(array $numbers)
{
    $count = 0;
    $candidate = null;

    foreach ($numbers as $number) {
        $candidate = !$count ? $number : $candidate;
        $count += $number === $candidate ? 1 : -1;
    }

    if (!$count) {
        return null;
    }

    $count = count(array_filter(
        $numbers,
        function ($element) use ($candidate) {
            return $element === $candidate;
        }
    ));

    return ($count > floor(count($numbers) / 2)) ? $candidate : null;
}


var_dump(task101(
    [
        1,2,3,2,5,
        2,6,7,2,1,
        8,2,1,2,5,
        2,2,8,2,2,
        2,0,7,2,5
    ]
));