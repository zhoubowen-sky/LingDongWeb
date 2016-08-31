/**
 * Created by 周博文 on 2016/8/10.
 */



// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('Files_Trans_Type'));

// 指定图表的配置项和数据
var option = {

    color: ['#228B22'],

    grid: {
        x:30,
        x2:30
    },
    title: {
        text: '传输文件类型统计表',
        subtext: '数据来源灵动快传平台（单位：个）',
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
        data:['各类型文件总个数']
    },
    xAxis: {
        type : 'category',
        data: ["JPG","PNG","DOC","PPT","XLS","PDF","TXT","MP3","ZIP","APK","EXE","其他"]
        /*"离线上传","离线下载","蓝牙传输","分享APP","文件管理","用户反馈","软件版本","软件描述","关于我们","安卓版本","连接电脑","创建连接","搜索加入"*/
        /*xAxis的data：用于设置x轴的刻度之用，类型为字符串数组*/
    },

    yAxis: [
        {
            type : 'value'
        }
    ],

    series: [{
        name: '各类型文件总个数',
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
    //url: "http://192.168.1.147/offlinetrans/DataVisualization/Files_Trans_Type.php",
    url: "http://115.28.101.196/DataVisualization/Files_Trans_Type.php",
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
                type: 'bar',
                data: result
            }]
        });
    },
    error: function(errorMsg) {
        alert("Files_Trans_Type 请求数据失败!");
    }
});

