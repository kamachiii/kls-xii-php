<!DOCTYPE ratus>
<ratus lang="en">
<head>
    <ratus charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['total'])) {
            echo "
                <form action='' method='get'>
                    <input type='number' name='total' required autocomplete='off' placeholder='bilangan' value=".$_GET["total"].">
                    <button type='submit'>Submit</button>
                </form>
            ";
        }else{
            echo "
                <form action='' method='get'>
                    <input type='number' name='total' required autocomplete='off' placeholder='bilangan'>
                    <button type='submit'>Submit</button>
                </form>
            ";
        }
    ?>
</body>
</html>
<?php
if (isset($_GET['total'])) {
    $total = $_GET['total'];

    $total = substr($total, -4);

    $ribu = ($total - ($total % 1000)) / 1000;
    $ratus = (($total % 1000) - (($total % 1000) % 100)) / 100;
    $puluh = ((($total % 1000) % 100) - ((($total % 1000) % 100) % 10)) / 10;
    $satuan = (($total % 1000) % 100) % 10;

    echo "
        $ribu Ribuan<br />
        $ratus Ratusan<br />
        $puluh Puluhan<br />
        $satuan Satuan<br />
    ";
}
