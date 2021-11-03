<?php
include_once 'connect.php';

    $sql = $conn->prepare("DROP VIEW IF EXISTS view_citoyen");
    
    $sql_ajouter = $conn->prepare("DROP VIEW IF EXISTS view_ajouter_citoyen");
    try{
        
      $result = $sql->execute();
      $result2 = $sql_ajouter->execute();
      $conn = null;
    }catch(Throwable $e){
      $conn = null;
      header("Location: ../index.php?error_views"); 
      
    }
 
    if($result == true && $result2== true){

      header("Location: ../index.php?success_off_views");

    }else{
      $conn = null;
      header("Location: ../index.php?error_off_views");
      
    }

?>