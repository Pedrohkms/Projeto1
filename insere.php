<?php

    
    $usuario = 'root';
    $senha= 'vertrigo';

    $conecta = mysqli_connect('localhost', $usuario, $senha);

    if (!$conecta)
    {
        echo 'não conectou';
    }

    if (!mysqli_select_db($conecta, 'guardalink'))
    {
        echo 'tabela nao selecionada';
    }

    $link = $_POST['link'];
    $titulo = $_POST['titulo'];
    $cat = $_POST['cat'];

    $sql = "INSERT INTO guardalink (link, titulo, categoria) VALUES ('$link', '$titulo', '$cat')";

    if (!mysqli_query($conecta,$sql))
    {
        echo 'não inserido';
    }
    else
    {
        echo 'inserido';
    }

    header("refresh:1; url=index.php");


?>