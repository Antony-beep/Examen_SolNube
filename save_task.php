<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $query = "INSERT INTO articulos(descripcion,precio,stock) VALUES ('$description',$price, $stock)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se guardo correctamente';
  $_SESSION['message_type'] = 'success';
  $_SESSION['active'] = true;
  header('Location: sesion.php');

}

?>
