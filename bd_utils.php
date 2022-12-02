<?php
require_once "class_admin.php";
require_once "class_fase.php";
    const CONCURSANT = "concursant";
    const FASE = "fase";
    const ADMIN = "admin";

    function insert(string $taula, array $contingut):void{
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    
        switch ($taula) {
            case CONCURSANT:
                $sql = "insert into " . $taula . " values(?, ?, ?, ?, ?, ?, ?)";
                $query = $pdo->prepare($sql);
                $query->execute($contingut);
                break;
            
            case FASE:
                $sql = "insert into " . $taula . " values(?, ?, ?, ?)";
                $query = $pdo->prepare($sql);
                $query->execute($contingut);
                break;

            case ADMIN:
                $sql = "insert into " . $taula . " values(?, ?)";
                $query = $pdo->prepare($sql);
                $query->execute($contingut);
                break;
            
            default:
                break;
        }

        unset($pdo);
        unset($query);
    }

    function update(string $taula, string $columna, int|string $valor, string $columna_unica, string|int $valor_unic): void{
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }

        //$sql = "update ? set ? = '?' where ? = ?";
        $sql = "update $taula set $columna = '$valor' where $columna_unica = $valor_unic";
        $query = $pdo->prepare($sql);
        //$query->execute(array($taula, $columna, $valor, $columna_unica, $valor_unic));
        $query->execute();

        unset($pdo);
        unset($query);
    }

    function delete(string $taula, string $columna_unica, int|string $valor_unic):void{
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }

        $sql = "delete from ? where ? = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($taula, $columna_unica, $valor_unic));

        unset($pdo);
        unset($query);
    }

    function incrementarVot(string $taula, string $columna, string $columna_unica, int $valor_unic){
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }

        $sql = "update ? set ? = ?+1 where ? = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($taula, $columna, $columna, $columna_unica, $valor_unic));

        unset($pdo);
        unset($query);
    }

    function obtenirUsuari(string $usuari, string $contrasenya):Admin|null{
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    
        //preparem i executem la consulta
        $query = $pdo->prepare("select * from admin where user = ? AND password = ?");
        $query->execute(array($usuari, md5($contrasenya)));
    
        $admin = null;
        foreach ($query as $row) {
            $admin = new Admin($row["user"], $row["password"]);
        }
    
        //eliminem els objectes per alliberar memòria 
        unset($pdo);
        unset($query);
    
        return $admin;
    }

    function obtenirFase(int $nFase): array|null{
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos_atura";
            $username = "dwes-user";
            $pw = "dwes-pass";
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    
        //preparem i executem la consulta
        $query = $pdo->prepare("select * from fase where nFase = ?");
        $query->execute(array($nFase));
    
        $fase = [];

        foreach ($query as $row) {
            $fase = ["nFase" => $row["nFase"], "dataInici" => $row["dataInici"], "dataFi" => $row["dataFi"], "concursants" => json_decode($row["concursants"])];
        }
    
        //eliminem els objectes per alliberar memòria 
        unset($pdo);
        unset($query);
    
        return $fase;
    }
?>