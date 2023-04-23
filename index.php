<?php

require "database.php";

$books = $conn->query("SELECT * FROM books")

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css" integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!-- Static Content -->
  <link rel="stylesheet" href="./static/css/index.css" />

  <title>Libreria Tlacuaches</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="#">
          <img class="mr-2" src="./static/img/logo.png" />
          LibreriaTlacuaches
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Agregar Libro</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>

  <main>
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
              <a href="#" class="btn btn-secondary mb-2">Editar Libro</a>
              <a href="#" class="btn btn-danger mb-2">Borrar Libro</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
        
      </div>
    </div>
  </main>

</body>
</html>