<?php
  $conexao = mysqli_connect("localhost", "root", "123");

  if($conexao){
    if(mysqli_select_db($conexao, "bd_agenda")){
      //echo "Conectado com sucesso.";
    }else{
      echo "Não conecta ao DB.";
    }
  }else{
    echo "Não conecta no localhost.";
  }

  $altera = $_REQUEST["altera"];

  $sql = "select id_pessoa, nome, sexo, idade, telefone from pessoa where id_pessoa = '{$altera}'";
  $requisita = mysqli_query($conexao, $sql);
  $resultado = mysqli_fetch_assoc($requisita);

  if($resultado["sexo"]=='M'){
    $masculino = "selected/";
    $feminino = "/";
  }else if($resultado["sexo"]=='F'){
    $masculino = "/";
    $feminino = "selected/";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <title>Criar contato</title>
  </head>
  <body>
    <div class="row">
      <h3>Cadastrar novo contato</h3>
    </div>
    <div class="row">
      <fieldset class="fieldset">
        <legend>Cadastrar novo contato</legend>
        <form class="" name="form4" action="inserir.php" method="post" onsubmit="return valida()">
          <div class="row">
            <div class="medium-4 columns">
              <label>Nome:
                <input type="text" name="nome"; id="name" maxlength="100" value="<?= $resultado["nome"] ?>"/>
              </label>
            </div>
          </div>
          <div class="">
            <fieldset>
              <legend>Sexo:</legend>
                <input type="radio" name="sexo" value="M" id="sexoM" <?= $masculino ?>><label>Masculino</label>
                <input type="radio" name="sexo" value="F" id="sexoF" <?= $feminino ?>><label>Feminino</label>
            </fieldset>
          </div>
          <div class="row">
            <div class="medium-1 columns">
              <label>
                Idade:
                <input type="number" name="idade" id="age" value="<?= $resultado["idade"] ?>"/>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="medium-3 columns">
              <label>Telefone:
                <input type="text" name="telefone" id="fone" maxlength="17" value="<?= $resultado["telefone"] ?>"/>
              </label>
              <p class="help-text">+xx(xx)xxxxxxxxx</p>
            </div>
          </div>
          <button type="submit" class="success button">Salvar</button>
          <a href="index.php" class="button">Voltar</a>
        </form>
      </fieldset>
    </div>
  </body>
</html>

<script type="text/javascript">
  function valida(){
    var sexoM = document.getElementById("sexoM").checked;
    var sexoF = document.getElementById("sexoF").checked;

    if(document.getElementById("name").value==""){
      alert("Campo nome obrigatorio!");
      document.getElementById("name").focus;
    }
    if(!sexoM && !sexoF){
      alert("Campo sexo obrigatorio!");
      return false;
    }
    if(document.getElementById("age").value<=13){
      alert("Idade tem que ser maior de 13 anos!");
      return false;
    }
    if(document.getElementById("fone").value==""){
      alert("Campo telefone e obrigatorio!");
      return false;
    }
  }
</script>
