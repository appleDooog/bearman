<template>
  <div class="adminLogo container-fluid border-bottom border-2">
    <!-- 第一行：LOGO 和按鈕 -->
    <div class="d-flex align-items-center justify-content-centerpb-3 px-5">
      <!-- 左側 LOGO -->
      <div class="d-flex flex-column align-items-start flex-grow-1">
        <RouterLink to="/admin/home" replace class="text-decoration-none">
          <div class="logo-text color-g1">遠熊駕駛艙</div>
        </RouterLink>
        <div class="sub-title d-block">後台管理系統 v1.</div>
      </div>

      <!-- 右側按鈕與圖示 -->
      <div class="d-flex align-items-center justify-content-end">
        <RouterLink to="/admin/home" replace>
          <i class="fa-solid fa-xl fa-shop link-secondary me-3"></i>
        </RouterLink>
        <button
          class="btn btn-outline-success fw-bold color-g1 logout-btn"
          @click="logout"
        >
          登出
        </button>
      </div>
    </div>

    <!-- 第二行：統計區域 -->
    <div
      class="d-flex justify-content-center align-items-center stats-section mt-3 gap-1 mx-3"
    >
      <countNote :title="'會員人數'" class="col bg-b1 py-3">
        {{ count01 }}
      </countNote>
      <countNote
        :title="'待處理訂單'"
        :bg_color="'bg-b1'"
        :icon="'fa-file-lines'" class="col bg-g1 py-3"
      >
        {{ count02 }}
      </countNote>
    </div>
  </div>
</template>

<script>
import countNote from "./countNote.vue";
import { apiMemberList } from "@/api";

export default {
  name: "adminLogo",
  data() {
    return {
      count01: 0,
      count02: 2,
    };
  },
  components: {
    countNote,
  },
  methods: {
    logout() {
      this.$store.dispatch("auth/setAuth", {
        username: "",
        token: "",
        job: "",
        isLogin: false,
      });
      localStorage.removeItem("bearman");
      localStorage.removeItem("_secure__ls__metadata");
      this.$router.push({ name: "admin" });
    },

    async getMemberCount() {
      try {
        const res = await apiMemberList({ type: "count" });
        this.count01 = res.data.count;
      } catch (error) {
        console.error("無法取得會員數量：", error);
      }
    },
  },
  mounted() {
    this.getMemberCount();
  },
};
</script>

<style>
.adminLogo {
  padding: 1rem 0;
}

.adminLogo .logo-text {
  font-size: 3rem;
  font-family: "nanifont", sans-serif;
}

.adminLogo .sub-title {
  font-size: 0.875rem;
  color: #6c757d;
  line-height: 1.5;
}

.stats-section {
  gap: 3rem;
  flex-wrap: nowrap;
}

.adminLogo .logout-btn {
  border-color: var(--color03);
  border-width: 2px;
}

.adminLogo .logout-btn:hover {
  background-color: var(--color03);
  border-color: var(--color03);
}

/* RWD 支持 */
@media (max-width: 768px) {
  .stats-section {
    gap: 1.5rem; /* 增加間距 */
  }
  .adminLogo .logo-text {
    font-size: 1.5rem;
    font-family: "nanifont", sans-serif;
  }
}
</style>
