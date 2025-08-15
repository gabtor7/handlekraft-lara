<template>
    <div class="login-form-container">
        <form method="POST">
            <div class="input-field email-input">
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" class="form-control" name="email" placeholder="example@mail.com">
                <!-- <span class="error-msg" v-if="errors.email">{{ errors.email }}</span><br /><br /> -->
            </div>
            <div class="input-field password-input">
                <label for="password">Mot de passe</label>
                <input v-model="password" type="password" id="password" class="form-control" name="password"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <div class="action-buttons">
                <button type="button" @click="userSignUp">Sign up</button>
                <button type="button" @click="userSignIn">Sign in</button><br /> <br />
                <label for="rememberStatus">Remember me</label>
                <input v-model="rememberStatus" type="checkbox" id="rememberStatus" class="form-control">
            </div>
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
            loginStatus: ""
        }
    },

    methods: {
        userSignUp(){
            fetch(`http://127.0.0.1:8000/api/user`, {
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
                response.json().then(res => console.log(res));
                this.$router.push('/'); // dirigé vers la page principale
            }).catch(err => {
                console.log(err);
            });
        },
        userSignIn(){
            fetch(`http://127.0.0.1:8000/api/login`, {
                method: POST,
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