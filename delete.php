<?php 
include("db.php");

if(isset($_GET['employeeNumber'])) {
    $id = $_GET['employeeNumber'];
    $query = "DELETE FROM employees WHERE employeeNumber = $id";
    $result = mysqli_query($con, $query);
    if(!$result){
        die("Fallo");
    }

    $_SESSION['message'] = "Empleado eliminado con exito!";
    $_SESSION['message_type'] = "danger";

    header("Location: index.php");

}





?>