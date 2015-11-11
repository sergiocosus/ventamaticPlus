@extends('index')

@section('content')
    <script>
        Ventamatic.controller("LineCtrl", function ($scope, UserSession,ChartManager) {
            $scope.data = null;
            $scope.period = 'day';

            $scope.periods = ChartManager.periodData;
            $scope.updateChart = function(callback){
                ChartManager.update($scope,callback, "Visitas");
            };

            $scope.updateData = function(){
                console.log("updating");
                UserSession.get().then(function(sessions){
                    $scope.data = sessions;
                    $scope.updateChart(function(data,values){
                        return values+1;
                    } );
                });
            };
            setInterval(function(){
                $scope.updateData();
            },5000);

            $scope.updateData();

        });


        Ventamatic.controller("SalesGraphicCtrl", function ($scope, Sell,ChartManager) {
            $scope.data = null;
            $scope.period = 'day';
            $scope.type = 'quantity';

            $scope.periods = ChartManager.periodData;
            $scope.updateChart = function(callback){
                ChartManager.update($scope,callback, "Ventas");
            };

            $scope.updateData = function(){
                console.log("updating");
                Sell.allSales().then(function(sales){
                    $scope.data = sales;
                    $scope.updateChart(function(data,values){
                        switch ($scope.type){
                            case "quantity":
                                return values+1;
                            case "money":
                                return values + (+data.total);
                        }
                    } );
                });
            };
            setInterval(function(){
                $scope.updateData();
            },5000);

            $scope.updateData();

        });
    </script>
    <section class="charts">
        <div class="ventamatic-chart" ng-controller="LineCtrl">
            <h3 >Gráfico de visitas - <span ng-bind="title"></span></h3>
            <section class="ventamatic-chart-controls">
                <n>Periodo visible:</n>
                <select ng-model="period" ng-change="updateData()"
                        ng-options="key as x.title for (key,x) in periods">
                </select>
            </section>
            <div>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-legend="true" chart-series="series"
                        chart-click="onClick" >
                </canvas>
            </div>
        </div>

        <div class="ventamatic-chart" ng-controller="SalesGraphicCtrl">
            <h3 >Gráfico de ventas - <span ng-bind="title"></span></h3>
            <section class="ventamatic-chart-controls">
                <n>Periodo visible:</n>
                <select ng-model="period" ng-change="updateData()"
                        ng-options="key as x.title for (key,x) in periods">
                </select>
                <select ng-model="type" ng-change="updateData()">
                    <option value="quantity" selected>
                        Cantidad
                    </option>
                    <option value="money">
                        Dinero
                    </option>
                </select>
            </section>
            <div>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-legend="true" chart-series="series"
                        chart-click="onClick" >
                </canvas>
            </div>

        </div>

    </section>
    <style>
        section.charts{
            display:flex;
            display:-webkit-flex;
            flex-wrap: wrap;
            -webkit-flex-wrap: wrap;

        }

        .ventamatic-chart{
            background-color: rgba(255,255,255,.25);
            border: gray solid 2px;
            border-radius: 20px;
            overflow: hidden;
            flex-grow: 1;
            flex-basis:500px;
            margin: 10px 0;
            -webkit-flex-grow: 1;
        }
        .ventamatic-chart h3{
            background-color: rgba(0,0,0,.5);
            color:white;
            font-size: 18px;
        }

        .ventamatic-chart-controls{
            background-color: rgba(0,255,0,.5);
        }

        .ventamatic-chart div{
            padding: 10px;
        }
    </style>


@endsection