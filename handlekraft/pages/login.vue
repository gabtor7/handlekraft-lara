<template>
    <div class="login-form-container">
        <form method="POST">
            <div class="input-field email-input">
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" class="form-control" name="email" placeholder="example@mail.com">
                <!-- <span class="error-msg" v-if="errors.email">{{ errors.email }}</span><br /><br /> -->
            </div>
            <div v-show="signingUp" class="input-field name-input border-3 border-solid border-white">
                <label for="name">Username</label>
                <input v-model="username" type="name" id="name" class="form-control border-3 border-solid border-white" name="name"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <div class="input-field password-input">
                <label for="password">Mot de passe</label>
                <input v-model="password" type="password" id="password" class="form-control" name="password"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <div class="password-error" v-show="signingUp" v-if="errors.password">{{ errors.password }}</div>

            <div class="action-buttons">
                <button v-show="!signingUp" type="button" @click="userSignIn">Sign in</button>
                <button v-show="signingUp" type="button" @click="userSignUp">Sign up</button>
                <div class="remember-toggle">
                        <label for="rememberStatus">Remember me</label>
                        <input v-model="rememberStatus" type="checkbox" id="signingUp" class="form-control" value="Sign up!">
                    </div>
            </div>
            <br /><br />
            <div class="existing-account-check">
                <div class="sign-up" v-show="!signingUp">
                    <label for="signingUp">No account? <a href="#" @click="signingUp=true">Sign up now!</a></label>
                </div>
                <div class="sign-up" v-show="signingUp">
                    <span for="signingUp">Already have an account? <a href="#" @click="signingUp=false">Sign in!</a></span>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>
</template>

<script>
export default{
    name: "login",

    data() {
        return {
            email: "",
            password: "",
            username: "",
            loginStatus: "",
            signingUp: "",
            errors: {}
        }
    },

    methods: {
        userSignUp(){
            fetch(`http://127.0.0.1:8000/register`, {
                method: 'POST',
                body: JSON.stringify({
                    email: this.email,
                    username: this.username,
                    password: this.password,
                    rememberStatus: this.rememberStatus
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                response.json().then(res => console.log(res));
                this.$router.push('/'); // dirigé vers la page principale
                console.log('would have pushed to /')
            }).catch(err => {
                console.log(err);
            });
        },
        userSignIn(){
            fetch(`http://127.0.0.1:8000/authenticate`, {
                method: 'POST',
                body: JSON.stringify({
                    email: this.email,
                    password: this.password,
                    rememberStatus: this.rememberStatus
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                console.log("response: " + response.status)
                if(response.status==200){
                    response.json().then(
                        this.$router.push('/')
                    )
                }
            }).catch(err => { 
                console.log(err)
            });
        }
    },
    watch: {
        password(newval){
            if(this.signingUp){
                if((/^\w{8,32}$/).test(newval)){
                    this.errors['password'] = ''
                } else {
                    this.errors['password'] = 'The password must be between 8 to 32 characters in length'
                }
            }
        }
    }
}
</script>