<template>
    <div>
        <header class="home-header">
    <div class="home-title">
        主页
    </div>
    <div class="home-avatar">
        <img src="../../assets/img/chuichui.gif" alt="">
    </div>
    <div class="home-name">
        用户名
    </div>
    <div class="home-btn">
        <router-link to="/info">编辑资料</router-link>
    </div>
</header>
<div class="mb-bg"></div>
<section class="home-box">
    <router-link to="/my_trip">
        <div class="home-sub">
            <div class="home-sub-icon">
                <img src="../../assets/img/home_1.png" alt="">
            </div>
            <div class="home-sub-sort">
                我的行程
            </div>
            <div class="float-right home-right">
                <img src="../../assets/img/select.png" alt="">
            </div>
        </div>
    </router-link>
    <router-link to="/ticket">
        <div class="home-sub">
            <div class="home-sub-icon">
                <img src="../../assets/img/home_2.png" alt="">
            </div>
            <div class="home-sub-sort">
                优惠券
            </div>
            <div class="float-right home-right">
                <img src="../../assets/img/select.png" alt="">
            </div>
        </div>
    </router-link>
    <div class="home-sub">
        <div class="home-sub-icon">
            <img src="../../assets/img/home_3.png" alt="">
        </div>
        <div class="home-sub-sort">
            联系客服
        </div>
        <div class="float-right home-right">
            <img src="../../assets/img/select.png" alt="">
        </div>
    </div>
    <router-link to="/set">
        <div class="home-sub">
            <div class="home-sub-icon">
                <img src="../../assets/img/home_4.png" alt="">
            </div>
            <div class="home-sub-sort">
                设置
            </div>
            <div class="float-right home-right">
                <img src="../../assets/img/select.png" alt="">
            </div>
        </div>
    </router-link>
</section>
    </div>
</template>
