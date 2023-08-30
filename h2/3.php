<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['total'])) {
            echo "
                <form action='' method='get'>
                    <input type='number' name='total' required autocomplete='off' placeholder='total' value=".$_GET["total"].">
                    <button type='submit'>Submit</button>
                </form>
            ";
        }else{
            echo "
                <form action='' method='get'>
                    <input type='number' name='total' required autocomplete='off' placeholder='total detik'>
                    <button type='submit'>Submit</button>
                </form>
            ";
        }
    ?>
</body>
</html>
<?php
if (isset($_GET['total'])) {
    $total = $_GET['total'];

    $j = ($total - ($total % 3600)) / 3600;
    $m = (($total % 3600) - (($total % 3600) % 60)) / 60;
    $d = ($total % 3600) % 60;

    echo "
        $j Jam<br />
        $m Menit<br />
        $d Detik<br />
    ";
}
