<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    include("config.php");
    if(isset($_SESSION['grade'])){
        $sess = $_SESSION['grade'];
        $select = '<div class="list-group">';

        if($sess == 3){
            $req1 = $conn->prepare("select * from theme");
            $req1 -> execute();

            if($req1 -> rowCount() > 0){
                while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
                    $ThemeTmp = $data1['nomtheme'];
                    $select .= '<li class="list-group-item">' .$ThemeTmp .'
                                    <form method ="post" class="form-check-inline" style="float:right;">
                                        <button type="button" style="float:right;" name="suppr" value="'.$ThemeTmp.'"> supprimer </button>
                                    </form>
                                </li>';
                }
            }
        }

        $select .= '            </div>
                            </div>
                        </div>
                    </div>';

    echo $select;
    $conn = null;}
?>
