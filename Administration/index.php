<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <table class="table center">
        <thead>
            <tr>
                <th colspan="3">Etat Civil</th>
            </tr>
            </thead>
        <tr>
            
            <td>
                <a class="btn btn-success" href="consult_citoyen_view.php" >
                    Consulter les citoyens
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajouter_citoyen">
                    Ajouter un Citoyen
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajouter_wilaya">
                  Ajouter une wilaya
            </button>
          </td>
            
        
        </tr>

        <tr>
            
            <td>
                <form action="php/view_citoyen.php" method="post">
                  <button type="submit" class="btn btn-success" >
                        Lancer la ligne
                  </button>
          
                </form>
            </td>
            <td>
            <form action="php/view_off.php" method="post">
                  <button type="submit" class="btn btn-danger" >
                        Fermer la ligne
                  </button>
          
                </form>

            </td>
            <td>
              <a href="../index.php" class="btn btn-primary mx-5"> Acceuil</a>

          </td>
            
        
        </tr>
        
    </table>
    <div class="row">
     
      <?php if((isset($_GET['success_views']))):?>

        <div class="p-3 mb-2 bg-success text-white">
          <h2>ON</h2>
          <p>La ligne est activ??e</p>
        </div>
        <?php elseif((isset($_GET['success_off_views']))):?>

        <div class="p-3 mb-2 bg-danger text-white">
          <h2>OFF</h2>
          <p>La ligne est d??sactiv??e</p>
        </div>                                  
              
      <?php endif; ?>

            
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- Modals -->
<div class="modal fade" id="ajouter_citoyen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un Citoyen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="php/citoyen.php" method="post" id="form_ajouter_wilaya">
 
             <div class="mb-3">
                 <label for="code_wilaya" class="form-label">NIN</label>
                 <input type="number" class="form-control" name="nin" placeholder="18 chiffres" >
               </div>
               <div class="mb-3">
                 <label for="nom_wilaya" class="form-label">Numero Act de naissance</label>
                 <input type="text" class="form-control" name="num_act" placeholder="5 ciffres">
               </div>
               <div class="mb-3">
                <label for="nom_wilaya" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="5 ciffres">
              </div>
              <div class="mb-3">
                <label for="nom_wilaya" class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" >
              </div>
              <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date_naissance" >
              </div>
              <div class="mb-3">
                <input type="radio" id="femme" name="sexe" value="0">
                <label for="femme">Femme</label>
                <input type="radio" id="homme" name="sexe" value="1">
                <label for="Homme">Homme</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Ajouter</button>
              </div>

          
          </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="ajouter_wilaya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une wilaya</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="php/wilaya.php" method="post" id="form_ajouter_wilaya">

            <div class="mb-3">
                <label for="code_wilaya" class="form-label">Code Wilaya</label>
                <input type="number" class="form-control" name="code_wilaya" placeholder="remplir" >
              </div>
              <div class="mb-3">
                <label for="nom_wilaya" class="form-label">Nom Wilaya</label>
                <input type="text" class="form-control" name="nom_wilaya" placeholder="Max 20 characteres">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-success">Ajouter</button>
        </div>
        </form>
        
    
      </div>
    </div>
</div>
<?php 
  if(isset($_GET['success_off_views']) ): ?>

    <script>  
        alert(['La ligne a et?? ferm?? avec succ??'])

    </script>
<?php elseif(isset($_GET['error_off_views'])):?>
  <script>  
        alert(['Erreur pendant la fermeture de la ligne'])

    </script>
<?php endif; ?>

<?php 
  if(isset($_GET['error_wilaya']) ): ?>

    <script>  
        alert(['La wilaya existe d??ja'])

    </script>
<?php elseif(isset($_GET['success'])):?>
  <script>  
        alert(['Ajout??'])

    </script>
    <?php elseif((isset($_GET['error_citoyen']))):?>
  <script>  
        alert(['Le ciotyen existe deja'])

    </script>
    <?php elseif((isset($_GET['error_views']))):?>
  <script>  
        alert(['erreur des vues'])

    </script>
    <?php elseif((isset($_GET['success_views']))):?>
  <script>  
        alert(['Vues bien cr??es'])

    </script>
<?php endif; ?>
</html>