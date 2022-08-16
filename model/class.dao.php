<?php
require_once('init.php');
/*require_once('class.hash.php');*/

class Dao{

  protected $mysql;

  public function conexao()
  {
    //cria um objeto da classe Mysqli e efetua conexao com BD;
    $this->mysql = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    if ($this->mysql->connect_error) {
      //se verdadeiro retorna o erro gerado no mysql
      die("Falha de conexão: " . $this->mysql->connect_error);
    }
  }
  public function getInfo(){
    //guarda o comando SQL na variavel $query
    $query = "SELECT * FROM informacoes";
    //$result recebe o retorno do metodo query do objeto $mysql
    //a variavel $query é passada como parametro no metodo query do objeto $mysql
    $result = $this->mysql->query($query);
    //num_rows analisa a quantidade de linhas retornadas na consulta SQL
    if ($result->num_rows > 0) {
      //Obtem a proxima linha do result $row recebe essa linha
      //cada linha $row se comporta como array
      while ($row = $result->fetch_array()) {
        //monta -se as linhas e colunas da tabela que sera exibida usando tags HTML
        echo 
        
        '<table>
        <tr>
        <td width=40% class="text-left">
        <p style="display: block"><a href="#modalExemplo" style="color: black" data-toggle="modal" data-target="#modalExemplo' . $row['id_camp'] . '">' . $row['camp1'] . '</a></p>
        </td>

        <th class="text-left">
        <p> Qtde: ' . $row['camp2'] . '</p>
        </th>

        <td class="text-right">
        <p><a href="#modalExemplodel" style="color: red" data-toggle="modal" data-target="#modalExemplodel' . $row['id_camp'] . '">Apagar</a></p>
        </td>
        </tr>        
        </table>';

        echo ' <hr>     
        <!-- Modal deletar cliente-->
        <div class="modal fade bd-exemple-modal-xl" id="modalExemplodel' . $row['id_camp'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" bg-success id="exampleModalLabel">ATENÇÃO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>

              <div class="modal-body">
                Você tem Certeza que deseja apagar este cliente? <h3>  Nº ' . $row['id_camp'] . ' - ' . $row['camp1'] . '</h3>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                <a href="../controller/controllerInfo.php?id_camp=' . $row['id_camp'] . '" class="btn btn-danger font-weight-bold">APAGAR</a>
              </div>

            </div>

          </div>

        </div> 

        <!-- Modal alterar cliente -->
        <div class="modal fade modal fade bd-exemple-modal-xl" id="modalExemplo' . $row['id_camp'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" bg-success id="exampleModalLabel">Visualizar Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form class="form-horizontal" action="../controller/controllerInfo.php" method="POST">

                  <div class="form-group text-left">
                    <h1>Informações do Produto</h1><hr>
                      <label class="control-label col-sm-4" for="id_emp">ID Produto </label>
                      <div class="col-sm-12">
                        <p>' . $row['id_camp'] . '</p>
                      </div>
s
                  </div>

                  <div class="form-group text-left">
                      <div class="col-sm-12">NOME DO PRODUTO 
                      <p>' . $row['camp1'] . '</p>
                      </div>
                  </div>

                  <div class="form-group text-left">
                      <label class="control-label col-sm-4" for="cidade">QUANTIDADE EM ESTOQUE </label>

                      <div class="col-sm-12">
                        <p>' . $row['camp2'] . '</p>
                      </div>

                  </div>

                  <div class="form-group text-left">
                      <label class="control-label col-sm-4" for="descricao">VALOR UNITÁRIO</label>

                      <div class="col-sm-12"> 
                        <p>' . $row['camp3'] . '</p>
                      </div>

                  </div>

                </form>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              </div>

            </div>

          </div>
          
        </div>';
      }
    } else {
      //se não retornar nenhuma linha do consulta SQL exibe a mensagem abaixo.
      echo "<tr>Dados não encontrados</tr>";
    }
  }

  public function insertInfo($camp1, $camp2, $camp3)
  {
    $stmt = $this->mysql->prepare("INSERT INTO informacoes (camp1, camp2, camp3) VALUES (?,?,?)");
    $stmt->bind_param("sss", $camp1, $camp2, $camp3);
    if ($stmt->execute() == TRUE) {
      header('Location: ../view/painel.php');
    } else {
      header('Location: ../view/error.php');
    }
  }
  public function insertAluno($nome, $email, $senha)
  {
    $stmt = $this->mysql->prepare("INSERT INTO aluno (nome, email, senha) VALUES (?,?,?)");
    $stmt->bind_param("ssssssssss", $nome, $email, $senha);
    if ($stmt->execute() == TRUE) {
      header('Location: ../view/login.php');
    } else {
      header('Location: ../view/erro.php');
    }
  }
  public function getFuncId($id_camp)
  {
    $result = $this->mysql->query(
      "SELECT * FROM informacoes WHERE id_camp = '" . $id_camp . "'"
    );
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_array()) {
        $array[] = $row;
      }
      return $array;
    } else {
      return $erro = false;
    }
  }
  public function delete_Info($id_camp)
  {
    if ($this->mysql->query("DELETE FROM informacoes WHERE id_camp = '" . $id_camp . "'")) {
      header('Location: ../view/painel.php');
    }
  }
}
