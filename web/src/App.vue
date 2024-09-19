<template>
  <div class="home">
    <router-view name="mainLogo"></router-view>
    <div class="">
      <Slick></Slick>
    </div>
    <div class="mt-5">
      <HomeSection01></HomeSection01>
    </div>
    <div class="mt-5">
      <HomeSection02></HomeSection02>
    </div>
    <div class="mt-5">
      <HomeSection04></HomeSection04>
    </div>
    <div class="mt-5">
      <HomeSection05></HomeSection05>
    </div>
    <div class="mt-5">
    <router-view name="Footer"></router-view>
  </div>
  </div>

</template>

<script>
import HomeSection01 from "./components/front/home/homeSection01.vue";
import HomeSection02 from "./components/front/home/homeSection02.vue";
import HomeSection04 from "./components/front/home/homeSection04.vue";
import HomeSection05 from "./components/front/home/homeSection05.vue";
import Slick from "./components/front/home/slick.vue";

export default {
  name: "App",
  components: {
    Slick,
    HomeSection01,
    HomeSection02,
    HomeSection04,
    HomeSection05
  },
};
</script>
