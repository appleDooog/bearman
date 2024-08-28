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

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
