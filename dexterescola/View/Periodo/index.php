<div>
	<h2>Gerenciar <small>Períodos</small></h2>	
</div>

<?php if (isset($_SESSION['erro'])) : ?>
    <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
    <?= $_SESSION['erro'] ?>
    <?php unset($_SESSION['erro']); ?>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['sucesso'])) : ?>
  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
    <?= $_SESSION['sucesso'] ?>
    <?php unset($_SESSION['sucesso']); ?>
  </div>
<?php endif; ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Período</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  		<?php foreach ($periodos as $periodo) : ?>
  			<tr>
		      <th scope="row"><?= $periodo->getId();?></th>
		      <td><?= $periodo->getDescricao();?></td>
		      <td>
              <a class="btn btn-info" href="?r=periodos&f=edit&id=<?= $periodo->getId(); ?>" role="button">Editar</a>
              <form method="POST" action="?r=periodos&f=delete">
                <input type="hidden" name="id" value="<?= $periodo->getId(); ?>">
                <button type="submit" class="btn btn-danger">Excluir</button>
              </form> 
          </td>
		    </tr>
  		<?php endforeach; ?>
    
  </tbody>
</table>

<div class="pull-right">
    <a class="btn btn-primary" href="?r=periodos&f=new" role="button">Novo Período</a>
</div>
