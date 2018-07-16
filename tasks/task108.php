<?php

function combinationCount(int $n) :int
{
    if ($n < 1 || $n > 10) {
        throw new Exception('$n should be between 0 and 10');
    }

    return 2 ** $n;
}

function generateSubset(int $n) :array
{
    if ($n < 1 || $n > 10) {
        throw new Exception('$n should be between 0 and 10');
    }

    $count = combinationCount($n);

    for ($mask = 1; $mask < $count; $mask++) {
        $tmp = 0;

        for ($i = 0; $i < $n; $i++) {
            if (($mask & (1 << $i)) != 0) {
                $tmp = $tmp * 10 + $i + 1;
            }
        }

        $a[$mask] = $tmp;
    }

    sort($a);

    return $a;
}


function task108($n)
{
    echo(combinationCount($n)) . "\n";

    print_r(generateSubset($n));
}



try {
    task108(10);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}
