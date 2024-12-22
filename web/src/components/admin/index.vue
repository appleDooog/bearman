<template>
  <div class="d-flex h-100">
    <!-- 側邊欄 -->
    <adminMenu :isMenuOpen="isMenuOpen" @toggleMenu="toggleMenu" />

    <!-- 主內容區域 -->
    <div class="content-area flex-grow-1">
      <RouterView />
    </div>
  </div>
</template>

<script>
import adminMenu from "./menu.vue";

export default {
  name: "index",
  components: {
    adminMenu,
  },
  data() {
    return {
      isMenuOpen: true, // 控制側邊欄的展開/收合狀態
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen; // 切換選單狀態
    },
  },
};
</script>

<style scoped>
/* 主內容區域樣式 */
.content-area {
  overflow-y: auto;
  padding: 20px;
}
</style>
