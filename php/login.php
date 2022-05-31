<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    
    if(!empty($email) && !empty($senha)){
        $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = "Online agora";
            $sq12 = mysqli_query($conn, "UPDATE usuario SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sq12){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "Sucesso";
            }
        }else{
            echo "E-mail ou senha incorreto!";
        }
    }else{
        echo "Todos os campos são necessários!";
    }
?>