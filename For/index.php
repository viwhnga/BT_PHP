<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <?php
    $sum = 0;
    $suma = 0;
    $sumb = 0;
    $i = 0;
    while ($i < 10) {
        $sum += $i;
        if ($i % 2 == 0) {
            $suma += $i;
        } else {
            $sumb += $i;
        }
        $i++;
    }
    echo $sum . "<br>";
    echo $suma . "<br>";
    echo $sumb . "<br>";
    ?>
</body>

</html>