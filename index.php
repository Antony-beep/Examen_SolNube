<?php
$alert = "";
session_start();
if(!empty($_SESSION['active'])){
    header('Location: sesion.php');
}else{
    if(!empty($_POST)){
        if(empty($_POST['inputEmail'] || empty($_POST['inputPassword']))){
            $alert="Ingrese el usuario y la clave"; 
        }else{          
          $conn = mysqli_connect(
            'localhost',
            'root',
            '',
            'php_mysql_crud'
          ) or die(mysqli_erro($mysqli));
            $name= $_POST['inputEmail'];
            $key= $_POST['inputPassword'];
            $query = mysqli_query($conn,"SELECT * FROM users WHERE nombre='$name' AND clave='$key'" );
            $result = mysqli_num_rows($query);
            if($result>0){
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['clave'] = $data['clave'];

                header('Location: sesion.php');
            }else{
                $alert = "El usuario y la clave son incorrectos";
                session_destroy();    
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" 
    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar sesión</h5>
            
            

            <form class="form-signin" action="" method="POST" >
          
            <h6 class="alert"><span style="color: #F72F14;"><?php echo isset($alert)? $alert: ''; ?></span></h6>
            
              <div class="form-label-group my-2">
              <label for="inputEmail">Usario o correo</label>
                <input type="text" name="inputEmail" class="form-control" placeholder="ejemplo@gmail.com" required autofocus>
              </div>

              <div class="form-label-group my-3">
              <label for="inputPassword">Contraseña</label>
                <input type="password" name="inputPassword" class="form-control" placeholder="Contraseña" required>
              </div>

              <input type="submit" name="check_login" class="btn btn-success btn-block" value="Ingresar">
              
              <hr class="my-3">  
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>