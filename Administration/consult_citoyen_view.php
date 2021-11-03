<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List citoyens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
        include_once 'php/connect.php';

        $citoyens = $conn->query("SELECT * FROM view_citoyen ");
        $conn = null;


    ?>
    <div class="container">
    <table class="table  m-3">
            
            <th>nin</th>
            <th>numero acte naissance</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date Naissance</th>
            <th>Sexe</th>

            <?php
                foreach($citoyens as $citoyen){ 
                    echo "<tr> <td>";
                    echo("$citoyen[nin]");

                    echo("</td><td>");
                    echo("$citoyen[num_acte_naissance]");
                    echo("</td><td>");

                    echo("$citoyen[nom]");
                    echo("</td><td>");

                    echo("$citoyen[prenom]");
                    echo("</td><td>");

                    echo("$citoyen[date_naissance]");
                    echo("</td><td>");
                    if($citoyen["sexe"] == 0){
                    echo("Femme");
                    }else{
                    echo("Homme");
                    }

                    echo "</td></tr>";
                }
            ?>

    </table>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- Modals -->


</html>