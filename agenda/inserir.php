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

  $nome = $_REQUEST["nome"];
  $sexo = $_REQUEST["sexo"];
  $idade = $_REQUEST["idade"];
  $telefone = $_REQUEST["telefone"];

  $sql = "insert into pessoa values (null, '{$nome}', '{$sexo}', '{$idade}', '{$telefone}')";
  $resultado = mysqli_query($conexao, $sql);

  header("Location:index.php");
?>
