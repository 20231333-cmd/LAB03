<?php
require_once "fuctions.php";

$action = $_GET["action"] ?? "home";

echo "<h2>LAB03 - Mini Utility</h2>";
echo "<p>
<a href='?action=max&a=10&b=22'>Max</a> |
<a href='?action=min&a=10&b=22'>Min</a> |
<a href='?action=prime&n=17'>Prime</a> |
<a href='?action=fact&n=6'>Factorial</a> |
<a href='?action=gcd&a=12&b=18'>GCD</a>
</p>";

switch ($action) {
    case "max":
        echo "Max = " . max2($_GET["a"], $_GET["b"]);
        break;
    case "min":
        echo "Min = " . min2($_GET["a"], $_GET["b"]);
        break;
    case "prime":
        $n = $_GET["n"];
        echo $n . (isPrime($n) ? " là số nguyên tố" : " không phải số nguyên tố");
        break;
    case "fact":
        $n = $_GET["n"];
        echo "Factorial($n) = " . factorial($n);
        break;
    case "gcd":
        echo "GCD = " . gcd($_GET["a"], $_GET["b"]);
        break;
    default:
        echo "Chọn chức năng ở menu trên";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lab 03 - PHP</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        h2 { color: darkblue; }
        table { border-collapse: collapse; }
        td { border: 1px solid #444; padding: 6px; }
        .box { border: 1px solid #aaa; padding: 15px; margin-bottom: 25px; }
    </style>
</head>
<body>

<h1>LAB 03 – PHP (If, Switch, Loop)</h1>

<!-- ================= BÀI 1 ================= -->
<div class="box">
<h2>Bài 1 – Phân loại điểm</h2>

<form>
    Nhập điểm:
    <input type="number" step="0.1" name="score">
    <button type="submit">Xếp loại</button>
</form>

<?php
if (isset($_GET["score"])) {
    $score = (float)$_GET["score"];

    if ($score < 0 || $score > 10) {
        echo "<p style='color:red'>Điểm không hợp lệ (0–10)</p>";
    } else {
        if ($score >= 8.5) $rank = "Giỏi";
        elseif ($score >= 7) $rank = "Khá";
        elseif ($score >= 5) $rank = "Trung bình";
        else $rank = "Yếu";

        echo "Điểm: <b>$score</b> – Xếp loại: <b>$rank</b>";
    }
}
?>
</div>

<!-- ================= BÀI 2 ================= -->
<div class="box">
<h2>Bài 2 – Máy tính mini</h2>

<form>
    a: <input type="number" name="a" required>
    b: <input type="number" name="b" required>
    Phép toán:
    <select name="op">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mul">*</option>
        <option value="div">/</option>
    </select>
    <button type="submit">Tính</button>
</form>

<?php
if (isset($_GET["a"]) && isset($_GET["b"])) {
    $a = (float)$_GET["a"];
    $b = (float)$_GET["b"];
    $op = $_GET["op"] ?? "add";

    switch ($op) {
        case "add": $result = $a + $b; $symbol = "+"; break;
        case "sub": $result = $a - $b; $symbol = "-"; break;
        case "mul": $result = $a * $b; $symbol = "*"; break;
        case "div":
            if ($b == 0) {
                echo "<p style='color:red'>Không chia được cho 0</p>";
                break;
            }
            $result = $a / $b;
            $symbol = "/";
            break;
        default:
            echo "Phép toán không hợp lệ";
            break;
    }

    if (isset($result)) {
        echo "<p><b>$a $symbol $b = $result</b></p>";
    }
}
?>
</div>

<!-- ================= BÀI 3 ================= -->
<div class="box">
<h2>Bài 3 – Vòng lặp</h2>

<form>
    Nhập N:
    <input type="number" name="n" value="20">
    <button type="submit">Chạy</button>
</form>

<?php
$n = isset($_GET["n"]) ? (int)$_GET["n"] : 20;

echo "<h3>A. Bảng cửu chương</h3>";
echo "<table>";
for ($i=1; $i<=9; $i++) {
    echo "<tr>";
    for ($j=1; $j<=9; $j++) {
        echo "<td>$i x $j = " . ($i*$j) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "<h3>B. Tổng chữ số của $n</h3>";
$tmp = abs($n);
$sum = 0;
while ($tmp > 0) {
    $sum += $tmp % 10;
    $tmp = (int)($tmp / 10);
}
echo "Tổng = <b>$sum</b>";

echo "<h3>C. Các số lẻ từ 1 → $n (dừng khi >15)</h3>";
for ($i=1; $i <= $n; $i++) {
    if ($i % 2 == 0) continue;
    if ($i > 15) break;
    echo $i . " ";
}
?>

</body>
</html>
