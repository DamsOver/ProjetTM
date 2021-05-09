<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");

    if(isset($_SESSION['grade'])){
        $sess = $_SESSION['grade'];
        $mail = $_SESSION['mail'];
        $Theme ='';

        // Si admin alors récupère la liste des utilisateurs, modérateur et administrateur
        // Sinon si moderateur alors récupère la liste des utilisateurs
        if($sess == 3){
            $req1 = $conn->prepare("select * from utilisateur where mail != '$mail'");
            $Theme ='Liste des thèmes';
        } else {
            $req1 = $conn->prepare("select * from utilisateur where mail != '$mail' and role = 1 ");
        }

        $req1 -> execute();

        $select = '<div class="container.fluid" id = themeUser>
                        <div class="row">
                            <div class="col-6" style="color:white;">
                                <h2>Liste des Utilisateurs</h2>
                            </div>
                            <div class="col-6" style="color:white;">
                                <h2>'.$Theme .'</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container.fluid" id = themeUser>
                        <div class="row">
                            <div class="col-6 pb-4">';
        echo $select;
}
?>