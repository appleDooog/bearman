<template>
  <div class="d-flex bg-b1 border-end">
    <!-- 側邊欄 -->
    <div
      :class="[
        'menu',
        'd-flex flex-column position-relative',
        { 'menu-collapsed': !isMenuOpen },
      ]"
    >
      <!-- 頂部 LOGO + 使用者名稱 + 收合按鈕 -->
      <div class="d-flex align-items-center justify-content-between menu-header px-2">
        <div class="d-flex align-items-center flex-grow-1">
          <i class="fa-solid fa-circle-user logo-icon"></i>
          <span class="username-text menu-text ms-2">
           哈囉！{{ username }}
          </span>
        </div>
        <button
          class="btn btn-sm btn-light toggle-btn ms-2"
          @click="toggleMenu"
          :title="isMenuOpen ? '收合' : '展開'"
        >
          <i class="fa-solid" :class="isMenuOpen ? 'fa-chevron-left' : 'fa-chevron-right'"></i>
        </button>
      </div>

      <!-- 側邊欄選單 -->
      <ul class="menu-items list-unstyled flex-grow-1 px-2 mt-3">
        <!-- 會員列表 -->
        <li class="menu-item" :title="!isMenuOpen ? '會員列表' : ''">
          <RouterLink to="/admin/member" class="menu-link">
            <i class="fa-solid fa-users menu-icon"></i>
            <span class="menu-text">會員列表</span>
          </RouterLink>
        </li>

        <!-- 管理員列表 -->
        <li class="menu-item" v-if="job == 0" :title="!isMenuOpen ? '管理員列表' : ''">
          <RouterLink to="/admin/manager" class="menu-link">
            <i class="fa-solid fa-user-shield menu-icon"></i>
            <span class="menu-text">管理員列表</span>
          </RouterLink>
        </li>

        <!-- 網站設定 -->
        <li class="menu-item flex-column" :title="!isMenuOpen ? '網站設定' : ''">
          <div class="menu-link cursor-pointer" @click="toggleSubMenu">
            <i class="fa-solid fa-gear menu-icon"></i>
            <span class="menu-text flex-grow-1">網站設定</span>
            <i
              class="fa-solid arrow-icon"
              :class="isSubMenuOpen ? 'fa-chevron-down' : 'fa-chevron-right'"
            ></i>
          </div>

          <ul v-show="isSubMenuOpen" class="submenu list-unstyled ps-4">
            <li>
              <RouterLink to="/admin/settings/home" class="submenu-link">
                <i class="fa-solid fa-house menu-icon"></i>
                <span class="menu-text">首頁區塊設定</span>
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/admin/settings/logos" class="submenu-link">
                <i class="fa-solid fa-image menu-icon"></i>
                <span class="menu-text">品牌LOGO管理</span>
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/admin/settings/course" class="submenu-link">
                <i class="fa-solid fa-book menu-icon"></i>
                <span class="menu-text">課程頁面設定</span>
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/admin/settings/contact" class="submenu-link">
                <i class="fa-solid fa-envelope menu-icon"></i>
                <span class="menu-text">聯絡頁面設定</span>
              </RouterLink>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "adminMenu",
  data() {
    return {
      isMenuOpen: true,
      isSubMenuOpen: false,
    };
  },
  computed: {
    job() {
      return this.$store.state.auth.job;
    },
    username() {
      return this.$store.state.auth.username;
    },
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    toggleSubMenu() {
      this.isSubMenuOpen = !this.isSubMenuOpen;
    },
  },
};
</script>

<style scoped>
/* 側邊欄 */
.menu {
  width: 220px;
  height: 100vh;
  background-color: #f8f9fa;
  transition: width 0.3s ease;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.menu-collapsed {
  width: 70px;
}

/* 頂部 LOGO + 使用者名稱 */
.menu-header {
  height: 60px;
  border-bottom: 1px solid #dee2e6;
}
.logo-icon {
  font-size: 28px;
  color: #2bb1a6;
}
.username-text {
  font-weight: 500;
  color: #333;
}

/* 文字收合控制 */
.menu-text {
  font-size: 15px;
  white-space: nowrap;
  overflow: hidden;
  transition: all 0.3s ease;
}
.menu-collapsed .menu-text {
  opacity: 0;
  width: 0;
  margin: 0;
  pointer-events: none;
}

/* 選單項目 */
.menu-items {
  flex-grow: 1;
}
.menu-item {
  margin: 6px 0;
}
.menu-link {
  display: flex;
  align-items: center;
  padding: 10px;
  font-size: 16px;
  color: #333;
  text-decoration: none;
  border-radius: 6px;
  transition: background 0.2s;
}
.menu-link:hover {
  background-color: #e9ecef;
}

/* icon */
.menu-icon {
  font-size: 18px;
  min-width: 24px;
  text-align: center;
  margin-right: 10px;
}
.menu-collapsed .menu-icon {
  margin-right: 0;
  flex: 1;
  justify-content: center;
}

/* 箭頭 */
.arrow-icon {
  font-size: 14px;
  margin-left: auto;
}

/* 子選單 */
.submenu {
  margin-top: 4px;
}
.submenu-link {
  display: flex;
  align-items: center;
  padding: 6px 10px;
  font-size: 15px;
  color: #555;
  text-decoration: none;
  border-radius: 4px;
}
.submenu-link:hover {
  background-color: #f1f3f5;
}
</style>
