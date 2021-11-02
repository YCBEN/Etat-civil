<?php
include_once 'connect.php';

if(isset($_POST['nom_wilaya']) && isset($_POST['code_wilaya'])){
    
    $code_wilaya = $_POST['code_wilaya'];
    $nom_wilaya = $_POST['nom_wilaya'];

    $sql = $conn->prepare("SELECT COUNT(*) FROM wilaya WHERE nom = :nom_wilaya");
    $sql->bindParam(':nom_wilaya', $nom_wilaya);
    $sql->execute();
    
    
    //$count = $sql->fetchColumn();
    
    if($sql->fetchColumn() == 0){
        
      $stmt = $conn->prepare("INSERT INTO wilaya (code_wilaya, nom)
      VALUES (:code_wilaya, :nom_wilaya)");
      
      $stmt->bindParam(':code_wilaya', $code_wilaya);
      $stmt->bindParam(':nom_wilaya', $nom_wilaya);
      
      $stmt->execute();
      $conn = null;
      
      header("Location: ../index.php");

    }else{
      $conn = null;
      header("Location: ../index.php?error_wilaya");
      
    }
}
?>