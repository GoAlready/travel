<template>
    <div>
        <!--头部-->
<header class="page-header">
    <router-link to="guide_verify" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">确认订单</span>
</header>
<div class="wrap">
    <!--订单基本信息-->
    <section class="order-info mb-10">
        <div class="container">
            <div class="order-title">
                基础信息
            </div>
            <div class="order-content">
                <span>城市：{{trip.city}}</span>
                <span>时间：{{trip.time}}</span>
                <span>人数：{{trip.num}}人</span>
            </div>
            <div class="order-wish">
                旅行愿景:{{trip.checkyiyuan[0]}}
            </div>
            <div class="order-remark">
                备注：{{trip.beizhu}}
            </div>
        </div>
    </section>
    <!--导游信息-->
    <section class="order-guide mb-10">
        <div class="container">
            <div class="order-title">
                向导信息
            </div>
            <div class="guide-info-wrap">
                <div class="guide-pic">
                    <img :src="trip.guideImg" alt="">
                </div>
                <div class="guide-info">
                    <div class="guide-name">
                        {{trip.guideName}}
                    </div>
                    <div class="guide-job">
                        <span>已接单：{{trip.guideReceipt_num}}</span> | 
                        <span>主要接单地：{{trip.guideAddress}}</span>
                    </div>
                    <div class="guide-intro">
                        {{trip.guideIntroduce}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--行程费用-->
    <section class="order-pay mb-10">
        <div class="container">
            <div class="order-title">行程费用</div>
            <div class="float-right">{{trip.articleMoney}}元</div>
        </div>
    </section>
    <!--支付方式-->
    <section class="order-pay-way">
        <div class="container">
            <div class="order-title">支付方式</div>
            <div class="float-right">在线支付</div>
        </div>
    </section>
</div>
    <section class="bottom-btn" @click="btn">
        确认订单
    </section>
    </div>
</template>
<script>
export default {
    created(){
        var trip = localStorage.getItem("my_trip");
        trip = trip ? JSON.parse(trip) :[]
        this.trip = trip
    },
    data(){
        return {
            trip:{}
        }
    },
    methods:{
        btn(){
            var token = localStorage.getItem("token");
            this.axios.post("/orders",this.trip,{
                headers:{
                    'Authorization':'Bearer '+token
                },
            })
            .then(res=>{
               if(res.data.code==200){
                   this.$router.push("/pay?id="+res.data.id);
               }
            })
        }
    }
}
</script>
