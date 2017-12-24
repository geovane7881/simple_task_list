<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    //default option check
    $opt = 1;
    //parameter u = uncheck
    if(isset($_GET['u'])) {
        $opt = 0;
    }
    
    $sql = "UPDATE tasks SET finish = :opt WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':opt', $opt);
    $sql->execute();

    header('Location: index.php');
}

?>
