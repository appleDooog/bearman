<template>
  <h1 class="text-center mt-3">網站首頁</h1>
    <div class="row text-center">
      <div class="col-md-3 h2">
        測試元件
        <Menu></Menu>
      </div>
      <div class="col-md-8 h2">
        測試元件2
        <RouterView></RouterView>
      </div>
    </div>
    
    
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";
import { RouterLink } from "vue-router";
import Menu from "./components/admin/menu.vue";

export default {
  name: "App",
  components: {
    memberList,
    Menu
  },
};
</script>
