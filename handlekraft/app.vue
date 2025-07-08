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
<!-- 
<script setup>
import Editor from '@tinymce/tinymce-vue';
</script> -->

<!-- <script src="\node_modules\tinymce\tinymce.min.js" referrerpolicy="origin"></script> -->