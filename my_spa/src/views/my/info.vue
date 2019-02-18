<template>
    <div>
        <div class="wrap">
    <!--头部-->
    <header class="page-header mb-10">
        <router-link to="home_page" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
        <span class="page-name">基本信息</span>
    </header>
    <!--基本信息-->
    <section class="info-box mb-10">
        <div class="info-row">
            <span class="info-row-title">头像</span>
            <span class="avator-sm">
                <img src="../../assets/img/chuichui.gif" alt="">
            </span>
        </div>
        <div class="info-row">
            <span class="info-row-title">昵称</span>
            <span class="info-row-text">lamvins</span>
        </div>
        <div class="info-row">
            <span class="info-row-title">性别</span>
            <span class="info-row-text">男</span>
            <div class="info-row-right info-right-sex">
                <span class="info-sex-man sex-active">男</span>
                <span>女</span>
            </div>
        </div>
        <div class="info-row">
            <span class="info-row-title">年龄</span>
            <span class="info-row-text" id="age">18</span>
            <!--<input id="value1" type="hidden" />-->
            <!--<input class="info-row-text" id="age" type="text" readonly value="18"/>-->
            <input id="value1" type="hidden" />
            <div class="info-row-right">
                <img src="../../assets/img/select.png" alt="" id="agePic">
            </div>
        </div>
        <div class="info-row">
           <span class="info-row-title">所在地</span>
            <input type="text " class="info-row-text" id="location" value="兰州">
            <!--<input class="info-row-text" id="location" type="text" readonly value="兰州市"/>-->
            <input id="value2" type="hidden" />
            <div class="info-row-right">
                <img src="../../assets/img/select.png" alt="" id="locationPic">
            </div>
        </div>
    </section>

    <!--手机号+身份证-->
    <section class="info-row">
        <span class="info-row-title">手机号</span>
        <span class="info-row-text">13220450210</span>
        <div class="info-row-right info-right-phone">
            <span>修改手机号</span>
        </div>
    </section>
    <section class="info-row">
        <span class="info-row-title">身份证号</span>
        <span class="info-row-text"></span>
    </section>
</div>
    </div>
</template>
<script>
import "@/assets/css/LArea.css"
import "@/assets/css/mobileSelect.css"
import "@/assets/js/mobileSelect.js"
    $(function () {
        var agePic = $("#agePic");
        var arr = new Array();
        $(agePic).on("click", function () {
            $("#age").click();
        });
        for(var i=0; i<100; i++){
            arr[i] = 2018 - i;
        }
        var mobileSelect1 = new MobileSelect({
            trigger: '#age',
            title: '    ',
            wheels: [
                {data:arr}
            ],
            position:[0], //初始化定位
            callback:function(indexArr, data){
                var select = data;
                var age = 2018 - select;
                $("#age").text(age);
            }
        });
    });
export default {

}
</script>
<style>
#app {text-align: center;color: #2c3e50;margin-top: 60px;}
</style>

