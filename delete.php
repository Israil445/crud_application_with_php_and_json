<?php

    $json = file_get_contents('books.json');
    $books = json_decode($json, true);
  

    $key = $_GET['id'];

    array_splice($books, $key, 1);


    $db_enc = json_encode($books);
    file_put_contents('books.json', $db_enc);

    header('Location: index.php');
?>

Sucessfuly deleted!!!