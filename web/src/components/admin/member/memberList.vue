<template>
  <div class="container my-4">
    <div class="card shadow-sm">
      <div class="card-header text-center">
        <h2 class="mb-0">會員列表</h2>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-start   mb-3">
          <RouterLink :to="{ name: 'add' }">
            <button type="button" class="btn btn-primary">
              新增會員
            </button>
          </RouterLink>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead>
              <tr>
                <th>會員編號</th>
                <th>姓名</th>
                <th>聯絡地址</th>
                <th>聯絡電話</th>
                <th>電子郵件</th>
                <th>會員狀態</th>
                <th>備註</th>
                <th class="text-center">操作</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in datalist" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.tel }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.active == 1 ? '啟用' : '停用' }}</td>
                <td>{{ item.remark }}</td>
                <td class="text-center">
                  <RouterLink
                    :to="{ name: 'edit', params: { id: item.id } }"
                  >
                    <button
                      type="button"
                      class="btn btn-sm btn-outline-warning me-2"
                    >
                      修改
                    </button>
                  </RouterLink>
                  <button
                    type="button"
                    @click="doDelete(item.id)"
                    class="btn btn-sm btn-outline-danger"
                  >
                    刪除
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { apiMemberDel, apiMemberList } from "@/api";
export default {
  name: "memberList",
  data: function () {
    return {
      datalist: [],
    };
  },
  methods: {
    async getlist() {
      try {
        const res = await apiMemberList({ type: "list" });
        this.datalist = res.data.list;
      } catch (err) {
        console.log(err);
      }
    },
    doDelete(data) {
      Swal.fire({
        title: "確定要刪除此會員？",
        text: "資料刪除後無法回復！",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2BB1A6",
        cancelButtonColor: "#EDD78A",
        confirmButtonText: "對！刪掉這傢伙！",
        cancelButtonText: "讓我再想想...",
      }).then((result) => {
        if (result.isConfirmed) {
          apiMemberDel(data)
        .then((res) => {
          Swal.fire({
            title: "已刪除",
            text: "該會員已被刪除",
            icon: "success",
          }).then(()=>{
            this.$router.go(0);
          });
        })
        .catch((err) => {
          console.log(err);
        });
        }
      });      
    },
  },
  mounted() {
    this.getlist();
  },
};
</script>
