<style>
.adminLogo .btn-outline-success {
  border-color: var(--color03);
}

.adminLogo .btn-outline-success:hover {
  background-color: var(--color03);
  border-color: var(--color03);
}
</style>

<template>
  <div
    class="adminLogo d-flex border-bottom border-2"
    style="height: 192px"
  >
    <div class="col col-md-9 align-content-center ps-5">
      <RouterLink to="/admin/home" replace class="text-decoration-none">
        <div class="display-3 color-g1" style="font-family: nanifont">
          遠熊駕駛艙
        </div>
      </RouterLink>
      <div class="text-secondary lh-lg">後台管理系統 v1.</div>
    </div>
    <div class="col-4 col-md-3 justify-content-center align-items-center d-flex">
      <RouterLink to="/admin/home" replace
        ><i
          class="link-secondary fa-solid fa-2xl fa-shop d-none d-sm-inline-block"
        ></i
      ></RouterLink>
      <button class="btn btn-outline-success color-g2 btn-lg fw-bold ms-3" @click="logout">
        登出
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: "adminLogo",
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
  },
};
</script>
