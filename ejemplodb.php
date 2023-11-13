<?php
    $con = mysqli_connect(
        'localhost',
        'root',
        '',
        'classicmodels'
    );
    if(isset($con)){
        echo "La BD esta conectada";
    }
?>   