<?php
$descricao=$_POST['descricao'];

include('../../conexao.php');

$query="INSERT INTO funcao (descricao) VALUES ('$descricao')";

$resu=mysqli_query($con,$query);

if (mysqli_insert_id($con)) {
    echo "<br><font color=blue> Inclusão realizada com sucesso !!</font>";
} else {
    echo "<br><font color=red> ERRO: Inclusão não realizada !!</font>";
}

mysqli_close($con);
?>