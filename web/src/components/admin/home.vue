<style></style>
<template>
  <div class="row justify-content-center" style="margin-right: 0">
    <div
      class="col-md-8 d-flex justify-content-around"
      style="padding-top: 70px"
    >
      <div class="row justify-content-around">
        <adminTypes line="bg-pink" style="z-index: 4;">
          <template #title>網站管理 </template>
          <ul>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #a31f1f">
                  首頁管理
                </adminItems>
              </a>
            </li>
            <a href="#" class="text-decoration-none link-dark">
              <adminItems style="background-color: #d03f3f">
                文章管理
              </adminItems>
            </a>
          </ul>
        </adminTypes>

        <adminTypes line="bg-yellow" style="z-index: 3;">
          <template #title> 商店管理 </template>
          <ul>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #e4b40e">
                  商品管理
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>

        <adminTypes line="bg-b1" style="z-index: 2;">
          <template #title> 訂單管理 </template>
          <ul>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #0d51a1">
                  訂單列表
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>

        <adminTypes line="bg-g2" style="z-index: 1;">
          <template #title> 會員管理 </template>
          <ul>
            <li class="list-unstyled">
              <router-link 
                to="/admin/member"
                class="text-decoration-none link-dark"
              >
                <adminItems style="background-color: #128d25">
                  會員列表
                </adminItems>
              </router-link>
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
import router from "@/router";
export default {
  name: "home",
  data() {
    return {
      datalist: [],
      count01: 0,
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
    getMemberCount() {
    },
    getOrderCount() {},
  },
};
</script>
