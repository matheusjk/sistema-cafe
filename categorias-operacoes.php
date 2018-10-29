<?php
require_once 'cabecalho.php';
require_once 'global.php';

 try{
     if(isset($_POST["operacao"])){
        
         $op = $_POST["operacao"];
         
         if($op == "categoriasalvar"){
         $categoria[0] = $_POST["id"];
         $categoria[1] = $_POST["nome"];
         $categoria[2] = $_POST["descricao"];
         
         try{
             $categoriaOb = new Categoria($categoria[0]);
             if($categoriaOb->getid() == $categoria[0]){
                  echo ' <div class=\'alert alert-warning\' role=\'alert\'>
                             <center><br> POR FAVOR VERIFIQUE O CAMPO ID,NÃO ACEITAMOS CADASTRO REPETIDO!!! AGUARDE 5 SEGUNDOS PARA REDIRECIONAMENTO AUTOMATICO</br></center>
                               <center><br><a href=\'categoria.php\'><button type=\'button\' class=\'btn btn-primary\'><span class=\'glyphicon glyphicon-share-alt\' aria-hidden=\'true\'></span> Clique aqui para voltar </br></button></a></center>
                              </div>';  
                 header("Refresh: 5;url=categoria.php");
             }else {
                 $categoriaOb->setid($categoria[0]);
                 $categoriaOb->setnome($categoria[1]);
                 $categoriaOb->setdescricao($categoria[2]);
                 if($categoriaOb->inserir()){
                      echo ' <div class=\'alert alert-success\' role=\'alert\'>
                             <center><br><strong> CAFÉ CADASTRADO COM SUCESSO!!! AGUARDE 5 SEGUNDOS PARA O REDIRECIONAMENTO </strong></br></center>
                              </div>'; 
                     header("Refresh: 5;url=categoria.php");
                 }
             }
              }catch(Exception $erro){
             Erro::trataErro($erro);
         }
       }
     }
} catch (Exception $erro) {
    
    Erro::trataErro($erro);
}




/* else if($op = "categoriapesquisar"){
             
    try {
    if(isset($_POST["busca"])){  
    $lista = Categoria::listar();
    $busca = $_POST["busca"];    

 if(count($lista) == 0){
     require_once 'categorias-criar.php';
 }else {


echo '
<div class="row">
    <div class="col-md-6">
        <h2>Café</h2>
    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <a href="categorias-criar.php" class="btn-block btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Criar Novo Café </a>
        <br>
    </div>
    <div class="col-md-6">
    <form action="categorias-operacoes.php" method="post">
    <input type="hidden" name="operacao" value="categoriapesquisar">
        
    <input type="text" name="busca" class="form-control" placeholder="Buscar">
    </form>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    
                </tr>
            </thead>
            <tbody>';
                foreach ($lista as $linha){
                echo '<tr class="action">';
                       if($busca == $linha["id"]){
                           echo '
                        <td> . ' echo $linha["id"];  . '</td>
                        <td> . ' echo $linha["nome"]; . ' </td>
                         <td>. ' echo $linha["descricao"]; . '</td> ' ;                         
                    }
                    echo '
                    </tr>
                 
            </tbody>
        </table>
    </div>
</div>
';
    }
     require_once 'rodape.php'; 
}      
}
  }catch(Exception $erro){
     Erro::trataErro($erro);
  }
}
     } */
