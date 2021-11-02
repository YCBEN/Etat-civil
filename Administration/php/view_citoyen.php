<?php
include_once 'connect.php';


    
   
    $sql = $conn->prepare("CREATE VIEW view_citoyens AS 
                          SELECT nin,num_acte_naissance,nom,prenom, 
                          date_naissance, sexe, code_parent, nin1, nin2,code_postal,
                          nom_commune,code_wilaya, nom_parent,prenom_parent,sexe_parent From citoyen 
                          NATURAL JOIN commune 
                          NATURAL JOIN wilaya 
                          LEFT JOIN parent_etranger on citoyen.code_parent_etrange = parent_etranger.code_parent;");
    try{
      $result=$sql->execute();
      $conn = null;
    }catch(Throwable $e){
      $conn = null;
      header("Location: ../index.php?error_views"); // si elle exite on la crée pas 
      
    }
 
    if($result == true){

      header("Location: ../index.php?success_views");

    }else{
      $conn = null;
      header("Location: ../index.php?error_views");
      
    }

?>