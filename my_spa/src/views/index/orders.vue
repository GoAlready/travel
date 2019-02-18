<template>
    <div>
        <header class="page-header">
    <span class="page-name">基础信息</span>
</header>
<section class="form-box">
    <div class="form-sub" >
        <span>前往城市</span>
        <input v-model="data.city" type="text" placeholder="城市" id="location" >
    </div>
    <div class="form-sub">
        <div class="form-sub">
        <span>时间</span>
        <input @click="openPicker" v-model="data.time" type="text" placeholder="出发时间" id="date" readonly>
    </div>
        <wv-datetime-picker
            ref="picker"
            type="date"
            :startDate="new Date('2018/01/01')"
            :endDate="new Date('2019/12/31')"
            @confirm="handleConfirm">
        </wv-datetime-picker>
    </div>
    <div class="form-sub">
        <span>同行人数</span>
        <input v-model="data.num" type="text" placeholder="同行人数" id="num">
    </div>
    <div class="form-sub">
        <span>旅行意愿</span>
        <input v-model="data.checkyiyuan" type="checkbox" checked="checked" value="人文" id="formSub1"><label for="formSub1">人文</label>
        <input v-model="data.checkyiyuan" type="checkbox" value="历史" id="formSub2"><label for="formSub2">历史</label>
        <input v-model="data.checkyiyuan" type="checkbox" value="自然" id="formSub3"><label for="formSub3">自然</label>
    </div>
    <div class="form-sub">
        <span>备注</span>
        <textarea v-model="data.beizhu" id="beizhu"></textarea>
    </div>
    <div class="orders-btn">
        <!-- <router-link to="guide_select"><button>下一步</button></router-link> -->
        <button @click="btn" id="btn">下一步</button>
    </div>
</section>
    </div>
</template>
<script>
import "../../assets/css/LArea.css"
import "../../assets/css/LCalendar.css"
import "../../assets/js/LArea.js"
import "../../assets/js/LAreaData2.js"
import "../../assets/js/LCalendar.js"

export default {
    created(){
        $(function () {
            $("#btn").click(function(){
                if($("#location").val()==""||$("#date").val()==""||$("#num").val()==""||$("#beizhu").val()==""){
                    alert("请完善表单");
                }
            })
    });
    },
    data(){
        return{
            data:{
                time:"2018-12-12",
                checkyiyuan:[],
                num:1,
                beizhu:"",
                city:this.$route.query.address ? this.$route.query.address : ""
            },
            isGoTo:""
        }
    },
    methods: {
        btn(){
            var Trip = localStorage.getItem("my_trip");
            Trip = Trip ? JSON.parse(Trip) :[]
            Trip["time"] = this.data.time;
            Trip["checkyiyuan"] = this.data.checkyiyuan;
            Trip["num"] = this.data.num;
            Trip["beizhu"] = this.data.beizhu;
            Trip["city"] = this.data.city;
            localStorage.setItem("my_trip",JSON.stringify(Trip));
            if($("#location").val()!=""&&$("#date").val()!=""&&$("#num").val()!=""&&$("#beizhu").val()!=""){
                this.$router.push("/guide_select")      
            }   
        },
        openPicker() {
            this.$refs.picker.open();
        },
        handleConfirm (value) {
            var d = new Date(value);
            var m = d.getMonth() + 1;
            var day = d.getDate();
            if(m<10){
                m = "0"+m
            }
            if(day<10){
                day = "0"+day
            }
            var datetime=d.getFullYear() + '-' + m + '-' + day;
            this.data.time = datetime
        }
    }
}
</script>
