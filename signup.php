<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<br></br>
<form class="container" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


  <div class="mb-3">
    <label for="exampleInputPseudo" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" id="exampleInputPseudo" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" name="lastname" id="exampleInputName" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputFirstname" class="form-label">Firstname</label>
    <input type="text" class="form-control" name="firstname" id="exampleInputFirstname" aria-describedby="emailHelp">
  </div>  


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>


  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="checkbox" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="validate">Submit</button>
</form>

</body>
</html>