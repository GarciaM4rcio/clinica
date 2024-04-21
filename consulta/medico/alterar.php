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

                $id_medico=$_POST["id_medico"];
                $nome=$_POST["nome"];
                $cpf=$_POST['cpf'];
                $cep=$_POST["cep"];
                $endereco=$_POST["endereco"];
                $numero=$_POST["numero"];
                $bairro=$_POST["bairro"];
                $cidade=$_POST["cidade"];
                $estado=strtoupper($_POST["estado"]);
                $CRM=$_POST["CRM"];
                $salario=$_POST["salario"];
                $celular=$_POST["celular"];
                $cod_esp=$_POST["cod_esp"];
                
                $query="UPDATE medico SET 
                nome='$nome',
                cpf='$cpf',
                cep='$cep',
                endereco='$endereco',
                numero='$numero',
                bairro='$bairro',
                cidade='$cidade',
                estado='$estado',
                CRM='$CRM',
                salario='$salario',
                celular='$celular',
                cod_esp='$cod_esp'
                WHERE id_medico=$id_medico";

                $resu=mysqli_query($con,$query);

                if ($resu) {
                    echo "Atualização realizada com sucesso!";
                } else {
                    echo "ERRO ao atualizar os dados: ".mysqli_error($con);
                }

                mysqli_close($con);

                header("Location: medico.php");
            } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cancelar'])) {
                header("Location: medico.php");
            }
            ?>
            <?php
            if (isset($_GET['id_medico'])) {
                include('../../conexao.php');

                $id_medico=$_GET['id_medico'];

                $query="SELECT * FROM medico WHERE id_medico=$id_medico";

                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);
            ?>
            <form method="POST">
                <input type="hidden" name="id_medico" value="<?php echo $row['id_medico']; ?>">                
                <div class="formulario">
                    <label>Nome<input type="text" maxlength="100" name="nome" required class="nome" autofocus value="<?php echo $row['nome']; ?>"></label>
                    <label>Cpf<input type="text" maxlength="11" name="cpf" required class="cpf" value="<?php echo $row['cpf']; ?>"></label>
                    <label>Cep<input type="text" maxlength="8" name="cep" class="cep" id="cep" onblur="carregaCep()" required value="<?php echo $row['cep']; ?>"></label>
                    <label>Numero<input type="text" maxlength="10" name="numero" required class="numero" value="<?php echo $row['numero']; ?>"></label>
                    <label>Endereco<input type="text" maxlength="100" name="endereco" required class="endereco" id="rua" value="<?php echo $row['endereco']; ?>"></label>                   
                    <label>Bairro<input type="text" maxlength="50" name="bairro" required class="bairro" id="bairro" value="<?php echo $row['bairro']; ?>"></label>
                    <label>Cidade<input type="text" maxlength="80" name="cidade" required class="cidade" id="cidade" value="<?php echo $row['cidade']; ?>"></label>                
                    <label>Estado
                    <select name="estado" class="estado" id="estado">   
                        <?php $estado = isset($row['estado']) ? strtoupper($row["estado"]) : ''?>                                            
                        <option value="ac"<?php if ($estado == "AC") echo " selected"; ?>>AC</option>
                        <option value="al"<?php if ($estado == "AL") echo " selected"; ?>>AL</option>
                        <option value="ap"<?php if ($estado == "AP") echo " selected"; ?>>AP</option>
                        <option value="am"<?php if ($estado == "AM") echo " selected"; ?>>AM</option>
                        <option value="ba"<?php if ($estado == "BA") echo " selected"; ?>>BA</option>
                        <option value="ce"<?php if ($estado == "CE") echo " selected"; ?>>CE</option>
                        <option value="df"<?php if ($estado == "DF") echo " selected"; ?>>DF</option>
                        <option value="es"<?php if ($estado == "ES") echo " selected"; ?>>ES</option>
                        <option value="go"<?php if ($estado == "GO") echo " selected"; ?>>GO</option>
                        <option value="ma"<?php if ($estado == "MA") echo " selected"; ?>>MA</option>
                        <option value="mt"<?php if ($estado == "MT") echo " selected"; ?>>MT</option>
                        <option value="ms"<?php if ($estado == "MS") echo " selected"; ?>>MS</option>
                        <option value="mg"<?php if ($estado == "MG") echo " selected"; ?>>MG</option>
                        <option value="pa"<?php if ($estado == "PA") echo " selected"; ?>>PA</option>
                        <option value="pb"<?php if ($estado == "PB") echo " selected"; ?>>PB</option>
                        <option value="pr"<?php if ($estado == "PR") echo " selected"; ?>>PR</option>
                        <option value="pe"<?php if ($estado == "PE") echo " selected"; ?>>PE</option>
                        <option value="pi"<?php if ($estado == "PI") echo " selected"; ?>>PI</option>                    
                        <option value="rj"<?php if ($estado == "RJ") echo " selected"; ?>>RJ</option>
                        <option value="rn"<?php if ($estado == "RN") echo " selected"; ?>>RN</option>
                        <option value="rs"<?php if ($estado == "RS") echo " selected"; ?>>RS</option>
                        <option value="ro"<?php if ($estado == "RO") echo " selected"; ?>>RO</option>
                        <option value="rr"<?php if ($estado == "RR") echo " selected"; ?>>RR</option>
                        <option value="sc"<?php if ($estado == "SC") echo " selected"; ?>>SC</option>
                        <option value="sp"<?php if ($estado == "SP") echo " selected"; ?>>SP</option>
                        <option value="se"<?php if ($estado == "SE") echo " selected"; ?>>SE</option>
                        <option value="to"<?php if ($estado == "TO") echo " selected"; ?>>TO</option>
                    </select></label>
                    <label>CRM<input type="text" maxlength="20" name="CRM" required class="CRM" value="<?php echo $row['CRM']; ?>"></label>
                    <label>Salario<input type="number" min="0" max="40000" step="100" name="salario" class="salario" required value="<?php echo $row['salario']; ?>"></label>
                    <label>Celular<input type="text" maxlength="10" name="celular" id="celular" placeholder="(XX)XXXX-XXXX" required class="celular" value="<?php echo $row['celular']; ?>"></label>
                    <label>Especialidade
                        <select name="cod_esp" class="codEsp">           
                            <?php 
                            include('../../conexao.php'); 
                            $query = 'SELECT * FROM especialidade ORDER BY descricao;';
                            $resu = mysqli_query($con, $query) or die (mysqli_connect_error());
                            while ($reg = mysqli_fetch_array($resu)) {
                                $selected = ($reg['id'] == $row['cod_esp']) ? 'selected' : ''; // Verifica se o ID da especialidade é o mesmo do médico atual
                            ?>
                            <option value="<?php echo $reg['id']; ?>" <?php echo $selected; ?>><?php echo $reg['descricao']; ?></option>
                            <?php } mysqli_close($con); ?>    
                        </select>
                    </label>
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