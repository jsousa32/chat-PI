<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: usuario.php");
    }
?>

<?php include_once "chat-real-time-cabeçalho.php"; ?>
    <body>
        <div class="wrapper">
            <section class="usuario">
                <header>
                <?php
                    include_once "php/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    } 
                ?>
                    <div class="content">
                        <img src="php/imagens/<?php echo $row['imagem']?>" alt="">
                        <div class="details">
                            <span><?php echo $row['pnome'] . " " . $row['unome']?></span>
                            <p><?php echo $row['status']?></p>
                        </div>
                    </div>
                    <a href="php/sair.php?sair_id=<?php echo $row['unique_id'] ?>" class="sair">Sair</a>
                </header>
                <div class="search">
                    <span class="text">Busque um usuário para começar a conversar</span>
                    <input class="text" placeholder="Insira um nome para buscar...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="usuario-list">
                </div>
            </section>
        </div>
        <script src="https://kit.fontawesome.com/842f587651.js" crossorigin="anonymous"></script>
        <script src="javascript/chat-real-time-usuario.js"></script>
    </body>
</html>