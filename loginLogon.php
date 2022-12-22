<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style import -->
    <link rel="stylesheet" href="loginLogonPage/loginLogon.css">

    <!-- Favicon import -->
    <link rel="icon" href="assets/favicon_io/logoGuia.svg">
    

    <title>Login & Logon</title>
</head>
<body>
    <header>
        <div class="titles">
            <h1 class="logo">Econnect</h1>
            <p>Seja muito bem vindo(a) :)</p>
        </div>
    </header>

    <main>
        <div id="forms">
            <form method="POST" action="database/controller.php?action=signIn" class="form login active">
            
                <div class="field">
                    <input type="email" name="email" id="emailSignIn" class="input validation email" required placeholder="Ex: meuEmail123@gmail.com">
                    <label for="emailSignIn">Email</label>
                </div>

                <div class="field">
                    <input type="password" name="password" id="passwordSignIn" class="input validation password" required placeholder="Ex: m*nhaS*nh*3*1" minlength="8" maxlength="16">
                    <label for="passwordSignIn">Senha</label>
                </div>
    
                <button type="submit" id="loginButton">Entrar</button>
            </form>
    
            <form method="POST" action="database/controller.php?action=signUp" class="form signUp">
                <div class="field">
                    <input type="text" name="name" id="nome" required placeholder="Ex: Nome completo">
                    <label for="nome">Nome</label>
                </div>     
    
                <div class="field">
                    <input type="text" name="cpf" id="cpf" class="input validation cpf" required placeholder="Ex: 123.456.789.10" maxlength="14">
                    <label for="cpf">CPF</label>
                </div>
    
                <div class="field">
                    <input type="email" name="email" id="emailSignUp" class="input validation email" required placeholder="Ex: meuEmail123@gmail.com">
                    <label for="emailSignUp">Email</label>
                </div>
    
                <div class="field">
                    <input type="password" name="password" id="passwordSignUp" class="input validation password" required placeholder="Ex: m*nhaS*nh*3*1" minlength="8" maxlength="16">
                    <label for="passwordSignUp">Senha</label>
                </div>

                <div class="field textTerms">
                    <p>Ao se registrar, você aceita nossos <span>termos de uso</span> e a nossa <span>política de privacidade</span>.</p>
                </div>
    
                <button type="submit" id="signUpButton">Cadastrar</button>
            </form>
        </div>

        <div id="accessModel">
            <div id="toggleForm">
                <button type="button" class="toggleButton login active">Entrar</button>
                <button type="button" class="toggleButton signUp">Cadastrar</button>
            </div>
            
            <h5><a href="index.php" class="noRegister">Entrar sem login nem cadastro</a></h5>
        </div>

        <section id="vlibras">
            <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        </section>
    </main>


    <video class="video videoMobile" autoplay loop muted preload="auto" poster="assets/midia/posterMobile.png">
        <source src="assets/midia/videoBackgroundMobile.mp4" type="video/mp4">
    </video>

    <video class="video videoDesktop" autoplay loop muted preload="auto" poster="assets/midia/posterDesktop.png">
        <source src="assets/midia/videoBackgroundDesktop.mp4" type="video/mp4">
    </video>

    <script src="assets/JS/customAlert.js"></script>
    <script src="assets/JS/generalPatterns.js"></script>
    <script src="assets/JS/loginLogon.js"></script>
    <script src="assets/JS/signInSignUp.js"></script>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script src="assets/JS/vlibras.js"></script>
</body>
</html>