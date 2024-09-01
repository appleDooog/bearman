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
  <router-view></router-view>
  <router-view name="home"></router-view>
  
  
</template>

<script>

export default {
  name: "App",
};
</script>
