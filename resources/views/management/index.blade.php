@extends('index')

@section('content')
    <script>
        Ventamatic.controller("LineCtrl", function ($scope, UserSession) {
            UserSession.get().then(function(sessions){
                var current = moment().hour(0).minute(0).second(0);
                var last = moment(current).add(1,'day');

                var data=[];
                var labels=[];
                var i= 0;
                var j=0;
                while(!current.isSame(last,'hour')){
                    labels[i]=moment(current).format('hh:mm a');

                    data[i] = 0;
                    while(j < sessions.length) {
                        var sessionMoment =moment.utc(sessions[j].created_at);
                        if(sessionMoment.isSame(current,'hour')) {
                            data[i]++;
                            j++;
                            continue;
                        }
                        if(sessionMoment.isBefore(current,'hour')){
                            j++;
                        }else{
                            break;
                        }
                    }
                    current.add(1,'hour');
                    i++;
                    if(i>= 100){
                        break;
                    }
                }

                $scope.labels = labels;
                $scope.series = ['Series A'];
                $scope.data = [
                    data
                ];
                $scope.onClick = function (points, evt) {
                    console.log(points, evt);
                };
            });

        });
    </script>
    <div ng-controller="LineCtrl">
        <canvas id="line" class="chart chart-line" chart-data="data"
                chart-labels="labels" chart-legend="true" chart-series="series"
                chart-click="onClick" >
        </canvas>

    </div>


@endsection