<?php
    require "database/userData.php";

    if(!isset($userCreatorComplaint)) {
        header('Location: complaintsTimeLine.php?ReportNoLongerExists');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style import -->
    <link rel="stylesheet" href="complaintsDetailsPage/complaintsDetails.css">

    <!-- Favicon import -->
    <link rel="icon" href="assets/favicon_io/logoGuia.svg">

    <title>Informações da denúncia | Econnect</title>
</head>
<body>

    <main id="complaintsDetails">
        <section id="bannerComplains" class="skeleton" <?php if(!empty($complaintSelected->Photo_path)) {
            echo "style='background-image: linear-gradient(0deg, rgb(0 0 0) 10%, rgba(0, 0, 0, 0.195)), url(mediasComplaints/$complaintSelected->Photo_path);'"; }else { echo "style='background-image: linear-gradient(0deg, rgb(0 0 0) 10%, rgba(0, 0, 0, 0.195)), url(mediasComplaints/defaultComplaintPhoto.jpg);'"; } ?>>
            <a href="complaintsTimeLine.php">
                <div id="returnButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M22.1668 14H5.8335" stroke="#00F0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.0002 22.1673L5.8335 14.0007L14.0002 5.83398" stroke="#00F0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </a>

            <div class="title skeleton">
                <h2>Local indevido com resíduo</h2>
            </div>
        </section>

        <section id="creatorDetails">
            <div class="title skeleton">
                <h3>Criador(a) da denúncia</h3>
            </div>
            
            <div class="userCreator skeleton">
                <img src="<?php if(!empty($userCreatorComplaint->Photo_path)) {echo 'mediaFilesDB/' . $userCreatorComplaint->Photo_path; }else { echo 'assets/midia/defaultUserPhoto.jpg'; } ?>" alt="#">
                
                <h4><?php if(!empty($userCreatorComplaint->Name_user)) {echo $userCreatorComplaint->Name_user;} else {echo 'Desconhecido';}?></h4>
            </div>
        </section>

        <section id="complainsDescription">
            <div class="title skeleton">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M21 11.666H7" stroke="url(#paint0_linear_103_1971)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24.5 7H3.5" stroke="url(#paint1_linear_103_1971)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24.5 16.334H3.5" stroke="url(#paint2_linear_103_1971)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 21H7" stroke="url(#paint3_linear_103_1971)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_103_1971" x1="14" y1="11.666" x2="14" y2="12.666" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_103_1971" x1="14" y1="7" x2="14" y2="8" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_103_1971" x1="14" y1="16.334" x2="14" y2="17.334" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_103_1971" x1="14" y1="21" x2="14" y2="22" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    </defs>
                </svg>

                <h3>Descrição</h3>
            </div>

            <div class="content skeleton">
                <h4>
                    <?php if(!empty($complaintSelected->Description)) {echo $complaintSelected->Description; }else { echo '<i>Sem descrição :/</i>'; } ?>
                </h4>
            </div>
        </section>

        <section id="locationReport">
            <div class="title skeleton">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <g clip-path="url(#clip0_103_1964)">
                    <path d="M24.5 11.666C24.5 19.8327 14 26.8327 14 26.8327C14 26.8327 3.5 19.8327 3.5 11.666C3.5 8.88124 4.60625 6.21053 6.57538 4.24139C8.54451 2.27226 11.2152 1.16602 14 1.16602C16.7848 1.16602 19.4555 2.27226 21.4246 4.24139C23.3938 6.21053 24.5 8.88124 24.5 11.666Z" stroke="url(#paint0_linear_103_1964)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 15.166C15.933 15.166 17.5 13.599 17.5 11.666C17.5 9.73302 15.933 8.16602 14 8.16602C12.067 8.16602 10.5 9.73302 10.5 11.666C10.5 13.599 12.067 15.166 14 15.166Z" stroke="url(#paint1_linear_103_1964)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <linearGradient id="paint0_linear_103_1964" x1="14" y1="1.16602" x2="14" y2="26.8327" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_103_1964" x1="14" y1="8.16602" x2="14" y2="15.166" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <clipPath id="clip0_103_1964">
                    <rect width="28" height="28" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <h3>Local</h3>
            </div>

            <div class="location">
                <div class="image skeleton">
                    <img src="<?php if(!empty($complaintSelected->Photo_path)) { echo "mediasComplaints/$complaintSelected->Photo_path"; }else { echo "mediasComplaints/defaultComplaintPhoto.jpg"; } ?>" alt="Local">
                </div>

                <div class="infos skeleton">
                    <div class="field">
                        <h3>Endereço</h3>
                        <h4><?php if(isset($complaintSelected->Address)) { echo $complaintSelected->Address;} else {echo 'Desconhecido';} ?></h4>
                    </div>

                    <div class="field">
                        <h3>Número</h3>
                        <h4><?php if(isset($complaintSelected->Location_number)) { echo $complaintSelected->Location_number;} else {echo 'Desconhecido';} ?></h4>
                    </div>

                    <div class="field">
                        <h3>Complemento</h3>
                        <h4><?php if(isset($complaintSelected->Reference)) { echo $complaintSelected->Reference;} else {echo '<i>Sem referências</i>';} ?></h4>
                    </div>
                </div>
            </div>

        </section>

        <section id="goal">
            <div class="title skeleton">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <g clip-path="url(#clip0_103_1980)">
                    <path d="M14.0002 25.6673C20.4435 25.6673 25.6668 20.444 25.6668 14.0007C25.6668 7.55733 20.4435 2.33398 14.0002 2.33398C7.55684 2.33398 2.3335 7.55733 2.3335 14.0007C2.3335 20.444 7.55684 25.6673 14.0002 25.6673Z" stroke="url(#paint0_linear_103_1980)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 21C17.866 21 21 17.866 21 14C21 10.134 17.866 7 14 7C10.134 7 7 10.134 7 14C7 17.866 10.134 21 14 21Z" stroke="url(#paint1_linear_103_1980)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.9998 16.3327C15.2885 16.3327 16.3332 15.288 16.3332 13.9993C16.3332 12.7107 15.2885 11.666 13.9998 11.666C12.7112 11.666 11.6665 12.7107 11.6665 13.9993C11.6665 15.288 12.7112 16.3327 13.9998 16.3327Z" stroke="url(#paint2_linear_103_1980)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <linearGradient id="paint0_linear_103_1980" x1="14.0002" y1="2.33398" x2="14.0002" y2="25.6673" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_103_1980" x1="14" y1="7" x2="14" y2="21" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_103_1980" x1="13.9998" y1="11.666" x2="13.9998" y2="16.3327" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#00D76E"/>
                    <stop offset="0.0001" stop-color="#00D76E"/>
                    <stop offset="1" stop-color="#1ABD00"/>
                    </linearGradient>
                    <clipPath id="clip0_103_1980">
                    <rect width="28" height="28" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <h3 title="Meta de engajamentos minímos para o abaixo-assinado ser encamiado para a prefeitura.">
                    Meta de engajamentos
                
                    <svg  xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <g clip-path="url(#clip0_103_1985)">
                        <path d="M9 16.5C13.1421 16.5 16.5 13.1421 16.5 9C16.5 4.85786 13.1421 1.5 9 1.5C4.85786 1.5 1.5 4.85786 1.5 9C1.5 13.1421 4.85786 16.5 9 16.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.81738 6.74945C6.99371 6.2482 7.34175 5.82553 7.79985 5.5563C8.25795 5.28707 8.79655 5.18865 9.32027 5.27848C9.84398 5.36831 10.319 5.64059 10.6612 6.0471C11.0034 6.4536 11.1907 6.96809 11.1899 7.49945C11.1899 8.99945 8.93988 9.74945 8.93988 9.74945" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 12.75H9.0075" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_103_1985">
                        <rect width="18" height="18" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </h3>
            </div>

            <div id="goalGraph" class="skeleton">
                <svg xmlns="http://www.w3.org/2000/svg" width="91" height="91" viewBox="0 0 91 91" fill="none">
                    <path d="M64.5618 35.3535L47.9101 52.4908L39.1461 43.4712L26 57.0006" stroke="url(#paint0_linear_793_1820)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M54.4829 34H64.9998V44.8235" stroke="url(#paint1_linear_793_1820)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M45.5 3C56.0875 3 66.2938 6.95182 74.1206 14.0818C81.9475 21.2117 86.8313 31.0063 87.8158 41.548C88.8003 52.0896 85.8146 62.6192 79.4434 71.0751C73.0722 79.531 63.7741 85.3044 53.3697 87.2649C42.9653 89.2254 32.2037 87.2318 23.192 81.6745C14.1802 76.1171 7.56725 67.3963 4.64777 57.2192C1.72828 47.0422 2.71252 36.1419 7.4078 26.6524" stroke="url(#paint2_linear_793_1820)" stroke-width="5" stroke-linecap="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_793_1820" x1="45.2809" y1="35.3535" x2="45.2809" y2="57.0006" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#06B802"/>
                    <stop offset="1" stop-color="#15FF10"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_793_1820" x1="59.7413" y1="34" x2="59.7413" y2="44.8235" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#06B802"/>
                    <stop offset="1" stop-color="#15FF10"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_793_1820" x1="64.0937" y1="2.99999" x2="-8.68751" y2="32.2187" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FF0000"/>
                    <stop offset="0.589069" stop-color="#FFE600"/>
                    <stop offset="1" stop-color="#05FF00"/>
                    </linearGradient>
                    </defs>
                </svg>

                <div class="counterGoal">
                    <h4>
                        <?php 
                            $current = explode('/', $complaintSelected->Supporters)[0]; 
                            $goal = explode('/', $complaintSelected->Supporters)[1]; 
                        ?>

                        <span class="supportGoal <?php if(intval($current) >= (intval(implode('', explode('.', $goal))) * 50/100) && intval($current) < (intval(implode('', explode('.', $goal))) * 80/100)){echo 'half';}else if(intval($current) >= (intval(implode('', explode('.', $goal))) * 80/100)) {echo 'near';} ?>"><?php echo number_format($current, 0, '.', '.'); ?></span>
                        de
                        <span class="supports"><?php echo $goal; ?></span>
                    </h4>
                </div>
            </div>
        </section>

        <a href="database/controller.php?action=support-<?php echo $complaintSelected->Id_complaint; ?>" id="supportComplaint" class="skeleton">
            Apoiar a denúncia
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

    <script src="https://kit.fontawesome.com/c1e1f47962.js" crossorigin="anonymous"></script>
    <script src="assets/JS/generalPatterns.js"></script>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script src="assets/JS/vlibras.js"></script>
</body>
</html>