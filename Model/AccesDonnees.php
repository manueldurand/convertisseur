<?php
/**
 * classe d'accès à la base de données par PDO
 * 
 */
class AccesDonnees {
    private static $servername = "mysql:host=localhost"; // nom du serveur
    private static $dbname = "dbname=devises"; // nom de la base de données
    private static $username = "manuel"; // nom d'utilisateur
    private static $pwd = "manuel2023"; // mot de passe
/**
 * fonction statique, crée une instance de PDO
 * @return PDO
 */
    public static function getPDO() {
        try { 
            $conn = new PDO(AccesDonnees::$servername . ';' . AccesDonnees::$dbname, AccesDonnees::$username, AccesDonnees::$pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo 'erreur de connexion';
           $e->getMessage();
           $errors=json_encode($e, true);
           var_dump($errors);
           var_dump($e);
        } 
            
        return $conn;
    }
    public static function getDevises() {
   $conn = AccesDonnees::getPDO();
   $req = "SELECT DISTINCT nomPays, nomDevise, codeDevise FROM devisesDuMonde ORDER BY nomPays";
   $stmt = $conn->prepare($req);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

