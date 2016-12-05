module.exports = function ($scope, $log, $uibModal, $cookies, ImageService, ClientAPIService) {

  $scope.modulo = {
    title: 'Gerenciar Módulo',
    subtitle: 'Principal'
  };

  $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

  $scope.estabelecimento = {};
  $scope.showFormEstabelecimento = false;
  $scope.loadFormEstabelecimento = false;

  $scope.user = {};
  $scope.showFormUser = false;
  $scope.loadFormUser = false;
  $scope.showFormUserSecurity = false;

  $scope.imagem = '';

  $scope.upload = function (imagem) {
    var fd = new FormData();
    fd.append('file', imagem[0]);

    ImageService.post(fd, 'estabelecimento/upload')
      .then(function (data) {
        $scope.imagem = data.data;
      });
  }

  $scope.init = function () {
    var reference = angular.fromJson(atob($cookies.get('reference')));

    $scope.estabelecimento = reference.data.estabelecimento;
    $scope.user = reference.data.user;
  };

  $scope.getToken = function () {
    ClientAPIService.getToken()
      .success(function (data, status) {
        $scope.token = data;
      });
  };

  $scope.loadUser = function (user) {
    $scope.user = user;

    $scope.editUser(true);

    $scope.editUserSecurity(false);
  };

  $scope.editUser = function (check) {
    $scope.showFormUser = check;

    if (check) {
      $scope.errors = '';

      $scope.message = '';

      $scope.getToken();
    }
    return;
  };

  $scope.cancelUser = function() {
    $scope.editUser(false);
  };

  $scope.loadUserSecurity = function (user) {
    $scope.user = user;

    $scope.editUser(false);

    $scope.editUserSecurity(true);
  };

  $scope.editUserSecurity = function (check) {
    $scope.showFormUserSecurity = check;

    if (check) {
      $scope.errors = '';

      $scope.message = '';

      $scope.getToken();
    }
    return;
  };

  $scope.cancelUserSecurity = function() {
    $scope.editUserSecurity(false);
  };

  $scope.saveUser = function (user) {
    $scope.loadFormUser = true;

    user.confirm_password = '';

    ClientAPIService.getPut('user/atualizar/' + user.id, user)
      .success(function (data, status) {
        $scope.message = data.data;

        user.password = '';

        $scope.user = user;

        $scope.edit(false);
      })
      .error(function (data, status) {
        if (status == 422) {
          $scope.errors = data;
        }
      });
    $scope.loadFormUser = false;
    return;
  };

  $scope.loadEstabelecimento = function (estabelecimento) {
    $scope.estabelecimento = estabelecimento;

    $scope.editEstabelecimento(true);
  };

  $scope.editEstabelecimento = function (check) {
    $scope.showFormEstabelecimento = check;

    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

    if (check) {
      $scope.errors = '';

      $scope.message = '';

      $scope.column = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';

      $scope.getToken();
    }
    return;
  };

  $scope.saveEstabelecimento = function (estabelecimento) {
    $scope.loadFormEstabelecimento = true;

    entity.icone = $scope.imagem;

    ClientAPIService.getPut('estabelecimento/atualizar/' + estabelecimento.id, estabelecimento)
      .success(function (data, status) {
        $scope.message = data.data;

        $scope.estabelecimento = estabelecimento;

        $scope.editEstabelecimento(false);
      })
      .error(function (data, status) {
        if (status == 422) {
          $scope.errors = data;
        }
      });
    $scope.loadFormEstabelecimento = false;
    return;
  }

  $scope.cancelEstabelecimento = function() {
    $scope.editEstabelecimento(false);
  };
};