@extends('index')

@section('content')
    <script>

        periodData= {
            'year': {
                title: 'Año',
                subPeriod: 'month',
                format: 'MMMM',
                titleFormat: 'YYYY'
            },
            'month': {
                title: 'Mes',
                subPeriod: 'week',
                format: 'DD',
                titleFormat: 'MM/YYYY'
            },
            'week': {
                title: 'Semana',
                subPeriod: 'day',
                format: 'DD dddd',
                titleFormat: 'MM/YYYY'
            },
            'day': {
                title: 'Día',
                subPeriod: 'hour',
                format: 'ha',
                titleFormat: 'DD/MM/YYYY'
            },
            'hour': {
                title: 'Hora',
                subPeriod: 'minute',
                format: 'hh:mm a',
                titleFormat: 'DD/MM/YYYY hh'
            },
            'minute': {
                title: 'Minuto',
                subPeriod: 'second',
                format: 'hh:mm:ss a',
                titleFormat: 'DD/MM/YYYY hh:mm'
            }
        };
        Ventamatic.controller("LineCtrl", function ($scope, UserSession) {
            $scope.data = null;
            $scope.period = 'day';

            $scope.periods = periodData;
$scope.title = "sldfj";

            $scope.updateChart = function(sessions,period, subPeriod, format,titleFormat){
                var current = moment().startOf(period);
                var last = moment(current).add(1,period);

                var data=[];
                var labels=[];
                var i= 0;
                var j=0;

                $scope.title = current.format(titleFormat);

                while(!current.isSame(last,subPeriod)){
                    labels[i]=moment(current).format(format);
                    data[i] = 0;

                    while(j < sessions.length) {
                        var sessionMoment =moment.utc(sessions[j].created_at);
                        if(sessionMoment.isSame(current,subPeriod)) {
                            data[i]++;
                            j++;
                            continue;
                        }
                        if(sessionMoment.isBefore(current,subPeriod)){
                            j++;
                        }else{
                            break;
                        }
                    }
                    current.add(1,subPeriod);
                    i++;
                    /* if(i>= 100){
                     break;
                     }*/
                }

                $scope.labels = labels;
                $scope.series = ['Visitas'];
                $scope.data = [
                    data
                ];
                $scope.onClick = function (points, evt) {
                    console.log(points, evt);
                };
            };

            $scope.updateData = function(){
                console.log("updating");

                var objPeriod =  $scope.periods[$scope.period];

                UserSession.get().then(function(sessions){
                    $scope.data = sessions;
                    $scope.updateChart($scope.data, $scope.period,objPeriod.subPeriod,objPeriod.format ,objPeriod.titleFormat );
                });
            };
            setInterval(function(){
                $scope.updateData();
            },5000);

            $scope.updateData();

        });
    </script>
    <div class="ventamatic-chart" ng-controller="LineCtrl">
        <h3 >Gráfico de visitas - <span ng-bind="title"></span></h3>

        <canvas id="line" class="chart chart-line" chart-data="data"
                chart-labels="labels" chart-legend="true" chart-series="series"
                chart-click="onClick" >
        </canvas>
        <select ng-model="period" ng-change="updateData()"
                ng-options="key as x.title for (key,x) in periods">
        </select>

    </div>
    <style>
        .ventamatic-chart{
            background-color: rgba(255,255,255,.25);
            border: gray solid 2px;
            border-radius: 20px;
            overflow: hidden;
        }
        .ventamatic-chart h3{
            background-color: rgba(0,0,0,.5);

            color:white;
            font-size: 18px;
        }
    </style>


@endsection