<template>
    <div class="container">
      <memberList></memberList>
    </div>
    
    
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";
import { RouterLink } from "vue-router";

export default {
  name: "App",
  components: {
    memberList,
  },
};
</script>
