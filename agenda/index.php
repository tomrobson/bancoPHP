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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <!-- <link rel="stylesheet" href="master.css" style="styles/css"> -->
    <title>Agenda de Contatos</title>
  </head>
  <body>
    <div class="row">
      <div class="">
        <h3>Agenda de Contatos</h3>
      </div>
    </div>
    <div class="row">
      <table class="stack">
        <tr>
          <td>Nome</td>
          <td>Sexo</td>
          <td>Idade</td>
          <td>Telefone</td>
          <td>Ação</td>
        </tr>
        <?php
        $sql = "select id_pessoa, nome, sexo, idade, telefone from pessoa";
        $contato = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($contato)==0) {
          ?>
          <tr>
            <td>Nenhum contato encontrado!</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
                }else if($linha["sexo"]=='F'){
                  echo "Feminino";
                }else{
                  echo "Erro";
                }
                ?>
              </td>
              <td><?= $linha["idade"] ?></td>
              <td><?= $linha["telefone"] ?></td>
              <td>
                <div class="">
                  <form class="" name="form" action="altera.php" method="post">
                    <div class="">
                      <button type="submit" name="altera" value="<?= $linha["id_pessoa"] ?>" class="success button">Editar</button>
                    </div>
                  </form>
                  <form class="" name="form2" action="index.php" method="post">
                    <div class="">
                      <button type="submit" name="excluir" value="<?= $linha["id_pessoa"] ?>" class="alert button">Excluir</button>
                    </div>
                  </form>
                </div>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </table>
      <div class="">
        <a class="button" href="">Criar contato</a>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  function valida(){
    alert("Excluido com sucesso!");
  }
</script>

<?php
  if(isset($_REQUEST["excluir"])){
    $excluir = $_REQUEST["excluir"];

    $sql = "delete from pessoa where id_pessoa = '{$excluir}'";
    $deleta = mysqli_query($conexao, $sql);

    header("location:index.php");
  }
?>
