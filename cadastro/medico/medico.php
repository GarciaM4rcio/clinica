<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica - GARCIA</title>
    <link rel="stylesheet" type="text/css" href="../../styles/reset.css">
    <link rel="stylesheet" type="text/css" href="../../styles/header.css">
    <link rel="stylesheet" type="text/css" href="../../styles/body.css">
    <link rel="stylesheet" type="text/css" href="../cadastro.css">
    <link rel="stylesheet" type="text/css" href="medico.css">
</head>
<body>
    <header>
        <span>garcia</span>
        <div>
            <ul  class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="paciente.php">Cadastro</a></li>
                <li><a href="../../consulta/paciente/paciente.php">Consultas</a></li>
            </ul>
        </div>
        <a class="git" href="https://github.com/GarciaM4rcio">Github</a>
    </header>
    <main>
        <div class="cabecalho">
            <h1>cadastro</h1>
            <div class="lista">
                <a class="paciente" href="../paciente/paciente.php">Paciente</a>
                <a class="medico">Médico</a>
                <a class="especialidade" href="../especialidade/especialidade.html">Especialidade</a>
                <a class="enfermeiro" href="../enfermeiro/enfermeiro.php">Enfermeiro</a>
                <a class="funcao" href="../funcao/funcao.html">Função</a>
            </div>
        </div>

        <div>
            <form action="saveMedico.php" method="post">
                <div class="formulario">
                    <label>Nome<input type="text" maxlength="100" name="nome" required class="nome" autofocus></label>
                    <label>Cpf<input type="text" maxlength="11" name="cpf" required class="cpf"></label>
                    <label>Cep<input type="text" maxlength="8" name="cep" required class="cep" id="cep" onblur="carregaCep()"></label>
                    <label>Numero<input type="text" maxlength="10" name="numero" required class="numero"></label>                
                    <label>Endereco<input type="text" maxlength="100" name="endereco" required class="endereco" id="rua"></label>               
                    <label>Bairro<input type="text" maxlength="60" name="bairro" required class="bairro" id="bairro"></label>
                    <label>Cidade<input type="text" maxlength="80" name="cidade" required class="cidade" id="cidade"></label>                
                    <label>Estado
                    <select name="estado" class="estado" id="estado">
                        <option value="" disabled selected>-</option>
                        <option value="ac">AC</option><option value="al">AL</option><option value="ap">AP</option>
                        <option value="am">AM</option><option value="ba">BA</option><option value="ce">CE</option>
                        <option value="df">DF</option><option value="es">ES</option><option value="go">GO</option>
                        <option value="ma">MA</option><option value="mt">MT</option><option value="ms">MS</option>
                        <option value="mg">MG</option><option value="pa">PA</option><option value="pb">PB</option>
                        <option value="pr">PR</option><option value="pe">PE</option><option value="pi">PI</option>                    
                        <option value="rj">RJ</option><option value="rn">RN</option><option value="rs">RS</option>
                        <option value="ro">RO</option><option value="rr">RR</option><option value="sc">SC</option>
                        <option value="sp">SP</option><option value="se">SE</option><option value="to">TO</option>
                    </select></label>                
                    <label>CRM<input type="text" maxlength="20" name="crm" required class="crm"></label>
                    <label>Salario<input type="number" min="0" max="40000" step="100" name="salario" class="salario" required></label>
                    <label>Celular<input type="text" maxlength="15" name="celular" id="celular" placeholder="(XX)XXXX-XXXX" required class="celular"></label>
                    <label>Especialidade
                        <select name="codEsp" class="codEsp">
                            <option value="" disabled selected>-</option>
                            <?php 
                            include('../../conexao.php'); 
                            $query='SELECT * FROM especialidade ORDER BY descricao;';
                            $resu=mysqli_query($con,$query) or die (mysqli_connect_error());
                            while ($reg=mysqli_fetch_array($resu)) {
                            ?>
                            <option value="<?php echo $reg['id'];?>"> <?php echo $reg['descricao'];?></option>
                            <?php } mysqli_close($con)?>    
                        </select>
                    </label>
                </div>
                <div class="botoes"> 
                    <input type="reset" value="Limpar" class="limpar">
                    <input type="submit" value="Cadastrar" class="enviar">
                </div>    
            </form>
        </div>
        <script src="script.js"></script>
    </main>
</body>
</html>