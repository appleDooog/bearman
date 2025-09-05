<template>
  <div class="container">
    <div class="row row-cols-5 g-4 justify-content-around my-3">
      <!-- 使用 v-for 渲染 FlipCard 元件 -->
      <flipCard
        v-for="brand in brands"
        :backImage="brand.logo"
        :altText="brand.name"
      >
        <template #front> {{ brand.name }} </template>
      </flipCard>
    </div>
  </div>
</template>

<script>
import flipCard from "@/components/front/home/features/frontTypeL.vue";

export default {
  components: {
    flipCard,
  },
  data() {
    return {
      // 預設資料
      brands: [
        { name: "品牌 A", logo: require("@/assets/LOGO/Logo-black-md.png") },
        { name: "品牌 B", logo: require("@/assets/LOGO/Logo-black-md.png") },
        { name: "品牌 C", logo: require("@/assets/LOGO/Logo-black-md.png") },
        { name: "品牌 D", logo: require("@/assets/LOGO/Logo-black-md.png") },
        { name: "品牌 E", logo: require("@/assets/LOGO/Logo-black-md.png") },
      ],
    };
  },
  // created() {
  //   // 模擬從資料庫獲取資料
  //   this.fetchBrands();
  // },
  // methods: {
  //   async fetchBrands() {
  //     try {
  //       // 模擬等待資料庫資料，這裡用 setTimeout 模擬異步請求
  //       setTimeout(() => {
  //         this.brands = [
  //           { name: "真實品牌 A", logo: "/path/to/real-logo-a.png" },
  //           { name: "真實品牌 B", logo: "/path/to/real-logo-b.png" },
  //           { name: "真實品牌 C", logo: "/path/to/real-logo-c.png" },
  //           { name: "真實品牌 D", logo: "/path/to/real-logo-d.png" },
  //           { name: "真實品牌 E", logo: "/path/to/real-logo-e.png" },
  //         ];
  //       }, 2000); // 模擬 2 秒後獲取資料
  //     } catch (error) {
  //       console.error("無法抓取品牌資料", error);
  //     }
  //   },
  // },
};
</script>
