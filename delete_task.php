<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM articulos WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  $_SESSION['active'] = true;
  header('Location: sesion.php');
}

?>
