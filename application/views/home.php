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
	  </div>
	</nav>
</header>
<main>
	<div class="jumbotron">
	  <h1 class="display-4">Olá, Bem Vindo!</h1>
	  <p class="lead">Aqui você pode cadastrar, consultar e comentar produtos que estão na base de dados.</p>
	  <hr class="my-4">
	</div>
</main>
<footer>
	
</footer>
</body>
</html>