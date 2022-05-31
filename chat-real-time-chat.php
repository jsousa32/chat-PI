<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: usuario.php");
    }
?>

<?php include_once "chat-real-time-cabeçalho.php"; ?>
    <body>
        <div class="wrapper">
            <section class="chat-area">
                <header>
                <?php
                    include_once "php/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE unique_id = ($user_id)");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    } 
                ?>
                    <a href="chat-real-time-usuario.php" class="voltar"><i class="fas fa-arrow-left"></i></a>
                    <img src="php/imagens/<?php echo $row['imagem']; ?>" alt="">
                        <div class="details">
                            <span><?php echo $row['pnome'] . " " . $row['unome']?></span>
                            <p><?php echo $row['status']?></p>
                        </div>
                </header>
                <div class="chat-box">
                </div>
                <form action="#" class="area-texto">
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                    <input type="text" name="mensagem" class="caixa-texto" placeholder="Escreva a mensagem...">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
        <script src="https://kit.fontawesome.com/842f587651.js" crossorigin="anonymous"></script>
        <script src="javascript/chat-real-time-chat.js"></script>
    </body>
</html>