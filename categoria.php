<?php
require_once 'global.php';
require_once 'cabecalho.php';

    try {
   
    $lista = json_decode(Categoria::listar(), true);
   
   /* echo "<pre>";
    print_r($lista);
    echo "</pre>"; */
} catch (Exception $erro) {
    Erro::trataErro($erro);
}
?>


<?php
 if(count($lista) == 0){
     require_once 'categorias-criar.php';
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
        
    <input name="busca"  type="number" required class="form-control" placeholder="Buscar">
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
                         <td><?php echo $linha["descricao"]; ?></td>
                        
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    }

require_once 'rodape.php' ?>
