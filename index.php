<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat Civil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="m-5">
    <table class="table center">
        <thead >
            <tr>
                <th class="p-5">Etat Civil Algerie</th>
            </tr>
            </thead>
        <tr>
            
            <td class="table-dark" >
                <a href="Administration/citoyen.html" class="fill-div" id="td1" >Citoyens</a>
                <i class="fas fa-user-shield"></i>
            </td>
            
        
        </tr>
        <tr><td class="table-light" >
                <a  href="Administration/" class="fill-div" id="td2">Administration</a>

            </td></tr>
        
    </table>
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
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
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
         <form action="connect.php" method="post" id="form_ajouter_wilaya">

            <div class="mb-3">
                <label for="code_wilaya" class="form-label">Code Wilaya</label>
                <input type="number" class="form-control" name="code_wilaya" placeholder="remplir" >
              </div>
              <div class="mb-3">
                <label for="nom_wilaya" class="form-label">Nom Wilaya</label>
                <input type="text" class="form-control" name="nom_wilaya" placeholder="Max 20 characteres">
              </div>
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="form_ajouter_wilaya" class="btn btn-success">Ajouter</button>
        </div>
    
      </div>
    </div>
  </div>
  <?php if(isset($_GET['error_wilaya'])): ?>

    <script>  
        alert(['La wilaya existe deja'])

    </script>
    
  <?php endif; ?>
</html>