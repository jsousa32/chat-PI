<?php
    session_start();
    include_once "config.php";
    $pnome = mysqli_real_escape_string($conn, $_POST['pnome']);
    $unome = mysqli_real_escape_string($conn, $_POST['unome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    if(!empty($pnome) && !empty($unome) && !empty($email) && !empty($senha)){
        /*Verficar se o e-mail é válido*/
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM usuario WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - já está cadastrado!";
            }else{
                if(isset($_FILES['imagem'])){
                    $imagem_name = $_FILES['imagem']['name'];
                    $tmp_name = $_FILES['imagem']['tmp_name'];

                    $imagem_explode = explode('.',$imagem_name);
                    $imagem_exit = end($imagem_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if(in_array($imagem_exit, $extensions) === true){
                        $time = time();
                        $new_imagem_name = $time.$imagem_name;
                        if (move_uploaded_file($tmp_name,"imagens/".$new_imagem_name)){
                            $status = "Online agora";
                            $random_id = rand(time(), 100000000);
                            
                            $sq12 = mysqli_query($conn, "INSERT INTO usuario (unique_id, pnome, unome, email, senha, imagem, status)
                                                 VALUES ({$random_id}, '{$pnome}', '{$unome}', '{$email}', '{$senha}', '{$new_imagem_name}', '{$status}')");
                            if($sq12){
                                $sq13 = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '{$email}'");
                                if(mysqli_num_rows($sq13) > 0){
                                    $row = mysqli_fetch_assoc($sq13);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "Sucesso";
                                }
                            }else{
                                echo "Alguma coisa está errada!";
                            }
                        }
                    }else{
                        echo "Por favor selecione uma imagem no formato jpeg, png ou jpg!";
                    }
                }else{
                    echo "Por favor selecione uma imagem!";
                }
            }
        }else{
            echo "$email - Este e-mail não é válido!";
        }
    }else{
        echo "Todos os campos são necessários!";
    };
?>