<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $sair_id = mysqli_real_escape_string($conn, $_GET['sair_id']);
        if(isset($sair_id)){
            $status = "Ausente agora";
            $sql = mysqli_query($conn, "UPDATE usuario SET status = '{$status}' WHERE unique_id = {$sair_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../chat-real-time-login.php");
            }
        }else{
            header("location: ../chat-real-time-usuario.php");
        }
    }else{
        header("location: ../chat-real-time-login.php");
    }

?>