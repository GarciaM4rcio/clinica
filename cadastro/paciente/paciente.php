<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
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
    <link rel="stylesheet" type="text/css" href="paciente.css">    
</head>
<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo '<p>'.$_SESSION['msg']."<\p>";
        unset($_SESSION['msg']);
    }
    ?>
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
                <a class="paciente">Paciente</a>
                <a class="medico" href="../medico/medico.php">Médico</a>
                <a class="especialidade" href="../especialidade/especialidade.html">Especialidade</a>
                <a class="enfermeiro" href="../enfermeiro/enfermeiro.php">Enfermeiro</a>
                <a class="funcao" href="../funcao/funcao.html">Função</a>
            </div>
        </div>

        <div>            
            <form action="savePaciente.php" method="post"> 
                <div class="formulario">               
                    <label>Nome<input type="text" maxlength="100" name="nome" required class="nome" autofocus></label>
                    <label>Cep<input type="text" maxlength="8" name="cep" class="cep" id="cep" onblur="carregaCep()" required></label>
                    <label>Numero<input type="text" maxlength="10" name="numero" required class="numero"></label>
                    <label>Complemento<input type="text" maxlength="50" name="complemento" class="complemento"></label>
                    <label>Endereco<input type="text" maxlength="100" name="endereco" required class="endereco" id="rua"></label>               
                    <label>Bairro<input type="text" maxlength="50" name="bairro" required class="bairro" id="bairro"></label>
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
                    <label>Cpf<input type="text" maxlength="11" name="cpf" required class="cpf"></label>
                    <label>Rg<input type="text" maxlength="9" name="rg" required class="rg"></label>                    
                    <fieldset>
                        <legend>Telefones</legend>
                        <div id="telefones">
                            <label for="tel_1">Telefone 1<input type="tel" name="telefones[]" placeholder="(XX)XXXXX-XXXX"></label>
                        </div>
                        <button type="button" onclick="addTelefone()">Adicionar Telefone</button>
                    </fieldset>                    
                    <label>Email<input type="email" maxlength="100" name="email" required class="email"></label>
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