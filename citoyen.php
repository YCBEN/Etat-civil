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
                    $sql = $conn->prepare("SELECT * FROM view_citoyens WHERE nin LIKE :nin_user "); 
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
                        echo("$result[2] ");
                        echo("$result[3]");
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
                    echo($result[0]);

                    echo("</td><td>");
                    echo("$result[1]");
                    echo("</td><td>");

                    echo("$result[2]");
                    echo("</td><td>");

                    echo("$result[3]");
                    echo("</td><td>");

                    echo("$result[4]");
                    echo("</td><td>");
                    if($result[5] == 0){
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
                    
            <table class="table  m-3">
                        <?php 
                            if($result[6] != null && $result[14] == 1){
                                echo("<h6>Pere etrangé</h6>");
                                echo("<th>Code Pere</th>");
                                echo("<th>Nom</th>");
                                echo("<th>Prenom</th>");

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                echo ("<td> $result[12] </td>");

                                

                                echo ("<td > $result[13]");}
                            elseif($result[6] != null && $result[14] == 0)   {
                                echo("<th>Mere etrangère</th>");
                                echo("<th>Code Mere</th>");
                                echo("<th>Nom</th>");
                                echo("<th>Prenom</th>");

                                echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                echo ("<td> $result[12] </td>");
                            }
                            ?>
                        
                        </td>
                    </tr>
                       

            </table>
            <hr>
        <?php endif; ?>

        <h5 class="h5">Adresse:</h5>
                    
                    <table class="table  m-3">
                            
                            
        
                          
        
                                <?php 
                                    if($result[6] != null && $result[14] == 1){
                                        echo("<h6>Pere etrangé</h6>");
                                        echo("<th>Code Pere</th>");
                                        echo("<th>Nom</th>");
                                        echo("<th>Prenom</th>");
        
                                        echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                        echo ("<td> $result[12] </td>");
        
                                        
        
                                        echo ("<td > $result[13]");}
                                    elseif($result[6] != null && $result[14] == 0)   {
                                        echo("<th>Mere etrangère</th>");
                                        echo("<th>Code Mere</th>");
                                        echo("<th>Nom</th>");
                                        echo("<th>Prenom</th>");
        
                                        echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                        echo ("<td> $result[12] </td>");
                                    }
                                    if($result[7] != null){
                                        echo("<th>Mere </th>");
                                        echo("<th>Code Mere</th>");
                                        echo("<th>Nom</th>");
                                        echo("<th>Prenom</th>");
        
                                        echo ("<tr> <td class=\"bg-dark text-white\"> $result[6] </td>");
                                        echo ("<td> $result[12] </td>");
                                        

                                    }
        
                                        
                                     
                                    print_r($result)
                                    
                                    ?>
                                
                                </td>
                            </tr>
                               
        
                    </table>
                    <hr>
    


            
           
        </div>


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