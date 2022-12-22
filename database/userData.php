<?php

    require_once '../econnect/connection.php';

    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    }
    
    if(isset($userId)) {
        $query = "SELECT * FROM users WHERE Id_user = :id";
        $stmt = $connection->prepare($query);
    
        $stmt->bindValue(':id', $userId);
    
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $user = $result[0];
    
        $userName = explode(" ", $user->Name_user)[0];
        $photoPath = $user->Photo_path;

        // Script responsavel por gerar a mensagem de boas vinda a partir do horario atual
        date_default_timezone_set('America/Bahia'); 
        $hourNow = date("H:i", time());
    
        if($hourNow > '00' && $hourNow <= '11:59') {
            $message = 'Bom dia';
        } else if($hourNow >= '12:00' && $hourNow <= '17:59') {
            $message = 'Boa tarde';
        } else {
            $message = 'Boa noite';
        }

        $query = "SELECT * FROM complaints WHERE User_id = :userId";
        $stmt = $connection->prepare($query);
    
        $stmt->bindValue(':userId', $user->Id_user);
    
        $stmt->execute();
        $allComplaintsUser = $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    $query = "SELECT * FROM complaints ORDER BY RAND()";
    $stmt = $connection->prepare($query);

    $stmt->execute();
    $allComplaints = $stmt->fetchAll(PDO::FETCH_OBJ);


    if(isset($_SESSION['complaint']) && isset($_SESSION['userCreatorComplaint'])) {
        // Busca pela denúncia criada
        $query = "SELECT * FROM complaints WHERE Id_complaint = :idComplaint";
        $stmt = $connection->prepare($query);

        $stmt->bindValue(':idComplaint', $_SESSION['complaint']);
        $stmt->execute();
        $complaintSelected = $stmt->fetchAll(PDO::FETCH_OBJ)[0];

        // Busca pelo usuário que criou a denúncia
        $query = "SELECT * FROM users WHERE Id_user = :idUser";
        $stmt = $connection->prepare($query);

        $stmt->bindValue(':idUser', $_SESSION['userCreatorComplaint']);
        $stmt->execute();
        $userCreatorComplaint = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
    }
?>