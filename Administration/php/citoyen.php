<?php
include_once 'connect.php';


    
if(isset($_POST['nin']) && isset($_POST['num_act'])&& isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['date_naissance'])&& isset($_POST['sexe'])){
    $nin = $_POST['nin'];
    $num_act = $_POST['num_act'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];



    


    $sql = $conn->prepare("SELECT COUNT(nin) FROM citoyen WHERE nin = :nin");
    $sql->bindParam(':nin', $nin);
    $sql->execute();
    
    
    //$count = $sql->fetchColumn();
    
    if($sql->fetchColumn() == 0){
      $stmt = $conn->prepare("INSERT INTO citoyen (nin, num_acte_naissance, nom, prenom, date_naissance, sexe)
      VALUES (:nin, :num_act, :nom, :prenom, :date_naissance, :sexe)");
      $stmt->bindParam(':nin', $nin);
      $stmt->bindParam(':num_act', $num_act);
      $stmt->bindParam(':date_naissance', $date_naissance);
      $stmt->bindParam(':nom', $nom);
      $stmt->bindParam(':prenom', $prenom);
      $stmt->bindParam(':sexe', $sexe);


  
      $stmt->execute();
      $conn = null;
      header("Location: ../index.php?success");

    }else{
      $conn = null;
      header("Location: ../index.php?error_citoyen");
      
    }
   

}



?>