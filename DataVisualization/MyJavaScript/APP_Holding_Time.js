/**
 * Created by 周博文 on 2016/8/11.
 */





// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('APP_Holding_Time'));

// 指定图表的配置项和数据
var option = {

    color: ['#E066FF'],

    grid: {
        x:30,
        x2:30
    },
    title: {
        text: 'APP使用时长统计表',
        subtext: '数据来源灵动快传平台（单位：次）',
        sublink: 'http://115.28.101.196/'
    },
    tooltip: {  //提示工具
        trigger : 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        },
        show: true
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    legend: {
        data:['停留在相应时间段总次数']
    },
    xAxis: {
        type : 'category',
        data: ["0-1m","1m-2m","2m-3m","3m-4m","4m-5m","5m-6m","6m-7m","7m-8m","8m-9m","9m-10m","10m以上"]
        /*xAxis的data：用于设置x轴的刻度之用，类型为字符串数组,"创建连接","搜索加入"*/
    },

    yAxis: [
        {
            type : 'value'
        }
    ],

    series: [{
        name: '停留在相应时间段总次数',
        type: 'bar',
        data: []/*5,9,5,4,21,18,15,17,25,50,78*/
    }]
};



//预加载动画,可以设置为当数据加载成功时隐藏此项，即不消失加载的动画
myChart.showLoading();
myChart.setOption(option);

// 异步加载数据
$.ajax({
    type: "post",
    async: false, //设置为同步执行，同一个页面多个ajax请求会出现阻塞，因而设置为同步执行，不过同步执行，页面会出现假死现象
    cache: false,  //设置为false将不会从浏览器缓存中加载请求信息
    //url: "http://192.168.1.147/offlinetrans/DataVisualization/APP_Holding_Time.php",
    url: "http://115.28.101.196/DataVisualization/APP_Holding_Time.php",
    dataType: "json", //返回数据形式为json
    //data: {rnd:Math.random()},
    success: function(result) {
        console.log("么么哒 么么哒00000000000000000000000000000000000");
        console.log(result);
        myChart.hideLoading();
        myChart.setOption({

            series: [{
                // 根据名字对应到相应的系列
                //name: '功能模块使用频率统计表',
                type: 'bar',
                data: result
            }]
        });
    },
    error: function(errorMsg) {
        alert("APP_Holding_Time 请求数据失败!");
    }
});
