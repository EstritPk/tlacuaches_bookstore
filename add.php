<?php

  require "database.php";

  // if (!isset($_SESSION["user"])) {
  //   header("Location: login.php");
  //   return;
  // }

  $error = null;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name_book"]) || empty($_POST["author_book"])) {
      $error = "Please complete the fields.";
    }else if (strlen($_POST["name_book"]) < 2){
      $error = "Debe ingresar un nombre real,.";
    }else{
      $name_book = $_POST["name_book"];
      $author_book = $_POST["author_book"];

      $statement = $conn->prepare("INSERT INTO books (name_book, author_book) VALUES (:name_book, :author_book)");
      $statement->bindParam(":name_book", $_POST["name_book"]);
      $statement->bindParam(":author_book", $_POST["author_book"]);
      $statement->execute();

      $_SESSION["flash"] = ["message" => "Book {$_POST['name_book']} added."];

      header("Location: home.php");
      return;
    }
  }
?>

<?php require "partials/header.php" ?>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Agregar Nuevo Libro</div>
        <div class="card-body">
          <?php if ($error != null): ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <form method="POST" action="add.php">
            <div class="mb-3 row">
              <label for="name_book" class="col-md-4 col-form-label text-md-end">Nombre</label>
              <div class="col-md-6">
                <input id="name_book" type="text" class="form-control" name="name_book" required autocomplete="name_book" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="author_book" class="col-md-4 col-form-label text-md-end">Autor</label>
              <div class="col-md-6">
                <input id="author_book" type="tel" class="form-control" name="author_book" required autocomplete="author_book" autofocus>
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