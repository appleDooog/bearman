<template>
  <router-view name="mainLogo"></router-view>

  <div class="text-center">
    <div class="col-md-2 h2"></div>
    <div class="col-md-9">
      <div class="align-content-center"></div>
      <RouterView></RouterView>
    </div>
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
