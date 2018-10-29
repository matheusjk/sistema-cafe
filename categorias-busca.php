<?php
require_once 'global.php';
require_once 'cabecalho.php';

    try {
   
    if(isset($_POST["operacao"]) && isset($_POST["busca"])){  
    $lista = json_decode(Categoria::buscaPorId($_POST["busca"]), true);    
    $busca = $_POST["busca"];    
    }

 if(count($lista) == 0){
       echo ' <div class=\'alert alert-info\' role=\'alert\'>
                             <center><br><strong> CAFÉ NÃO ENCONTRADO NA BASE DE DADOS!!! :( AGUARDE 5 SEGUNDOS PARA O REDIRECIONAMENTO </strong></br></center>
                              </div>'; 
     header("refresh: 5; url=categoria.php");
 }else {

?>

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
    <form action="categorias-busca.php" method="post">
    <input type="hidden" name="operacao" value="categoriapesquisar">
        
    <input name="busca" type="number" min="1" required class="form-control" placeholder="Buscar por ID">
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
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr class="action">
                        <td><?php echo $linha["id"]; ?></td>
                        <td><?php echo $linha["nome"]; ?></td>
                         <td><?php echo $linha["descricao"];  ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    }    
} catch (Exception $erro) {    
    Erro::trataErro($erro);
}        

require_once 'rodape.php' ?>
