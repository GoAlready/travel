<template>
    <div>
        <header class="page-header">
    <router-link to="guide_select" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">向导信息</span>
</header>
<section class="guide-verify-box">
    <div class="guide-verify-pic">
        <img :src="guide.headImg" alt="">
    </div>
    <div class="guide-verify-name">
        {{guide.name}}
    </div>
    <div class="guide-verify-info font-28">
        <span>主要接单地：{{guide.address}}</span>
        <span>已接单：{{guide.receipt_num}}</span>
    </div>
    <div class="guide-verify-text">
        {{guide.introduce}}
    </div>
</section>
<!-- <router-link to="order_verify"> -->
    <section @click="btn" class="bottom-btn">
        就选ta
    </section>
<!-- </router-link> -->
    </div>
</template>
<script>
export default {
    created(){
        this.axios.get("/getGuide?id="+ this.$route.query.id)
        .then(res=>{
            this.guide = res.data
        })
    },
    data(){
        return {
            guide:{}
        }
    },
    methods:{
        btn(){
            var trip = localStorage.getItem("my_trip");
            trip =trip ?  JSON.parse(trip) : [];
            trip["guideImg"] = this.guide.headImg
            trip["guideName"] = this.guide.name
            trip["guideIntroduce"] = this.guide.introduce
            trip["guideReceipt_num"] = this.guide.receipt_num
            trip["guideAddress"] = this.guide.address
            trip["guideAId"] = this.$route.query.id 
            localStorage.setItem("my_trip",JSON.stringify(trip));
            this.$router.push("/order_verify")
        }
    }
}
</script>
