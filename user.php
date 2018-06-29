<?php session_start(); 
require 'verifica.php';
require 'config/banco.php'; ?>
<?php require_once 'header.php' ?>
      <article class=" col-lg-12 col-md-12"> <!-- Sessão Conteudo -->
        <div class="container wrapper">

          <div class="form-row">

            <form class="form-group col-lg-2 col-md-1 border border-secondary mr-2 ">   
                <?php
                        require 'Usuarios.php';
                        
                        $anuncio = new Usuarios();
                        $lista = $anuncio->foto($_SESSION['id_usuario']);
                        foreach ($lista as $linha): 
                            if ($linha['foto'] == NULL){ 
                            echo "<img class='rounded-circle mx-auto d-block mt-4' src='img/user.png' width='150' height='150'>";
                        } else { 
                            echo "<img class='rounded-circle mx-auto d-block mt-4' src='{$linha['foto']}' width='150' height='150'>";
                        }endforeach; ?>
                            
              <div class="btn-toolbar mt-4 mb-4" role="toolbar" >
                  <div class="btn-group mr-2" role="group" >
                    <a href="#" class="btn btn-dark border border-dark mt-3 btn-sm" data-toggle="modal" data-target="#myModal">Editar Foto</a>
                    <a href="excluir-foto.php?id=<?php $_SESSION['id_usuario']?>" class="btn btn-dark border border-dark mt-3 btn-sm">Excluir Foto</a>
                  </div>
              </div>

              <div class="btn-group-vertical btn-block mt-4 mb-4">
                  <a href="cadastro.php" class="btn btn-secondary">Publicar Anúncio</a>
                <a href="configuracoes.php" class="btn btn-secondary">Configuração</a>
              </div>
            </form>

            <form class="form-group col-lg-9 col-md-3">       
              <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#anuncios">Anúncios</a>
              </li>
            </ul>
            <div class="table-responsive" id="anuncios">
              <table class="table table-bordered table-dark table-hover">
                <thead>
                <th>Id</th>
                  <th>Imagem</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Valor</th>
                  <th class="acao">Vedido</th>
                  <th class="acao">Editar</th>
                  <th class="acao">Deletar</th>
                </thead>
                <tbody>
                    <?php
                        require 'anuncios.php';
                        $anuncio = new Anuncios();
                        $lista = $anuncio->listar($_SESSION['id_usuario']);
                        if (count($lista) > 0){
                    foreach ($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['id_veiculos'] ?></td>
                        <td><?php echo "<img class='rounded mx-auto d-block' src='{$linha['foto']}' width='100' height='100'>" ?></td>
                        <td><?php echo $linha['marca'] ?></td>
                        <td><?php echo $linha['modelo'] ?></td>
                        <td><?php echo $linha['valor'] ?></td>
                        <td><a href="vendido-anuncio.php?id=<?php echo $linha['id_veiculos']?>" class="btn btn-primary btn-default"><span class="fa fa-shopping-bag"></span> Vendido</a></td>
                        <td><a href="edita-anuncio.php?id=<?php echo $linha['id_veiculos']?>" class="btn btn-primary btn-default"><span class="fa fa-edit"></span> Editar</a></td>
                        <td><a href="exclui-anuncio.php?id=<?php echo $linha['id_veiculos']?>" class="btn btn-primary btn-default"><span class="fa fa-trash-o"></span>Excluir</a></td>
                    </tr>
                        <?php endforeach; }?>
                </tbody>
              </table>
            </div>
            </form>

          </div>

        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">Foto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button >
              </div >

              <div class="modal-body">
                
                    <input  name="imagem" id="imagem" type="file" data-dismiss="modal">

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salvar</button>
              </div>

            </div>
          </div>
        </div>
      </article>
<?php require_once 'footer.php' ?>