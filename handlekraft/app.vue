<template>
  <div>
    <NuxtRouteAnnouncer />
    <div class="header-container">
      <SiteHeader />
    </div>
    <div class="main-content-container">
      <MainContent />
    </div>
  </div>
</template>


<script>
import SiteHeader from './components/views/SiteHeader.vue';
import MainContent from './components/views/MainContent.vue';

export default{
  name: "app",
  components: {
    SiteHeader, MainContent
  }
}
</script>