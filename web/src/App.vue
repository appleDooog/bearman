<template>
    <div class="container">
      <memberList></memberList>
      <menu></menu>
    </div>
    
    
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";
import { RouterLink } from "vue-router";
import menu from "./components/admin/menu.vue";

export default {
  name: "App",
  components: {
    memberList,
    menu
  },
};
</script>
