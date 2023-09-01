<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama']) && count($_SESSION['data']) < 15) {
        $_SESSION['data'][]['nama'] = $_POST['nama'];
        $_SESSION['data'][count($_SESSION['data'])-1]['hadir'] = $_POST['hadir'];
        $_SESSION['data'][count($_SESSION['data'])-1]['mtk'] = $_POST['mtk'];
        $_SESSION['data'][count($_SESSION['data'])-1]['indo'] = $_POST['indo'];
        $_SESSION['data'][count($_SESSION['data'])-1]['ingg'] = $_POST['ingg'];
        $_SESSION['data'][count($_SESSION['data'])-1]['dpk'] = $_POST['dpk'];
        $_SESSION['data'][count($_SESSION['data'])-1]['agama'] = $_POST['agama'];
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['reset'])) {
        $_SESSION['data'] = [];
        header("Location: ".$_SERVER['PHP_SELF']);
    }
}

?>

<!DOCTYPE html>
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
            text-align: center;
            padding: 8px;
        }
        th.head{
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        form{
            padding-bottom: 15px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Input Data</h1>

    <?php if (count($_SESSION['data']) < 15) : ?>
        <form method="post" action="">
            <input type="text" name="nama" id="data" autocomplete="off" placeholder="Nama" autofocus required>
            <input type="text" name="hadir" id="data" autocomplete="off" placeholder="Kehadiran" required>
            <input type="number" name="mtk" id="data" autocomplete="off" placeholder="Matematika" required>
            <input type="number" name="indo" id="data" autocomplete="off" placeholder="Bahasa Indonesia" required>
            <input type="number" name="ingg" id="data" autocomplete="off" placeholder="Bahasa Inggris" required>
            <input type="number" name="dpk" id="data" autocomplete="off" placeholder="DPK" required>
            <input type="number" name="agama" id="data" autocomplete="off" placeholder="Agama" required>
            <button type="submit">Submit</button>
        </form>
    <?php else : ?>
        <p>Sudah mencapai batas maksimal (15 data).</p>
    <?php endif; ?>
    <form method="post" action="">
        <button type="submit" name="reset" value="1">Reset</button>
    </form>

    <table>
        <tr>
            <th class="head">Nomor</th>
            <th class="head">Nama</th>
            <th>Kehadiran</th>
            <th>Nilai</th>
            <th>Rata-rata</th>
            <th>Ranking</th>
        </tr>
        <?php
            if(count($_SESSION['data']) > 0) {
                $k=1;
                $rangking = 0;
                foreach($_SESSION['data'] as $data){
                    $rata = ($data['mtk']+$data['indo']+$data['ingg']+$data['dpk']+$data['agama'])/5;
                    if($rata >= 475/5 && $data['hadir'] == 100){
                        $juara = "Juara";
                    }else{
                        $juara = NULL;
                    }
                    echo "
                        <tr>
                            <td>".$k ."</td>
                            <td>".$data['nama'] ."</td>
                            <td>".$data['hadir'] ."%</td>
                            <td>
                                <ul>
                                    <li>Matematika : ".$data['mtk']."</li>
                                    <li>Bahasa Indonesia : ".$data['indo']."</li>
                                    <li>Bahasa Inggris : ".$data['ingg']."</li>
                                    <li>DPK : ".$data['dpk']."</li>
                                    <li>Agama : ".$data['agama']."</li>
                                </ul>
                            </td>
                            <td>".round($rata, 2)."</td>
                            <td>$juara</td>
                        </tr>
                    ";
                    $k++;
                }
            }
        ?>
    </table>
</body>
</html>
