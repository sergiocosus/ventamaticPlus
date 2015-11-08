@extends('index')

@section('content')
    <script>
        Ventamatic.controller("LineCtrl", function ($scope) {
            console.log("holass");
            $scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
            $scope.series = ['Series A', 'Series B'];
            $scope.data = [
                [65, 59, 80, 81, 56, 55, 40],
                [28, 48, 40, 19, 86, 27, 90]
            ];
            $scope.onClick = function (points, evt) {
                console.log(points, evt);
            };
        });
    </script>
    <div ng-controller="LineCtrl">
        <canvas id="line" class="chart chart-line" chart-data="data"
                chart-labels="labels" chart-legend="true" chart-series="series"
                chart-click="onClick" >
        </canvas>

    </div>


@endsection