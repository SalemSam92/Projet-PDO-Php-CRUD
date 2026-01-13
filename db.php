<?php
require_once("env.php");
try {
    $db = new PDO("mysql:host=$hostName;dbname=$dbName", $UserName, $passWord);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

   $db->beginTransaction();
   require_once("request.php");
   $db->commit();
   $db = null;
} catch (PDOException $error) {
    $db->rollBack();
    $sb = null;
    echo "Erreur : " . $error->getMessage();
}


