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
    </script>
    <section class="charts">
        <div class="ventamatic-chart" ng-controller="LineCtrl">
            <h3 >Gráfico de visitas - <span ng-bind="title"></span></h3>
            <div>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-legend="true" chart-series="series"
                        chart-click="onClick" >
                </canvas>
            </div>
            <n>Periodo viisble:</n>
            <select ng-model="period" ng-change="updateData()"
                    ng-options="key as x.title for (key,x) in periods">
            </select>

        </div>

    </section>
    <style>
        section.charts{
            display:flex;
            display:-webkit-flex;

        }

        .ventamatic-chart{
            background-color: rgba(255,255,255,.25);
            border: gray solid 2px;
            border-radius: 20px;
            overflow: hidden;
            flex: 1;
            -webkit-flex: 1;
        }
        .ventamatic-chart h3{
            background-color: rgba(0,0,0,.5);
            color:white;
            font-size: 18px;
        }
        .ventamatic-chart div{
            padding: 10px;
        }
    </style>


@endsection