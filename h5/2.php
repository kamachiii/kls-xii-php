<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="#">
        <?php
            if(isset($_GET['a'])){
        ?>
            <input type="number" name="a" placeholder="Masukkan angka pertama" required autocomplete="off" value="<?=$_GET['a']?>">
            <input type="number" name="b" placeholder="Masukkan angka kedua" required autocomplete="off" value="<?=$_GET['b']?>">
            <button type="submit">Submit</button>
        <?php
            }else{
        ?>
            <input type="number" name="a" placeholder="Masukkan angka pertama" required autocomplete="off">
            <input type="number" name="b" placeholder="Masukkan angka kedua" required autocomplete="off">
            <button type="submit">Submit</button>
        <?php
            }
        ?>
    </form>
</body>
</html>
<?php
    if(isset($_GET['a'])){
        $a = $_GET['a'];
        $b = $_GET['b'];

        if($a < $b){
            for($a; $a <= $b; $a++){
                if($a % 2 == 1) echo $a."\n";
            }
        }else{
            for($a; $a >= $b; $a--){
                if($a % 2 == 1) echo $a."\n";
            }
        }
    }

?>
