<?php
include_once 'connect.php';


    
   
    $sql = $conn->prepare("CREATE VIEW view_citoyen AS 
    
                        select parent_etranger.code_parent, parent_etranger.nom_parent ,
                        parent_etranger.sexe_parent,
                        parent_etranger.prenom_parent, wilaya.nom_wilaya ,commune.nom_commune ,
                        pere.nom as nom_pere,pere.prenom as prenom_pere, mere.nom as nom_mere, 
                        mere.prenom as prenom_mere,  cit.nin,cit.num_acte_naissance,cit.nom,
                        cit.prenom,cit.date_naissance,cit.sexe FROM 
                        ((((citoyen as cit left join citoyen as pere ON cit.nin1 = pere.nin) 
                          left join citoyen as mere on cit.nin2 = mere.nin) 
                            left join parent_etranger on cit.code_parent_etrange = parent_etranger.code_parent) 
                              left join commune on cit.code_postal = commune.code_postal)
                                inner join wilaya on commune.code_wilaya = wilaya.code_wilaya");
    
    $sql_ajouter = $conn->prepare("CREATE VIEW view_ajouter_citoyen AS
                          SELECT * FROM citoyen");
    try{
      $result = $sql->execute();
      $result2 = $sql_ajouter->execute();
      $conn = null;
    }catch(Throwable $e){
      $conn = null;
      header("Location: ../index.php?error_views"); // si elle exite on la crée pas 
      
    }
 
    if($result == true && $result2== true){

      header("Location: ../index.php?success_views");

    }else{
      $conn = null;
      header("Location: ../index.php?error_views");
      
    }

?>