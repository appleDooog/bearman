<style>
.btn-outline-success {
  border-color: var(--color03);
}

.btn-outline-success:hover {
  background-color: var(--color03);
  border-color: var(--color03);
}
</style>

<template>
  <div
    class="row vw-100 justify-content-center border-bottom border-2"
    style="height: 192px"
  >
    <div class="col-md-9 align-content-center">
      <RouterLink to="/admin" class=" text-decoration-none">
        <div class="display-3 color-g1" style="font-family: nanifont">
          遠熊駕駛艙
        </div>
      </RouterLink>
      <div class="text-secondary lh-lg">後台管理系統 v1.</div>
    </div>
    <div class="col-md-2 align-content-center">
      <a href="#" class="me-4"
        ><i class="link-secondary fa-solid fa-2xl fa-shop"></i
      ></a>
      <a href="#" class="btn btn-outline-success color-g2 btn-lg fw-bold"
        >登 出</a
      >
    </div>
  </div>
</template>
<script>
export default {
  name: "adminLogo",
};
</script>
