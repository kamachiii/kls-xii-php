<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['gaji_pokok'])) {
            echo '
                <form action="" method="get">
                    <input type="text" name="nama" required autocomplete="off" placeholder="nama karyawan" value='.$_GET['nama'].'>
                    <input type="number" name="gaji_pokok" required autocomplete="off" placeholder="gaji pokok" value='.$_GET['gaji_pokok'].'>
                    <button type="submit">Submit</button>
                </form>
            ';
        }else{
            echo '
                <form action="" method="get">
                    <input type="text" name="nama" required autocomplete="off" placeholder="nama karyawan">
                    <input type="number" name="gaji_pokok" required autocomplete="off" placeholder="gaji pokok">
                    <button type="submit">Submit</button>
                </form>
            ';
        }
    ?>

</body>
</html>
<?php
if (isset($_GET['gaji_pokok'])) {
    $nama = $_GET['nama'];
    $gaji_pokok = $_GET['gaji_pokok'];

    $tunj = 20/100 * $gaji_pokok;
    $pjk = 15/100 * ($gaji_pokok + $tunj);
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;

    $tunj = number_format($tunj,2,',','.');
    $pjk = number_format($pjk,2,',','.');
    $gaji_bersih = number_format($gaji_bersih,2,',','.');

    echo "
        nama : $nama <br />
        tunjangan : $tunj <br />
        pajak : $pjk <br />
        gaji bersih : $gaji_bersih <br />
    ";
}
?>
