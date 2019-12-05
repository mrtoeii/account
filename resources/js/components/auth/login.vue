<template>
   <div class="container loginBox">
        <div class="row">
            <div class="col">
                <form @submit.prevent="onSubmit">
                    <!-- @csrf -->
                    <!-- {{ url('checklogin') }}<img class="user" src="{{asset('images/user.png')}}" alt="" srcset=""> -->
                    <img class="user" :src="'images/user.png'" alt="" srcset="">
                    <h3>Sign in here</h3>
                    <div class="diverror">
                        <span v-if="error_username" class="error">{{error_username}}</span>
                        <span v-if="error_password" class="error">{{error_password}}</span>
                        <span v-if="msg" class="error">{{msg}}</span>
                    </div>
                    <div class="form-group inputBox">
                        <input type="text" class="form-control" id="username" name="username" v-model="username" placeholder="Username">
                        <span><i class="fas fa-user"></i></span>
                    </div>

                    <div class="form-group inputBox">
                        <input type="password" class="form-control" id="password" name="password" v-model="password" placeholder="Password">
                        <span><i class="fas fa-lock"></i></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login ">Login</button>
                </form>
            </div>
        </div>
    </div>

</template>
<style scoped>
    .error{
        color: #ed292a;

    }
    .diverror{
         text-align: center;
    }

</style>

<script>
    import Vue from 'vue'
    import VueRouter from 'vue-router'
    Vue.use(VueRouter)
    export default{

        data(){
            return{
                username:'',
                password:'',
                error_username : '',
                error_password : '',
                msg :''
            }
        },
        methods:{
            onSubmit: function(e){
                e.preventDefault();
                let currentObj = this;
                // console.log(this.username);
                // console.log(this.password);
                if(this.username==""){
                    this.error_username =  'Input username please.'
                }else{
                    this.error_username =  ''
                }
                if(this.password==""){
                    this.error_password =  'Input password please.'
                }else{
                    this.error_password =  ''
                }

                if(this.username !='' && this.password){
                    axios.post('./checklogin',{
                        username: this.username,
                        password: this.password
                    }).then(function (response){
                        // console.log(response.data);
                        if(response.data.status===true){
                            // console.log('Dashboard');
                            window.location ='dashboard'
                        }else if(response.data.status == 500){
                            // console.log(response.data.msg);
                            currentObj.msg = response.data.msg
                        }
                    })
                }
            }
        }
    }
</script>
