<?php
include_once 'connect.php';


    
if(isset($_POST['nin'])){
    $nin = $_POST['nin'];
    



    


    $sql = $conn->prepare("SELECT * FROM citoyen WHERE nin = :nin");
    $sql->bindParam(':nin', $nin);
    $sql->execute();

      $conn = null;
      header("Location: ../index.php?success");

    }else{
      $conn = null;
      header("Location: ../index.php?error_citoyen");
      
    }
   





?>