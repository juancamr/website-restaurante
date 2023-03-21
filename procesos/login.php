<?php
require_once "conectar.php";
conectar();
 
$username = $password = "";
$username_err = $password_err = $login_err = false;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Comprobando si el username esta vacio
    if(empty(trim($_POST["username"]))){
        echo ("hola mundo");
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        echo ('hola mundo');
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(!$username_err && !$password_err){
        // Prepare a select statement
        $sql = "SELECT id_admin, username, passwd FROM administradores WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
