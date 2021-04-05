<?php
$db = mysqli_connect('localhost', 'root', '',  'crud');
function create($data)
{
    global $db;

    $data1 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data1']));
    $data2 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data2']));
    $data3 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data3']));
    if (empty($data1) || empty($data2) || empty($data3)) {
        return false;
    }
    mysqli_query($db, "INSERT INTO crud (data1, data2, data3) VALUES ('$data1', '$data2', '$data3')");
    return mysqli_affected_rows($db);
}
function read($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}
function update($data)
{
    global $db;
    $id = $data['id'];
    $data1 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data1']));
    $data2 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data2']));
    $data3 = preg_replace('/[^\p{L}\p{N}\s]/u', '', trim($data['data3']));
    if (empty($data1) || empty($data2) || empty($data3)) {
        return false;
    }
    mysqli_query($db, "UPDATE crud SET data1 = '$data1', data2 = '$data2', data3 = '$data3' WHERE id = $id;");
    $eh = mysqli_query($db, "SELECT * FROM crud where id = $id");
    return mysqli_affected_rows($db);
}
function delete($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM crud WHERE id=$id");
    return mysqli_affected_rows($db);
}
