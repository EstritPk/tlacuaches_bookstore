<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="home.php">
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
        <div class="d-flex justify-content-between w-100">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <?php if (isset($_SESSION["user"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="add.php">Agregar Libro</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Salir</a>
              </li> 
              <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php endif ?>
          </ul>
          <?php if (isset($_SESSION["user"])): ?>
            <div class="p-2">
              <?= $_SESSION["user"]["name_user"] ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
</nav>