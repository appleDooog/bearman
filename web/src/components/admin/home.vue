<style>
</style>
<template>
  <div class="row justify-content-center">
aaa

  </div>
</template>
<script>
import adminLogo from "./Home/adminLogo.vue";
import adminTypes from "./Home/adminTypes.vue";
import adminItems from "./Home/adminItems.vue";
export default {
  name: "home",
  data() {
    return {
      datalist: [],
      count01: 0,
      count02: 2,
      job: this.$store.state.auth.job,
    };
  },
  components: {
    adminLogo,
    adminTypes,
    adminItems,
  },
  methods: {

  },
  mounted() {

  },
};
</script>
