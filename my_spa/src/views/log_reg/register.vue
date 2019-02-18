<template>
    <div>
    <header class="page-header">
        <a href="logon.html" class="page-return">
            <img src="img/return.png" alt="" class="return">
        </a>
        <span class="page-name">注册</span>
        <router-link to="/logon" class="page-right">已有账号</router-link>
    </header>
    <section class="logon-box">
        <input v-model="form.phone" type="text" placeholder="手机号">
        <input  type="text" placeholder="验证码">
        <input v-model="form.pwd" type="password" placeholder="密码">
        <button @click="code()" href="" class="send-code">发送验证码</button>
        <div class="btn-box">
                 <button @click="reg">注册</button>
        </div>
        <div class="user-agreement">
            点击注册表示同意
            <a href="user-agreement.html">用户协议</a>
        </div>
    </section>
    </div>
</template>
<script>
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
        code(){
            alert("你的验证码为:872837sfas493868723a1836gdasg419386481736asdsasd")
        },
        reg(){
            this.axios.post("/register",this.form)
            .then(res=>{
                if(res.data.code==200){
                    this.$router.push("/logon")
                }else{
                    alert(res.data.message)
                }
            })
        }
    }
}
</script>
