<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title></title>
    </head>
    <body>

    <?php
        include("php/navbar.php");
    ?>

    <div class="container">
        <!--Il faut soit un nombre max de div row par page et donc des boutons pour passer d'une page à une autre
        soit charger autant de div que de résultats après requete sql
        Utilité de faire un xsl -> on devra écrire qu'une fois les balises à créer et ça les créera pour tout ce que
        va renvoyer la requete-->
        <?php
            // faire pareil avec des json ?
            // dans l'idée :
            $xml = new DOMDocument();
            $xml -> load();

            $xsl = new DOMDocument();
            $xsl = load("xsl/test_florian.xsl");

            $proc = new XSLTProcessor();
            $proc -> importStylesheet($xsl);
            $proc -> transformToXml($xml);
        ?>
    </div>

    </body>
</html>
