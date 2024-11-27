<style>
.adminItems {
  max-width: 220px;
  height: 60px;
  border-top-right-radius: 40px;
  border-bottom-right-radius: 40px;
  transition: 300ms;
  .rounded-circle {
    width: 17%;
    aspect-ratio: 1/1;
  }

  .h4 {
    transform: translateY(10%);
  }
}

.adminItems:hover {
  width:103%;
  z-index: 9999;
}
</style>
<template>
  <div
    class="adminItems d-block border border-1 border-dark mt-5 ms-4 shadow-sm bg-white"
  >
    <div class="d-flex h-100 justify-content-center align-items-center flex-nowrap">
      <div class="col col-md-9 text-center h4"><slot></slot></div>
      <div class="col-md-2 rounded-circle me-md-3 px-3" :style="style"></div>
    </div>
  </div>
</template>
<script>
export default {
  name: "adminItems",
  props: {
    style: String,
  },
};
</script>
