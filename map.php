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
    <link rel="stylesheet" href="mapPage/map.css">

    <!-- Favicon import -->
    <link rel="icon" href="assets/favicon_io/logoGuia.svg">


    <title>Mapa | Econnect</title>


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
            </ul>
        </nav>
    </section>

    <main>
        <div class="mapouter">
            <div class="gmap_canvas skeleton" id="map">
            </div>
        </div> 

        <a href="infosWaste.html" target="_blank" id="filters" class="skeleton">
            <span id="toggle">
                <svg width="23" height="34" viewBox="0 0 23 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5308 0C6.31393 0 2.93497 2.17168 0.282137 6.0447C-0.199097 6.74727 -0.050733 7.71056 0.620563 8.22773L3.43999 10.3998C4.11796 10.9221 5.08258 10.8 5.61336 10.1244C7.25052 8.04047 8.46495 6.84064 11.0222 6.84064C13.0329 6.84064 15.5199 8.15542 15.5199 10.1364C15.5199 11.634 14.3031 12.4032 12.3178 13.5341C10.0026 14.8529 6.93889 16.4942 6.93889 20.6V21.25C6.93889 22.1302 7.64117 22.8438 8.50749 22.8438H13.2441C14.1104 22.8438 14.8127 22.1302 14.8127 21.25V20.8666C14.8127 18.0205 23 17.9019 23 10.2C23.0001 4.39981 17.0785 0 11.5308 0V0ZM10.8758 24.8C8.37939 24.8 6.34838 26.8636 6.34838 29.4C6.34838 31.9364 8.37939 34 10.8758 34C13.3722 34 15.4033 31.9364 15.4033 29.4C15.4033 26.8635 13.3722 24.8 10.8758 24.8Z" fill="url(#paint0_linear_911_1825)"/>
                <defs>
                <linearGradient id="paint0_linear_911_1825" x1="11.5" y1="0" x2="11.5" y2="34" gradientUnits="userSpaceOnUse">
                <stop stop-color="#00D76E"/>
                <stop offset="0.0001" stop-color="#00D76E"/>
                <stop offset="1" stop-color="#1ABD00"/>
                </linearGradient>
                </defs>
                </svg>
            </span>
        </a>

        <section id="vlibras">
            <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        </section>
    </main>

    <!-- Mapa -->
    <script src="assets/JS/ecoPointsArray.js"></script>
    <script src="assets/JS/maps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVcblJgILsnq3WAXKUmC3JXJfWYzU39OU&v=beta&libraries=marker&callback=initMap"></script>
    
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script src="assets/JS/vlibras.js"></script>

    <script src="https://kit.fontawesome.com/c1e1f47962.js" crossorigin="anonymous"></script>
    <script src="assets/JS/generalPatterns.js"></script>
    
</body>
</html>