var app = angular.module('moddingtrials', ['ngAnimate', 'ui.bootstrap', 'timer', 'oitozero.ngSweetAlert']);
app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');
});
app.directive('ngInitial', function() {
    return {
        restrict: 'A',
        controller: [
            '$scope', '$element', '$attrs', '$parse', function($scope, $element, $attrs, $parse) {
                var getter, setter, val;
                val = $attrs.ngInitial || $attrs.value;
                getter = $parse($attrs.ngModel);
                setter = getter.assign;
                setter($scope, val);
            }
        ]
    };
});