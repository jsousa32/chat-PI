<?php include_once "cabeçalho.php"; ?>
    <body>
        <div class="wrapper">
            <section class="form cadastro">
                <header>FEPIChat | Projeto Integrador</header>
                <form action="#" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-txt"></div>
                    <div class="name-details">
                        <div class="field">
                            <label>Primeiro Nome</label>
                            <input type="text input" name="pnome" placeholder="Primeiro Nome" required>
                        </div>
                        <div class="field">
                            <label>Ultimo Nome</label>
                            <input type="text input" name="unome" placeholder="Ultimo Nome" required>
                        </div>
                    </div>
                    <div class="field">
                        <label>E-mail</label>
                        <input type="text input" name="email" placeholder="Insira seu e-mail" required>
                    </div>
                    <div class="field">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Insira sua nova senha" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Selecione Imagem</label>
                        <input type="file" name="imagem" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continuar para o chat">
                    </div>
                </form>
                <div class="link">Já está cadastrado? <a href="login.php">Faça login agora!</a></div>
            </section>
        </div>
        <script src="https://kit.fontawesome.com/842f587651.js" crossorigin="anonymous"></script>
        <script src="javascript/mostrar-senha.js"></script>
        <script src="javascript/chat-real-time-cadastro.js"></script>
    </body>
</html>