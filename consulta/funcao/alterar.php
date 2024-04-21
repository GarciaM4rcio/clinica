<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica - GARCIA</title>
    <link rel="stylesheet" type="text/css" href="../../styles/reset.css">
    <link rel="stylesheet" type="text/css" href="../../styles/header.css">
    <link rel="stylesheet" type="text/css" href="../../styles/body.css">
    <link rel="stylesheet" type="text/css" href="../consulta.css">
</head>
<body>
    <header>
        <span>garcia</span>
        <div>
            <ul  class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../../cadastro/paciente/paciente.html">Cadastro</a></li>
                <li><a>Consultas</a></li>
            </ul>
        </div>
        <a class="git" href="https://github.com/GarciaM4rcio">Github</a>
    </header>
    <main>
        <div class="cabecalho">
            <h1>alterar</h1>
        </div>

        <div>  
            <?php         
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
                include('../../conexao.php');

                $id=$_POST["id"];
                $descricao=$_POST["descricao"];
                
                $query="UPDATE funcao SET 
                descricao='$descricao'
                WHERE id=$id";

                $resu=mysqli_query($con,$query);

                if ($resu) {
                    echo "Atualização realizada com sucesso!";
                } else {
                    echo "ERRO ao atualizar os dados: ".mysqli_error($con);
                }

                mysqli_close($con);

                header("Location: funcao.php");
            } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
                header("Location: funcao.php");
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                include('../../conexao.php');

                $id=$_GET['id'];

                $query="SELECT * FROM funcao WHERE id=$id";

                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);
            ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                
                <div class="formulario">
                    <label>Descrição<input type="text" maxlength="100" name="descricao" required class="nome" autofocus value="<?php echo $row['descricao']; ?>"></label>                    
                </div>
                <div class="botoes">
                    <input type="submit" name="atualizar" value="Atualizar" class='atualizar'>
                    <input type="submit" name="cancelar" value="Cancelar" class='cancelar'>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </main>
</body>
</html>