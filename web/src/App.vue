<!-- <template>
  <memberList></memberList>
</template>


<script>
// @ is an alias to /src
import memberList from '@/components/admin/member/memberList.vue';

export default {
  name: 'memberList',
  components: {
    memberList
  }
}
</script> -->

<template>
    <memberList></memberList>
    <MemberAdd></MemberAdd>
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
