<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['tempF'])) {
            echo '
                <form action="" method="get">
                    <input type="number" name="tempF" required autocomplete="off" placeholder="temperatur Farenheilt" value='.$_GET['tempF'].'>
                    <button type="submit">Submit</button>
                </form>
            ';
        }else{
            echo '
                <form action="" method="get">
                    <input type="number" name="tempF" required autocomplete="off" placeholder="temperatur Farenheilt">
                    <button type="submit">Submit</button>
                </form>
            ';
        }
    ?>

</body>
</html>
<?php
if (isset($_GET['tempF'])) {
    $tempF = $_GET['tempF'];

    $tempC = 5/9 * ($tempF - 32);

    if($tempC > 300){
        $desc = "panas";
    }else if($tempC < 250){
        $desc = "dingin";
    }else{
        $desc = "normal";
    }

    $tempF = round($tempF, 1);
    $tempC = round($tempC, 1);

    echo "
        suhu Farenheilt : $tempF&#8457 <br />
        suhu Celcius: $tempC&#8451; <br />
        deskripsi : $desc <br />
    ";
}
?>
