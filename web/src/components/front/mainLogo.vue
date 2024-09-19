<style>
.mainlogo img {
  max-width: 100%;
}

.mainlogo .navbar {
  /* height: px; */
}
</style>

<template>
  <div class="mainlogo">
    <div class="d-flex justify-content-between">
      <div class="col-3 me-auto">
        <img src="@/assets/LOGO/faybear.png" alt="" class="bg-cover" />
      </div>
      <div class="col-9 text-white align-content-center">
        <div class=" display-1 ps-3 col-12" style="letter-spacing: 0.3em">
          遠熊音樂
        </div>
        <div class="bg-g1">
            <Navbar></Navbar>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./navbar.vue";

export default {
  components: {
    Navbar,
  },
};
</script>
