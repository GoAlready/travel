<template>
    <div>
        <!--头部-->
<header class="guide-header" :style="{ 'background-image': 'url(' + article.cover + ')'}">
    <div class="page-header clear-header">
        <router-link to="/" class="page-return">
            <img src="../../assets/img/return_white.png" alt="" class="return">
        </router-link>
        <span class="page-name">{{article.tiele}}</span>
        <a href="search.html" class="page-right page-search">
            <img src="../../assets/img/search.png" alt="">
        </a>
    </div>
    <div class="writer" v-if="article.guide" >
        <div class="writer-name">
            <img src="../../assets/img/guide_icon.png" alt="">
            <span>向导：{{article.guide.name}}</span>
        </div>
        <div class="writer-time">
            <img src="../../assets/img/time.png" alt="">
            <span>发布时间：{{article.created_at.substring(0,10)}}</span>
        </div>
    </div>
</header>
<!--攻略内容-->
<div class="wrap"  v-if="article.guide">
    <section class="mb-10">
        <div class="guide-content-box" v-html="article.content">
        </div>
        <div class="guide-info-wrap container">
            <div class="guide-pic-sm">
                <img src="../../assets/img/chuichui.gif" alt="">
            </div>
            <div class="guide-info-sm">
                <div class="guide-name-sm">
                    {{article.guide.name}}
                </div>
                <div class="guide-job-sm">
                    <span>已接单：{{article.guide.receipt_num}}</span>
                    <span>主要接单地：{{article.guide.address}}</span>
                </div>
            </div>
            <div class="guide-contact">
                <router-link :to="'guide_info?id='+article.guide.id">联系他</router-link>
            </div>
        </div>
    </section>
     <section class="bottom-btn" @click="goTo">
     ￥ {{article.money}}    |    我想去
    </section>
    <!--评论-->
    <section class="guide-comment" v-if="article.comment">
        <div class="comment-box">
            <div class="comment-num container">
                评论（{{article.comment.length}}）
            </div>
        </div>
        <div class="comment-list">
            <div class="comment-sub" v-for="(v,k) in article.comment" :key="k">
                <div class="comment-sub-title">
                    <div class="comment-pic">
                        <img src="../../assets/img/chuichui.gif" alt="">
                    </div>
                    <div class="comment-info">
                        <div class="comment-name">
                            {{v.user.name}}
                        </div>
                        <div class="comment-time">
                            {{v.created_at.substring(0,10)}}
                        </div>
                    </div>
                </div>
                <div class="comment-content">
                    {{v.content}}
                </div>
            </div>
        </div>
        <div class="comment-more" v-if="article.comment.length > 3">
            加载全部评论
        </div>
        <div class="comment-state" style="margin-bottom: 48px !important;">
            <div class="comment-like" @click="like(article.id)">
                <img v-if="likes" src="../../assets/img/like.png" alt="">
                <img v-else src="../../assets/img/index_like.png" alt="">
                <span>{{article.like}}</span>
            </div>
            <div class="comment-dislike" @click="dislike(article.id)">
                <img v-if="disLikes" src="../../assets/img/dislike.png" alt="">
                <img v-else src="../../assets/img/index_dislike.png" alt="">
                <span>{{article.bulike}}</span>
            </div>
            <div class="comment-love">
                <img src="../../assets/img/love.png" alt="">
                <span>2200</span>
            </div>
            <div class="comment-share">
                <img src="../../assets/img/share.png" alt="">
            </div>
        </div>
    </section>
</div>

    </div>
</template>
<script>
 $(function () {
     
        var more = $(".comment-more");
        var commentList = $(".comment-list");
        var num = 0;
        $(more).on("click", function(){
            if(num == 0){
                $(commentList).css({
                    "overflow": "visible",
                    "max-height": "none"
                });
                $(more).text("收起评论");
                num = 1;
            }else{
                $(commentList).css({
                    "overflow": "hidden",
                    "max-height": "6.45rem"
                });
                $(more).text("加载全部评论");
                num = 0;
            }

        })
    })
export default {
    created(){
        var id = this.$route.query.id;
        var token = localStorage.getItem("token");
        this.axios.get("/getArticleId?id="+id)
        .then(res=>{
            this.article = res.data
        })
        this.axios.post("/hasLike?id="+id,{
                headers:{
                    'Authorization':'Bearer '+token
                }
            })
        .then(res=>{
            if(res.data.hasLike){
                this.likes = true
            }else{
                this.disLikes =true 
            }
        })
    },
    data(){
        return {
            article:[],
            likes:false,
            disLikes:false
        }
    },
    methods:{
        goTo(){
            // var trip = localStorage.getItem("my_trip")
            // trip = trip ? JSON.parse(trip) :[]
            var trip = {};
            trip["articleId"] =  this.$route.query.id;
            trip["articleMoney"] =  this.article.money;
            localStorage.setItem("my_trip",JSON.stringify(trip))
            this.$router.push("/orders?address="+this.article.city)
        },
        like(id){
            var token = localStorage.getItem("token");
            this.axios.post("/articleLike?id="+id,{
                headers:{
                    'Authorization':'Bearer '+token
                }
            })
            .then(res=>{
                if(res.data.code==200){
                    this.likes = true
                    this.article.like = this.article.like+1
                }else if(res.data.code==300){
                    this.likes = false
                    this.article.like = this.article.like-1
                }else{
                    alert(res.data.message)
                }
            })
        },
        dislike(id){
             var token = localStorage.getItem("token");
            this.axios.post("/articleDisLike?id="+id,{
                headers:{
                    'Authorization':'Bearer '+token
                }
            })
            .then(res=>{
                if(res.data.code==200){
                    this.disLikes = true
                    this.article.disLike = this.article.disLike+1
                }else if(res.data.code==300){
                    this.disLikes= false
                    this.article.disLike = this.article.disLike-1
                }else{
                    alert(res.data.message)
                }
            })
        }
    },
}
</script>
