<?php
    /*echo json_encode($handle->fetchAll(PDO::FETCH_ASSOC));*/

    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<a class=\"nav-link  dropdown-toggle\" href=\"#\" data-bs-toggle=\"dropdown\">" . parent::current(). "</a>";
        }

        function beginChildren() {
            echo "<li class=\"nav-item dropdown\">";
        }

        function endChildren() {
            echo "</li>" . "\n";
        }
    }

    try {
        include("php/config.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from categorie");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>
