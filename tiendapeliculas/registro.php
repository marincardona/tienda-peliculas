<?php
    if(isset($_POST['submit'])){
      require("registrar.php");
    }
  ?>


</body>
</html>

<!DOCTYPE>
<head>
<title>Login</title>

  <meta charset="utf-8">


   <link rel="shortcut icon" href="img/registro.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>

<style>
  

body{

background-image: url(img/registro.jpg);
background-size: 100%;


}


</style>

<body>

    <div class="container formulario">
    

<br>
<br>
<br>
<center><h1><font color="black">REGISTRO</font></h1></center>
<br>
<br>
<br>
   <center> 


                
                <form action="registrar.php" method="post">
                    
                    <div class="form-group">
                       <img src="img/nombre.png" border="1"  width="50" height="40">
                        <label class="col-xs-12" for="usuario"><h3><font color="black">Nombre</font></h3></label>
                         <div class="col-xs-10 col-xs-offset-1">
                          <input type="text" name="realname" class="form-control Input" required placeholder="">
                        
                        </div>
                    </div>




                    <div class="form-group">
                        <img src="img/usuario.jpg" border="1"  width="50" height="40">
                         <label class="col-xs-12" for="password"><h3><font color="black">correo</font></h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="text" name="nick" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>


                    <div class="form-group">
                       <img src="img/pass.png" border="1"  width="50" height="40">
                         <label class="col-xs-12" for="password"><h3><font color="black">Contraseña</font></h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="password" name="pass" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>

                    
                

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary center-block btn-lg">Registrar</button>
                         <button type="reset" class="btn center-block btn-lg"><a href="index.php">Iniciar</a></button>
                              <button type="reset" class="btn btn-danger center-block btn-lg">Limpiar</button>
                    </div>
                 


                </form>
            </center>
          </div>

<?php
    if(isset($_POST['submit'])){
      require("registrar.php");
    }
  ?>


</body>
</html>




