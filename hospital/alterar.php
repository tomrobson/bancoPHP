<?php
  $conexao = mysqli_connect("localhost", "root", "123");

  if(!$conexao){
    echo "Não conecta com o Servidor!<br/>";
  }else{
    // echo "Conectado ao Servidor!<br/>";
    if(!mysqli_select_db($conexao, "bd_hospital")){
      echo "Não conecta ao Banco de Dados!<br/>";
    }else{
      // echo "Conectado ao Banco de Dados!";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alterar Médico</title>
  </head>
  <body>
    <?php
      $id = $_POST["id"];
      $alterar = $_POST["alterar"];
      $excluir = $_POST["excluir"];

      echo $id;
      echo $alterar;
      echo $excluir;
    ?>
  </body>
</html>
