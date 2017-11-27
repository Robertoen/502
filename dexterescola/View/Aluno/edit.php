<div class="page-header">
	<h2>Editar <small>Aluno</small></h2>		
</div>

<form action="?r=alunos&f=update" method="POST">
  <div class="form-group">
    <label>Aluno</label>
    <input type="text" name="nome" value="<?= $aluno->getNome(); ?>" class="form-control" placeholder="Aluno" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="<?= $aluno->getEmail(); ?>" class="form-control" placeholder="aluno@aluno.com" required>
  </div>
  <div class="form-group">
    <label>Senha</label>
    <input type="password" name="senha" value="<?= $aluno->getSenha(); ?>" class="form-control" required>
  </div>
  <div class="form-group">
    <label>CPF</label>
    <input type="text" name="cpf" value="<?= $aluno->getCpf(); ?>" class="form-control" required>
  </div>
  <div class="form-group">
    <label>RG</label>
    <input type="text" name="rg" value="<?= $aluno->getRg(); ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Data de Nascimento</label>
    <input type="date" name="dt_nasc" value="<?= $aluno->getDtNasc(); ?>" class="form-control">
  </div>
  <input type="hidden" name="id" value="<?= $aluno->getId(); ?>">
  <a class="btn btn-warning" href="?r=alunos&f=home" role="button">Voltar</a>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>