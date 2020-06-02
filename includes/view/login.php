<?php 
    if(isset($_SESSION)) {
        header("Location: ../../index.php");
    }
    include("../model/db.php");
    include("header.php");
?>

<h1 class="text-center mb-4 mt-4"> Iniciar sesion </h1>

<div class="text-center m-auto mt-4 w-25">
	<form method="POST" action="../model/loginCheck.php">
	  <div class="form-group">
	    <input type="text" class="form-control" name="user" id="user" placeholder="Username/e-mail">
	  </div>
	  <div class="form-group">
	    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	  </div>

	  <button type="button" onClick="document.location.href='registroV2.php'" class="mt-4 mr-5 btn-lg btn-primary">
        <i class="fas fa-user-plus"></i>
            Registrarme 
	  </button>

	  <button type="submit" class="mt-4 btn-lg btn-success ">
	  	<i class="fas fa-sign-in-alt"></i> Entrar
	  </button>
	</form>

</div>
<?php include("includes/footer.php") ?>
