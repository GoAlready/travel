<template>
    <div>
        <header class="index-header">
    <div class="search-box">
        <img src="../../assets/img/search.png" alt="">
        <input @click="search()" type="text" placeholder="搜索目的地/向导号" class="index-saerch">
    </div>
    <div class="saoyisao">
        <img src="../../assets/img/saoyisao.png" alt="">
    </div>
</header>
<section class="theme-box">
    <div class="theme-title">
        <span class="index-title-square"></span>
        <span>推荐主题</span>
        <span>|</span>
        <span>THEME</span>
        <img src="../../assets/img/index_more.png" alt="" class="more-right">
    </div>
    <div class="theme-list" v-for="(v,k) in article" :key="k">
        <router-link :to="'guide?id=' + v.id">
            <div class="theme-sub" :style="{ 'background-image': 'url(' + v.cover + ')'}">
                <div class="theme-title-box">
                    <div class="theme-sub-title">{{v.title}}</div>
                    <div class="theme-time">{{v.created_at.substring(0,10)}}</div>
                </div>
                <div class="thmem-writer-box">
                    <div class="theme-writer">
                        <div class="theme-avatar">
                            <img :src="v.guide.headImg" alt="">
                        </div>
                        <span>{{v.guide.name}}</span>
                    </div>
                    <div class="theme-like">
                        <img src="../../assets/img/love.png" alt="">
                        <span>2200</span>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
    <div class="mb-bg"></div>
</section>
</div>
</template>
<script>
export default {
    data(){
        return {
            article:[]
        }
    },
    created(){
        this.axios.get("/getArticle")
        .then(res=>{
            this.article=res.data
        })
    },
    methods:{
        search(){
            this.$router.push('/search')
        }
    }
}
</script>
