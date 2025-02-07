<template>
  <div>
      <div class="header-container">
          <SiteHeader />
      </div>
      <div class="main-content-container">
          <MainContent />
      </div>
  </div>
</template>
  
  
  <script>
  import SiteHeader from '../src/components/views/SiteHeader.vue';
  import MainContent from '../src/components/views/MainContent.vue';
  
  export default{
    name: "app",
    components: {
      SiteHeader, MainContent
    }
  }
  </script>