<template>
    <div class="container">
      <memberList></memberList>
    </div>
    
    
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";
import MemberAdd from "./components/admin/member/memberAdd.vue";

export default {
  name: "App",
  components: {
    memberList,
    MemberAdd
  },
};
</script>
