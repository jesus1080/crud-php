<?php 
include("db.php");

if(isset($_GET['employeeNumber'])) {
    $id = $_GET['employeeNumber'];
    $query = "SELECT * FROM employees WHERE employeeNumber = $id";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $codigo = $row['employeeNumber'];
        $nombre = $row['lastName'];
        $apellido = $row['firstName'];
        $extension = $row['extension'];
        $email = $row['email'];
        $officecode = $row['officeCode'];
        $jobtitle = $row['jobTitle'];
    }
}
if(isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officecode = $_POST['codeoffice'];
    $jobtitle = $_POST['jobtitle'];
    echo $nombre;
    $query = "UPDATE employees SET lastName = '$nombre', firstName = '$apellido', extension = '$extension', email = '$email', officeCode = '$officecode', jobTitle = '$jobtitle' WHERE employeeNumber = $id";
    $result = mysqli_query($con, $query);
    if(!$result){
        die("Fallo");
    }

    $_SESSION['message'] = 'Empleado actualizado con exito!';
    $_SESSION['message_type'] = "info";
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="cold-md-4 mx-auto">
            <h3>Editar Empleado</h3>
            <div class="card card-body">
                
                <form action="edit.php?id=<?php echo $_GET['employeeNumber']; ?>" method = "POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="apellido" value="<?php echo $apellido; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="extension" value="<?php echo $extension; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="codeoffice" value="<?php echo $officecode; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="jobtitle" value="<?php echo $jobtitle; ?>">
                    </div>
                    <button class="btn btn-success" name="edit">Editar</button>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>




