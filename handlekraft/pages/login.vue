<template>
    <div class="login-form-container">
        <form method="POST">
            <div class="email-input">
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" class="form-control" name="email" placeholder="example@mail.com">
                <!-- <span class="error-msg" v-if="errors.email">{{ errors.email }}</span><br /><br /> -->
            </div>
            <div class="password-input">
                <label for="password">Mot de passe</label>
                <input v-model="password" type="password" id="password" class="form-control" name="password"><br />
                <!-- <div class="error-msg" v-if="loginStatus">{{ wrongCredentials }}</div><br /> -->
            </div>
            <div class="action-buttons">
                <button type="button" @click="userSignUp">Sign up</button>
                <button type="button" @click="userSignIn">Sign in</button>
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
                method: 'POST'
            })
        }
    }
}
</script>