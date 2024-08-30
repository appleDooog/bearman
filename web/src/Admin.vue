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
  <home></home>
    <!-- <div class="row vw-100">
    <div class="col-md-2"></div>
    <div class="col-md-10 "></div>
  </div> -->
  
  
</template>

<script>
import memberList from "@/components/admin/member/memberList.vue";
import home from "./components/admin/home.vue";

export default {
  name: "App",
  components: {
    home,
    memberList
  },
};
</script>
