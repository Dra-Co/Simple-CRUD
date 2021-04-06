<?php
require_once 'function.php';
$data = [
    'data1' => '',
    'data2' => '',
    'data3' => ''
];
if (isset($_POST['submit'])) {
    if (create($_POST) > 0) {
        echo "<script>
                alert('Data created successfully!')
                location.replace('index.php')
              </script>";
    } else {
        echo "<script>
        alert('Data failed to create, please try again!')
      </script>";
        $data['data1'] = $_POST['data1'];
        $data['data2'] = $_POST['data2'];
        $data['data3'] = $_POST['data3'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="row mb-4">
        <div class="col-lg-4 mx-auto text-center">
            <h1 class="display-6 mt-5 pt-5"><b>CREATE!</b></h1>
        </div>
    </div>
    <form method="post" class="col-lg-4 mx-auto position-absolute top-50 start-50 translate-middle">
        <div class="row mb-3">
            <label for="data1" class="col-sm-2 col-form-label">Data 1</label>
            <div class="col-sm-10">
                <input type="text" name="data1" id="data1" autocomplete="off" class="form-control" value="<?= $data['data1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="data2" class="col-sm-2 col-form-label">Data 2</label>
            <div class="col-sm-10">
                <input type="text" name="data2" id="data2" autocomplete="off" class="form-control" value="<?= $data['data2'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="data3" class="col-sm-2 col-form-label">Data 3</label>
            <div class="col-sm-10">
                <input type="text" name="data3" id="data3" autocomplete="off" class="form-control" value="<?= $data['data3'] ?>">
            </div>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button name="submit" class="btn btn-success">CREATE</button>
        </div>
    </form>
</body>

</html>