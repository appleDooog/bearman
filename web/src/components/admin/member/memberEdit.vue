<template>
  <div class="container">
    <div class="row">
      <RouterLink to="../">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>

      <div class="col-9 vw-100 vh-100 bg-info align-content-center h1">
        {{ id }}
      </div>
    </div>
  </div>
</template>

<script>
// 動態id在router設定, 賦值
// 參考辛西亞巢狀路由頁面
//   const id = this.$route.params.id;
import { apiMemberEdit, apiMemberList } from "@/api";
export default {
  data() {
    return {
      data: [],
    };
  },
  methods: {
    async getlist() {
      try {
        const id = this.$route.params.id;
        const res = await apiMemberEdit(id);
        this.data = res.data;
        console.log(this.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.getlist();
  }
};
</script>
