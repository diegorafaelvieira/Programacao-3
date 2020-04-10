<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aula 12</title>
</head>
<body>
    <?php
        function multiplicar($a,$b) {
            return ($a*$b);
        }

        #$r = multiplicar(2,2);
        #echo $r;

        function somar(&$s,$v) {
            $s += $v;
        }

        $x = 10;
        somar($x,5);
        echo $x;
    ?>
</body>
</html>
