<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['berat'])) {
            echo '
                <form action="" method="get">
                    <input size="3" type="number" name="berat" required autocomplete="off" placeholder="gaji pokok" value='.$_GET['berat'].'>
                    <button type="submit">Submit</button>
                </form>
            ';
        }else{
            echo '
                <form action="" method="get">
                    <input size="5" type="number" name="berat" required autocomplete="off" placeholder="gaji pokok">
                    <button type="submit">Submit</button>
                </form>
            ';
        }
    ?>
    
</body>
</html>
<?php
if (isset($_GET['berat'])) {
    $berat = $_GET['berat'];

    $harga_barang = 5;
    $harga_awal = $harga_barang * $berat;
    $diskon = 0.05 * $harga_awal;
    $harga_akhir = $harga_awal - $diskon;

    $harga_barang = number_format($harga_barang*1000,2,',','.');
    $harga_awal = number_format($harga_awal,2,',','.');
    $diskon = number_format($diskon,2,',','.');
    $harga_akhir = number_format($harga_akhir,2,',','.');

    echo "
        harga barang : $harga_barang/kg<br />
        harga awal : $harga_awal <br />
        diskon : $diskon <br />
        harga akhir : $harga_akhir <br />
    ";
}
?>
