<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Criar Novo Tipo de Café</h2>
    </div>
</div>

<form action="categorias-operacoes.php" method="post">
    <input type="hidden" name="operacao" value="categoriasalvar">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="id">ID :</label>
                <input name="id" type="number" class="form-control" placeholder="ex:283" pattern="" min= "1" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome do Café</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome do Café" pattern="^[a-zA-Z_\- ]+$" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Café</label>
                <textarea name="descricao" type="text" class="form-control" placeholder="O nome “espresso” vem do italiano “espremido, pressionado”. Ele é feito em poucos segundos sob alta pressão de água na temperatura de consumo. Isso faz com que acumule muito sabor e intensidade" pattern="" required></textarea>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
