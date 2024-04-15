<?php
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$numero=$_POST['numero'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=strtoupper($_POST['estado'];)
$crm=$_POST['crm'];
$salario=$_POST['salario'];
$celular=$_POST['celular'];
$codEsp=$_POST['codEsp'];

include('../conexao.php');

$query="INSERT INTO paciente (nome,cpf,numero,endereco,bairro,cidade,estado,crm,salario,celular,codEsp) 
VALUES ('$nome','$cpf','$numero','$endereco','$bairro','$cidade','$estado','$crm','$salario','$celular',
'$codEsp')";

$resu=mysqli_query($con,$query);

if (mysqli_insert_id($con)) {
    echo "<br><font color=blue> Inclusão realizada com sucesso !!</font>";
} else {
    echo "<br><font color=red> ERRO: Inclusão não realizada !!</font>";
}

mysqli_close($con);
?>