<template>
    <div>
        <header class="page-header">
    <router-link to="orders" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">选择向导</span>
</header>
<section class="guide-box">
    <div class="guide-sub" v-for="(v,k) in guide" :key="k" >
        <router-link :to="'guide_verify?id='+v.id">
            <div class="guide-info-wrap">
                <div class="guide-pic">
                    <img :src="v.headImg" alt="">
                </div>
                <div class="guide-info">
                    <div class="guide-name">
                        {{v.name}}
                    </div>
                    <div class="guide-job">
                        <span>已接单：{{v.receipt_num}}</span> | 
                        <span>主要接单地：{{v.address}}</span>
                    </div>
                    <div class="guide-intro">
                        {{v.introduce}}
                    </div>
                </div>
                <div class="float-right guide-select-img">
                    <img src="../../assets/img/select.png" alt="">
                </div>
            </div>
        </router-link>
    </div>
</section>
    </div>
</template>
<script>
export default {
    created(){
        this.axios.get("/getGuideAll")
        .then(res=>{
            this.guide = res.data
        })
    },
    data(){
        return {
            guide:[]
        }
    }
}
</script>

