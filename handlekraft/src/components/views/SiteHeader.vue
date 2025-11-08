<template>
    <div class="site-title">
        <h1>Handlekraft</h1>
    </div>
    <div class="profile-section">
        <p @click="logout">Se déconnecter</p>
    </div>
</template>

<script>
export default{
    name:"SiteHeader",
    methods: {
        logout(){
            fetch(`http://127.0.0.1:8000/logout`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            });
            this.$router.push('/login');
        }
    }
}
</script>