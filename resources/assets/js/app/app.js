require('angular');
require('angular-animate');
require('angular-utils-pagination');
require('angular-ui-bootstrap');
require('angular-ui-tree');
require('angular-sanitize');
require('./locale/angular-locale_pt-br.js');

var CategoriaController = require('./Controllers/CategoriaController');
var EstabelecimentoController = require('./Controllers/EstabelecimentoController');
var TestController = require('./Controllers/TestController');

var ModalInstanceCtrl = require('./Controllers/ModalInstanceCtrl')
var telefone = require('./Directives/Telefone');

angular.module('app', ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngAnimate', 'ui.bootstrap', 'ui.tree'])
  .config(
    function (paginationTemplateProvider) {
      paginationTemplateProvider.setPath('/app/templates/dirPagination.tpl.html');
    }
  );
angular.module('app').directive('telefone', [telefone]);
angular.module('app').controller('ModalInstanceCtrl', ['$scope', '$uibModalInstance', 'message', ModalInstanceCtrl]);
angular.module('app').controller('EstabelecimentoController', ['$scope', '$http', EstabelecimentoController]);
angular.module('app').controller('CategoriaController', ['$scope', '$http', '$uibModal', '$log', CategoriaController]);
angular.module('app').controller('TestController', ['$scope', '$http', '$log', TestController]);

