<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">B0L.ME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item" <?php Util::activePage("index.php") ?>>
        <a class="nav-link" href="index.php">Főoldal</a>
      </li>


      <?php if(User::loggedin()): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Jelszó tárolás</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Új jelszó</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">jelszó lista</a>
        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fájl</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Feltöltés</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Letöltés</a>
        </div>
      </li>

    <?php endif; ?>
    
</ul>

    <ul class="navbar-nav ml-auto">
        <?php if(User::loggedin()): ?>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Kijelentkezés</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Bejelentkezés</a>
        </li>
        <?php endif; ?>
    </ul>


  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Bejelentkezés</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="login.php" method="POST">

      <div class="modal-body">
      <div class="form-group">
    <label for="passwordInput">Jelszó</label>
    <input type="password" name="password" placeholder="******" class="form-control" id="passwordInput">
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
      </div>

      </form>
    </div>
  </div>
</div>