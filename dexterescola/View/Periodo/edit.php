<div class="page-header">
	<h2>Editar <small>Período</small></h2>		
</div>

<form action="?r=periodos&f=update" method="POST">
  <div class="form-group">
    <label>Período</label>
    <input type="hidden" name="id" value="<?= $periodo->getId(); ?>">
    <input type="text" name="descricao" value="<?= $periodo->getDescricao(); ?>" class="form-control" placeholder="Período" required>
  </div>
  <a class="btn btn-warning" href="?r=periodos&f=home" role="button">Voltar</a>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>