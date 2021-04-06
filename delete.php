<?php
require_once 'function.php';
$id = $_GET['id'];
if (delete($id) > 0) {
  echo "<script>
            alert('Data deleted successfully!')
            location.replace('index.php')
          </script>";
} else {
  echo "<script>
            alert('Data failed to delete, please try again!')
            location.replace('index.php')
          </script>";
}
