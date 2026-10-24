<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion Client</title>
    <link rel="icon" href="../Image/favicon.webp" type="image/ico">
    <link rel="stylesheet" href="../style/bootstrap/police.css">
    <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../style/bootstrap/icon.css">
    <link rel="stylesheet" href="../style/bootstrap/font-awesome.min.css">
    <link rel="stylesheet" href="../style/Pages/Client.css">
    <script src="../style/bootstrap/jquery.min.js"></script>
    <script src="../style/bootstrap/popper.min.js"></script>
    <script src="../style/bootstrap/bootstrap.min.js"></script>
    <!-- <script src="./JS/client.js"></script>   -->
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });

        function Recherche(ip) {
            let val = ip.value;
            var x = new XMLHttpRequest();
            x.open("GET", "../Controller/C_Clients.php?info=" + val, true);
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("infomations").innerHTML = this.responseText;
                }
            };
            x.send();
        }

        function get(parentTr) {
            const value_list = [];
            input_fields = document.getElementsByClassName("inputs");
            indice = 0;
            for (const value of parentTr.children) {
                value_list.push(value.textContent);
            }
            for (const input of input_fields) {
                input.value = value_list[indice];
                indice++;
            }
            input_fields[input_fields.length - 1].value =
                value_list[value_list.length - value_list.length];
        }
    </script>
</head>

<body>


    <div class="container-xxl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Gestion <b>Clients</b></h2>
                        </div>
                        <div class="col-sm-3">
                            <form action="" method="post">
                                <input type="text" id="client" class="form-control" name="client" placeholder="Recherche ...." onkeyup="Recherche(this)">
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nouvelle Client</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody id="infomations">
                        <?php
                        if (!isset($_GET['info'])) {
                            foreach ($Clients as $cl) {
                                echo "<tr onclick='get(this)'>
                                    <td>$cl[0]</td>
                                    <td>$cl[1]</td> 
                                    <td>$cl[2]</td>
                                    <td>$cl[3]</td> 
                                    <td>$cl[4]</td>
                                      
                                    <td> <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                    <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                                    <a href='#AddAnimalModal' class='add' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Add'>&#xE872;</i></a></td>      
                            </tr>";
                            }
                        }
                        ?>





                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter Client</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresse" class="form-control" required>
                        </div>
                      

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" name="add" class="btn btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier Client</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                          
                    <input type="hidden" id="id" name="id" class="inputs">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="inputs form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="inputs form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="telephone" class="inputs form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adresse" class="inputs form-control" required>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" name="update" class="btn btn-info" value="Sauvgarder">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form">
                    <input type="hidden" id="id" name="id" class="inputs">
                    <div class="modal-header">
                        <h4 class="modal-title">Supprimer Client</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer ces enregistrement?</p>
                        <p class="text-warning"><small>Cette actin ne peux pas être ennulée.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" name="delete" class="btn btn-danger" value="Supprimer">
                    </div>
                </form>
            </div>
        </div>
    </div>

   

<div id="AddAnimalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter Animale</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" id="id" name="id" class="inputs">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Espece</label>
                            <select name="espece" class="form-control">
                                <option value="chien">chien</option>
                                <option value="caht">caht</option>
                                <option value="oiseau">oiseau</option>
                                <option value="autre">autre</option>
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Race</label>
                            <input type="text" name="race" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >Sexe</label><br>
                            <input type="radio" name="sexe" value="M" >M
                            <input type="radio" name="sexe" value="F" >F
                        </div>
                        <div class="form-group">
                            <label>Date De Naissance</label>
                            <input type="date" name="dateNaissance" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Num Identification</label>
                            <input type="text" name="numIdentification" class="form-control" >
                        </div>
                       
                        <div class="form-group">
                            <label>sterilise</label><br>
                            <input type="radio" name="sterilise" value="oui" >oui
                            <input type="radio" name="sterilise" value="non" >non
                        </div>
                        
                      

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" name="addan" class="btn btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div></body>

</html>