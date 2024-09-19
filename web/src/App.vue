<template>
  <router-view name="mainLogo"></router-view>
  <div class="text-center">
    <RouterView></RouterView>
  </div>
  <div>
    <router-view name="Footer"></router-view>
  </div>
</template>

<script>
import { RouterLink } from "vue-router";

export default {
  name: "App",
  components: {},
};
</script>
