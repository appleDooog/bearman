<style>
.mainlogo img {
  max-width: 100%;
}

</style>

<template>
  <div class="mainlogo">
    <div class="d-flex justify-content-center">
      <div class="col-3 d-flex justify-content-center">
        <img src="@/assets/LOGO/faybear.png" alt="" class="bg-cover justify-content-center" height="300px" />
      </div>
      <div class="col-9 text-white align-content-center d-flex row row-cols-1">
        <div class=" display-1 ps-3 col" style="letter-spacing: 0.3em">
          遠熊音樂
        </div>
        <div class="bg-g1 col mt-3">
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
