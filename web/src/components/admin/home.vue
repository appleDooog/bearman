<style>
.d-flex {
  padding-top: 70px;
}
</style>
<template>
  <adminLogo></adminLogo>
  <div class="row mx-5 px-5 mt-3">
    <div class="col-md-9 d-flex justify-content-around">
      <adminItems title="網站管理" line="bg-pink"></adminItems>
      <adminItems title="商品管理" line="bg-yellow"></adminItems>
      <adminItems title="訂單管理" line="bg-b2"></adminItems>
      <adminItems title="會員管理" line="bg-g2"></adminItems>
    </div>
    <div class="col-md-3 text-center">
      <countNote></countNote>
      <countNote
        title="待處理訂單"
        bg_color="bg-b1"
        color="color-b1"
        icon="fa-file-lines"
      ></countNote>
    </div>
  </div>
</template>
<script>
import adminLogo from "./adminLogo.vue";
import adminItems from "./adminItems.vue";
import countNote from "./countNote.vue";
export default {
  name: "home",
  components: {
    adminLogo,
    adminItems,
    countNote,
  },
};
</script>
