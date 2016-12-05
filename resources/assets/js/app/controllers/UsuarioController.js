module.exports = function ($scope, $log, $uibModal, $cookies, ClientAPIService) {

  $scope.modulo = {
    title: 'Gerenciar Módulo',
    subtitle: 'Usuário do Sistema'
  };

  $scope.title = '';
  $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
  $scope.loadList = '';
  $scope.showForm = false;
  $scope.loadForm = false;

  $scope.errors = '';
  $scope.message = '';

  $scope.token = '';
  $scope.entity = {};
  $scope.animationsEnabled = true;

  $scope.init = function () {
    $scope.entity = atob($cookies.get('usuario'));
  }

  $scope.getToken = function () {
    ClientAPIService.getToken()
      .success(function (data, status) {
        $scope.token = data;
      });
  };

  $scope.edit = function (check) {
    $scope.showForm = check;

    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

    if (check) {
      $scope.errors = '';

      $scope.message = '';

      $scope.column = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';

      $scope.getToken();
    }

    return;
  };

  $scope.load = function (entity) {
    $scope.title = 'Alterar Registro #' + entity.id;

    $scope.entity = entity;

    $scope.edit(true);
  };

  $scope.closeMessage = function () {
    $scope.message = '';
  }

  $scope.cancel = function (form) {
    if (form) {
      form.$setPristine();
      form.$setUntouched();
    }
    $scope.entity = {};
    $scope.errors = '';
  };

  $scope.close = function (form) {
    $scope.cancel(form);

    $scope.edit(false);
  };

  $scope.save = function (entity) {
    $scope.loadForm = true;

    if (entity.id) {
      ClientAPIService.getPut('categoria/atualizar/' + entity.id, entity)
        .success(function (data, status) {
          $scope.message = data.data;

          $scope.entity = {};

          $scope.edit(false);
        })
        .error(function (data, status) {
          if (status == 422) {
            $scope.errors = data;
          }
        });
      $scope.loadForm = false;
      return;
    }
  };
};