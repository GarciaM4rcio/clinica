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
            if (isset($_GET['id_medico'])) {
                include('../../conexao.php');

                $id_medico=$_GET['id_medico'];

                $query="SELECT * FROM medico WHERE id_medico=$id_medico";

                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<form method='POST'>";
                        echo "<p>ID: ".$row['id_medico']."</p>";
                        echo "<p>Nome: ".$row['nome']."</p>";
                        echo "<p>Confirma a exclusão?</p>";                    
                        echo "<input type='hidden' name='id_medico' name='id_medico' value='".$row['id_medico']."'>";
                        echo "<div class='botoes'>";
                            echo "<input type='submit' name='confirmar' value='Sim' class='atualizar'>";
                            echo "<input type='submit' name='cancelar' value='Não' class='cancelar'>";
                        echo "</div>";    
                    echo "</form>";
                } else {
                    echo "Medico não encontrado.";
                }

                mysqli_close($con);
            } else {
                echo "ID do medico não especificado.";
            }    
            ?>
            <?php         
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
                include('../../conexao.php');

                $id_medico=$_POST["id_medico"];                
                
                $query="DELETE FROM medico WHERE id_medico=$id_medico";

                $result=mysqli_query($con,$query);

                if ($result) {
                    echo "Medico exluido com sucesso!";
                } else {
                    echo "ERRO ao excluir o medico: ".mysqli_error($con);
                }

                mysqli_close($con);

                header("Location: medico.php");
            } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
                header("Location: medico.php");
                exit;
            }
            ?>
        </div>
    </main>
</body>
</html>