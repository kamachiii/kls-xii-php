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
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['pabp'])) {
            echo '
                <form action="" method="get">
                    <input type="number" name="pabp" required autocomplete="off" placeholder="temperatur Farenheilt" value='.$_GET['pabp'].'>
                    <input type="number" name="mtk" required autocomplete="off" placeholder="temperatur Farenheilt" value='.$_GET['mtk'].'>
                    <input type="number" name="dpk" required autocomplete="off" placeholder="temperatur Farenheilt" value='.$_GET['dpk'].'>
                    <button type="submit">Submit</button>
                </form>
            ';
        }else{
            echo '
                <form action="" method="get">
                    <input type="number" name="pabp" required autocomplete="off" placeholder="temperatur Farenheilt">
                    <input type="number" name="mtk" required autocomplete="off" placeholder="temperatur Farenheilt">
                    <input type="number" name="dpk" required autocomplete="off" placeholder="temperatur Farenheilt">
                    <button type="submit">Submit</button>
                </form>
            ';
        }
    ?>
    <br><br>
</body>
</html>
<?php
if (isset($_GET['pabp'])) {
    $pabp = $_GET['pabp'];
    $mtk = $_GET['mtk'];
    $dpk = $_GET['dpk'];

    $nilai =[
        [
            "nilai" => $pabp,
            "mapel" => "PABP",
            "kriteria" => 'K'
        ],
        [
            "nilai" => $mtk,
            "mapel" => "Matematika",
            "kriteria" => 'K'
        ],
        [
            "nilai" => $dpk,
            "mapel" => "DPK",
            "kriteria" => 'K'
        ],
        [
            "nilai" => round(($pabp + $mtk + $dpk)/3, 2),
            "mapel" => "Rata-rata",
            "kriteria" => 'K'
        ]
    ];

    for($i = 0; $i < count($nilai); $i++){
        if($nilai[$i]['nilai'] >= 80 && $nilai[$i]['nilai'] <=100){
            $nilai[$i]['kriteria'] = "A";
        }else if($nilai[$i]['nilai'] >= 75 && $nilai[$i]['nilai'] < 80){
            $nilai[$i]['kriteria'] = "B";
        }else if($nilai[$i]['nilai'] >= 65 && $nilai[$i]['nilai'] < 75){
            $nilai[$i]['kriteria'] = "C";
        }else if($nilai[$i]['nilai'] >= 45 && $nilai[$i]['nilai'] < 65){
            $nilai[$i]['kriteria'] = "D";
        }else if($nilai[$i]['nilai'] >= 0 && $nilai[$i]['nilai'] < 45){
            $nilai[$i]['kriteria'] = "E";
        }else{
            $nilai[$i]['kriteria'] = "K";
        }
    }

    // print_r($nilai);

    echo "
        <table>
            <tr>
                <th>Mapel</th>
                <th>Nilai</th>
                <th>Kriteria</th>
            </tr>
    ";
    for($i = 0; $i < count($nilai); $i++) {
        echo "
            <tr>
                <td>".$nilai[$i]['mapel']."</td>
                <td>".$nilai[$i]['nilai']."</td>
                <td>".$nilai[$i]['kriteria']."</td>
            </tr>
        ";
        }
    echo "
        </table>
    ";
}
?>
