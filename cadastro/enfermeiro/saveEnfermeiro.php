<?php
$nome=$_POST['nome'];
$numero=$_POST['numero'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$email=$_POST['email'];
$salario=$_POST['salario'];
$turno=$_POST['turno'];

include('../../conexao.php');

$query="INSERT INTO enfermeiro (nome,numero,cep,endereco,bairro,cidade,estado,cpf,rg,
telefone,celular,email,salario,turno_trabalho) VALUES ('$nome','$numero','$cep','$endereco',
'$bairro','$cidade','$estado','$cpf','$rg','$telefone','$celular','$email','$salario'
,'$turno')";

$resu=mysqli_query($con,$query);

if (mysqli_insert_id($con)) {
    echo "<br><font color=blue> Inclusão realizada com sucesso !!</font>";
} else {
    echo "<br><font color=red> ERRO: Inclusão não realizada !!</font>";
}

mysqli_close($con);
?>