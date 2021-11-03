<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citoyen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <form action="" method="post">
                <a href="index.php" class="btn btn-primary mx-5"> Home</a>
                    <label class="mx-5 h1">Entez votre NIN:</label>
                    <input class="mx-3" type="text" name="nin_user">
                    <input class="btn btn-success" type="submit" value="Search">
                </form>

            </div>

            <?php
                if (!empty($_REQUEST['nin_user'])) :
                    include_once 'Administration/php/connect.php';


                
                try{
                    $sql = $conn->prepare("SELECT * FROM view_citoyen WHERE nin LIKE :nin_user "); 
                    $sql->bindParam(':nin_user',$_REQUEST['nin_user']);
                    
                    $sql->execute();
                    $result =$sql->fetch();
                    $conn = null;
                }catch(Throwable $e){
                    header("Location: citoyen.php?error_serveur");
                   

                }
                ?>
                <hr>
                <h1 class="h1"> Extrait de naissance pour : 
                    <?php
                        echo("$result[nom] ");
                        echo("$result[prenom]");
                    ?>
                </h1>
                <h5 class="h5">Informations Personelles:</h5>
            <table class="table  m-3">
            
                        <th>nin</th>
                        <th>numero acte naissance</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date Naissance</th>
                        <th>Sexe</th>

            <?php
                    echo "<tr> <td>";
                    echo($result["nin"]);

                    echo("</td><td>");
                    echo("$result[num_acte_naissance]");
                    echo("</td><td>");

                    echo("$result[nom]");
                    echo("</td><td>");

                    echo("$result[prenom]");
                    echo("</td><td>");

                    echo("$result[date_naissance]");
                    echo("</td><td>");
                    if($result["sexe"] == 0){
                    echo("Femme");
                    }else{
                    echo("Homme");
                    }

                   
  
            ?>
                    </td>
                </tr> 
            </table>
            <hr>
            <h5 class="h5">fils de:</h5>

                        <?php 
                            if($result["code_parent"] != null ){
                                if($result["sexe_parent"] == 1){

                                echo("<table class=\"table  m-3\">");
                                echo("<h6>Pere etrangé</h6>");
                                echo("<th>Code Pere</th>");
                                echo("<th>Nom</th>");
                                echo("<th>Prenom</th>");

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[code_parent] </td>");
                                echo ("<td> $result[nom_parent] </td>");

                                

                                echo ("<td >$result[prenom_parent] ");
                                echo("</table>");
                            }
                                
                            else {
                                echo("<table class=\"table  m-3\">");
                                echo("<th>Mere etrangère</th>");
                                echo("<th>Code Mere</th>");
                                echo("<th>Nom</th>");
                                echo("<th>Prenom</th>");

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                echo ("<td> $result[12] </td>");
                                echo("</table>");
                            }}
                                
                            if($result["nom_pere"] != null ){
                                echo("<table class=\"table  m-3\">");
                                echo("<th>Nom Pere</th>");
                                echo("<th>Prenom Pere</th>");
                                

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[nom_pere] </td>");
                                echo ("<td> $result[prenom_pere] </td>");
                                echo("</table>");

                            }
                            if($result["nom_mere"] != null ){
                                echo("<table class=\"table  m-3\">");
                                echo("<th>Nom Mere</th>");
                                echo("<th>Prenom Mere</th>");
                                

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[nom_mere] </td>");
                                echo ("<td> $result[prenom_mere] </td>");
                                echo("</table>");

                            }
                            
                            
                            ?>
                        
                        </td>
                    </tr>
                       

            </table>
            <hr>

        <h5 class="h5">Lieu de naissance</h5>
                    
                    <table class="table  m-3">
                        <th>wilaya</th>
                        <th>Commune</th>
                        <tr> 
                        <td>  
                                <?php echo($result["nom_wilaya"]);?>
                                
                            </td>
                            <td>  
                                <?php echo($result["nom_commune"]);?>
                                
                            </td>
                        </tr>
                               
        
                    </table>
                    <hr>
    


            
           
        </div>
    <?php endif; ?>


    </div>
    <?php 
if(isset($_GET['error_serveur']) ): ?>

    <script>  
        
        alert(['serveur est eteint impossible de porsuivre'])


    </script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>