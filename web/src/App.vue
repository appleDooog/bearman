<template>
  <!-- <working></working> -->
  <div>
    <mainLogo></mainLogo>
  </div>
  <div>
    <div class="container">
      <div class="row"></div>
    </div>
  </div>
  <div class="my-5">
    <template v-for="item in list" :key="item.id">
      <div class="vh-100 align-content-center">
        <frontTypeT v-if="item.type === 'T'">
          <template v-slot:title>
            {{ item.items.title }}
          </template>
          <template v-slot:subtitle>
            <div v-html="item.items.subtitle"></div>
          </template>
          <template v-if="item.items.content !== 'null'" v-slot:content>
            <div v-html="item.items.content"></div>
          </template>
        </frontTypeT>

        <!--
          上面是frontTypeT的模板
          以下開始要把其他組件插件化
          動態渲染資料庫內容
          -->
        <!-- 就是Slick跑馬燈 -->
        <frontTypeS v-if="item.type === 'S'" :images="item.items.image_data" />

        <!-- 圖塊P -->
      </div>
    </template>
    <div class="vh-100 align-content-center">
      <homeSection02></homeSection02>
    </div>
    <!--  <div class="vh-100 align-content-center">
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
import frontTypeS from "@/components/front/home/features/slick.vue";
import frontTypeT from "@/components/front/home/frontTypeT.vue";
import frontTypeP from "@/components/front/home/frontTypeP.vue";
import homeSection02 from "@/components/front/home/homeSection02.vue";
import homeSection04 from "@/components/front/home/homeSection04.vue";
import homeSection05 from "@/components/front/home/homeSection05.vue";
import AppFooter from "@/components/front/footer.vue";
import { frontHome } from "@/api/frontApi";

export default {
  name: "App",
  components: {
    working,
    mainLogo,
    frontTypeS,
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

        res.data.list.forEach((item) => {
          if (item.type === "S") {
            try {
              item.items.image_data = JSON.parse(item.items.image_data).map(
                (img) => {
                  return {
                    ...img,
                    src: img.src.startsWith("http")
                      ? img.src
                      : `${process.env.VUE_APP_API_BASE.replace("/api/admin", "")}/${img.src}`,
                  };
                }
              );
            } catch (err) {
              console.error("圖片資料解析失敗：", err);
            }
          }
        });
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
