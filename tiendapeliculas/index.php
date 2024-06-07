
<!DOCTYPE>
<html>
<head>
<title>Login</title>

  <meta charset="utf-8">

   <link rel="shortcut icon" href="img/usuario.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>


<style>
  

body{

background-image: url(img/fondo1.jpg);
background-size: 100%;


}


</style>


<body><br><br><br><br><br><br><br>

    <div class="container formulario">

   <center> 


                
                <form action="validar.php" method="post">
                    
                    <div class="form-group">
                       <img src="img/usuario.jpg" border="1"  width="100" height="100">
                        <label class="col-xs-12" for="usuario"><h3><font color="red">Usuario</font></h3></label>
                         <div class="col-xs-10 col-xs-offset-1">
                          <input type="text" name="mail" class="form-control Input" required placeholder="">
                        
                        </div>
                    </div>




                    <div class="form-group">
                       <img src="img/contraseña.jpg" border="1"  width="100" height="100">
                         <label class="col-xs-12" for="password"><h3><font color="red">Contraseña</font></h3></label>
                           <div class="col-xs-10 col-xs-offset-1">
                            <input type="password" name="pass" class="form-control col-xs-12 Input" required placeholder="">

                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit" ame="submit" class="btn btn-success center-block btn-lg">Ingresar</button>
                        <button type="reset" class="btn center-block btn-lg"><a href="registro.php">registro</a></button>
                              <button type="reset" class="btn btn-danger center-block btn-lg">Limpiar</button>
                    </div>
                 


                </form>
            </center>
          </div>



</body>
</html>
