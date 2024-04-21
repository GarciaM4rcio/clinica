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
    <link rel="stylesheet" type="text/css" href="funcao.css">
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
                <a class="paciente" href="../paciente/paciente.php">Paciente</a>
                <a class="medico" href="../medico/medico.php">Médico</a>
                <a class="especialidade" href="../especialidade/especialidade.php">Especialidade</a>
                <a class="enfermeiro" href="../enfermeiro/enfermeiro.php">Enfermeiro</a>
                <a class="funcao">Função</a>
            </div>
        </div>

        <div>           
            <form> 
            <table>
                <tr>
                <td class='id'>Id</td>    
                <td class='titulo' colspan='3'>Descrição</td>
                </tr>
                <?php
                    include('../../conexao.php');
                    $query="SELECT * FROM funcao ORDER BY id";
                    $resu=mysqli_query($con,$query) or die(mysqli_connect_error());
                    while ($reg=mysqli_fetch_array($resu)) {
                        echo "<tr class='linha'><td class='id'>".$reg['id']."</td>";
                        echo "<td class='nome'>".$reg['descricao']."</td>";                        
                        echo "<td class='editar'><a href='alterar.php?id=".$reg['id']."' class='txtEditEditar'>Editar</a></td>";
                        echo "<td class='excluir'><a href='excluir.php?id=".$reg['id']."' class='txtEditExcluir'>Excluir 🗑</a></td></tr>";
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