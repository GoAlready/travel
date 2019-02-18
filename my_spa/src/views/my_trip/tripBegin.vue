<template>
    <div>
        <section :class="'trip-box hidden:active!=tripBegin'" id="tripBegin">
    <div class="trip-sub" v-for="(v,k) in begin " :key="k">
        <div class="trip-title-box">
            <div class="trip-title">
                <span>订单编号</span>
                {{v.order_code}}
            </div>
            <div class="trip-state">
                即将开始
            </div>
        </div>
        <router-link :to="'/orderBegin?id=' + v.id">
            <div class="trip-content-box">
                <div class="trip-avatar">
                    <img src="../../assets/img/chuichui.gif" alt="">
                </div>
                <div class="trip-content">
                    <div class="trip-text">
                        城市：{{v.city}}
                    </div>
                    <div class="trip-text">
                        时间：{{v.user_time}}
                    </div> 
                    <div class="trip-text">
                        人数：{{v.num}}人
                    </div>
                </div>
                <div class="float-right trip-right">
                    <img src="../../assets/img/select.png" alt="">
                </div>
            </div>
        </router-link>
    </div>
    <div v-if="begin">
        <div v-if="begin.length==0">
            <span style="margin-left:100px;font-size:20px;color:#999"> 暂无相关订单 快去下单吧  </span>
        </div>
    </div>
</section>
    </div>
</template>
<script>
export default {
    created(){
         var token = localStorage.getItem("token")
        this.axios.post("/getBegin",{
            headers:{
                    'Authorization':'Bearer '+token
            },
        })
        .then(res=>{
            this.begin = res.data
        })
    },
    data(){
        return {
            begin:{}
        }
    }

}
</script>

