</main>
<footer class="footer-container"><!-- Sessão Rodapé -->
        <section  id="top-rodape">
          <div class="home-newsletter col-md-7">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 mt-3 mb-3">
                  <div class="single form-inline">
                    <h2 class="input-group-addon mr-3 ">Newsletter</h2>
                    <div class="input-group inline">
                      <input type="email" size="24" class="form-control" placeholder="Digite seu e-mail">
                      <span class="input-group-btn">
                      <button class="btn btn-theme" type="submit">Inscrever-se</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="footer">
          <div class="container mt-5">
            <div class="row text-center text-xs-center text-sm-left text-md-left ">
              <div class="col-md-2">
                <h5>Categorias</h5>
                <ul class="list-unstyled quick-links">
                  <li><a href="index.php">Início</a></li>
                  <li><a href="consulta.php">Consulta</a></li>
                  <li><a href="FAQ.php">FAQ</a></li>
                </ul>
              </div>
              <div class="col-md-5">
                <h5>Informação</h5>
                <ul class="list-unstyled quick-links">
                  <li><a href="sobre.php">Sobre</a></li>
                  <li><a href="termos-de-compromisso.php">Termos e condições de utilização</a></li>
                  <li><a href="contato.php">Fale conosco</a></li>
                </ul>
              </div>
              <div class="col-md-5">
                <h5>Dados</h5>
                <ul class="toggle-footer list-unstyled" >
                  <li >
                    <i class="fa fa-map-marker fa-2x "></i> CompCar, Rua Maranhão, 500 - casa 12 - Jardim Guavirá - São José do Rio Claro - MT             
                  </li>
                  <li>
                      <i class="fa fa-phone  mt-4" ></i> Ligue agora: 
                      <span class="white-text">(65) 3386-1368</span>
                  </li>
                  <li>
                      <i class="fa fa-envelope "></i> E-mail:
                      <span ><a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;%6a%65%66%66%65%72%73%6f%6e_%73%61%64%6f%73%6b%69@%68%6f%74%6d%61%69%6c.%63%6f%6d" >&#x6a;&#x65;&#x66;&#x66;&#x65;&#x72;&#x73;&#x6f;&#x6e;&#x5f;&#x73;&#x61;&#x64;&#x6f;&#x73;&#x6b;&#x69;&#x40;&#x68;&#x6f;&#x74;&#x6d;&#x61;&#x69;&#x6c;&#x2e;&#x63;&#x6f;&#x6d;</a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-github-square"></i></a></li>
                </ul>
              </div>
            </div>  
          </div>
        </section>
        <section>
        <div class="footer-copyright py-3 text-center" id="copyright">
              Todos os direitos reservado © 2018 Copyright 
              <a  href="more.php" id="more">More Links</a>
        </div>
        </section>
      </footer>

   <!-- Script js -->
   <script type="text/javascript" src="./js/js.js"></script>
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./js/jquery.maskmoney.min.js"></script>
    <script type="text/javascript" src="./js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="./js/popper.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
              $("#valor").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:".", defaultZero:false, allowZero:true, allowNegative: true});
        });
    </script>
    
  </body>
</html>
