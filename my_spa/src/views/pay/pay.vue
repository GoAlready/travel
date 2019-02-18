<template>
    <div>
        <header class="page-header">
    <router-link to="/my_trip" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">支付订单</span>
</header>
<section class="pay-header">
    <div class="pay-time">
        支付剩余时间 &nbsp;<label id="time"></label>
    </div>
    <div class="pay-price">
        ￥{{order.money}}
    </div>
    <div class="pay-num">
        订单编号：{{order.order_code}}
    </div>
</section>
<div class="mb-bg"></div>
<section class="pay-way">
    <div class="pay-way-sub" @click="active('1')">
        <div class="pay-way-pic">
            <img src="../../assets/img/pay_wechat.png" alt="">
        </div>
        <div class="pay-content">
            <div class="pay-content-title">
                微信支付
            </div>
            <div class="pay-content-text">
                推荐安装微信5.0及以上版本
            </div>
        </div>
        <div class="float-right pay-right">
            <img v-if="pay=='1'"  src="../../assets/img/pay_chk.png" alt="">
        </div>
    </div>
    <div class="pay-way-sub" @click="active('2')" >
        <div class="pay-way-pic">
            <img src="../../assets/img/pay_3.png" alt="">
        </div>
        <div class="pay-content">
            <div class="pay-title">
                支付宝
            </div>
        </div>
        <div class="float-right pay-right">
            <img v-if="pay=='2'" src="../../assets/img/pay_chk.png" alt="">
        </div>
    </div>
</section>
<!-- <router-link to="pay_success"> -->
    <section class="bottom-btn" @click="comit">
        确认支付&nbsp;&nbsp;&nbsp;￥{{order.money}}
    </section>
<!-- </router-link> -->
    </div>
</template>
<script>

export default {
    created(){
        let token = localStorage.getItem("token");
        this.axios.post("/getOrders?id=" +this.$route.query.id,{
            headers:{
                    'Authorization':'Bearer '+token
            },
        })
        .then(function(res){
            this.order = res.data
            let date = new Date(res.data.created_at);
            let order_time = date.getTime();
            let order_times = new Date(order_time);
            let order_times_m= order_times.getMinutes();
            let order_times_h= order_times.getHours();
            let outTime = date.setMinutes(order_times_m+10)
            let nowTime = new Date().getTime();
            let timecha = outTime - nowTime;
            timecha =Math.floor(timecha/1000);
            let timejishiqi = setInterval(function(){
                --timecha
                let m =parseInt(timecha /60)
                let s = Math.floor(timecha %60) 
                if(s<10){
                    s = "0"+s
                }
                let ms =  m+":"+s
                if(m>=0&&s>=0){
                    $("#time").text(ms)
                }else{
                    clearInterval(timejishiqi);
                    this.axios.post("/delOrder_wei?id="+this.$route.query.id,{
                        headers:{
                            'Authorization':'Bearer '+token
                        },
                    })
                    .then(res=>{
                        if(res.data.code=='200'){
                            alert("订单已过期 请重新下订单")
                            this.$router.push("/orders")
                        }
                    })
                }
            }.bind(this),1000)
        }.bind(this))
    },
    methods:{
        active(pay){
            this.pay = pay
        },
        comit(){
            let token = localStorage.getItem("token")
            this.axios.post("/upOrder?pay="+this.pay+"&id="+this.$route.query.id,{
                headers:{
                            'Authorization':'Bearer '+token
                        },
            })
            .then(res=>{
                if(res.data.code=="200"){
                    this.$router.push("/pay_success?id="+this.$route.query.id)
                }else{
                    alert(res.data.message)
                    this.$router.push("/orderBegin")
                }
            })
        }
    },
    data(){
        return {
            pay:"1",
            order:{},
            time:''
        }
    }
}
</script>

