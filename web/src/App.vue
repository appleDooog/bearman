<template>
  <h1 class="text-center mt-3">網站首頁</h1>
    <div class="row text-center vw-100">
      <div class="col-md-2 h2">
        測試元件
        <Menu></Menu>
      </div>
      <div class="col-md-9">
        測試元件2
        <div class=" vh-100 align-content-center">
        </div>
        
        <RouterView></RouterView>
      </div>
    </div>
    
    
</template>

<script>
import { RouterLink } from "vue-router";
import Menu from "./components/admin/menu.vue";

export default {
  name: "App",
  components: {
    Menu
  },
};
</script>
