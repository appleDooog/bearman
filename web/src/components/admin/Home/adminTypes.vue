<style>
.adminTypes {
  width: 300px;
}
</style>

<template>
  <div
    class="adminTypes position-relative border border-1 border-dark m-1 shadow mt-5"
  >
    <div class="d-block w-100 mt-4" :class="line" style="height: 7px"></div>
    <div
      class="border border-1 border-dark bg-white rounded-5 position-absolute top-0 start-50 text-center align-content-center shadow w-75 h-auto py-3"
      style="transform: translate(-50%, -30%)"
    >
      <div
        class="h2 d-inline ps-1"
        style="font-weight: 900; letter-spacing: 8px"
      >
      <slot name="title">這裡是title</slot>
      </div>
    </div>
    <slot></slot>
  </div>
</template>

<script>
import adminItems from './adminItems.vue';

export default {
  name: "adminTypes",
  components: {
    adminItems
  },
  props: {
    line: String,
  },
};
</script>
