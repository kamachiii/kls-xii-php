<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['kelas']) && $_POST['kelas'] != NULL) {
        $_SESSION['data'][count($_SESSION['data'])]['kelas'] = $_POST['kelas'];
        $_SESSION['data'][count($_SESSION['data'])-1]['vip'] = $_POST['vip'];
        $_SESSION['data'][count($_SESSION['data'])-1]['eks'] = $_POST['eks'];
        $_SESSION['data'][count($_SESSION['data'])-1]['eko'] = $_POST['eko'];
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

        form{
            padding-bottom: 15px;
        }

        #kelas{
            margin-left: 25px;
        }

        #vip{
            margin-left: 38px;
        }

        #eks{
            margin-left: 2px;
        }

        #eko{
            margin-left: 5px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Input Data</h1>
    <form method="post" action="">
        <label for="kelas">Nama kelas : </label>
        <input type="text" name="kelas" id="kelas" autocomplete="off" placeholder="Nama kelas" autofocus required>

        <br>

        <label for="vip">Tiket VIP : </label>
        <input type="number" name="vip" id="vip" autocomplete="off" placeholder="Terjual" required>

        <br>

        <label for="eks">Tiket Eksekutif : </label>
        <input type="number" name="eks" id="eks" autocomplete="off" placeholder="Terjual" required>

        <br>

        <label for="eko">Tiket Ekonomi : </label>
        <input type="number" name="eko" id="eko" autocomplete="off" placeholder="Terjual" required>

        <br>

        <button type="submit">Submit</button>
    </form>
    <form method="post" action="">
        <button type="submit" name="reset" value="1">Reset</button>
    </form>

    <table>
        <tr>
            <th rowspan="2">NOMOR</th>
            <th rowspan="2">KELAS</th>
            <th colspan="2">VIP</th>
            <th colspan="2">EKSEKUTIF</th>
            <th colspan="2">EKONOMI</th>
            <th rowspan="2">TOTAL</th>
        </tr>
        <tr>
            <th>TERJUAL</th>
            <th>UNTUNG</th>
            <th>TERJUAL</th>
            <th>UNTUNG</th>
            <th>TERJUAL</th>
            <th>UNTUNG</th>
        </tr>
        <?php
            if(count($_SESSION['data']) > 0) {
                $totalVip = 0;
                $totalEks = 0;
                $totalEko = 0;
                $totalVipD = 0;
                $totalEksD = 0;
                $totalEkoD = 0;

                $i = 1;

                foreach($_SESSION['data'] as $data){
                    if($data['vip'] >= 35){
                        $data['vipD'] = 0.25;
                    }elseif($data['vip'] >= 25){
                        $data['vipD'] = 0.15;
                    }else{
                        $data['vipD'] = 0.05;
                    }
                    if($data['eks'] >= 40){
                        $data['eksD'] = 0.2;
                    }elseif($data['eks'] >= 20){
                        $data['eksD'] = 0.1;
                    }else{
                        $data['eksD'] = 0.02;
                    }
                    $data['ekoD'] = 0.07;

                    $totalVip = $totalVip + $data['vip'];
                    $totalEks = $totalEks + $data['eks'];
                    $totalEko = $totalEko + $data['eko'];
                    $totalVipD = $totalVipD + $data['vipD'];
                    $totalEksD = $totalEksD + $data['eksD'];
                    $totalEkoD = $totalEkoD + $data['ekoD'];

                    echo "
                        <tr>
                            <td>$i</td>
                            <td>".$data['kelas']."</td>
                            <td>".$data['vip']."</td>
                            <td>".($data['vipD']*100)."%</td>
                            <td>".$data['eks']."</td>
                            <td>".($data['eksD']*100)."%</td>
                            <td>".$data['eko']."</td>
                            <td>".($data['ekoD']*100)."%</td>
                            <th>".(($data['vipD']+$data['eksD']+$data['ekoD'])*100)."%</th>
                        </tr>
                    ";
                    $i++;
                }
                $totalVipD = $totalVipD*100;
                $totalEksD = $totalEksD*100;
                $totalEkoD = $totalEkoD*100;
                $keuntungan = $totalVipD + $totalEksD + $totalEkoD;

            }else{
                echo "NULL";
            }
        ?>
        <tr>
            <th colspan="2">JUMLAH</th>
            <th><?= $totalVip ?></th>
            <th><?= $totalVipD."%" ?></th>
            <th><?= $totalEks ?></th>
            <th><?= $totalEksD."%" ?></th>
            <th><?= $totalEko ?></th>
            <th><?= $totalEkoD."%" ?></th>
            <th><?= $keuntungan."%" ?></th>
        </tr>
    </table>
</body>
</html>
