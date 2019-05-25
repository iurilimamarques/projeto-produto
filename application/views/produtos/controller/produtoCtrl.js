const app = angular.module('produtosApp', []);

app.controller('produtosCtrl', function($scope, $http){
    $scope.produto = [];
    $scope.filtro = '';
    $scope.produtoComentario = [];
    $scope.comentario = '';
    $scope.comentarios = [];

    $scope.getProdutos = function(){
        $http.get('getProdutos')
        .then(function(res){
            $scope.produto = res.data;
        }, function(error){
            console.error(error);
        });
    }

    $scope.produtoEscolha = function(produto){
        $scope.produtoComentario = produto;
        $scope.getComentarios($scope.produtoComentario.i_produto);
    }

    $scope.getComentarios = function(i_produto){

        $http({
            url: 'getComentarios',
            method: 'POST',
            data: { i_produto: i_produto}
          }).then(function (retorno) {
            $scope.comentarios = retorno.data;
          },
          function (retorno) {
            console.log('Error: '+retorno.status);
          });
    }

    $scope.getProdutos();

    $scope.setComentario = function(i_produto) {
        $http({
            url: 'setComentario',
            method: 'POST',
            data: { Produto_i_produto: i_produto, comentario: $scope.comentario}
          }).then(function (retorno) {
            $scope.getComentarios($scope.produtoComentario.i_produto);
            $scope.comentario = '';
          },
          function (retorno) {
            console.log('Error: '+retorno.status);
          });
    }
});
