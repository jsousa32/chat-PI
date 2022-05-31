<?php 
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE NOT unique_id = {$outgoing_id} AND (pnome LIKE '%{$searchTerm}%' OR unome LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "Não foi encontado usuário com este nome.";
    }
    echo $output;
?>