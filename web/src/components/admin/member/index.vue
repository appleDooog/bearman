<template>
  <div class="row">
    <div class="col-md-2"><Menu></Menu></div>
    <div class="col-md-10 mt-3 text-center"><MemberList></MemberList></div>
  </div>
</template>

<script>
import Menu from '../menu.vue';
import MemberList from './memberList.vue';

export default {
  name: "mamberPanel",
  components: {
    MemberList,
    Menu
  }
};
</script>
