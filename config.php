<?php
//set your db here
try {
    $pdo = new PDO("mysql:dbname=tarefas;dbhost=localhost", "root", "123");
} catch(PDOException $e) {
    echo "erro: ".$e;
    exit;
}
?>
