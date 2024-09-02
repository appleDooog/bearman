<style>

#countNote .rounded-circle {
  width: 80px;
  height: 80px;
}
</style>

<template>
  <div
    class="d-block border border-1 border-dark m-5 rounded-5 mt-5"
    id="countNote"
    name="countNote"
  >
    <div class="row py-3 justify-content-center align-items-center">
      <div
        class="col-md-2 rounded-circle align-content-center"
        :class="bg_color"
      >
        <i class="fa-3x fa-solid text-white" :class="icon"></i>
      </div>
      <div class="col-lg-6 col-md-8 d-block">
        <div class="h2">{{ title }}</div>
        <div class="display-5" :class="color"><slot></slot></div>
      </div>
    </div>
  </div>
</template>

<script>
var count;
export default {
  name: "countNote",
  data: function () {
    return {
    };
  },
  props: {
    title: {
      type: String,
      default: "會員人數",
    },
    bg_color: {
      type: String,
      default: "bg-yellow",
    },
    color: {
      type: String,
      default: "color-yellow",
    },
    icon: {
      type: String,
      default: "fa-people-group",
    },
  },
};
</script>
