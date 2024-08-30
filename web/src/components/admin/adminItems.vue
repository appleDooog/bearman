<style>
#adminItems {
  width: 300px;
  height: 650px;
}
</style>

<template>
  <div
    class="d-block position-relative border border-1 border-dark m-1 shadow"
    id="adminItems"
    name="adminItems"
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
        {{ title }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "adminItems",
  props: {
    title: String,
    line: String,
  },
};
</script>
