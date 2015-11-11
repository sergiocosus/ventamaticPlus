@extends('index')

@section('content')
    <script>
        Ventamatic.controller("LineCtrl", function ($scope, UserSession) {
            $scope.data = null;
            $scope.updateChart = function(sessions,period, subPeriod, format){
                var current = moment().startOf(period);
                var last = moment(current).add(1,period);

                var data=[];
                var labels=[];
                var i= 0;
                var j=0;

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
                UserSession.get().then(function(sessions){
                    $scope.data = sessions;
                    $scope.updateChart($scope.data, 'day','hour','YYYY-MM-dd hh:mm a');
                });
            };
            setInterval(function(){
                $scope.updateData();
            },5000);

            $scope.updateData();

        });
    </script>
    <div ng-controller="LineCtrl">
        <canvas id="line" class="chart chart-line" chart-data="data"
                chart-labels="labels" chart-legend="true" chart-series="series"
                chart-click="onClick" >
        </canvas>

    </div>


@endsection