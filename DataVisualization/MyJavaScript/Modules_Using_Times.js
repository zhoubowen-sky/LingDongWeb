/**
 * Created by 周博文 on 2016/8/8.
 */

// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('Modules_Using_Times'));

// 指定图表的配置项和数据
var option = {

    color: ['#3398DB'],

    grid: {
        x:30,
        x2:30
    },
    title: {
        text: '功能模块使用频率统计表',
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
        data:['功能模块使用总次数']
    },
    xAxis: {
        type : 'category',
        data: ["离线上传","离线下载","蓝牙传输","分享APP","文件管理","用户反馈","软件版本","软件描述","关于我们","安卓版本","连接电脑","创建连接","搜索加入"]
            /*"离线上传","离线下载","蓝牙传输","分享APP","文件管理","用户反馈","软件版本","软件描述","关于我们","安卓版本","连接电脑","创建连接","搜索加入"*/
                    /*xAxis的data：用于设置x轴的刻度之用，类型为字符串数组*/
    },

    yAxis: [
        {
            type : 'value'
        }
    ],

    series: [{
        name: '功能模块使用总次数',
        type: 'bar',
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
    //url: "http://192.168.1.147/offlinetrans/DataVisualization/Modules_Using_Times.php",
    url: "http://115.28.101.196/DataVisualization/Modules_Using_Times.php",
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
        alert("Modules_Using_Times 请求数据失败!");
    }
});







/*
getChartData();//ajax后台交互


function getChartData() {
    //获得图表的options对象
    var options = myChart.getOption();


    //使用jQuery的Ajax()来异步请求数据
    $.ajax({
        type: "post",
        async: true, //异步执行，同步执行可能会出现小小的问题  同步请求将锁住浏览器，用户其他操作必须等待请求完成才可以执行
        url: "http://192.168.1.147/offlinetrans/DataVisualization/Modules_Using_Times.php",
        datatype: "json", //返回数据形式为json
        //cache: false,  //设置为false将不会从浏览器缓存中加载请求信息

        //jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
        //jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名

        //data: {rnd:Math.random()},
        success: function(result) {
            console.log(result);
            //myChart.hideLoading(); //隐藏加载动画

            /!**将服务器返回的json数据传给前台的js显示出来，用轮询*!/
            /!*for(var i = 0 ; i < result.length ; i++ ){
             xAxis[i].push(result[i].name);
             data[i].push(result[i].value);
             }*!/
            if(result) {

                options.legend.data = result.legend;
                options.xAxis[0].data = result.category;
                options.series[0].data = result.series[0].data;

                myChart.hideLoading();
                myChart.setOption(options);
            }



            /!*myChart.setOption({ //渲染数据


                xAxis: {
                    data: result.names
                },
                series: [{
                    // 根据名字对应到相应的系列
                    data: result.values
                }]

            });*!/


        },
        error: function() {
            alert("Modules_Using_Times 请求数据失败!!!");
        }
    });

}







// 使用刚指定的配置项和数据显示图表,渲染图标。
myChart.setOption(option);
*/





























