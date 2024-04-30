<?php
session_start();
$nome=$_POST['nome'];
$numero=$_POST['numero'];
$complemento=$_POST['complemento'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=strtoupper($_POST['estado']);
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$email=$_POST['email'];
$telefones=$_POST['telefones'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include('../../conexao.php');
mysqli_begin_transaction($con) or die(mysqli_connect_error());
try {
    $query="INSERT INTO paciente (nome,numero,complemento,cep,endereco,bairro,cidade,estado,cpf,rg,email) 
    VALUES ('$nome','$numero','$complemento','$cep','$endereco','$bairro','$cidade','$estado','$cpf','$rg','$email')";   
    $resu=mysqli_query($con,$query);
    $id_paciente=mysqli_insert_id($con);    
    foreach($telefones as $tel) {
        $query_tel="INSERT INTO telefone (numero,id_paciente) VALUES ('$tel','$id_paciente')";
        $resul=mysqli_query($con,$query_tel);
    }    

    mysqli_commit($con);
    $_SESSION['msg']="<p style='color:green;'>Paciente cadastrado com sucesso</p>";
    header("Location: paciente.php");
}catch(mysqli_sql_exception $exception) {
    mysqli_rollback($con);

    throw $exception;
    $_SESSION['msg']="<p style='color:red;'>Paciente não foi cadastrado, verifique</p>";
    header("Location: paciente.php");
}

mysqli_close($con);
?>