<div>
	<h2>Gerenciar <small>Alunos</small></h2>	
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  		<?php foreach ($alunos as $aluno) : ?>
  			<tr>
		      <th scope="row"><?= $aluno->getId();?></th>
		      <td><?= $aluno->getNome();?></td>
		      <td><?= $aluno->getEmail();?></td>
		      <td><?= $aluno->getCpf();?></td>
		      <td><?= $aluno->getRg();?></td>
		      <td><?= $aluno->getDtNasc();?></td>
		      <td>
              <a class="btn btn-info" href="?r=alunos&f=edit&id=<?= $aluno->getId(); ?>" role="button">Editar</a>
              <form method="POST" action="?r=alunos&f=delete">
                <input type="hidden" name="id" value="<?= $aluno->getId(); ?>">
                <button type="submit" class="btn btn-danger">Excluir</button>
              </form> 
          </td>
		    </tr>
  		<?php endforeach; ?>
    
  </tbody>
</table>

<div class="pull-right">
    <a class="btn btn-primary" href="?r=alunos&f=new" role="button">Novo Aluno</a>
</div>