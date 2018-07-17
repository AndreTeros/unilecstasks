<?php

function combinationCount(int $n) :int
{
    if ($n < 1 || $n > 10) {
        throw new Exception('$n should be between 0 and 10');
    }

    return 2 ** $n;
}

function generateSubset(int $n, bool $sort = false) :array
{
    if ($n < 1 || $n > 10) {
        throw new Exception('$n should be between 0 and 10');
    }

    $result = [];
    $max = combinationCount($n);

    for ($i = 0; $i < $max; $i++) {
        $s = '';

        for ($k = 0; $k < $n; $k++) {
            $s .= ((1 << $k) & $i) ? ' ' . ($k + 1) : '';
        }

        $result[] = trim($s);
    }

    if ($sort === true) {
        sort($result);
    }

    return $result;
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
