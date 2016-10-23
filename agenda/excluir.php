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

  $excluir = $_REQUEST["excluir"];

  $sql = "delete from pessoa where id_pessoa = '{$excluir}'";
  $deleta = mysqli_query($conexao, $sql);

  header("location:index.php");
?>
