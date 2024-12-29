<template>
  <div class="d-flex bg-b1 border-end">
    <!-- 側邊欄 -->
    <div
      :class="['menu', 'd-flex flex-column align-items-start position-relative', { 'menu-collapsed': !isMenuOpen }]"
    >
      <!-- 側邊欄選單 -->
      <ul class="menu-items list-unstyled w-100 px-3">
        <li class="my-2 d-flex align-items-center">
          <RouterLink
            to="/admin/member"
            class="text-decoration-none text-secondary d-flex align-items-center"
          >
            <i class="bi bi-people me-2"></i> <!-- 圖示 -->
            <!-- 使用 Bootstrap 顯示/隱藏類別 -->
            <span :class="['menu-text', isMenuOpen ? 'd-inline' : 'd-none']">
              會員列表
            </span>
          </RouterLink>
          
        </li>
        <li class="my-2 d-flex align-items-center"  v-if="job == 0">
          <RouterLink
            to="/admin/manager"
            class="text-decoration-none text-secondary d-flex align-items-center"
          >
            <i class="bi bi-people me-2"></i> <!-- 圖示 -->
            <!-- 使用 Bootstrap 顯示/隱藏類別 -->
            <span :class="['menu-text', isMenuOpen ? 'd-inline' : 'd-none']">
              管理員列表
            </span>
          </RouterLink>
          
        </li>
      </ul>

      <!-- 標籤按鈕 -->
      <button
        class="btn btn-outline-secondary position-absolute top-0 end-0 m-2"
        @click="toggleMenu"
      >
        <span v-if="isMenuOpen">&lt;</span>
        <span v-else>&gt;</span>
      </button>
    </div>
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
  computed: {
    // 從 Vuex 中動態獲取 job 值
    job() {
      return this.$store.state.auth.job;
    },
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
  width: 180px; /* 展開狀態的寬度 */
  transition: width 0.5s ease;
  overflow: hidden;
  background-color: #f8f9fa;
}

.menu-collapsed {
  width: 50px; /* 收合狀態的寬度 */
}
</style>


