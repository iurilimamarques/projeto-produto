const app = angular.module('cadProdutosApp', ['ngFileUpload']);

app.controller('cadProdutosCtrl', function($scope, $http, Upload, $timeout){
    $scope.produto = {};

    $scope.setProduto = function(file) {
        file.upload = Upload.upload({
          url: 'setProduto',
          method: 'POST',
          data: { cod_produto: $scope.produto.codigo, 
                  nome_produto: $scope.produto.nome,
                  altura_produto: $scope.produto.altura,
                  largura_produto: $scope.produto.largura,
                  profundidade_produto: $scope.produto.profundidade,
                  file: file},
        });

        file.upload.then(function (response) {
          $timeout(function () {
            file.result = response.data;
          });
        }, function (response) {
          if (response.status > 0)
            $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
          file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
          if (evt.config.data.cod_produto == undefined) {
            if (file.progress == 100) {
              $scope.produto = {};
              swal("Produto adicionado!", "", "success");
            }
          }else {
            swal("Produto já cadastrado!", "", "error");
          }
        });
    }
});