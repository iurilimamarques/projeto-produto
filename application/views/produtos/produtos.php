<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="http://localhost/projeto-produto/assets/css/bootstrap.min.css">
	<script src="http://localhost/projeto-produto/assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/angular.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/angular-route.js"></script>
	<script src="http://localhost/projeto-produto/application/views/produtos/controller/produtoCtrl.js" language="javascript" type="text/javascript"></script>

	<meta charset="utf-8">
	<title>Produtos</title>
</head>
<body ng-app="produtosApp" ng-controller="produtosCtrl">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="produtos">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url() ?>produtos/loadProdutos">Produtos</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url() ?>produtos/loadCadastroProdutos">Cadastro de produtos</a>
	      </li>
	    </ul>

	    <div class="col-sm-2 pull-right">
	    	<input class="form-control mr-sm-2" type="text" ng-model="filtro" placeholder="Código produto" aria-label="Código">
	    </div>
	  </div>
	</nav>
</header>
<main>
	<div class="container col-md-6" style="margin-top: 30px;">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Nome</th>
					<th scope="col">Altura</th>
					<th scope="col">Largura</th>
					<th scope="col">Profundidade</th>
					<th scope="col">Imagem</th>
				</tr>
			</thead>
			<tbody>
				<tr data-ng-repeat="p in produto | filter:{cod_produto:filtro}" style="cursor: pointer;" data-target=".bd-example-modal-lg" data-toggle="modal" data-ng-click="produtoEscolha(p)">
					<th>{{p.cod_produto}}</th>
					<td>{{p.nome_produto}}</td>
					<td>{{p.altura_produto}}</td>
					<td>{{p.largura_produto}}</td>
					<td>{{p.profundidade_produto}}</td>
					<td><img src="{{p.imagem}}" width=80 height=80></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Comentários</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-2">
								<img src="{{produtoComentario.imagem}}" width=100 height=100>
							</div>
							<div class="col-5">
								<label style="margin-left: 40px;"><b> Código do produto:</b> {{produtoComentario.cod_produto}}</label>
								<label style="margin-left: 40px;"><b> Nome do produto:</b> {{produtoComentario.nome_produto}}</label>
								<label style="margin-left: 40px;"><b> Largura do produto:</b> {{produtoComentario.largura_produto}}</label>
							</div>
							<div class="col-5">
								<label style="margin-left: 40px;"><b> Profundidade do produto:</b> {{produtoComentario.profundidade_produto}}</label>
								<label style="margin-left: 40px;"><b> Altura do produto:</b> {{produtoComentario.altura_produto}}</label>
							</div>
						</div>
					</div>
					
					<div class="container" style="margin-top: 50px;" ng-show="comentarios != ''">
						<div class="card" style="width: 700px; height: 130px; margin-left: auto; margin-right: auto; display: block; margin-top: 30px; background-color: #ededed;" ng-repeat="c in comentarios">
							<div class="card-header" style="height: 50px; background-color: #92bde8;">
								<label style="">Usuário</label>
							</div>
							<div class="card-body">
								<blockquote class="blockquote mb-0">
									<font size="3">{{c.comentario}}</font>
								</blockquote>
							</div>
						</div>
					</div>
					<div class="container" style="margin-top: 50px;" ng-show="comentarios == ''">
						<b><h4 style="color: #d1d1d1; margin-left: auto; margin-right: auto;">Nenhum comentário para o produto.</h4></b>
					</div>
				</div>
				<div class="modal-footer">
					<form class="form-inline" name="formComentario" ng-submit="setComentario(produtoComentario.i_produto)">
						<div class="form-group mx-sm-3 mb-2">
							<input type="text" class="form-control" ng-model="comentario" id="comentario" name="comentario" placeholder="Comentário">
						</div>
						<button type="submit" class="btn btn-success mb-2">Comentar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
<footer>

</footer>
</body>
</html>