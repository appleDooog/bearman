<style></style>
<template>
  <div class="row justify-content-center" style="margin-right: 0">
    <div
      class="col-md-8 d-flex justify-content-around"
      style="padding-top: 70px"
    >
      <div class="row justify-content-around">
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
            <a href="#" class="text-decoration-none link-dark">
              <adminItems style="background-color: #d03f3f">
                文章管理
              </adminItems>
            </a>
          </ul>
        </adminTypes>

        <adminTypes line="bg-yellow" style="z-index: 3">
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

        <adminTypes line="bg-b1" style="z-index: 2">
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
  <div class="container">
    <div class="row mt-3">
    <div>
      <canvas id="myChart"></canvas>
    </div>
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
    chart() {
      const ctx = document.getElementById("myChart");
      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["金牌會員", "銀牌會員", "銅牌會員", "青銅會員", "一般會員"],
          datasets: [
            {
              label: "會員等級統計",
              data: [1, 2, 3, 1, 4],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
          plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 25
                    }
                }
            }
        }
          
        },
      });
    },
  },
  mounted() {
    this.getMemberCount();
    // this.chart();
  },
};
</script>
