<?php

class GamerManager extends Model
{
    public function getInsert()
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];

       try{
           $req = $this->getBdd()->prepare("INSERT INTO gamers (firstname, lastname, email) VALUES (:firstname,:lastname,:email)" );

           $req->bindParam(':firstname', $firstname, PDO::PARAM_STR);
           $req->bindParam(':lastname',$lastname,PDO::PARAM_STR);
           $req->bindParam(':email',$email,PDO::PARAM_STR);

           $req->execute();
           if($req->errorCode() == '23000')
               echo 'Element déjà existant.';
       }
       catch(PDOException $e){
           echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
       }
    }
}
