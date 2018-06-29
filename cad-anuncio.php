<?php
    session_start();
    require 'anuncios.php';
    require 'config/banco.php';
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $combustivel = $_POST['combustivel'];
    $cor = $_POST['cor'];
    $tipo = $_POST['tipo'];
    $km = $_POST['km'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $adicionais = $_POST['adicionais'];
    $foto = ($_FILES['imagem']['name']);
    $tmpname = ($_FILES['imagem']['tmp_name']);
    $type = ($_FILES['imagem']['type']);
    $size = ($_FILES['imagem']['size']);
    
    
    function moeda($get_valor) {
    $source = array('.', '.');
    $replace = array('.', '');
    $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
    $sources = array(',', ',');
    $replaces = array(',', '.');
    $val = str_replace($sources, $replaces, $valor);
    return $val; //retorna o valor formatado para gravar no banco
    }
    
    function image(){
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = './img/anuncios/';

        // Tamanho máximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        
        // Array com as extensões permitidas
        $_UP['extensoes'] = array("jpg","jpeg","gif","png","bmp");
        
        // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
        $_UP['renomeia'] = false;
        
        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['imagem']['error'] != 0) {
          die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['imagem']['error']]);
          exit; // Para a execução do script
        }
        
        // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
        // Faz a verificação da extensão do arquivo
        $extensao = explode('.', strtolower($_FILES['imagem']['name']));
        $file_extension = end($extensao);
        if (array_search($file_extension, $_UP['extensoes']) === false) {
          echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
          exit;
        }
        
        // Faz a verificação do tamanho do arquivo
        if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
          echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
          exit;
        }
        
        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
        // Primeiro verifica se deve trocar o nome do arquivo
       
          $nome_final = md5(uniqid(time())).'.'.$file_extension;
       
          
          
          // Imagem enviada por formulário. Abra para leitura (modo "r")
          //$fp = fopen($_FILES['imagem']['tmp_name'], "r");
          
          // Se for bem-sucedido, leia o ponteiro do arquivo usando o tamanho do arquivo (em bytes) como tamanho.
          //if ($fp) {
            //$content = fread($fp, $_FILES['imagem']['size']);
            //fclose($fp);
            
            // Adicione barras ao conteúdo para que ele escape de caracteres especiais.
            // Como apontado, mysql_real_escape_string pode ser usado aqui também. Sua escolha.
            //$content = addslashes($content);
            
            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
              // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
              $img = $_UP['pasta'].$nome_final;
              return $img;
            } else {
              // Não foi possível fazer o upload, provavelmente a pasta está incorreta
              echo "Não foi possível enviar o arquivo, tente novamente";
              return FALSE;
            }

            //$img = $content;
            
            
		
	
    }
    
    $image = image();
    $val = moeda($valor);
    $usuario = $_SESSION['id_usuario'];

    if ($image != FALSE){
        $anuncio = new Anuncios();
        $anuncio->inserir($marca,$modelo,$combustivel,$cor,$tipo,$km,$ano,$val,$adicionais,$usuario,$image,1);
        header('Location: user.php');
    } else{
        echo 'Impossivel cadastrar anuncio, verifique sua imagem';
        header('Location: cadastro.php');
    }
    ?>