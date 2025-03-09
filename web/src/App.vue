<template>
  <!-- <working></working> -->
  <div>
    <mainLogo></mainLogo>
  </div>
  <div>
    <div class="container">
      <div class="row">
        <slick></slick>
      </div>
    </div>
  </div>
  <div class="my-5">
    <template v-for="item in list" :key="item.id">
      <div class="vh-100 align-content-center">
        <template v-for="child in item.items" :key="child.home_seq">
          <frontTypeT v-if="item.type === 'T'">
            <!-- 傳入自訂的標題到具名插槽 (slot) -->
            <template v-slot:title>
              {{ child.title }}
            </template>
            <!-- 傳入自訂的內容到具名插槽 (slot) -->
            <template v-slot:subtitle>
              <div v-html="child.subtitle"></div>
            </template>

            <template v-if="child.content != 'null'" v-slot:content>
              <div v-html="child.content"></div>
            </template>
          </frontTypeT>

          <!--
          上面是frontTypeT的模板
          以下開始要把其他組件插件化
          動態渲染資料庫內容
          -->

        </template>
      </div>
    </template>

    <!-- <div class="vh-100 align-content-center">
      <homeSection02></homeSection02>
    </div>
    <div class="vh-100 align-content-center">
      <homeSection04></homeSection04>
    </div>
    <div class="vh-100 align-content-center">
      <homeSection05></homeSection05>
    </div> -->
  </div>
  <div>
    <AppFooter></AppFooter>
  </div>
</template>

<style></style>

<script>
import working from "@/components/front/working.vue";
import mainLogo from "@/components/front/mainLogo.vue";
import slick from "@/components/front/home/features/slick.vue";
import frontTypeT from "@/components/front/home/frontTypeT.vue";
import homeSection02 from "@/components/front/home/homeSection02.vue";
import homeSection04 from "@/components/front/home/homeSection04.vue";
import homeSection05 from "@/components/front/home/homeSection05.vue";
import AppFooter from "@/components/front/footer.vue";
import { frontHome } from "@/api/frontApi";
import FrontTypeT from "@/components/front/home/frontTypeT.vue";

export default {
  name: "App",
  components: {
    working,
    mainLogo,
    slick,
    frontTypeT,
    homeSection02,
    homeSection04,
    homeSection05,
    AppFooter,
  },
  data() {
    return {
      list: [],
    };
  },
  methods: {
    async getlist() {
      try {
        const res = await frontHome();
        this.list = res.data.list;
        console.log(this.list);
      } catch (err) {
        console.log(err);
      }
    },
  },
  created() {
    this.getlist();
  },
};
</script>
