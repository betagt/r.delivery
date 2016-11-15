module.exports = function ($scope, $uibModalInstance, message) {
  $scope.message = message;

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
};