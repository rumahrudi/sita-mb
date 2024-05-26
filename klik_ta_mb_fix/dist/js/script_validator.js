angular.module('HealthApp', ['ui.bootstrap', 'angular.bootstrap.validator'])
  .controller('RegisterCtrl', function() {
    var vm = this;
    vm.register = function() {
      console.log(vm.myForm.fullname.$modelValue);
      vm.myForm.$setPristine();
    };
  });