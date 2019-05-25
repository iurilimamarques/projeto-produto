<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="http://localhost/projeto-produto/assets/css/bootstrap.min.css">
	<script src="http://localhost/projeto-produto/assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/angular.js"></script>
	<script src="http://localhost/projeto-produto/assets/js/angular-route.js"></script>
	<script src="http://localhost/projeto-produto/application/views/produtos/controller/cadProdutosCtrl.js" language="javascript" type="text/javascript"></script>
	<script src="http://localhost/projeto-produto/node_modules/ng-file-upload/dist/ng-file-upload-shim.js"></script>
	<script src="http://localhost/projeto-produto/node_modules/ng-file-upload/dist/ng-file-upload.js"></script>
	<script src="http://localhost/projeto-produto/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<meta charset="utf-8">

	<title>Produtos</title>
</head>
<body ng-app="cadProdutosApp" ng-controller="cadProdutosCtrl">
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
	  </div>
	</nav>
</header>
<main>
	<div class="container col-md-6" style="border-radius: 10px; background-color: #D3D3D3; margin-top: 30px; margin-bottom: 30px;">

		<form name="formProduto" ng-submit="setProduto(produto.imagem)" enctype="multipart/form-data">
			<div class="row justify-content-center">
				<div class="col-8" style="margin-top: 40px;">
					<h1 >Cadastro de Produtos</h1>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputPassword4">Código produto</label>
					<input type="number" class="form-control" id="codigo" name="codigo" placeholder="Código produto" data-ng-model="produto.codigo" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputEmail4">Nome produto</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome produto" data-ng-model="produto.nome" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputAddress">Altura produto</label>
				<input type="text" class="form-control" id="altura" name="altura" placeholder="Altura produto" data-ng-model="produto.altura" required>
			</div>
			<div class="form-group">
				<label for="inputAddress">Largura produto</label>
				<input type="text" class="form-control" id="largura" name="largura" placeholder="Largura produto" data-ng-model="produto.largura" required>
			</div>
			<div class="form-group">
				<label for="profundidade">Profundidade produto</label>
				<input type="text" class="form-control" id="profundidade" name="profundidade" placeholder="Profundidade produto" data-ng-model="produto.profundidade" required>
			</div>

			<div class="form-group">
				<label for="profundidade">Imagem do produto</label>
				<input type="file" ngf-select ng-model="produto.imagem" class="form-control-file" id="imagem" name="imagem" required>
			</div>

			<div class="row justify-content-center">
				<div class="col-4" style="text-align: center; margin-bottom: 30px;">
					<button type="submit" class="btn btn-primary" style="text-align: center;">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>
</main>
<footer>
	
</footer>
</body>
</html>