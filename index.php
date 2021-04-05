<?php require_once 'function.php';
session_start();

?>
<?php $order = 'ASC' ?>
<?php if (isset($_POST['desc'])) {
    $_SESSION['order'] = 'DESC';
} else if (isset($_POST['asc'])) {
    $_SESSION['order'] = 'ASC';
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <a href="create.php" class="btn btn-success mt-3">CREATE</a>
        <br><br>
        <form method="post">
            <button name="asc" class="btn btn-primary">ASCENDING</button>
            <button name="desc" class="btn btn-primary">DESCENDING</button>
        </form>
        <?php
        if (isset($_SESSION['order'])) {
            $order = $_SESSION['order'];
            $datas = read("SELECT * FROM crud ORDER BY id $order");
        } else {
            $datas = read("SELECT * FROM crud");
        } ?>
        <br><br>
        <table cellpadding="10" cellspacing="0" border="1" class="table table-success table-striped">
            <tr>
                <th>No</th>
                <th>Data 1</th>
                <th>Data 2</th>
                <th>Data 3</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($datas as $data) :
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['data1'] ?></td>
                    <td><?= $data['data2'] ?></td>
                    <td><?= $data['data3'] ?></td>
                    <td><a href="update.php?id=<?= $data['id'] ?>" class="btn btn-warning">UPDATE</a> | <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php $no++ ?>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>