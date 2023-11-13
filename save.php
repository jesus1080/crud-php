<?php 

include("db.php");

if(isset($_POST['save_empleado'])){

    $codigo = $_POST['numemp'];
    $nombre = $_POST['lastname'];
    $apellido = $_POST['firstname'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officecode = $_POST['codeoffice'];
    $jobtitle = $_POST['jobtitle'];


    $numero = (int)$codigo;
    
    $query = "INSERT INTO employees(employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle) VALUES ($numero,'$nombre','$apellido','$extension','$email','$officecode',NULL,'$jobtitle')";

    $result = mysqli_query($con, $query);
   
    if(!$result){
        
        die("fallo");
    }

    $_SESSION['message'] = 'Empleado guardado con exito!';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");

}




?>