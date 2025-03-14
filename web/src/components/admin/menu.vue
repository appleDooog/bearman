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
            <i class="bi bi-people me-2"></i>
            <span :class="['menu-text', isMenuOpen ? 'd-inline' : 'd-none']">
              會員列表
            </span>
          </RouterLink>
        </li>

        <li class="my-2 d-flex align-items-center" v-if="job == 0">
          <RouterLink
            to="/admin/manager"
            class="text-decoration-none text-secondary d-flex align-items-center"
          >
            <i class="bi bi-people me-2"></i>
            <span :class="['menu-text', isMenuOpen ? 'd-inline' : 'd-none']">
              管理員列表
            </span>
          </RouterLink>
        </li>

        <!-- 🔽 可展開的「網站設定」選單 -->
        <li class="my-2 d-flex flex-column">
          <div
            class="text-decoration-none text-secondary d-flex align-items-center cursor-pointer"
            @click="toggleSubMenu"
          >
            <i class="bi bi-gear me-2"></i>
            <span :class="['menu-text', isMenuOpen ? 'd-inline' : 'd-none']">
              網站設定
            </span>
            <i class="bi ms-auto" :class="isSubMenuOpen ? 'bi-chevron-down' : 'bi-chevron-right'"></i>
          </div>

          <!-- 子選單 -->
          <ul v-show="isSubMenuOpen" class="submenu list-unstyled ps-4">
            <li>
              <RouterLink to="/admin/setting/home" class="text-decoration-none text-secondary">
                <i class="bi bi-house-door me-2"></i> 首頁設定
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/admin/setting/class" class="text-decoration-none text-secondary">
                <i class="bi bi-book me-2"></i> 課程頁面設定
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/admin/setting/contact" class="text-decoration-none text-secondary">
                <i class="bi bi-envelope me-2"></i> 聯絡頁面設定
              </RouterLink>
            </li>
          </ul>
        </li>
      </ul>

      <!-- 🏷️ 側邊欄展開/收合按鈕 -->
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
      isSubMenuOpen: false // 預設子選單為關閉
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
    toggleSubMenu() {
      this.isSubMenuOpen = !this.isSubMenuOpen; // 切換子選單項目展開/收合
    },
  },
};
</script>

<style scoped>
/* 側邊欄樣式 */
.menu {
  width: 180px; /* 展開時的寬度 */
  height: 100vh;
  transition: width 0.3s ease;
  overflow-y: auto;
  background-color: #f8f9fa;
}

.menu-collapsed {
  width: 50px; /* 收合時的寬度 */
}

/* 子選單樣式 */
.submenu {
}

/* 滑鼠懸停效果 */
.cursor-pointer {
  cursor: pointer;
}

</style>



