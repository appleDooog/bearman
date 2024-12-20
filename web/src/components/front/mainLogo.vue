<style>
.mainlogo img {
  max-width: 100%;
}

:root {
  --triangle-size: 38px;
  --triangle-color: white;
}

.nav-bg {
  background-color: #F9E475;
  position: relative;
}

.nav-bg::before {
  content: '';
  position: absolute;
  top: 8px;
  left: calc(-1 * var(--triangle-size) / 2);
  width: 0;
  height: 0;
  border-style: solid;
  border-width: var(--triangle-size) var(--triangle-size) 0 0;
  border-color: rgba(255, 255, 255, 0) var(--triangle-color);
  transform: rotate(-45deg);
}


</style>

<template>
  <div class="mainlogo py-5">
    <div class="d-flex justify-content-center">
      <div class="col-3 d-flex justify-content-center">
        <img src="@/assets/LOGO/Logo-green-md.png" alt="" class="bg-cover justify-content-center" height="250px" />
      </div>
      <div class="col-9 color-g1 align-content-center d-flex row row-cols-1">
        <div class=" display-1 ps-3 col" style="letter-spacing: 0.3em; color: #8ACFED;">
          遠熊音樂
        </div>
        <div class="nav-bg col mt-3">
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
