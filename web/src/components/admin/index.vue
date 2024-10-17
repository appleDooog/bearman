<template>
  <div class="row row-cols-2">

        <div class="col-md-2 d-none d-md-block"><Menu></Menu></div>
        <div class="col-md-10 mt-3">
          <RouterView></RouterView>
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
