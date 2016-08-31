/**
 * Created by 周博文 on 2016/8/10.
 */



// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('APP_Start_Time'));

// 指定图表的配置项和数据
var option = {

    color: ['#FF8247'],

    grid: {
        x:30,
        x2:30
    },
    title: {
        text: 'APP启动时间统计表',
        subtext: '数据来源灵动快传平台（单位：次）',
        sublink: 'http://115.28.101.196/'
    },
    tooltip: {  //提示工具
        trigger : 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'line'        // 默认为直线，可选为：'line' | 'shadow'
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
        data:['APP启动次数']
    },
    xAxis: {
        type : 'category',
        data: ["00:00","02:00","04:00","06:00","08:00","10:00","12:00","14:00","16:00","18:00","20:00","22:00"]
        /*"离线上传","离线下载","蓝牙传输","分享APP","文件管理","用户反馈","软件版本","软件描述","关于我们","安卓版本","连接电脑","创建连接","搜索加入"*/
        /*xAxis的data：用于设置x轴的刻度之用，类型为字符串数组*/
    },

    yAxis: [
        {
            type : 'value'
        }
    ],

    series: [{
        name: 'APP启动次数',
        type: 'line',
        data: []/*5,9,5,4,21,18,15,17,25,50,78,54,22*/
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
    //url: "http://192.168.1.147/offlinetrans/DataVisualization/APP_Start_Time.php",
    url: "http://115.28.101.196/DataVisualization/APP_Start_Time.php",
    dataType: "json", //返回数据形式为json
    //data: {rnd:Math.random()},
    success: function(result) {
        console.log("这里是传输文件类型的脚本00000000000000000000000000000000000");
        console.log(result);
        myChart.hideLoading();
        myChart.setOption({

            series: [{
                // 根据名字对应到相应的系列
                //name: '功能模块使用频率统计表',
                type: 'line',
                data: result
            }]
        });
    },
    error: function(errorMsg) {
        alert("APP_Start_Time 请求数据失败!");
    }
});

