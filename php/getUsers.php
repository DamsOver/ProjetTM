<?php
include("php/config.php");

if(isset($_SESSION['grade'])){

    $sess = $_SESSION['grade'];
    $mail = $_SESSION['mail'];
    $Theme ='';

    if($sess==3){
        $req1 = $conn->prepare("select * from utilisateur where mail != '$mail'");
        $Theme ='Liste des thèmes';
    }else{
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
            <div class="col-6 pb-4">
                <ul class="list-group" id ="MainListGroupUser">';



    if($req1 -> rowCount() > 0){
        if($sess==3){
            $i1=0;
            while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
                $PseudoTmp = $data1['pseudo'];
                $MailTmp = $data1['mail'];
                $roleTmp= $data1['role'];

                $select .= '<li class="list-group-item ">
                                <div class="row">
                                    <div class="col-6 pb-4">
                                        ' .$PseudoTmp .'   mail : 
                                        <span>'.$MailTmp.'</span>
                                    </div>
                                    <div class="col-6 pb-4" id="">
                                        <select class="form-control" id="'.$i1 .'" value ="ok">';
                if($roleTmp==1){
                    $select.='              <option value="'.$MailTmp.'" selected="selected">Utilisateur</option>
                                            <option value="'.$MailTmp.'">Modérateur</option>
                                            <option value="'.$MailTmp.'">Administrateur</option>';

                } elseif($roleTmp==2){
                    $select.='              <option value="'.$MailTmp.'">Utilisateur</option>
                                            <option value="'.$MailTmp.'" selected="selected">Modérateur</option>
                                            <option value="'.$MailTmp.'">Administrateur</option>';
                }
                else{
                    $select.='              <option value="'.$MailTmp.'">Utilisateur</option>
                                            <option value="'.$MailTmp.'">Modérateur</option>
                                            <option value="'.$MailTmp.'" selected="selected">Administrateur</option>';
                }

                $select .='              </select>  
                                    </div>
                                </div>
                                <form method ="post" class="form-check-inline" style="float:right;">
                                    <button style="float:middle;" name="suppr" value='.$MailTmp.'> supprimer </button>
                                </form>
                            </li>
                ';
                $i1+=1;
            }

        }else{
            while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
                $PseudoTmp = $data1['pseudo'];
                $MailTmp = $data1['mail'];
                $select .= '<li class="list-group-item">' .$PseudoTmp .'</br>'.$MailTmp .'
                    <form method ="post" class="form-check-inline" style="float:right;">
                        <button style="float:right;" name="suppr" value='.$MailTmp.'> supprimer </button>
                    </form>
                </li>';
            }
        }
    }

    if (isset($_POST['suppr'])) {
        $mailASup = $_POST['suppr'];
        $req1 = $conn->prepare("delete from utilisateur where mail = '$mailASup'");
        $req1 -> execute();
        header("Location: displayAdmin.php");
    }

    echo $select;
}
$conn = null;
?>