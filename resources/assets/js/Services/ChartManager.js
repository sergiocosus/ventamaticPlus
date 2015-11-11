Ventamatic.factory('ChartManager', function($http) {
    var ChartManager = {};
    ChartManager.periodData= {
        'year': {
            title: 'Año',
            subPeriod: 'month',
            subTitle: 'mes',
            format: 'YYYY/MMMM',
            titleFormat: 'YYYY'
        },
        'month': {
            title: 'Mes',
            subPeriod: 'week',
            subTitle: 'semana',
            format: 'DD',
            titleFormat: 'MM/YYYY'
        },
        'week': {
            title: 'Semana',
            subPeriod: 'day',
            subTitle: 'día',
            format: 'DD dddd',
            titleFormat: 'MM/YYYY'
        },
        'day': {
            title: 'Día',
            subPeriod: 'hour',
            subTitle: 'hora',
            format: 'ha',
            titleFormat: 'DD/MM/YYYY'
        },
        'hour': {
            title: 'Hora',
            subPeriod: 'minute',
            subTitle: 'minuto',
            format: 'hh:mm a',
            titleFormat: 'DD/MM/YYYY hh a'
        },
        'minute': {
            title: 'Minuto',
            subPeriod: 'second',
            subTitle: 'segundo',
            format: 'hh:mm:ss a',
            titleFormat: 'DD/MM/YYYY hh:mm a'
        }
    };

    ChartManager.update = function($scope,counterCallback,title){
        var periodInfo =  ChartManager.periodData[$scope.period];
        var sessions = $scope.data;


        var period = $scope.period;
        var subPeriod = periodInfo.subPeriod;
        var format = periodInfo.format;
        var titleFormat = periodInfo.titleFormat;
        var subTitle = periodInfo.subTitle;

        var current = moment().add(-1,period).startOf(subPeriod);
        var last = moment(current).add(+1,period).add(+1,subPeriod);
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
                    data[i] = counterCallback(sessions[j],data[i]);
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
        }

        $scope.labels = labels;
        $scope.series = [title+' por '+subTitle];
        $scope.data = [data];
    };



    return ChartManager;
});