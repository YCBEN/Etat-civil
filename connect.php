<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "etat_civil";
// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
} catch (Throwable $e) {
    die('error cnx');
}


    
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
      header("Location: index.php");

    }else{
      $conn = null;
      header("Location: index.php?error_wilaya");
      
    }
   

}



?>