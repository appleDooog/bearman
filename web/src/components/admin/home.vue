<style>
</style>
<template>
  <div class="row justify-content-center">
    <div
      class="col-lg-10"
      style="padding-top: 70px"
    >
      <div class="d-flex justify-content-center flex-wrap">
        <adminTypes line="bg-pink" style="z-index: 4">
          <template #title>網站管理 </template>
          <ul>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #a31f1f">
                  首頁管理
                </adminItems>
              </a>
            </li>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #d03f3f">
                  文章管理
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>

        <adminTypes line="bg-yellow" style="z-index: 3">
          <template #title> 商城管理 </template>
          <ul>
            <li class="list-unstyled">
              <RouterLink
              to="/admin/product"
                class="text-decoration-none link-dark"
              >
                <adminItems style="background-color: #e4b40e">
                  商品管理
                </adminItems>
              </RouterLink>
            </li>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #f5c549">
                  版面管理
                </adminItems>
              </a>
            </li>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #f9e475">
                  輪播圖管理
                </adminItems>
              </a>
            </li>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems style="background-color: #fff1a8">
                  側欄管理
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>

        <adminTypes line="bg-b1" style="z-index: 2">
          <template #title> 訂單管理 </template>
          <ul>
            <li class="list-unstyled">
              <a href="#" class="text-decoration-none link-dark">
                <adminItems :hover style="background-color: #0d51a1">
                  訂單列表
                </adminItems>
              </a>
            </li>
          </ul>
        </adminTypes>

        <adminTypes line="bg-g2" style="z-index: 1">
          <template #title> 會員管理 </template>
          <ul>
            <li class="list-unstyled">
              <router-link
                to="/admin/member/"
                class="text-decoration-none link-dark"
              >
                <adminItems style="background-color: #128d25">
                  會員列表
                </adminItems>
              </router-link>
            </li>
            <li class="list-unstyled">
              <router-link
                to="/admin/manager/"
                class="text-decoration-none link-dark"
              >
                <adminItems style="background-color: #4bb539" v-if="job == 0">
                  管理員列表
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
    <div class="col-lg-2 text-center">
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
import { apiMemberList } from "@/api";
export default {
  name: "home",
  data() {
    return {
      datalist: [],
      count01: 0,
      count02: 2,
      job: this.$store.state.auth.job,
    };
  },
  components: {
    adminLogo,
    adminTypes,
    countNote,
    adminItems,
  },
  methods: {
    async getMemberCount() {
      try {
        const res = await apiMemberList({ type: "count" });
        this.count01 = res.data.count;
      } catch (error) {
        console.log(error);
      }
    },
    getOrderCount() {},
  },
  mounted() {
    this.getMemberCount();
  },
};
</script>
