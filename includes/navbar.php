<!-- Navbar's part's code -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Published questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashboard</a>
        </li>
        <?php
          if(isset($_SESSION['auth'])){
            ?>    
        <li class="nav-item">
          <a class="nav-link active" href="publish-question.php">Add a question</a>
        </li><?php
          }
        ?>


        <?php
          if(isset($_SESSION['auth'])){
            ?>
        <li class="nav-item">
          <a class="nav-link active" href="my-questions.php">My questions</a>
        </li><?php
          }
        ?>

        <?php
          if(isset($_SESSION['auth'])){
            ?><li class="nav-item">
                <a class="nav-link active" href="actions/users/logoutAction.php">Log out</a>
              </li><?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

