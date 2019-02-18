<template>
    
    <div>
        <header class="page-header">
    <router-link :to="'orderBegin?id='+this.$route.query.id" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">付款成功</span>
</header>
<section class="pay-success-container">
    <div class="pay-success-pic">
        <img src="../../assets/img/pay_success.png" alt="">
    </div>
    <div class="pay-success-text">
        支付成功！
    </div>
    <div class="pay-success-text" >
        <router-link :to="'orderBegin?id='+this.$route.query.id">查看订单</router-link>
    </div>
    <div class="guide-info-wrap container">
        <div class="guide-pic-sm">
            <img src="../../assets/img/chuichui.gif" alt="">
        </div>
        <div class="guide-info-sm">
            <div class="guide-name-sm">
                {{guide.guideName}}
            </div>
            <div class="guide-job-sm">
                <span>已接单：{{guide.guideReceipt_num}}</span>
                <span>主要接单地：{{guide.guideAddress}}</span>
            </div>
        </div>
        <div class="guide-contact">
            <router-link to="chat">联系他</router-link>
        </div>
    </div>
</section>
    </div>
</template>
<script>
export default {
    created(){
        var guide = localStorage.getItem("my_trip");
        guide = guide ? JSON.parse(guide) : []
        this.guide = guide
    },
    data(){
        return {
            guide:""
        }
    }
}
</script>

