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
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="master.css" style="styles/css">
    <title>Agenda de Contatos</title>
  </head>
  <body>
    <h1>Partiu Dogão?!</h1>
    <h3>Agenda de Contatos</h3>
    <table>
      <tr>
        <td>Nome</td>
        <td>Sexo</td>
        <td>Idade</td>
        <td>Telefone</td>
      </tr>
      <?php
        $sql = "select nome, sexo, nascimento, telefone from pessoa";
        $contato = mysqli_query($conexao, $sql);

        if(mysqli_fetch_array($contato)==0) {
      ?>
          <tr>
            <td id="vazio">Nenhum contato encontrado!</td>
          </tr>
      <?php
        }
        else {
          while ($linha = mysqli_fetch_array($contato)) {
      ?>
          <tr>
            <td><?= $linha["nome"] ?></td>
            <td>
              <?php
                if($linha["sexo"]=='M'){
                  echo "Masculino";
                }else{
                  echo "Feminino";
                }
              ?>
            </td>
            <td>
              <?php
                $data = date-$linha["nascimento"];
                echo $data;
              ?>
            </td>
            <td><?= $linha["telefone"] ?></td>
          </tr>
      <?php
          }
        }
      ?>
    </table>
  </body>
</html>
