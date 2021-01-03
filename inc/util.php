<?php
$GLOBALS["DEBUG_MODE"] = true;
class Util {

    function getConfig() {
        return include("./inc/config.php");
    }
    
    
    
    function sqlConnection() {
        $cfg = getConfig();
        $link = mysqli_connect($cfg["DB_HOST"], $cfg["DB_USER"], $cfg["DB_PASS"], $cfg["DB_NAME"]);
    
        if(!$link) {
            // TODO: email hibaüzenet
            include("../fatal.html");
            die();
        }
    
        $link->set_charset("utf8mb4");
    
        return $link;
    }
    
    
    // TODO: Production hibaellenőrzés
    function simpleStmt($sql, $types="", $bind=[]) {
        $link = sqlConnection();
        
        $stmt = $link->prepare($sql);
    
        if(!$stmt) {
            // TODO: email hibaüzenet
            if($GLOBALS["DEBUG_MODE"]) {
                echo "Sikertelen STMT előkészítés! Query:".htmlspecialchars($sql);
            }
            return false;
        }
        if(isset($types) && $types != "") {
            if(gettype($bind) != "array" && $GLOBALS["DEBUG_MODE"]) {
                echo "bind nem array.";
                die();
            }
            
            if(!$stmt->bind_param($types, ...$bind)) {
                if($GLOBALS["DEBUG_MODE"]) {
                    echo "Sikertelen bind param";
                    die();
                }
                return false;
            }
        }
    
        if(!$stmt->execute()) {
            if($GLOBALS["DEBUG_MODE"]) {
                echo "stmt futtatás hiba. Hibalista:";
                foreach($stmt->error_list as $error) {
                    echo htmlspecialchars($error) . "<br>";
                }
                die();
            }
            return false;
        }
    
        $result = $stmt->get_result();
        if($result) return $result;
        return null;
    
    }

    

    function activePage($page) { if ("/".$page == $_SERVER['PHP_SELF']) echo 'class="active"'; }

}


?>