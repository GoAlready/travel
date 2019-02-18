<template>
    <div>
        <header class="page-header">
    <router-link to="home_page" class="page-return">
        <img src="../../assets/img/return.png" alt="" class="return">
    </router-link>
    <span class="page-name">设置</span>
</header>
<section>
    <div class="set-sub">
        <router-link to="/info">
        <span>个人资料</span>
        <div class="info-row-right">
            <img src="../../assets/img/select.png" alt="">
        </div>
        </router-link>
    </div>
    <div class="set-sub">
        <span>清除缓存</span>
        <div class="info-row-right">
            <img src="../../assets/img/select.png" alt="">
        </div>
    </div>
    <div class="set-sub">
        <span>关于我们</span>
        <div class="info-row-right">
            <img src="../../assets/img/select.png" alt="">
        </div>
    </div>
    <div class="logout">
        <router-link to="/logon">
            <button>退出登录</button>
        </router-link>
    </div>
</section>
    </div>
</template>
