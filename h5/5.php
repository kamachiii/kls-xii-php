<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data']) && count($_SESSION['data']) < 20) {
        $inputData = $_POST['data'];
        $_SESSION['data'][] = $inputData;
    } elseif (isset($_POST['reset'])) {
        $_SESSION['data'] = [];
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
            text-align: left;
            padding: 8px;
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

    <?php if (count($_SESSION['data']) < 20) : ?>
        <form method="post" action="">
            <input type="text" name="data" id="data" autocomplete="off" autofocus required>
            <button type="submit">Submit</button>
        </form>
    <?php else : ?>
        <p>Sudah mencapai batas maksimal (20 data).</p>
    <?php endif; ?>
    <form method="post" action="">
        <button type="submit" name="reset" value="1">Reset</button>
    </form>

    <table>
        <tr>
            <th>Bilangan hasil input</th>
            <td>
                <?php
                    if(count($_SESSION['data']) > 0) {
                        for($i = 0; $i < count($_SESSION['data']); $i++) {
                            if($i != count($_SESSION['data'])-1) {
                                echo $_SESSION['data'][$i].", ";
                            }else{
                                echo $_SESSION['data'][$i];
                            }
                        }
                    }else{
                        echo "NULL";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <th>Bilangan terbesar</th>
            <td>
                <?php echo count($_SESSION['data']) > 0 ? max($_SESSION['data']) : "NULL"?>
            </td>
        </tr>
        <tr>
            <th>Bilangan terkecil</th>
            <td>
                <?php  echo count($_SESSION['data']) > 0 ? min($_SESSION['data']) : "NULL" ?>
            </td>
        </tr>
        <tr>
            <th>Rata rata</th>
            <td>
                <?php  echo count($_SESSION['data']) > 0 ? round(array_sum($_SESSION['data'])/count($_SESSION['data']), 2) : "NULL" ?>
            </td>
        </tr>
    </table>
</body>
</html>
