<?php
    if (isset($_POST['mailinglist'])){
        $Email = $_POST['Email'];
        try{
            $db = new db();
            $db = $db->connect();
            $mailing_list_query = "SELECT * FROM news_letter_mailing_list WHERE Email= :Email";
            $stmt = $db->prepare($mailing_list_query);
            $stmt->bindParam(':Email', $Email);
            $stmt->execute();
            $mailing_list = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            }catch(PDOException $e){
                echo '{"error": {"text": '.$e->getMessage().'}';
            }
            if(sizeof($mailing_list) > 0){
                $MailingListError = "Sorry you are already found in our mailing list";
            }else{
                try{
                $db = new db();
                $db = $db->connect();
                $insert_mailing_list_query = "INSERT INTO news_letter_mailing_list (Email) VALUES (:Email)";
                $stmt = $db->prepare($insert_mailing_list_query);
                $stmt->bindParam(':Email', $Email);
                $stmt->execute();
                $db = null;
                }catch(PDOException $e){
                    echo '{"error": {"text": '.$e->getMessage().'}';
                }
                if($stmt->execute()){
                    $MailingListSuccess = "Thanks for signing up to our mailing list!";
                }
            }
        }
?>