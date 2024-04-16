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
    <link rel="stylesheet" type="text/css" href="enfermeiro.css">
</head>
<body>
    <header>
        <span>garcia</span>
        <div>
            <ul  class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="paciente.html">Cadastro</a></li>
                <li><a href="../../consulta/paciente/paciente.php">Consultas</a></li>
            </ul>
        </div>
        <a class="git" href="https://github.com/GarciaM4rcio">Github</a>
    </header>
    <main>
        <div class="cabecalho">
            <h1>cadastro</h1>
            <div class="lista">
                <a class="paciente" href="../paciente/paciente.html">Paciente</a>
                <a class="medico" href="../medico/medico.php">Médico</a>
                <a class="especialidade" href="../especialidade/especialidade.html">Especialidade</a>
                <a class="enfermeiro">Enfermeiro</a>
                <a class="funcao" href="../funcao/funcao.html">Função</a>
            </div>
        </div>    
    
        <div>
            <form method="post" action="saveEnfermeiro.php">
                <div class="formulario">
                    <label>Nome<input type="text" maxlength="100" name="nome" class="nome" required></label>
                    <label>Cep<input type="text" maxlength="8" name="cep" class="cep" id="cep" onblur="carregaCep()" required></label>
                    <label>Número<input type="text" maxlength="10" name="numero" class="numero" required></label>
                    <label>Cidade<input type="text" maxlength="80" name="cidade" class="cidade" id="cidade" required></label>
                    <label>Endereco<input type="text" maxlength="100" name="endereco" class="endereco" id="rua" required></label>                
                    <label>Bairro<input type="text" maxlength="50" name="bairro" class="bairro" id="bairro" required></label>                
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
                        </select>
                    </label>
                    <label>CPF<input type="text" maxlength="11" name="cpf" class="cpf" required></label>
                    <label>RG<input type="text" maxlength="9" name="rg" class="rg" required></label>
                    <label>Telefone<input type="text" maxlength="15" name="telefone" class="telefone" id="telefone" placeholder="(XX)XXXXX-XXXX" required></label>
                    <label>Celular<input type="text" maxlength="15" name="celular" class="celular" id="celular" placeholder="(XX)XXXX-XXXX" required></label>
                    <label>Email<input type="text" maxlength="100" name="email" class="email" required></label>
                    <label>Salário<input type="number" maxlength="14" name="salario" class="salario" required></label>
                    <label>Turno
                        <select name="turno" class="turno">
                            <option value="" disabled selected>-</option>
                            <option value="manha">Manhã</option>
                            <option value="tarde">Tarde</option>
                            <option value="noite">Noite</option>
                        </select>
                    </label>
                    <label>Função
                        <select name="codFuncao" class="codFuncao">
                            <option value="" disabled selected>-</option>
                            <?php 
                            include('../../conexao.php'); 
                            $query='SELECT * FROM funcao ORDER BY descricao;';
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