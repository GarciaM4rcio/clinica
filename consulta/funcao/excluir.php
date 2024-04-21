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
            if (isset($_GET['id'])) {
                include('../../conexao.php');

                $id=$_GET['id'];

                $query="SELECT * FROM funcao WHERE id=$id";

                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<form method='POST'>";
                        echo "<p>ID: ".$row['id']."</p>";
                        echo "<p>Descrição: ".$row['descricao']."</p>";
                        echo "<p>Confirma a exclusão?</p>";                    
                        echo "<input type='hidden' name='id' name='id' value='".$row['id']."'>";
                        echo "<div class='botoes'>";
                            echo "<input type='submit' name='confirmar' value='Sim' class='atualizar'>";
                            echo "<input type='submit' name='cancelar' value='Não' class='cancelar'>";
                        echo "</div>";    
                    echo "</form>";
                } else {
                    echo "Função não encontrada.";
                }

                mysqli_close($con);
            } else {
                echo "ID da função não especificada.";
            }    
            ?>
            <?php         
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
                include('../../conexao.php');

                $id=$_POST["id"];                
                
                $query="DELETE FROM funcao WHERE id=$id";

                $result=mysqli_query($con,$query);

                if ($result) {
                    echo "Função exluida com sucesso!";
                } else {
                    echo "ERRO ao excluir a função: ".mysqli_error($con);
                }

                mysqli_close($con);

                header("Location: funcao.php");
            } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
                header("Location: funcao.php");
                exit;
            }
            ?>
        </div>
    </main>
</body>
</html>