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
    <link rel="stylesheet" type="text/css" href="paciente.css">
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
            <h1>consulta</h1>
            <div class="lista">
                <a class="paciente">Paciente</a>
                <a class="medico" href="../medico/medico.php">Médico</a>
                <a class="especialidade" href="../especialidade/especialidade.html">Especialidade</a>
                <a class="enfermeiro" href="../enfermeiro/enfermeiro.php">Enfermeiro</a>
                <a class="funcao" href="../funcao/funcao.html">Função</a>
            </div>
        </div>

        <div>           
            <form> 
            <table>
                <tr>
                <td class='nome'>Nome</td>
                </tr>
                <?php
                    include('../../conexao.php');
                    $query="SELECT * FROM paciente ORDER BY nome";
                    $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
                    while ($reg=mysqli_fetch_array($resu)) {
                        echo "<tr><td class='nome'>".$reg['nome']."</td>";                        
                        echo "<td><a href='alterar_paciente.php?id=".$reg['id']."'>Editar</a></td>";
                        echo "<td><a href='excluir_paciente.php?id=".$reg['id']."'>Excluir</a></td></tr>";
                    }
                ?>
            </table>    
            </form>
            <?php
                mysqli_close($con);
            ?>
        </div>
    </main>
</body>
</html>