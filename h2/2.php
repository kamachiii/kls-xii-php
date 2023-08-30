<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['j'])) {
            echo "
                <form action='' method='get'>
                    <input type='number' name='j' required autocomplete='off' placeholder='jam' value=".$_GET["j"].">
                    <input type='number' name='m' required autocomplete='off' placeholder='menit' value=".$_GET['m'].">
                    <input type='number' name='d' required autocomplete='off' placeholder='detik' value=".$_GET['d'].">
                    <button type='submit'>Submit</button>
                </form>
            ";
        }else{
            echo "
                <form action='' method='get'>
                    <input type='number' name='j' required autocomplete='off' placeholder='jam'>
                    <input type='number' name='m' required autocomplete='off' placeholder='menit'>
                    <input type='number' name='d' required autocomplete='off' placeholder='detik'>
                    <button type='submit'>Submit</button>
                </form>
            ";
        }
    ?>
</body>
</html>
<?php
if (isset($_GET['j'])) {
    $j = $_GET['j'];
    $m = $_GET['m'];
    $d = $_GET['d'];

    $total = $j * 3600 + $m * 60 + $d;

    echo "
        total detik : $total
    ";
}
