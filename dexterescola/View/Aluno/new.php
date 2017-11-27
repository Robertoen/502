<div class="page-header">
	<h2>Novo <small>Aluno</small></h2>		
</div>

<form action="?r=alunos&f=insert" method="POST">
  <div class="form-group">
    <label>Aluno</label>
    <input type="text" name="nome" class="form-control" placeholder="Aluno" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="aluno@aluno.com" required>
  </div>
  <div class="form-group">
    <label>Senha</label>
    <input type="password" name="senha" class="form-control" required>
  </div>
  <div class="form-group">
    <label>CPF</label>
    <input type="text" name="cpf" class="form-control" required>
  </div>
  <div class="form-group">
    <label>RG</label>
    <input type="text" name="rg" class="form-control">
  </div>
  <div class="form-group">
    <label>Data de Nascimento</label>
    <input type="date" name="dt_nasc" class="form-control">
  </div>
  <a class="btn btn-warning" href="?r=alunos&f=home" role="button">Voltar</a>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>