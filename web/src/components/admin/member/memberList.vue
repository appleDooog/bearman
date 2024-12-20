<template>
  <div class="text-center">
    <div class="card mt-3">
      <div class="card-header">
        <h2>會員列表</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-1">
            <RouterLink :to="{ name: 'add' }">
              <button type="button" class="btn btn-primary">新增</button>
            </RouterLink>
          </div>
        </div>
        <div class="row mt-3">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>會員編號</th>
                <th>姓名</th>
                <th>聯絡地址</th>
                <th>聯絡電話</th>
                <th>電子郵件</th>
                <th>會員狀態</th>
                <th>備註</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in datalist"
                :key="item.id"
                class="align-baseline">
                <td class="col-1">{{ item.id }}</td>
                <td class="col-1">{{ item.name }}</td>
                <td class="col-2">{{ item.address }}</td>
                <td class="col-1">{{ item.tel }}</td>
                <td class="col-2">{{ item.email }}</td>
                <td class="col-1" v-text="item.active == 1 ? '啟用': '停用'"></td>
                <td class="col-1">{{ item.remark }}</td>
                <td class="d-flex justify-content-around col">
                  <RouterLink :to="{ name: 'edit', params: { id: item.id } }"
                    ><button type="button" class="btn btn-outline-warning">
                      修改
                    </button>
                  </RouterLink>
                  <button
                    type="button"
                    @click="doDelete(item.id)"
                    class="btn btn-outline-danger"
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
