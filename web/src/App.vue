<template>
  <working></working>
  <!-- <div>
    <mainLogo></mainLogo>
  </div>
  <div>
    <div class="container">
      <div class="row">
        <slick></slick>
      </div>
    </div>
  </div>
  <div class="my-5">
    <div class="vh-100 align-content-center">
      <homeSection01></homeSection01>
    </div>
    <div class="vh-100 align-content-center">
      <homeSection02></homeSection02>
    </div>
    <div class="vh-100 align-content-center">
      <homeSection04></homeSection04>
    </div>
    <div class="vh-100 align-content-center">
      <homeSection05></homeSection05>
    </div>
  </div>
  <div>
    <AppFooter></AppFooter>
  </div> -->
</template>

<style></style>

<script>
import working from "@/components/front/working.vue";
import mainLogo from "@/components/front/mainLogo.vue";
import slick from "@/components/front/home/features/slick.vue";
import homeSection01 from "@/components/front/home/homeSection01.vue";
import homeSection02 from "@/components/front/home/homeSection02.vue";
import homeSection04 from "@/components/front/home/homeSection04.vue";
import homeSection05 from "@/components/front/home/homeSection05.vue";
import AppFooter from "@/components/front/footer.vue";

export default {
  name: "App",
  components: {
    working,
    mainLogo,
    slick,
    homeSection01,
    homeSection02,
    homeSection04,
    homeSection05,
    AppFooter,
  },
};
</script>
