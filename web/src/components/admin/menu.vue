<template>
  <div class="vh-100 bg-secondary text-center">
    <div class="">
      <RouterLink :to="{ name: 'add' }">
        <button type="button" class="btn btn-primary mt-3">新增頁面</button>
      </RouterLink>
    </div>
    <div class="">
      <RouterLink :to="{ name: 'edit' }"
        ><button type="button" class="btn btn-warning mt-3">修改頁面</button>
      </RouterLink>
    </div>
  </div>
</template>

<script>
export default {
  name: "menu",
};
</script>
