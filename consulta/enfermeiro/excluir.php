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
            <h1>excluir</h1>
        </div>

        <div>              
            <?php
            if (isset($_GET['matricula'])) {
                include('../../conexao.php');

                $matricula=$_GET['matricula'];

                $query="SELECT * FROM enfermeiro WHERE matricula=$matricula";

                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<form method='POST'>";
                        echo "<p>ID: ".$row['matricula']."</p>";
                        echo "<p>Nome: ".$row['nome']."</p>";
                        echo "<p>Confirma a exclusão?</p>";                    
                        echo "<input type='hidden' name='matricula' value='".$row['matricula']."'>";
                        echo "<div class='botoes'>";
                            echo "<input type='submit' name='confirmar' value='Sim' class='atualizar'>";
                            echo "<input type='submit' name='cancelar' value='Não' class='cancelar'>";
                        echo "</div>";    
                    echo "</form>";
                } else {
                    echo "Matricula não encontrada.";
                }

                mysqli_close($con);
            } else {
                echo "Matricula do enfermeiro não especificado.";
            }    
            ?>
            <?php         
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
                include('../../conexao.php');

                $matricula=$_POST["matricula"];                
                
                $query="DELETE FROM enfermeiro WHERE matricula=$matricula";

                $result=mysqli_query($con,$query);

                if ($result) {
                    echo "Enfermeiro exluido com sucesso!";
                } else {
                    echo "ERRO ao excluir o enfermeiro: ".mysqli_error($con);
                }

                mysqli_close($con);

                header("Location: enfermeiro.php");
            } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
                header("Location: enfermeiro.php");
                exit;
            }
            ?>
        </div>
    </main>
</body>
</html>