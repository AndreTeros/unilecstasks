<?php

function task110($k, array $probData)
{
    $n = count($probData);
    if ($k > $n) return 0;
    $start = gmp_init(0);
    $end = gmp_pow(2, $n);
    $result = 0;
    while (gmp_cmp($start, $end) < 0) {
        $onesBitCnt = 0;
        $prob = 1;
        for ($i = 0; $i < $n; ++$i) {
            if (gmp_testbit($start, $i)) {
                ++$onesBitCnt;
                $prob *= $probData[$i][1];
            } else {
                $prob *= (1 - $probData[$i][1]);
            }
        }
        if ($onesBitCnt >= $k) {
            $result += $prob;
        }
        $start = gmp_add($start, 1);
    }
    return $result;
}
echo task110(1, [['медведь', 0.5], ['тигр', 0.5], ['лев', 0.5]]) . "\n";  // 0.875
echo task110(2, [['медведь', 0.5], ['тигр', 0.5], ['лев', 0.5]]) . "\n";  // 0.5
echo task110(4, [['медведь', 0.5], ['тигр', 0.5], ['лев', 0.5]]) . "\n";  // 0