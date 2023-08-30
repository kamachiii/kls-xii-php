<?php
    if(isset($_GET['lama'])){
        $lama = $_GET['lama'];
        $awKec = $_GET['awKec'];
        $kecTam = $_GET['kecTam'];
    }else{
        $lama = 30;
        $awKec = 3;
        $kecTam = 1;
    }
?>
<html>
    <head>
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
    </head>
    <body>
        <form method="get" action="">
            <input type="text" name="awKec" placeholder="Kecepatan awal" required autocomplete="off">
            <input type="text" name="lama" placeholder="Lama waktu" required autocomplete="off">
            <input type="text" name="kecTam" placeholder="Kecepatan tambahan" required autocomplete="off">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>

<?php
    for ($i = 1; $i < $lama; $i++) {
        if ($i % 10 == 0) {
            $awKec = $awKec + $kecTam;
        }
        echo "
        <table>
            <tr>
                <th>Waktu per detik</th>
                <th>Kecepatan</th>
            </tr>
            <tr>
                <td>$i</td>
                <td>$awKec</td>
            </tr>
        </table>
        ";
    }
?>
