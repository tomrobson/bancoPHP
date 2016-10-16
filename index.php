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
    <link rel="stylesheet" href="master.css">
    <title>Banco do Hospital</title>
  </head>
  <body>
    <header>
      <h3>Banco do Hospital</h3>
    </header>
    <section>
      <fieldset>
        <legend>Cadastro de Médicos</legend>
        <div class="topo">
          <p>Nome</p>
        </div>
        <div class="topo">
          <p>CPF</p>
        </div>
        <div class="topo">
          <p>CRM</p>
        </div>
        <div class="topo">
          <p>Sexo</p>
        </div>
        <div class="topo">
          <p>Especialidade</p>
        </div>

        <div class="resultado">
          <?php
            $medico = "select tx_nome, tx_cpf,tx_crm, tx_sexo, tx_especialidade
              from tb_medico, tb_especialidade where especialidade_id=id_especialidade";

            $tb_medico = mysqli_query($conexao, $medico);

            if(mysqli_num_rows($tb_medico)==0){
              echo "Nenhum médico encontrado!";
            }else{
              while($resultadoMedico = mysql_fetch_array($tb_medico)){
          ?>
                <div class="resultado">
                  <div class="medico">
                    <?=echo $resultadoMedico["tx_nome"];?>
                  </div>
                  <div class="medico">
                    <?=echo $resultadoMedico["tx_cpf"];?>
                  </div>
                  <div class="medico">
                    <?=echo $resultadoMedico["tx_crm"];?>
                  </div>
                  <div class="medico">
                    <?php
                      if($resultadoMedico["tx_sexo"]=="M"){
                        echo "Masculino";
                      }else{
                        echo "Feminino";
                      }
                    ?>
                  </div>
                  <div class="medico">
                    <?=echo $resultadoMedico["tx_especialidade"];?>
                  </div>
                  <div class="botao">
                    <a href="alterar.html"><input type="button" name="alterar" id="alterar" value="Alterar"></a>
                    <a href="excluir.html"><input type="button" name="excluir" id="excluir" value="Excluir"></a>
                  </div>
                </div>
          <?php
              }
            }
          ?>
        </div>

      </fieldset>
    </section>
  </body>
</html>
