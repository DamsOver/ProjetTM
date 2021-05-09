<?php
    if(session_status()===PHP_SESSION_NONE){
        session_start();
    }

    // Détruire la session.
    if(session_destroy()) {
        header("Location: login.php");
    }
?>