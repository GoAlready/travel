<template>
    <div>
        <header class="page-header">
    <router-link to="/home_page" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">我的行程</span>
</header>
<section class="trip-nav">
    
    <router-link to="/my_trip">
        <span :class="['trip-nav-sub',{'trip-nav-active':$route.name=='tripAll'}]"  data-toggle="tripAll">未支付</span>
    </router-link>
    <router-link to="/my_trip/tripBegin" >
        <span :class="['trip-nav-sub',{'trip-nav-active':$route.name=='tripBegin'}]"  data-toggle="tripBegin">即将开始</span>
    </router-link>
    <router-link to="/my_trip/tripEnd">
        <span :class="['trip-nav-sub',{'trip-nav-active':$route.name=='tripEnd'}]" data-toggle="tripFinish">已结束</span>
    </router-link>
    <router-link to="/my_trip/tripComment">
        <span :class="['trip-nav-sub',{'trip-nav-active':$route.name=='tripComment'}]"  data-toggle="tripComment">待评价</span>
    </router-link>
</section>
<div class="mb-bg"></div>
 <router-view></router-view>
</div>
</template>
<script>
export default {
    date(){
        return {
            sub:"trip-nav-sub"
        }
    }
}
</script>


