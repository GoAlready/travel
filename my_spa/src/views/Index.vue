<template>
    <div>
        <router-view></router-view>
     <section class="comm-nav">
    <div class="nav-index">
        <router-link to="/">
            <div class="nav-img-box">
                <img v-if="$route.name!='index'" src="../assets/img/nav_index.png" alt="">
                <img v-else  src="../assets/img/nav_index_chk.png" alt="">
            </div>
            <div  :class="{'nav-active':$route.name=='index'}">首页</div>
        </router-link>
    </div>
    <div class="nav-travel">
        <router-link to="/orders">
            <div class="nav-img-box">
                <img  v-if="$route.name!='orders'" src="../assets/img/nav_travel.png" alt="">
                <img v-else  src="../assets/img/nav_travel_chk.png" alt="">
            </div>
            <div :class="{'nav-active':$route.name=='orders'}">旅行</div>
         </router-link>
    </div>
    <div class="nav-chat">
        <router-link to="/hcat_list">
            <div class="nav-img-box">
                <img  v-if="$route.name!='hcat_list'" src="../assets/img/nav_chat.png" alt="">
                <img  v-else src="../assets/img/nav_chat_chk.png" alt="">
            </div>
            <div :class="{'nav-active':$route.name=='hcat_list'}">聊天</div>
        </router-link>
    </div>
    <div class="nav-user">
        <router-link to="/home_page">
            <div class="nav-img-box">
                <img  v-if="$route.name!='home_page'" src="../assets/img/nav_user.png" alt="">
                <img  v-else src="../assets/img/nav_user_chk.png" alt="">
            </div>
            <div :class="{'nav-active':$route.name=='home_page'}">主页</div>
        </router-link>
    </div>
</section>
    </div>
</template>
<script>

