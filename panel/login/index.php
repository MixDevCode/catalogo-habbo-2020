<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: ../index.php");
  exit;
}
?>

<?php
 
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'rareshl');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingresa el usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa la contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, nombre, contrasena FROM users WHERE nombre = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: ../index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que ingresaste es inválida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontró una cuenta con ese usuario.";
                }
            } else{
                echo "Oops! Algo salió mal. Por favor intenta de nuevo más tarde.";
            }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        }

      
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<html>
<head>
<title>Panel de Administración - Inicio de Sesión</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
            <h2>Catálogo</h2>
            <p>Panel de Administración, por favor logueate para ingresar.</p>
			<br>
			<img src="https://habtium.ams3.cdn.digitaloceanspaces.com/album/3/Galeria_Habbo/Frank/register9.gif" />
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                     <label>Usuario</label>
                     <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
					 <br>
					 <span class="help-block"><?php echo $username_err; ?></span>
                  </div>
                  <div class="form-group ?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                     <label>Contraseña</label>
                     <input type="password" name="password" class="form-control">
					 <br>
					 <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                  <button type="submit" class="btn btn-black">Entrar</button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>