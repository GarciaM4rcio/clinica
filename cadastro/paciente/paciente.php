<?php
$nome=$_POST['nome'];
$numero=$_POST['numero'];
$complemento=$_POST['complemento'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=strtoupper($_POST['estado'];)
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$email=$_POST['email'];

include('../conexao.php');

$query="INSERT INTO paciente (nome,numero,complemento,endereco,bairro,cidade,estado,cpf,rg,telefone,
celular,email) VALUES ('$nome','$numero','$complemento','$endereco','$bairro','$cidade','$estado',
'$cpf','$rg','$telefone','$celular','$email')";

$resu=mysqli_query($con,$query);

if (mysqli_insert_id($con)) {
    echo "<br><font color=blue> Inclusão realizada com sucesso !!</font>";
} else {
    echo "<br><font color=red> ERRO: Inclusão não realizada !!</font>";
}

mysqli_close($con);
?>