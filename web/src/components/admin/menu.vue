<template>
  <div class="menu bg-secondary text-center">
    <div>
      <RouterLink :to="{ name: 'add' }">
        <button type="button" class="btn btn-primary mt-3">新增頁面</button>
      </RouterLink>
    </div>
    <div>
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
