/**
 * Created by 周博文 on 2016/8/11.
 */




// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('Android_Version'));

// 指定图表的配置项和数据
var option = {

    title: {
        text: '安卓手机版本统计表',
        subtext: '数据来源灵动快传平台（单位：个）',
        x: 'left',
        sublink: 'http://115.28.101.196/'
    },
    tooltip: {  //提示工具
        trigger : 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'right',
        data: ['4.0','4.1','4.2','4.3','4.4','5.0','5.1','6.0','7.0','其他']
    },
    series: [{
        name: '各版本用户总个数',
        type: 'pie',
        radius : '55%',
        data: [],

        center: ['50%', '50%'],
        itemStyle: {
            emphasis: {
                shadowBlur: 10,
                shadowOffsetX: 0,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
        }
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
    //url: "http://192.168.1.147/offlinetrans/DataVisualization/Android_Version.php",
    url: "http://115.28.101.196/DataVisualization/Android_Version.php",
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
                type: 'pie',
                //itemStyle:{normal:{color:'#6A5ACD'}},
                color:['#00a876','#5fd4b1','#0d56a6','#5e0dac','#4dde00','#ff5900','#b70094','#2209b2','#58e000','#ef002a'],
                data: result,
                itemStyle: {
                    normal: {
                        shadowBlur: 200,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
            ]
        });
    },
    error: function(errorMsg) {
        alert("Files_Trans_Type 请求数据失败!");
    }
});

