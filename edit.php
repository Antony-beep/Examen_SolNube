
<?php
include("db.php");
$description = '';
$price= '';
$stock= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $description = $row['descripcion'];
    $price = $row['precio'];
    $stock = $row['stock'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  

  $query = "UPDATE articulos set descripcion = '$description', precio = $price , stock=$stock WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se edito la tarea correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: sesion.php');
}
$_SESSION['active'] = true;
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        
        <div class="form-group">
        
        <textarea name="description" class="form-control" cols="15" rows="5"><?php echo $description;?></textarea>
        </div>
        <div class="form-group">
          <input name="price" type="text" class="form-control" value="<?php echo $price; ?>" placeholder="Precio">
        </div>
        <div class="form-group">
          <input name="stock" type="text" class="form-control" value="<?php echo $stock; ?>" placeholder="Stock">
        </div>
        <button class="btn-success" name="update">
          Editar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
