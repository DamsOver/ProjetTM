<?php
    class TableRowsTopics extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<div class='row'>
                        <div class='col'>
                            <a href='#\'>" . parent::current(). "</a>
                        </div>
                    </div>";
        }

        function beginChildren() {
            echo "<div class=\"container\">";
        }

        function endChildren() {
            echo "</div>" . "\n";
        }
    }

    try {
        include("php/config.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select nomtopic from topic");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRowsTopics(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
