<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <script>
        function formatTimeInput(input) {
            var value = input.value.replace(/\D/g, ''); // Hapus karakter non-angka
            if (value.length > 6) {
                value = value.substring(0, 6); // Batasi panjang input menjadi 6 karakter
            }

            var formatted = value.replace(/(\d{2})(\d{2})(\d{2})/, '$1:$2:$3');
            input.value = formatted;
        }
    </script>
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['waktu'])) {
            ?>
                <form action='' method='get'>
                    <input type='text' minlength='11' maxlength='11' name='waktu' required autocomplete='off' placeholder='bilangan' value=<?=$_GET["waktu"]?> oninput="formatTimeInput(this)">
                    <button type='submit'>Submit</button>
                </form>
            <?php
        }else{
            ?>
                <form action='' method='get'>
                    <input type='text' minlenght='11' maxlength='11' name='waktu' required autocomplete='off' placeholder='bilangan' oninput="formatTimeInput(this)">
                    <button type='submit'>Submit</button>
                </form>
            <?php
        }
    ?>
</body>
</html>
<?php
if (isset($_GET['waktu'])) {
    $waktu = $_GET['waktu'];

    $h = substr($waktu, 0, 2);
    $m = substr($waktu, 3, 2);
    $s = substr($waktu, 6, 2);

    $h = round($h);
    $m = round($m);
    $s = round($s);

    $h1 = $h;
    $m1 = $m;
    $s1 = $s + 1;

    if($s > 59) {
        $ss = $s % 60;
        $m = $m + ($s - $ss)/60;
        $s = $ss;
    }
    if($m > 59) {
        $sm = $m % 60;
        $h = $h + ($m - $sm)/60;
        $m = $sm;
    }
    if($h > 23) $h = $h % 24;
    if($h < 10) $h = "0".$h;
    if($m < 10) $m = "0".$m;
    if($s < 10) $s = "0".$s;

    if($s1 > 59) {
        $ss1 = $s1 % 60;
        $m1 = $m1 + ($s1 - $ss1)/60;
        $s1 = $ss1;
    }
    if($m1 > 59) {
        $sm1 = $m1 % 60;
        $h1 = $h1 + ($m1 - $sm1)/60;
        $m1 = $sm1;
    }
    if($h1 > 23) $h1 = $h1 % 24;
    if($h1 < 10) $h1 = "0".$h1;
    if($m1 < 10) $m1 = "0".$m1;
    if($s1 < 10) $s1 = "0".$s1;

    echo "
        <table>
            <tr>
                <th>Data Waktu</th>
                <th>Setelah Penambahan 1 detik</th>
            </tr>
            <tr>
                <td>$h:$m:$s</td>
                <td>$h1:$m1:$s1</td>
            </tr>
        </table>
    ";
}
