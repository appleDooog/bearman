<style></style>
<template>
  <div class="row justify-content-center" style="margin-right: 0 !important">
    <div
      class="col-md-8 d-flex justify-content-around"
      style="padding-top: 70px"
    >
      <div v-for="data in datalist" :key="data.title">
        <adminTypes line="bg-pink">
          <template #title>{{ data.title }}</template>
          <ul v-for="item in data.items">
            <li class="list-unstyled">
              <a href="#" class=" text-decoration-none link-dark">
                <adminItems>
                  {{ item.title }}
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>
      </div>

      <!-- <adminTypes title="商品管理" line="bg-yellow">BB</adminTypes>
      <adminTypes title="訂單管理" line="bg-b2">VV</adminTypes>
      <adminTypes title="會員管理" line="bg-g2"></adminTypes> -->
    </div>
    <div class="col-md-3 text-center">
      <countNote>{{ count01 }}</countNote>
      <countNote
        title="待處理訂單"
        bg_color="bg-b1"
        color="color-b1"
        icon="fa-file-lines"
        >{{ count02 }}</countNote
      >
    </div>
  </div>
</template>
<script>
import adminLogo from "./Home/adminLogo.vue";
import adminTypes from "./Home/adminTypes.vue";
import countNote from "./Home/countNote.vue";
import adminItems from "./Home/adminItems.vue";
export default {
  name: "home",
  data() {
    return {
      datalist: [
        {
          id: "1",
          title: "網站管理",
          items: [
            {
              id: "1",
              title: "首頁管理",
              color: "#000000",
            },
            {
              id: "2",
              title: "文章管理",
              color: "#cccccc",
            },
          ],
        },
        {
          id: "2",
          title: "商店管理",
          items: [
            {
              items: "1",
              title: "商品管理",
              color: "#f1f1f1",
            },
          ],
        },
      ],
      count01: 1,
      count02: 2,
    };
  },
  components: {
    adminLogo,
    adminTypes,
    countNote,
    adminItems,
  },
  methods: {
    getMemberCount() {},
    getOrderCount() {},
  },
};
</script>
