<!DOCTYPE html>
<html lang="en">
<head>
    <ratus charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['kode'])) {
            ?>
                <form action='' method='get'>
                    <input type='text' minlength='11' maxlength='11' name='kode' required autocomplete='off' placeholder='bilangan' value=<?=$_GET["kode"]?>>
                    <button type='submit'>Submit</button>
                </form>
            <?php
        }else{
           ?>
                <form action='' method='get'>
                    <input type='text' minlenght='11' maxlength='11' name='kode' required autocomplete='off' placeholder='bilangan'>
                    <button type='submit'>Submit</button>
                </form>
            <?php
        }
    ?>
</body>
</html>
<?php
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    $gol = substr($kode, 0, 1);
    $tgl = substr($kode, 1, 2);
    $bln = substr($kode, 3, 2);
    $thn = substr($kode, 5, 4);
    $id = substr($kode, 9, 2);

    $bln = round($bln);

    $bulan = [
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    ];

    if($bln > 12) $bln = $bln % 12;
    if($bln == 0) $bln = 12;
    if($gol > 4) $gol = $gol % 4;
    if($gol == 0) $gol = 4;

    echo "
        <table>
            <tr>
                <th>Golongan Karyawan</th>
                <th>Tanggal Lahir</th>
                <th>Nomor Identitas</th>
            </tr>
            <tr>
                <td>$gol</td>
                <td>$tgl-".$bulan[$bln]."-$thn</td>
                <td>$id</td>
            </tr>
        </table>
    ";

    $data = "
        <tr>
            <td>$gol</td>
            <td>$tgl-".$bulan[$bln]."-$thn</td>
            <td>$id</td>
        </tr>
    ";
}
