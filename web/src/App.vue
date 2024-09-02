<template>
    <div class="container">
      <memberList></memberList>
    </div>
    
    
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";

export default {
  name: "App",
  components: {
    memberList,
  },
};
</script>
