<template>
  <div class="d-flex h-100 border-end">
    <!-- 側邊欄 -->
    <div
      class="menu d-flex flex-column align-items-start"
    >
      <!-- 側邊欄選單 -->
      <transition name="menu">
        <ul v-if="isMenuOpen" class="menu-items list-unstyled w-100 px-3">
          <li class="my-2">
            <RouterLink to="/admin/member" class="text-decoration-none">會員管理</RouterLink>
          </li>
          <li class="my-2">
            <RouterLink to="/admin/member/add" class="text-decoration-none">新增會員</RouterLink>
          </li>
        </ul>
      </transition>
    </div>

    <!-- 標籤按鈕 -->
    <button
      class="toggle-button btn d-flex align-items-center justify-content-center"
      @click="toggleMenu"
      :aria-expanded="isMenuOpen"
    >
      <span v-if="isMenuOpen">&lt;</span>
      <span v-else>&gt;</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "adminMenu",
  data() {
    return {
      isMenuOpen: true, // 預設選單為展開
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen; // 切換展開/收合狀態
    },
  },
};
</script>

<style scoped>
/* 側邊欄樣式 */
.menu {
  transition: width 0.5s ease;
  overflow: hidden;
  background-color: #f8f9fa;
}



/* 標籤按鈕樣式 */
.toggle-button {
  width: 30px;
  height: 80px;
  cursor: pointer;
  background-color: #444;
  color: #fff;
  border: none;
  border-radius: 0 5px 5px 0;
  transition: background-color 0.3s ease;
}

.toggle-button:hover {
  background-color: #333;
}

/* 選單項目過渡 */
.menu-items {
  opacity: 1;
  transition: opacity 0.5s ease;
}

.menu-collapsed .menu-items {
  opacity: 0; /* 收合狀態下隱藏選單文字 */
  pointer-events: none;
}
</style>
