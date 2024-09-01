<style>

#countNote .rounded-circle {
  width: 100px;
  height: 100px;
}
</style>

<template>
  <div
    class="border border-1 border-dark m-3 rounded-5 mt-3"
    id="countNote"
    name="countNote"
  >
    <div class="row py-3  justify-content-center align-items-center">
      <div
        class="col-md-2 rounded-circle align-content-center"
        :class="bg_color"
      >
        <i class="fa-4x fa-solid text-white" :class="icon"></i>
      </div>
      <div class="col-md-6 d-block">
        <div class="h2">{{ title }}</div>
        <div class="display-5 col-md-12" :class="color"><slot></slot></div>
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
