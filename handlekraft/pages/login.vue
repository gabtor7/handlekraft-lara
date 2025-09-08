<template>
    <div class="login-form-container">
        <form method="POST">
            <div class="input-field email-input">
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" class="form-control" name="email" placeholder="example@mail.com">
                <!-- <span class="error-msg" v-if="errors.email">{{ errors.email }}</span><br /><br /> -->
            </div>
            <div v-show="signingUp" class="input-field name-input">
                <label for="name">Username</label>
                <input v-model="username" type="name" id="name" class="form-control" name="name"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <div class="input-field password-input">
                <label for="password">Mot de passe</label>
                <input v-model="password" type="password" id="password" class="form-control" name="password"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <!-- Donc là le but, c'est de ne faire apparaître ce champ que si le user a cliqué sur "Sign up"
                Il faut aussi la possibilité de faire l'inverse, donc log in, qui cacherait les champs qu'on a montré autrement
            -- TODO -->
            <div class="action-buttons">
                <button v-show="!signingUp" type="button" @click="userSignIn">Sign in</button>
                <button v-show="signingUp" type="button" @click="userSignUp">Sign up</button>
                <br /><br />
                <div class="sign-up" v-show="!signingUp">
                    <label for="signingUp">No account? <a href="#" @click="signingUp=true">Sign up now!</a></label>
                </div>
                <div class="sign-up" v-show="signingUp">
                    <label for="signingUp">Already have an account? <a href="#" @click="signingUp=false">Sign in!</a></label>
                </div>
                
                <!-- <label for="rememberStatus">Remember me</label>
                <input v-model="rememberStatus" type="checkbox" id="signingUp" class="form-control" value="Sign up!"> -->
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
            signingUp: ""
        }
    },

    methods: {
        userSignUp(){
            fetch(`http://127.0.0.1:8000/register`, {
                method: 'POST',
                body: JSON.stringify({
                    email: this.email,
                    username: this.username,
                    password: this.password
                    // rememberStatus: this.rememberStatus
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                response.json().then(res => console.log(res));
                // this.$router.push('/'); // dirigé vers la page principale
                console.log('would have pushed to /')
            }).catch(err => {
                console.log(err);
            });
        },
        userSignIn(){
            fetch(`http://127.0.0.1:8000/web/login`, {
                method: GET,
                body: JSON.stringify({
                    email: this.email,
                    password: this.password
                    // rememberStatus: this.rememberStatus
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                response.json().then(
                    // le user est vérifié, check si demandé de se souvenir de lui
                    // dans ce cas gérer son token
                    // TODO TODO TODO TODO TODO AOI
                )
            })
        }
    }
}
</script>