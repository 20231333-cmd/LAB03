<?php
// =======================================
// LAB03 – THƯ VIỆN HÀM
// =======================================

/**
 * Trả về số lớn hơn trong 2 số
 */
function max2($a, $b) {
    if (!is_numeric($a) || !is_numeric($b)) return null;
    return ($a > $b) ? $a : $b;
}

/**
 * Trả về số nhỏ hơn trong 2 số
 */
function min2($a, $b) {
    if (!is_numeric($a) || !is_numeric($b)) return null;
    return ($a < $b) ? $a : $b;
}

/**
 * Kiểm tra số nguyên tố
 * @param int $n
 * @return bool
 */
function isPrime(int $n): bool {
    if ($n < 2) return false;

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0)
            return false;
    }
    return true;
}

/**
 * Tính giai thừa n!
 * n >= 0, nếu n < 0 trả về null
 */
function factorial(int $n) {
    if ($n < 0) return null;

    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

/**
 * Tìm ước chung lớn nhất (GCD) bằng thuật toán Euclid
 */
function gcd(int $a, int $b): int {
    $a = abs($a);
    $b = abs($b);

    while ($b != 0) {
        $temp = $a % $b;
        $a = $b;
        $b = $temp;
    }
    return $a;
}
?>

