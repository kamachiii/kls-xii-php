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
    <table>
        <tr>
            <th>Ganjil</th>
            <th>Genap</th>
        </tr>
        <?php if(isset($_GET['a'])){
        $a = $_GET['a'];
        $b = $_GET['b'];
        if($a < $b){
            for($a; $a <= $b; $a++){?>
        <tr>
            <td><?php if($a % 2 == 1) echo "$a bilangan ganjil <br />"; ?></td>
            <td><?php if($a % 2 == 0) echo "$a bilangan genap <br />"; ?></td>
        </tr>
        <?php }}else{
            for($a; $a >= $b; $a--){?>
                <tr>
                    <td><?php if($a % 2 == 1) echo "$a bilangan ganjil <br />"; ?></td>
                    <td><?php if($a % 2 == 0) echo "$a bilangan genap <br />"; ?></td>
                </tr>
        <?php }}}?>
    </table>
</body>
</html>
