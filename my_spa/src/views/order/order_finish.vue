<template>
    <div>
        <!--头部-->
<header class="page-header">
    <router-link to="/my_trip/tripEnd" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">订单详情</span>
</header>
<div class="wrap">
    <section class="order-state">
        已完成
    </section>
    <!--订单基本信息-->
    <section class="order-info mb-10">
        <div class="container">
            <div class="order-title">
                基础信息
            </div>
            <div class="order-content">
                <span>城市：{{data.city}}</span>
                <span>时间：{{data.user_time}}</span>
                <span>人数：{{data.num}}人</span>
            </div>
            <div class="order-wish">
                旅行愿景:{{data.yiyuan}}
            </div>
            <div class="order-remark">
                备注：{{data.remarks}}
            </div>
        </div>
    </section>
    <!--导游信息-->
    <section class="order-guide mb-10" v-if="data.guide">
        <div class="container">
            <div class="order-title">
                向导信息
            </div>
            <div class="guide-info-wrap">
                <div class="guide-pic" >
                    <img :src="data.guide.headImg" alt="">
                </div>
                <div class="guide-info">
                    <div class="guide-name">
                        {{data.guide.name}}
                    </div>
                    <div class="guide-job">
                        <span>已接单：{{data.guide.receipt_num}}</span> | 
                        <span>主要接单地：{{data.guide.address}}</span>
                    </div>
                    <div class="guide-intro">
                        {{data.guide.introduce}}
                    </div>
                </div>
                <div class="guide-contact">
                    <a href="chat.html">联系他</a>
                </div>
            </div>
        </div>
    </section>
    <!--行程费用-->
    <section class="order-pay mb-10">
        <div class="container">
            <div class="order-title">行程费用</div>
            <div class="float-right">{{data.money}}</div>
        </div>
    </section>
    <!--支付方式-->
    <section class="order-pay-way" v-if="data.pay_type">
        <div class="container">
            <div class="order-title">支付方式</div>
            <div class="float-right">{{data.pay_type==1 ? "微信支付" : "支付宝支付"}}</div>
        </div>
    </section>
</div>
    </div>
</template>
<script>
export default {
    created(){
        var token = localStorage.getItem("token")
        this.axios.post("/getOrders?id="+this.$route.query.id)
        .then(res=>{
            this.data = res.data
        })
    },
    data(){
        return {
            data:{}
        }
    }
}
</script>
