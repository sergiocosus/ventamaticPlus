@extends('index')

@section('content')
    <script>
        Ventamatic.controller("LineCtrl", function ($scope, UserSession,ChartManager) {
            $scope.data = null;
            $scope.period = 'day';
            $scope.backPeriods=0;

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
            $scope.backPeriods=0;

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

        Ventamatic.controller("CategoriesGraphicCtrl", function ($scope, Product) {
            $scope.data = null;
            $scope.type = "quantity";
            $scope.updateData = function(){
                console.log("updating");
                Product.getCategoryCount().then(function(categoryCount){
                    var data = [];
                    var labels = [];

                    for(var i =0; i<categoryCount.length;i++){
                        switch ($scope.type){
                            case "quantity":
                                data.push(categoryCount[i].quantity);
                                $scope.title = "Cantidad";
                                break;
                            case "money":
                                data.push(categoryCount[i].total);
                                $scope.title = "Ingresos";
                                break;
                        }
                        labels.push(categoryCount[i].name);
                    }
                    $scope.labels = labels;
                    $scope.series = 'Cantidad de producttos vendidos por categorias';
                    $scope.data = data;
                    console.log(data,labels);
                });
            };


            setInterval(function(){
                $scope.updateData();
            },5000);

            $scope.updateData();

        });


        Ventamatic.controller("Minimos", function ($scope, Product) {
            $scope.data = null;
            $scope.type = "quantity";
            $scope.updateData = function(){
                console.log("updating");
                Product.getLowStock().then(function(products){
                   $scope.products=products;
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
            Periodos pasados:
            <input type="number" min="0" step="1" ng-model="backPeriods"
                ng-change="updateData()"/>
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
                Periodos pasados:
                <input type="number" min="0" step="1" ng-model="backPeriods"
                       ng-change="updateData()"/>

            </section>
            <div>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-legend="true" chart-series="series"
                        chart-click="onClick" >
                </canvas>
            </div>

        </div>


        <div class="ventamatic-chart" ng-controller="CategoriesGraphicCtrl">
            <h3 >Gráfico de productos vendidos por categoría - <span ng-bind="title"></span></h3>

            <section class="ventamatic-chart-controls">
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
                <canvas id="line" class="chart chart-pie" chart-data="data"
                        chart-labels="labels" chart-legend="true" chart-series="series"
                        chart-click="onClick" >
                </canvas>
            </div>

        </div>





        <div class="ventamatic-chart" ng-controller="Minimos">

            <table style="width: 100%">
                <thead>
                <tr>
                    <th colspan="5">
                        <h3 >Mínimos en inventario - <span ng-bind="title"></span></h3>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nombre del producto</th>
                    <th>Categoria</th>
                    <th>Mínimo</th>
                    <th>Inventario</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="product in products">
                    <td ng-bind="product.id"></td>
                    <td ng-bind="product.name"></td>
                    <td ng-bind="product.category"></td>
                    <td ng-bind="product.minimum"></td>
                    <td ng-bind="product.stock"></td>
                </tr>
                </tbody>
            </table>


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