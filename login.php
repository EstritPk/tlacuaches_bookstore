<?php

  require "database.php";

  

  $error = null;

  // if($_SERVER["REQUEST_METHOD"] == "POST"){
  //   if (empty($_POST["name_usuario"]) || empty($_POST["email_usuario"]) || empty($_POST["password_usuario"])) {
  //     $error = "Por favor rellene todos los datos.";
  //   }else if(!str_contains($_POST["email_user"], "@")) {
  //     $error = "El Email es invalido.";
  //   }else{
  //     $statement = $conn->prepare("SELECT * FROM users WHERE email_user = :email_user");
  //     $statement->bindParam(":email_user", $_POST["email_user"]);
  //     $statement->execute();

  //     if ($statement->rowCount() > 0) {
  //       $error = "Correo ya utilizado.";
  //     }else {
  //       die("Store user");
  //     }
  //   }
  // }

  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   if (empty($_POST["email_user"]) || empty($_POST["password_user"])) {
  //     $error = "Please fill all the fileds.";
  //   } else if (!str_contains($_POST["email_user"], "@")) {
  //     $error = "Email format is incorrect.";
  //   } else {
  //     $statement = $conn->prepare("SELECT * FROM users WHERE email_user = :email_user LIMIT 1");
  //     $statement->bindParam(":email_user", $_POST["email_user"]);
  //     $statement->execute();

  //     if ($statement->rowCount() == 0) {
  //       $error = "Invalid Email.";
  //     } else {
  //       $user = $statement->fetch(PDO::FETCH_ASSOC);

  //       if (!password_verify($_POST["password_user"] , $user["password_user"])){
  //         $error "Invalid Password.";
  //       }else{
  //         session_start();

  //         unset($user["password_user"]);

  //         $_SESSION["user"] = $user;

  //         header("Location: home.php");
  //       }
  //     }
  //   }
  // }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email_user"]) || empty($_POST["password_user"])) {
      $error = "Please fill all the fileds.";
    } else if (!str_contains($_POST["email_user"], "@")) {
      $error = "Email format is incorrect.";
    } else {
      $statement = $conn->prepare("SELECT * FROM users WHERE email_user = :email_user LIMIT 1");
      $statement->bindParam(":email_user", $_POST["email_user"]);
      $statement->execute();

      if ($statement->rowCount() == 0) {
        $error = "Invalid credentials.";
      } else {
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($_POST["password_user"], $user["password_user"])) {
          $error = "Invalid credentials.";
        } else {
          session_start();

          unset($user["password_user"]);

          $_SESSION["user"] = $user;

          header("Location: home.php");
        }
      }
    }
  }
?>

<?php require "partials/header.php" ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?php if ($error != null): ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <form method="POST" action="login.php">
            
            <div class="mb-3 row">
              <label for="email_user" class="col-md-4 col-form-label text-md-end">Email Usuario</label>
              <div class="col-md-6">
                <input id="email_user" type="email" class="form-control" name="email_user" required autocomplete="email_user" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="password_user" class="col-md-4 col-form-label text-md-end">Clave Usuario</label>
              <div class="col-md-6">
                <input id="password_user" type="password" class="form-control" name="password_user" required autocomplete="password_user" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "partials/footer.php" ?>