<?php
    include("php/config.php");

    // Si l'utilisateur est connecté
    if(isset($_SESSION['grade'])){
        $sess = $_SESSION['grade'];
        $mail = $_SESSION['mail'];
        $select = '';

        // Si administrateur
        if($sess==3){
            $select = ' <h3>Ajout d\'un theme : </h3>
                    <form action="" method="post">
                        <div class="form-group" id="MainAjout">
                            <label for="InputNomTopic" style="color:white;">Nom du thème</label>
                            <div class="row">
                                <div class="col-6" style="color:white;">
                                    <input type="text" id="nTheme" class="form-control" id="InputNomTopic" placeholder="Nom du thème">
                                    </br>
                                    <button type="button" name="ajout" id="ajout" class="btn btn-primary">Ajouter</button>
                                </div>
                                <div class="col-6" style="color:white;">
                                    <select id="listCat" class="form-control" name ="selectCat">';

            // Récupère les catégories
            $req1 = $conn->prepare("select * from categorie");
            $req1 -> execute();

            if($req1 -> rowCount() > 0){
                while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
                    $catTmp = $data1['nomcat'];
                    $select .= '<option>'.$catTmp.'</option>';
                }
            }

            $select.= '</select>
                                </div>
                            </div>
                        </div>
                    </form>';
        }
    echo $select;
    }
    $conn = null;
?>
