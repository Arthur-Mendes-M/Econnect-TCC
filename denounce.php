<?php
    require "database/userData.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style import -->
    <link rel="stylesheet" href="denuncePage/denunce.css">

    <!-- Favicon import -->
    <link rel="icon" href="assets/favicon_io/logoGuia.svg">

    <title>Denúncia | Econnect</title>


    <?php if(isset($userId) && isset($photoPath)) {?>
        
        <style>
            .userPhotoContainer {
                background-image: url('mediaFilesDB/<?php echo $photoPath?>');
            }
        </style>

    <?php } ?>
</head>
<body>

    <header>
        <div id="topHeader">
            <div id="user">
                <?php if(isset($userId)) {?> 
                    <a href="perfil.php"><h4><span><?php echo $message ?>, </span><?php echo $userName ?></h4></a>
                <?php } else { ?>
                    <a href="loginLogon.php"><h4><span>Faça login</span></h4></a>
                <?php } ?>
            </div>
    
            <div class="userPhotoContainer skeleton">
                <div class="circle" data-count="1"></div>
                <div class="circle" data-count="2"></div>
                <div class="circle" data-count="3"></div>
                <div class="circle" data-count="4"></div>
            </div>
        </div>
    </header>

    <section id="bottomMenu">
        <nav>
            <ul>
                <li>
                    <a href="index.php" class="link home">
                        <svg class="skeleton" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    </a>
                </li>

                <li>
                    <a href="map.php" class="link map">
                        <svg class="skeleton" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </a>
                </li>

                <li>
                    <a href="denounce.php" class="link denounce">
                        <svg class="skeleton" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                    </a>
                </li>

                <li>
                    <a href="perfil.php" class="link perfil">
                        <svg class="skeleton"xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </a>
                </li>

                <li>
                    <a href="settings.php" class="link settings">
                        <svg class="skeleton" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </a>
                </li>

                <div class="changeThemeContainer">
                    <button class="theme dark skeleton" title="Tema escuro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32" fill="none" class="feather">
                        <path d="M27.9999 17.0533C27.7901 19.3229 26.9383 21.4859 25.5442 23.2891C24.15 25.0922 22.2712 26.4611 20.1275 27.2354C17.9838 28.0097 15.6638 28.1575 13.4392 27.6615C11.2146 27.1654 9.17719 26.0461 7.5655 24.4344C5.95381 22.8227 4.83445 20.7853 4.33841 18.5607C3.84237 16.336 3.99016 14.0161 4.76448 11.8724C5.53881 9.72868 6.90764 7.84982 8.71082 6.45567C10.514 5.06152 12.6769 4.20974 14.9465 4C13.6178 5.79769 12.9783 8.0126 13.1446 10.2419C13.3108 12.4712 14.2717 14.5667 15.8524 16.1475C17.4331 17.7282 19.5287 18.689 21.758 18.8553C23.9873 19.0215 26.2022 18.3821 27.9999 17.0533V17.0533Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <button class="theme light skeleton" title="Tema claro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32" fill="none" class="feather">
                        <path d="M15.9997 22.6673C19.6816 22.6673 22.6663 19.6825 22.6663 16.0007C22.6663 12.3188 19.6816 9.33398 15.9997 9.33398C12.3178 9.33398 9.33301 12.3188 9.33301 16.0007C9.33301 19.6825 12.3178 22.6673 15.9997 22.6673Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 1.33398V4.00065" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 28V30.6667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.62695 5.62695L7.52029 7.52029" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.4805 24.4805L26.3738 26.3738" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1.33301 16H3.99967" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M28 16H30.6667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.62695 26.3738L7.52029 24.4805" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.4805 7.52029L26.3738 5.62695" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <section class="moreComplaints copy">
                    <a href="complaintsTimeLine.php">
                        <button type="button" id="seeMoreComplaints" class="skeleton">Ver denúncias</button>
                    </a>
                </section>
            </ul>
        </nav>
    </section>

    <main>
        <section class="disposalSection">

            <div class="title">
                <a href="#">
                    <h3 class="skeleton">Formas de descarte</h3>
                    <p class="skeleton">Selecionar forma de descarte</p>
                </a>
            </div>

            <div class="disposalCards">
                <div class="disposalCard skeleton" aria-bot="descartar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M13.9997 25.6673C20.443 25.6673 25.6663 20.444 25.6663 14.0007C25.6663 7.55733 20.443 2.33398 13.9997 2.33398C7.55635 2.33398 2.33301 7.55733 2.33301 14.0007C2.33301 20.444 7.55635 25.6673 13.9997 25.6673Z" stroke="url(#paint0_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 9.33398V18.6673" stroke="url(#paint1_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.33301 14H18.6663" stroke="url(#paint2_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_462_1570" x1="13.9997" y1="2.33398" x2="13.9997" y2="25.6673" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_462_1570" x1="14.5" y1="9.33398" x2="14.5" y2="18.6673" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_462_1570" x1="13.9997" y1="14" x2="13.9997" y2="15" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    </defs>
                    </svg>

                    <p title="Descartar no Ecoponto">Descartar no Ecoponto</p>
                </div>

                <div class="disposalCard skeleton" aria-bot="retirada">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M13.9997 25.6673C20.443 25.6673 25.6663 20.444 25.6663 14.0007C25.6663 7.55733 20.443 2.33398 13.9997 2.33398C7.55635 2.33398 2.33301 7.55733 2.33301 14.0007C2.33301 20.444 7.55635 25.6673 13.9997 25.6673Z" stroke="url(#paint0_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 9.33398V18.6673" stroke="url(#paint1_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.33301 14H18.6663" stroke="url(#paint2_linear_462_1570)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_462_1570" x1="13.9997" y1="2.33398" x2="13.9997" y2="25.6673" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_462_1570" x1="14.5" y1="9.33398" x2="14.5" y2="18.6673" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_462_1570" x1="13.9997" y1="14" x2="13.9997" y2="15" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    </defs>
                    </svg>

                    <p title="Solicitar retirada">Solicitar retirada</p>
                </div>
            </div>

        </section>

        <section id="mapSearchTrashPoints">
            <div class="title">
                <h3 class="skeleton">Adicionar denúncia</h3>
                <p class="skeleton">
                    Preencha as informações abaixo
                </p>
            </div>

            <div class="mapouter">
                <div class="gmap_canvas skeleton" id="mapDenounce">
                </div>
            </div> 
        </section>

        <section id="formTrashPoint">
            <form enctype="multipart/form-data" action="database/controller.php?action=createComplaint" method="POST" class="form">

                <div class="fieldContainer">
                    <div class="field skeleton">
                        <input type="text" name="address" id="address" required placeholder="Ex: Rua X, Carapicuíba, SP" tabindex="1" <?php if(!isset($_SESSION['user_id'])) {echo 'disabled';}?>>
                        <label for="address">Endereço <span>*</span></label>
                    </div>

                    <div class="field skeleton">
                        <input type="number" min="0" name="numberAddress" id="numberAddress" class="input validation" required placeholder="Ex: 021" tabindex="2" <?php if(!isset($_SESSION['user_id'])) {echo 'disabled';}?>>
                        <label for="numberAddress">Número <span>*</span></label>
                    </div>
                </div>     
    
                <div class="field skeleton">
                    <input type="text" name="complement" id="complement" class="input validation" required placeholder="Ex: Em frente ao X de número Y" tabindex="3" <?php if(!isset($_SESSION['user_id'])) {echo 'disabled';}?>>
                    <label for="complement">Referência <span>*</span></label>
                </div>

                <div class="field skeleton">
                    <textarea cols="20" rows="5" maxlength="250" name="description" id="description" class="input" placeholder="Escreva uma breve descrição sobre a denúncia" spellcheck="true" tabindex="4" <?php if(!isset($_SESSION['user_id'])) {echo 'disabled';}?>></textarea>
                </div>

                <div class="typeFilesTrashPoint">
                    <div class="fileField skeleton">
                        <input type="file" id="fileTrashPoint" name="fileTrashPoint" <?php if(!isset($_SESSION['user_id'])) {echo 'disabled';}?>></input>

                        <label for="fileTrashPoint" tabindex="5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M24.5 17.5V22.1667C24.5 22.7855 24.2542 23.379 23.8166 23.8166C23.379 24.2542 22.7855 24.5 22.1667 24.5H5.83333C5.21449 24.5 4.621 24.2542 4.18342 23.8166C3.74583 23.379 3.5 22.7855 3.5 22.1667V17.5" stroke="url(#paint0_linear_752_1724)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.16663 11.666L14 17.4993L19.8333 11.666" stroke="url(#paint1_linear_752_1724)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 17.5V3.5" stroke="url(#paint2_linear_752_1724)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <defs>
                                <linearGradient id="paint0_linear_752_1724" x1="14" y1="17.5" x2="14" y2="24.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#00D76E"/>
                                <stop offset="0.0001" stop-color="#00D76E"/>
                                <stop offset="1" stop-color="#1ABD00"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_752_1724" x1="14" y1="11.666" x2="14" y2="17.4993" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#00D76E"/>
                                <stop offset="0.0001" stop-color="#00D76E"/>
                                <stop offset="1" stop-color="#1ABD00"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_752_1724" x1="14.5" y1="3.5" x2="14.5" y2="17.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#00D76E"/>
                                <stop offset="0.0001" stop-color="#00D76E"/>
                                <stop offset="1" stop-color="#1ABD00"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            
                            Arquivo de imagem
                        </label>
                    </div>
                </div>

                <button type="submit" id="registerTrashPoint" class="skeleton" tabindex="6"><?php if(!isset($_SESSION['user_id'])) {echo 'Faça login';}else {echo 'Confirmar';} ?></button>
            </form>
        </section>

        <section class="moreComplaints">
            <a href="complaintsTimeLine.php">
                <button type="button" id="seeMoreComplaints" class="skeleton">Ver denúncias</button>
            </a>
        </section>

        <section id="typesGarbage">
            <div class="title">
                <a href="infosWaste.html" target="_blank">
                    <h3 class="skeleton">
                        Você sabe os tipos de resíduos ?
                    </h3>
                </a>
            </div>

            <a href="infosWaste.html" target="_blank" class="cards">
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.089 6.25388L5.16707 14.4257V23.2455C5.16707 23.4739 5.25779 23.6929 5.41927 23.8544C5.58075 24.0158 5.79976 24.1066 6.02812 24.1066L12.0587 24.091C12.2863 24.0898 12.5042 23.9986 12.6647 23.8372C12.8253 23.6759 12.9154 23.4575 12.9154 23.2299V18.0792C12.9154 17.8509 13.0061 17.6319 13.1676 17.4704C13.3291 17.3089 13.5481 17.2182 13.7764 17.2182H17.2206C17.449 17.2182 17.668 17.3089 17.8295 17.4704C17.991 17.6319 18.0817 17.8509 18.0817 18.0792V23.2261C18.0813 23.3394 18.1033 23.4517 18.1464 23.5565C18.1896 23.6613 18.2529 23.7565 18.3329 23.8367C18.4129 23.917 18.5079 23.9806 18.6126 24.0241C18.7172 24.0675 18.8294 24.0899 18.9427 24.0899L24.9711 24.1066C25.1995 24.1066 25.4185 24.0158 25.58 23.8544C25.7414 23.6929 25.8321 23.4739 25.8321 23.2455V14.4198L15.9124 6.25388C15.7958 6.15987 15.6505 6.10861 15.5007 6.10861C15.3509 6.10861 15.2056 6.15987 15.089 6.25388V6.25388ZM30.7616 11.8082L26.2627 8.09974V0.645784C26.2627 0.474511 26.1946 0.310254 26.0735 0.189146C25.9524 0.0680378 25.7882 0 25.6169 0H22.6032C22.432 0 22.2677 0.0680378 22.1466 0.189146C22.0255 0.310254 21.9574 0.474511 21.9574 0.645784V4.55331L17.1394 0.589278C16.677 0.208792 16.0968 0.000760596 15.498 0.000760596C14.8992 0.000760596 14.319 0.208792 13.8566 0.589278L0.234365 11.8082C0.168973 11.8622 0.114871 11.9286 0.0751508 12.0036C0.0354309 12.0785 0.0108711 12.1606 0.0028749 12.2451C-0.00512131 12.3295 0.00360275 12.4147 0.0285486 12.4958C0.0534944 12.5769 0.0941732 12.6523 0.14826 12.7176L1.52055 14.3859C1.57449 14.4515 1.64084 14.5058 1.71579 14.5457C1.79075 14.5856 1.87284 14.6104 1.95736 14.6185C2.04189 14.6267 2.1272 14.6181 2.2084 14.5932C2.28959 14.5683 2.36509 14.5277 2.43057 14.4736L15.089 4.04745C15.2056 3.95345 15.3509 3.90219 15.5007 3.90219C15.6505 3.90219 15.7958 3.95345 15.9124 4.04745L28.5714 14.4736C28.6367 14.5277 28.7121 14.5684 28.7932 14.5933C28.8743 14.6183 28.9595 14.627 29.0439 14.619C29.1284 14.611 29.2104 14.5865 29.2854 14.5467C29.3604 14.507 29.4268 14.4529 29.4808 14.3875L30.8531 12.7192C30.9071 12.6535 30.9477 12.5777 30.9723 12.4963C30.997 12.4149 31.0053 12.3293 30.9968 12.2447C30.9883 12.16 30.9631 12.0779 30.9228 12.003C30.8824 11.928 30.8277 11.8618 30.7616 11.8082V11.8082Z" fill="url(#paint0_linear_804_1831)"/>
                            <defs>
                            <linearGradient id="paint0_linear_804_1831" x1="15.5" y1="0" x2="15.5" y2="24.1066" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Doméstico</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.875 9H22.5V1.125C22.5 0.503437 21.9966 0 21.375 0H14.625C14.0034 0 13.5 0.503437 13.5 1.125V4.5H10.5V0.75C10.5 0.335625 10.1644 0 9.75 0H9C8.58562 0 8.25 0.335625 8.25 0.75V4.5H5.25V0.75C5.25 0.335625 4.91438 0 4.5 0H3.75C3.33562 0 3 0.335625 3 0.75V4.5H1.125C0.503437 4.5 0 5.00344 0 5.625V22.5C0 23.3283 0.671719 24 1.5 24H28.5C29.3283 24 30 23.3283 30 22.5V10.125C30 9.50344 29.4961 9 28.875 9ZM6 18.9375C6 19.2483 5.74828 19.5 5.4375 19.5H3.5625C3.25172 19.5 3 19.2483 3 18.9375V17.0625C3 16.7517 3.25172 16.5 3.5625 16.5H5.4375C5.74828 16.5 6 16.7517 6 17.0625V18.9375ZM6 14.4375C6 14.7483 5.74828 15 5.4375 15H3.5625C3.25172 15 3 14.7483 3 14.4375V12.5625C3 12.2517 3.25172 12 3.5625 12H5.4375C5.74828 12 6 12.2517 6 12.5625V14.4375ZM6 9.9375C6 10.2483 5.74828 10.5 5.4375 10.5H3.5625C3.25172 10.5 3 10.2483 3 9.9375V8.0625C3 7.75172 3.25172 7.5 3.5625 7.5H5.4375C5.74828 7.5 6 7.75172 6 8.0625V9.9375ZM12 18.9375C12 19.2483 11.7483 19.5 11.4375 19.5H9.5625C9.25172 19.5 9 19.2483 9 18.9375V17.0625C9 16.7517 9.25172 16.5 9.5625 16.5H11.4375C11.7483 16.5 12 16.7517 12 17.0625V18.9375ZM12 14.4375C12 14.7483 11.7483 15 11.4375 15H9.5625C9.25172 15 9 14.7483 9 14.4375V12.5625C9 12.2517 9.25172 12 9.5625 12H11.4375C11.7483 12 12 12.2517 12 12.5625V14.4375ZM12 9.9375C12 10.2483 11.7483 10.5 11.4375 10.5H9.5625C9.25172 10.5 9 10.2483 9 9.9375V8.0625C9 7.75172 9.25172 7.5 9.5625 7.5H11.4375C11.7483 7.5 12 7.75172 12 8.0625V9.9375ZM19.5 14.4375C19.5 14.7483 19.2483 15 18.9375 15H17.0625C16.7517 15 16.5 14.7483 16.5 14.4375V12.5625C16.5 12.2517 16.7517 12 17.0625 12H18.9375C19.2483 12 19.5 12.2517 19.5 12.5625V14.4375ZM19.5 9.9375C19.5 10.2483 19.2483 10.5 18.9375 10.5H17.0625C16.7517 10.5 16.5 10.2483 16.5 9.9375V8.0625C16.5 7.75172 16.7517 7.5 17.0625 7.5H18.9375C19.2483 7.5 19.5 7.75172 19.5 8.0625V9.9375ZM19.5 5.4375C19.5 5.74828 19.2483 6 18.9375 6H17.0625C16.7517 6 16.5 5.74828 16.5 5.4375V3.5625C16.5 3.25172 16.7517 3 17.0625 3H18.9375C19.2483 3 19.5 3.25172 19.5 3.5625V5.4375ZM27 18.9375C27 19.2483 26.7483 19.5 26.4375 19.5H24.5625C24.2517 19.5 24 19.2483 24 18.9375V17.0625C24 16.7517 24.2517 16.5 24.5625 16.5H26.4375C26.7483 16.5 27 16.7517 27 17.0625V18.9375ZM27 14.4375C27 14.7483 26.7483 15 26.4375 15H24.5625C24.2517 15 24 14.7483 24 14.4375V12.5625C24 12.2517 24.2517 12 24.5625 12H26.4375C26.7483 12 27 12.2517 27 12.5625V14.4375Z" fill="url(#paint0_linear_804_1837)"/>
                            <defs>
                            <linearGradient id="paint0_linear_804_1837" x1="15" y1="0" x2="15" y2="24" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Público</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="23" height="28" viewBox="0 0 23 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.0128 7.05469C19.3461 7.31008 20.4396 8.0757 21.2944 9.35156C22.0465 10.482 22.5593 11.9038 22.8325 13.6172C23.0722 15.1851 23.0542 16.7524 22.7811 18.3203C22.3709 20.9087 21.5505 23.0781 20.32 24.8281C18.8496 26.9429 17.004 28 14.7821 28C14.2348 28 13.6372 27.8179 12.9873 27.4531C12.5427 27.1616 12.0473 27.0156 11.5 27.0156C10.9527 27.0156 10.4578 27.1616 10.0127 27.4531C9.36278 27.8179 8.7652 28 8.21793 28C5.996 28 4.15038 26.9429 2.68004 24.8281C1.44946 23.0781 0.629069 20.9087 0.218874 18.3203C-0.0542468 16.7524 -0.0722153 15.1851 0.167536 13.6172C0.440657 11.9038 0.953528 10.482 1.70564 9.35156C2.56042 8.0757 3.65393 7.31008 4.9872 7.05469C5.80758 6.90867 6.93549 7.03664 8.37143 7.4375C9.60201 7.80227 10.6447 8.23977 11.4995 8.75C12.3543 8.23977 13.397 7.80227 14.6275 7.4375C16.064 7.03664 17.1924 6.90867 18.0128 7.05469ZM15.1923 4.8125C14.7138 5.28664 14.0808 5.63281 13.2948 5.85156C12.7475 6.03367 12.1499 6.125 11.5 6.125L10.7309 6.07031C10.6627 5.56008 10.6627 4.97656 10.7309 4.32031C10.868 3.00781 11.2608 2.00539 11.9102 1.3125C12.3887 0.838359 13.0217 0.492188 13.8077 0.273438C14.3549 0.0913281 14.9525 0 15.6025 0L16.3715 0.0546875L16.4228 0.875C16.4228 1.56789 16.3371 2.20555 16.1667 2.78906C15.9618 3.62742 15.6374 4.30227 15.1923 4.8125Z" fill="url(#paint0_linear_804_1840)"/>
                            <defs>
                            <linearGradient id="paint0_linear_804_1840" x1="11.5" y1="0" x2="11.5" y2="28" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Orgânico</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.3288 9.82788L14.46 12.9647C14.6343 13.139 14.6343 13.4257 14.46 13.5999L13.8248 14.2352C13.6505 14.4094 13.3638 14.4094 13.1896 14.2352L10.0584 11.0983L7.5118 13.6449L10.6486 16.7817C10.8229 16.956 10.8229 17.2427 10.6486 17.417L10.0134 18.0522C9.83912 18.2265 9.55242 18.2265 9.37815 18.0522L6.24133 14.9098L4.75724 16.3939C3.78471 17.3664 3.31812 18.7043 3.46428 20.0703L3.86341 23.6457L0.130701 27.3784C-0.043567 27.5526 -0.043567 27.8393 0.130701 28.0136L0.765936 28.6488C0.940205 28.8231 1.2269 28.8231 1.40117 28.6488L5.12826 24.9217L8.70357 25.3209C10.0471 25.467 11.3963 25.0173 12.3801 24.0279L22.6057 13.8023L14.9772 6.17387L11.3288 9.82788ZM28.6545 4.58297L24.2022 0.130701C24.0279 -0.043567 23.7412 -0.043567 23.567 0.130701L22.9317 0.765936C22.7574 0.940205 22.7574 1.2269 22.9317 1.40117L24.5226 2.99207L21.9761 5.53863L18.7943 2.35684L17.8386 1.40117C17.6643 1.2269 17.3776 1.2269 17.2034 1.40117L15.2976 3.30688C15.1234 3.48115 15.1234 3.76785 15.2976 3.94211L16.2533 4.89778L23.8818 12.5375L24.8374 13.4931C25.0117 13.6674 25.2984 13.6674 25.4727 13.4931L27.3784 11.5818C27.5526 11.4075 27.5526 11.1208 27.3784 10.9466L23.2465 6.81473L25.7931 4.26816L27.384 5.85906C27.5583 6.03333 27.845 6.03333 28.0192 5.85906L28.6545 5.22383C28.8287 5.04394 28.8287 4.76286 28.6545 4.58297V4.58297Z" fill="url(#paint0_linear_804_1846)"/>
                            <defs>
                            <linearGradient id="paint0_linear_804_1846" x1="14.3926" y1="0" x2="14.3926" y2="28.7795" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Hospitalar</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="29" height="23" viewBox="0 0 29 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.8119 18.5413H17.0054C16.9724 19.4242 16.3498 19.9675 15.5462 19.9675H12.8363C12.0033 19.9675 11.3646 19.1889 11.3757 18.5413H0.713126C0.320907 18.5413 0 18.8622 0 19.2544V19.9675C0 21.5364 1.28363 22.82 2.85251 22.82H25.6726C27.2414 22.82 28.5251 21.5364 28.5251 19.9675V19.2544C28.5251 18.8622 28.2041 18.5413 27.8119 18.5413ZM25.6726 2.13938C25.6726 0.962721 24.7098 0 23.5332 0H4.99188C3.81523 0 2.85251 0.962721 2.85251 2.13938V17.115H25.6726V2.13938ZM22.82 14.2625H5.70501V2.85251H22.82V14.2625Z" fill="url(#paint0_linear_806_1849)"/>
                            <defs>
                            <linearGradient id="paint0_linear_806_1849" x1="14.2625" y1="0" x2="14.2625" y2="22.82" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Eletrônico</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.2419 14.5H22.8667C23.4046 14.5 23.8548 14.0498 23.8022 13.5177C23.5333 10.9685 22.2236 8.73508 20.3234 7.21492C19.879 6.85827 19.2242 6.95181 18.9202 7.4371L16.4821 11.3427C17.5345 11.9976 18.2419 13.1669 18.2419 14.5V14.5ZM12.5238 17.6631L10.0798 21.5746C9.79335 22.0306 9.93952 22.6504 10.419 22.8901C11.6526 23.4982 13.0325 23.8548 14.5 23.8548C15.9675 23.8548 17.3474 23.4982 18.5869 22.8901C19.0663 22.6504 19.2067 22.0306 18.926 21.5746L16.4821 17.6631C15.9091 18.0256 15.2308 18.2419 14.5058 18.2419C13.7808 18.2419 13.0968 18.0256 12.5238 17.6631V17.6631ZM6.13327 14.5H10.7581C10.7581 13.1669 11.4655 11.9976 12.5238 11.3369L10.0857 7.43125C9.78165 6.94597 9.12681 6.85242 8.68246 7.20907C6.77641 8.72923 5.47258 10.9627 5.20363 13.5119C5.13931 14.0498 5.59536 14.5 6.13327 14.5V14.5ZM14.5 29C22.5101 29 29 22.5101 29 14.5C29 6.48992 22.5101 0 14.5 0C6.48992 0 0 6.48992 0 14.5C0 22.5101 6.48992 29 14.5 29ZM14.5 3.74194C20.4345 3.74194 25.2581 8.56552 25.2581 14.5C25.2581 20.4345 20.4345 25.2581 14.5 25.2581C8.56552 25.2581 3.74194 20.4345 3.74194 14.5C3.74194 8.56552 8.56552 3.74194 14.5 3.74194ZM14.5 16.371C15.5349 16.371 16.371 15.5349 16.371 14.5C16.371 13.4651 15.5349 12.629 14.5 12.629C13.4651 12.629 12.629 13.4651 12.629 14.5C12.629 15.5349 13.4651 16.371 14.5 16.371Z" fill="url(#paint0_linear_807_1822)"/>
                            <defs>
                            <linearGradient id="paint0_linear_807_1822" x1="14.5" y1="0" x2="14.5" y2="29" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
    
                    <h5 class="skeleton">Radioativo</h5>
                </div>
    
                <div class="card">
                    <div class="icon skeleton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M3.875 7.75H6.45833H27.125" stroke="url(#paint0_linear_397_2423)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.5413 7.75065V25.834C24.5413 26.5191 24.2692 27.1762 23.7847 27.6607C23.3002 28.1451 22.6432 28.4173 21.958 28.4173H9.04134C8.3562 28.4173 7.69912 28.1451 7.21465 27.6607C6.73018 27.1762 6.45801 26.5191 6.45801 25.834V7.75065M10.333 7.75065V5.16732C10.333 4.48218 10.6052 3.82509 11.0896 3.34063C11.5741 2.85616 12.2312 2.58398 12.9163 2.58398H18.083C18.7682 2.58398 19.4252 2.85616 19.9097 3.34063C20.3942 3.82509 20.6663 4.48218 20.6663 5.16732V7.75065" stroke="url(#paint1_linear_397_2423)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.917 14.209V21.959" stroke="url(#paint2_linear_397_2423)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.083 14.209V21.959" stroke="url(#paint3_linear_397_2423)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <defs>
                            <linearGradient id="paint0_linear_397_2423" x1="15.5" y1="7.75" x2="15.5" y2="8.75" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_397_2423" x1="15.4997" y1="2.58398" x2="15.4997" y2="28.4173" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear_397_2423" x1="13.417" y1="14.209" x2="13.417" y2="21.959" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            <linearGradient id="paint3_linear_397_2423" x1="18.583" y1="14.209" x2="18.583" y2="21.959" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00D76E"/>
                            <stop offset="0.0001" stop-color="#00D76E"/>
                            <stop offset="1" stop-color="#1ABD00"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    
                    <h5 class="skeleton">Saiba mais sobre os tipos de resíduo. </h5>
                </div>
            </a>


            <div class="botContainer">
                <div class="title">
                    <div class="skeleton">
                        <h2>E-bot</h3>
                    </div>
                    
                    <p><h5 class="skeleton">Qualquer dúvida, só chamar</h5></p>
                </div>

                <div class="chat skeleton">
                    <div class="chatScreen">
                        <svg id="botIcon" xmlns="http://www.w3.org/2000/svg" width="34" height="41" viewBox="0 0 34 41" fill="none">
                            <path d="M25.5126 25H8.95271C3.88451 25 -0.451377 29.284 2.73306 33.2269C5.99787 37.2693 11.6435 40 16.619 40C21.5723 40 27.558 36.7052 31.056 32.6213C34.2154 28.9326 30.3694 25 25.5126 25Z" stroke="url(#paint0_linear_396_1735)" stroke-width="2"/>
                            <path d="M17 3.9H11.55C6.82797 3.9 3 7.72797 3 12.45V12.45C3 17.172 6.82796 21 11.55 21H22.45C27.172 21 31 17.172 31 12.45V12.45C31 7.72797 27.172 3.9 22.45 3.9H17ZM17 3.9V0" stroke="url(#paint1_linear_396_1735)" stroke-width="2"/>
                            <circle cx="12" cy="12" r="3" fill="url(#paint2_linear_396_1735)"/>
                            <circle cx="22" cy="12" r="3" fill="url(#paint3_linear_396_1735)"/>
                            <defs>
                            <linearGradient id="paint0_linear_396_1735" x1="-3.94658" y1="24.0625" x2="5.85204" y2="58.0343" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2400FF"/>
                            <stop offset="1" stop-color="#00A2FD"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_396_1735" x1="-0.250121" y1="-1.3125" x2="20.1145" y2="40.2192" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2400FF"/>
                            <stop offset="1" stop-color="#00A2FD"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear_396_1735" x1="8.30355" y1="8.625" x2="15.0451" y2="18.9367" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2400FF"/>
                            <stop offset="1" stop-color="#00A2FD"/>
                            </linearGradient>
                            <linearGradient id="paint3_linear_396_1735" x1="18.3035" y1="8.625" x2="25.0451" y2="18.9367" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2400FF"/>
                            <stop offset="1" stop-color="#00A2FD"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <form action="#">
                        <input type="text" placeholder="Escreva aqui, o que deseja achar" id="commandInput" spellcheck="true">

                        <button type="submit" title="enviar comando" id="sendCommand">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                                <g clip-path="url(#clip0_528_1601)">
                                <path d="M31.1131 16.9715H15.5568" stroke="url(#paint0_linear_528_1601)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M31.1128 16.9703L12.021 26.1626L15.5565 16.9703L12.021 7.77787L31.1128 16.9703Z" stroke="url(#paint1_linear_528_1601)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <linearGradient id="paint0_linear_528_1601" x1="22.9182" y1="7.80437" x2="18.2902" y2="29.9116" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2400FF"/>
                                <stop offset="1" stop-color="#00A2FD"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_528_1601" x1="16.213" y1="0.302682" x2="7.79833" y2="40.4976" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2400FF"/>
                                <stop offset="1" stop-color="#00A2FD"/>
                                </linearGradient>
                                <clipPath id="clip0_528_1601">
                                <rect width="24" height="24" fill="white" transform="translate(16.9707) rotate(45)"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section id="vlibras">
            <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        </section>
    </main>

    <script src="assets/JS/customAlert.js"></script>
    <script src="assets/JS/ecoPointsArray.js"></script>
    <script src="assets/JS/e-bot.js"></script>
    
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script src="assets/JS/vlibras.js"></script>

    <script src="assets/JS/mapsDenounce.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVcblJgILsnq3WAXKUmC3JXJfWYzU39OU&v=beta&libraries=marker&callback=initMap"></script>

    <script src="https://kit.fontawesome.com/c1e1f47962.js" crossorigin="anonymous"></script>

    <script src="assets/JS/denounce.js"></script>
    <script src="assets/JS/generalPatterns.js"></script>
</body>
</html>