<?php

require "database.php";

session_start();

// if (!isset($_SESSION["user"])) {
//   header("Location: login.php");
//   return;
// }

$books = $conn->query("SELECT * FROM books")

?>

<?php require "partials/header.php" ?>
<div class="container pt-4 p-3">
  <div class="row">
    
  <?php if ($books->rowCount() == 0): ?>
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
          <p>No books saved yet</p>
          <a href="add.php">Add One!</a>
        </div>
      </div>
  <?php endif ?>
  <?php foreach ($books as $books):  ?> 
    <div class="col-md-4 mb-3">
      <div class="card text-center">
        <div class="card-body">
          <h3 class="card-title text-capitalize"> <?= $books["name_book"] ?> </h3>
          <p class="m-2"><?= $books["author_book"] ?></p>
          <a href="edit.php?id=<?= $books["id"] ?>"" class="btn btn-secondary mb-2">Editar Libro</a>
          <a href="delete.php?id=<?= $books["id"] ?>" class="btn btn-danger mb-2">Borrar Libro</a>
        </div>
      </div>
    </div>
  <?php endforeach ?>
    
  </div>
</div>
<?php require "partials/footer.php" ?>