<template>
    <div>
            <header class="logon-header"></header>
    <section class="logon-box">
        <input v-model="form.phone" type="text" placeholder="手机号">
        <input v-model="form.pwd" type="password" placeholder="密码">
        <a href="" class="forget">忘记密码？</a>
        <div class="btn-box">
            <button @click="login">登录</button>
        </div>
        <div class="register-box">
            没有账号？
            <router-link to="/register">注册</router-link>
        </div>
    </section>
    <section class="logon-link">
        <div class="logon-link-text">
            使用其他账号登录
        </div>
        <div class="logon-link-list">
            <a href="">
                <img src="../../assets/img/wechat.png" alt="">
            </a>
            <a href="">
                <img src="../../assets/img/weibo.png" alt="">
            </a>
            <a href="">
                <img src="../../assets/img/qq.png" alt="">
            </a>
        </div>
    </section>
    </div>
</template>
<script>
import { Dialog, Toast } from 'we-vue'
export default {
    data(){
        return {
            form:{
                phone:"",
                pwd:""
            }
        }
    },
    methods:{
        login(){
            this.axios.post("/login",this.form)
            .then(res=>{
                if(res.data.code==200){
                    Dialog({
                        message:"登录成功",
                        skin:'ios'
                    }).then(()=>{
                        localStorage.setItem("token",res.data.token)
                        this.$router.push("/")
                    })
                }else{
                    Toast.fail({
						duration: 2000,
						message: res.data.message
					})
                }
            })
        }
    }
}
</script>

