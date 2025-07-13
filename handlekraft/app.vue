<template>
  <div>
    <NuxtRouteAnnouncer />
    <NuxtPage />
  </div>
</template>

<script>
import Index from './pages/index.vue';

export default{
  name: "app",
  components: {
   Index
  }
}
</script>
