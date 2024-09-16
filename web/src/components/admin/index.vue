<template>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2 d-none d-md-block"><Menu></Menu></div>
        <div class="col-md mt-3">
          <RouterView></RouterView>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Menu from "./menu.vue";
export default {
  name: "memberPanel",
  components: {
    Menu,
  },
};
</script>
