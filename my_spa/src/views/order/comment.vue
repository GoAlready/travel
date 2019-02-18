<template>
    <div>
        <header class="page-header">
    <router-link to="/my_trip/tripComment" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">评价</span>
</header>
<section class="mb-10">
    <div class="order-box">
        <div class="order-num">
            <span>订单编号</span>
            2018010110021
        </div>
        <div class="order-info">
            <span>城市：兰州</span>
            <span>时间：2018.01.01</span>
            <span>人数：2人</span>
        </div>
    </div>
    <div class="comment-box">
        <div class="comment-stars">
            <span class="comment-title">旅游评分</span>
            <div class="stars-box" >
            <img  v-for=" (v,k) in  form.Tourism_stars" :key="k" @click="Tourism(k)" src="../../assets/img/star_chk.png" alt="">
            <img v-for=" (v,k) in  starts"  :key="k"   v-if="form.Tourism_stars<=k" @click="Tourism(k+1)" src="../../assets/img/star_no.png" alt="">

        </div>
        </div>
        <textarea class="comment-text" placeholder="说说你的旅行感受吧" v-model="form.content"></textarea>
        <div class="comment-pic">
            <img src="../../assets/img/comment_pic.png" alt="">
        </div>
    </div>
    <div class="mb-bg"></div>
</section>
<section class="comment-star-list">
    <div class="comment-title">
        向导评分
    </div>
    <div class="comment-stars">
        <span>服务态度</span>
        <div class="stars-box" >
            <img  v-for=" (v,k) in  form.major_stars" :key="k" @click="major(k)" src="../../assets/img/star_chk.png" alt="">
            <img v-for=" (v,k) in  starts"  :key="k"   v-if="form.major_stars<=k" @click="major(k+1)" src="../../assets/img/star_no.png" alt="">

        </div>
    </div>
    <div class="comment-stars">
        <span>时间观念</span>
        <div class="stars-box" >
            <img  v-for=" (v,k) in  form.time_stars" :key="k" @click="time(k)" src="../../assets/img/star_chk.png" alt="">
            <img v-for=" (v,k) in  starts"  :key="k"   v-if="form.time_stars<=k" @click="time(k+1)" src="../../assets/img/star_no.png" alt="">
           
        </div>
    </div>
    <div class="comment-stars">
        <span>专业水平</span>
        <div class="stars-box" >
            <img  v-for=" (v,k) in  form.service_stars" :key="k" @click="service(k)" src="../../assets/img/star_chk.png" alt="">
            <img v-for=" (v,k) in  starts"  :key="k"   v-if="form.service_stars<=k" @click="service(k+1)" src="../../assets/img/star_no.png" alt="">
        </div>
    </div>
</section>
<section class="bottom-btn" @click="btn">
    提交
</section>
    </div>
</template>
<script>
import { Dialog, Toast } from 'we-vue'
export default {
    data(){
        return {
            starts:5,
            form:{
                order_id:this.$route.query.id,
                Tourism_stars:0,
                major_stars:0,
                time_stars:0,
                service_stars:0,
                content:""
            }
        }
    },
    methods:{
        service(num){
            this.form.service_stars= num
        },
        time(num){
             this.form.time_stars= num
        },
        major(num){
            this.form.major_stars= num
        },
        Tourism(num){
            this.form.Tourism_stars= num
        },
        btn(){
            var token  = localStorage.getItem("token");
            this.axios.post("/comment",this.form,{
                headers:{
                    'Authorization':'Bearer '+token
                },
            }).then(res=>{
                console.log(res.data)
                if(res.data.code==200){
                   Dialog({
                        message:"感谢你的宝贵意见",
                        skin:'ios'
                    }).then(()=>{
                        this.$router.push("/my_trip/tripComment")
                    })
                }
            })
        }
    }
}
</script>

