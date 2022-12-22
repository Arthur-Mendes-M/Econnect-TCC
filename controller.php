<?php

    require 'connection.php';

    $action = $_GET['action'];
    $actionCompound = explode('-', $_GET['action']);
    $actionCompoundController = $actionCompound[0];

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    } else {
        $name = "Name not it POST Method";
    }
    
    if(isset($_POST['cpf'])){
        $cpf = $_POST['cpf'];
    } else {
        $cpf = "Cpf not it POST Method";
    }
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    } else {
        $email = "Email not it POST Method";
    }
    
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $password = "Password not it POST Method";
    }

    if($actionCompoundController == "support") {
        if(isset($_SESSION['user_id'])) {

            // Adiciona o id da denúncia engajada na lista 'Complaints_support'
            $query = "SELECT * FROM users WHERE Id_user = :idUser";
            $stmt = $connection->prepare($query);

            $stmt->bindValue(':idUser', $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];

            if(isset($result->Complaints_support)) {
                $complaintsSupportList = explode(',', $result->Complaints_support);
            } else {
                $complaintsSupportList = [];
            }

            if(!in_array($actionCompound[1], $complaintsSupportList)) {
                array_push($complaintsSupportList, $actionCompound[1]);
            }else {
                header('Location: ../complaintsTimeLine.php');
                die();
            }

            $complaintsSupportList = implode(',', $complaintsSupportList);
    
            $query = "UPDATE users SET Complaints_support = :complaintsSupport WHERE Id_user = :idUser";
            $stmt = $connection->prepare($query);

            $stmt->bindValue(':complaintsSupport', $complaintsSupportList);
            $stmt->bindValue(':idUser', $_SESSION['user_id']);
            $stmt->execute();


            $query = "SELECT * FROM complaints WHERE Id_complaint = :idComplaint";
            $stmt = $connection->prepare($query);

            $stmt->bindValue(':idComplaint', $actionCompound[1]);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];

            $current = explode('/', $result->Supporters)[0]; 
            $goal = explode('/', $result->Supporters)[1];

            $current = intval($current);
            $current += 1;
            $current = strval($current);

            $supportesComplete = $current . '/' . $goal;


            // Pega o id da denúncia engajada, atualiza o campo 'Supporters' dessa denúncia
            $query = "UPDATE complaints SET Supporters = :supporters WHERE Id_complaint = :idComplaint";
            $stmt = $connection->prepare($query);

            $stmt->bindValue(':supporters', $supportesComplete);
            $stmt->bindValue(':idComplaint', $actionCompound[1]);

            $stmt->execute();

            // Pega o usuário que está engajando e atualiza o campo 'Support' desse usuário

            // Seleciona o usuário com id do usuário logado
            $query = "SELECT * FROM users WHERE Id_user = :idUser";
            $stmt = $connection->prepare($query);

            $stmt->bindValue(':idUser', $_SESSION['user_id']);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ)[0];

            // Verifica se a contagem de suportes do usuário é ou não nula, se for, recebe 1, se não recebe ela mesmo mais 1.
            if($result->Support == null) {
                $query = "UPDATE users SET Support = 1 WHERE Id_user = :idUser";
            } else {
                $query = "UPDATE users SET Support = Support + 1 WHERE Id_user = :idUser";
            }

            $stmt = $connection->prepare($query);

            $stmt->bindValue(':idUser', $_SESSION['user_id']);

            $stmt->execute();



            header('Location: ../complaintsTimeLine.php');

        } else {
            header('Location: ../complaintsTimeLine.php?userNotLoged');
        }

        die();
    }else if($actionCompoundController == "complaintsDetails") {
        // Selecion o complaints_id de todos os usuários
        $query = "SELECT Complaints_id FROM users";
        $stmt = $connection->prepare($query);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Percorre todos os complaints-id de todos os usua1rios
        for($idx = 0; $idx < count($result); $idx++) {
            // Transforma cada resultado em um array
            $arr = explode(',', $result[$idx]->Complaints_id);

            // Verifica se no array que contém todas as denúncias de todos os usuários, existe a denúncia em destaque
            if(in_array($actionCompound[1], $arr)) {
                // Se existir, puxa no banco de dados qual é o usuário que criou essa denúncia
                $query = "SELECT * FROM users WHERE Complaints_id = :complaintsId";
                $stmt = $connection->prepare($query);

                $stmt->bindValue(':complaintsId', $result[$idx]->Complaints_id);

                $stmt->execute();
                $userCreatorComplaints = $stmt->fetchAll(PDO::FETCH_OBJ);

                // Usuário que criou a denúncia em destaque
                $_SESSION['userCreatorComplaint'] = $userCreatorComplaints[0]->Id_user;
            }
        }

        // Denúncia em destaque
        $_SESSION['complaint'] = $actionCompound[1];

        header('Location: ../complaintsDetails.php');
        die();
    }

    if(isset($action)) {
        switch ($action) {
            case 'signUp':

                $query = "SELECT * FROM users WHERE Email_user = :userEmail";

                $stmt = $connection->prepare($query);
                $stmt->bindValue(':userEmail', $email);

                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                if(count($result) >= 1) {
                    header('Location: ../loginLogon.php?UserExists');
                } else {
                    $query = "INSERT INTO users (Name_user, Identity_document_user, Email_user, Password_user) VALUES (:userName, :userIdentify, :userEmail, :userPassword)";

                    $stmt = $connection->prepare($query);
                    
                    $stmt->bindValue(':userName', $name);
                    $stmt->bindValue(':userIdentify', $cpf);
                    $stmt->bindValue(':userEmail', $email);
                    $stmt->bindValue(':userPassword', md5($password));

                    $stmt->execute();

                    header('Location: ../loginLogon.php');
                }

                break;
            case 'signIn':

                $query = "SELECT * FROM users WHERE Email_user = :userEmail AND Password_user = :passwordUser";

                $stmt = $connection->prepare($query);

                $stmt->bindValue(':userEmail', $email);
                $stmt->bindValue(':passwordUser', md5($password));

                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                if(count($result) >= 1) {
                    $_SESSION['user_id'] = $result[0]->Id_user;
                    header('Location: ../index.php');
                } else {
                    header('Location: ../loginLogon.php?UserNotExists');
                }
                
                break;
            case 'update':

                if(isset($_SESSION['user_id'])){
                    $userId = $_SESSION['user_id'];
                    $query = "UPDATE users SET Name_user = :newName_user, Email_user = :newEmail_user, Password_user = :newPassword_user WHERE Id_user = $userId";

                    $stmt = $connection->prepare($query);
    
                    $stmt->bindValue(':newName_user', $name);
                    $stmt->bindValue(':newEmail_user', $email);
                    $stmt->bindValue(':newPassword_user', md5($password));
    
                    $result = $stmt->execute();
    
                    if($result) {
                        header('Location: ../settings.php?Success');
                    } else {
                        header('Location: ../settings.php?Error');
                    }
                } else {
                    header('Location: ../settings.php?UserNotLoged');
                }

                break;
            case 'delete':
                if(isset($_SESSION['user_id'])) {
            
                    $query = "DELETE FROM users WHERE Id_user = :id";
                    $stmt = $connection->prepare($query);

                    $stmt->bindValue(":id", $_SESSION['user_id']);

                    $stmt->execute();

                    session_destroy();
    
                    header('Location: ../index.php');
                } else {
                    header('Location: ../settings.php?UserNotLoged');
                }

                break;
            case 'uploadUserPhoto':

                if(isset($_SESSION['user_id'])) {
                    if(isset($_FILES['userPhotoPath'])) {
                        $file = $_FILES['userPhotoPath'];
    
                        // Tamanho de arquivo máximo em: 2MB
                        if($file['size'] > 2097152) {
                            header('Location: ../settings.php?LargeFile');
                        } else {
                            $folder = '../mediaFilesDB/';
                            $fileName = $_SESSION['user_id'];
                            
                            $extensionFile = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
                            if($extensionFile !== 'jpg' && $extensionFile !== 'png' && $extensionFile !== 'jpeg') {
                                header('Location: ../settings.php?ExtensionFile');
                            } else {
                                @unlink($folder . $fileName . '.' . $extensionFile);

                                $actionVerification = move_uploaded_file($file['tmp_name'], $folder . $fileName . '.' . $extensionFile);
    
                                if($actionVerification) {
                                    $fileNameComplete = $fileName . '.' . $extensionFile;

                                    $query = "UPDATE users SET Photo_path = :photoPath WHERE Id_user = :id";

                                    $stmt = $connection->prepare($query);
                        
                                    $stmt->bindValue(':photoPath', $fileNameComplete);
                                    $stmt->bindValue(':id', $_SESSION['user_id']);
                        
                                    $result = $stmt->execute();

                                    if($result) {
                                        header('Location: ../settings.php?Success');
                                    } else {
                                        header('Location: ../settings.php?UploadFileScriptError');
                                    }
                                } else {
                                    header('Location: ../settings.php?UploadFileError');
                                }
                            }
                        }
                    }
                } else {                    
                    header('Location: ../settings.php?UserNotLoged');
                }

                break;
            case 'createComplaint':

                if(!isset($_SESSION['user_id'])) {
                    header('Location: ../loginLogon.php');
                    die();
                }

                $query = "INSERT INTO complaints (User_id, Address, Location_number, Reference, Description, Photo_path, Supporters, Petition) VALUES (:userId, :address, :locationNumber, :reference, :description, :photoPath, :supporters, :petition)";

                $stmt = $connection->prepare($query);

                $stmt->bindValue(':userId', $_SESSION['user_id']);

                if(!empty($_POST['address'])) {
                    $stmt->bindValue(':address', $_POST['address']);
                } else {
                    $stmt->bindValue(':address', null);
                }

                if(!empty($_POST['numberAddress'])) {
                    $stmt->bindValue(':locationNumber', $_POST['numberAddress']);
                } else {
                    $stmt->bindValue(':locationNumber', null);
                }

                if(!empty($_POST['complement'])) {
                    $stmt->bindValue(':reference', $_POST['complement']);
                } else {
                    $stmt->bindValue(':reference', null);
                }

                if(!empty($_POST['description'])) {
                    $stmt->bindValue(':description', $_POST['description']);
                } else {
                    $stmt->bindValue(':description', null);
                }

                // Testes - ADICIONANDO PATH
                if($_FILES['fileTrashPoint']['error'] == '0') {
                    $file = $_FILES['fileTrashPoint'];

                    // Tamanho de arquivo máximo em: 2MB
                    if($file['size'] > 2097152) {
                        header('Location: ../denounce.php?LargeFile');
                    } else {
                        $folder = '../mediasComplaints/';

                        // Alterar para um um uniqId
                        // $fileName = $_SESSION['user_id'];
                        $fileName = uniqid();
                        
                        $extensionFile = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                        if($extensionFile !== 'jpg' && $extensionFile !== 'png' && $extensionFile !== 'jpeg') {
                            header('Location: ../denounce.php?ExtensionFile');
                        } else {
                            @unlink($folder . $fileName . '.' . $extensionFile);

                            $actionVerification = move_uploaded_file($file['tmp_name'], $folder . $fileName . '.' . $extensionFile);

                            if($actionVerification) {
                                $fileNameComplete = $fileName . '.' . $extensionFile;

                                $stmt->bindValue(':photoPath', $fileNameComplete);

                            } else {
                                header('Location: ../denounce.php?UploadFileError');
                            }
                        }
                    }
                }else {
                    $stmt->bindValue(':photoPath', null);
                }

                $stmt->bindValue(':supporters', '0/10.000');
                $stmt->bindValue(':petition', 'DocumentPath.pdf');

                $stmt->execute();

                $complaintsList = [];

                $query = "SELECT * FROM complaints WHERE User_id = :userId";
                $stmt = $connection->prepare($query);

                $stmt->bindValue(':userId', $_SESSION['user_id']);
                $stmt->execute();

                $complaints = $stmt->fetchAll(PDO::FETCH_OBJ);

                for($i = 0; $i < count($complaints); $i++) {
                    array_push($complaintsList, $complaints[$i]->Id_complaint);
                }

                $complaintsList = implode(',', $complaintsList);

                $query = "UPDATE users SET Complaints_id = :complaintsId WHERE Id_user = :userId";
                $stmt = $connection->prepare($query);

                $stmt->bindValue(':userId', $_SESSION['user_id']);
                $stmt->bindValue(':complaintsId', $complaintsList);
                $stmt->execute();

                header('Location: ../denounce.php?Success');

                break;
            default:
                if(isset($_SESSION['user_id'])) {
                    session_destroy();
                    header('Location: ../index.php');
                } else {
                    header('Location: ../index.php?userNotLoged');
                }
            break;
        }
    }
?>