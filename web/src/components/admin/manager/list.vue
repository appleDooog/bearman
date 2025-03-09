<template>
  <div class="text-center">
    <div class="card mt-3">
      <div class="card-header">
        <h2>管理員列表</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-1">
            <RouterLink :to="{ name: 'adminAdd' }">
              <button type="button" class="btn btn-primary">新增</button>
            </RouterLink>
          </div>
        </div>
        <div class="row mt-3">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>帳號</th>
                <th>職位</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in datalist"
                :key="item.id"
                class="align-baseline"
              >
                <td class="col-5">{{ item.username }}</td>
                <td
                  class="col-5"
                  v-text="item.job == 0 ? '管理員' : '小編'"
                ></td>
                <td class="d-flex justify-content-around px-3 col">
                  <RouterLink
                    :to="{ name: 'adminEdit', params: { id: item.id } }"
                    ><button type="button" class="btn btn-outline-warning">
                      修改
                    </button>
                  </RouterLink>
                  <button type="button" class="btn btn-outline-danger" @click="doDelete(item.id)">
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
import { apiManagerDel, apiManagerList } from "@/api/adminApi";

export default {
  name: "managerList",
  data: function () {
    return {
      datalist: [],
    };
  },
  methods: {
    async getlist() {
      try {
        const res = await apiManagerList();
        this.datalist = res.data.list;
      } catch (err) {
        console.log(err);
      }
    },

    doDelete(data) {
      Swal.fire({
        title: "確定要刪除此管理員？",
        text: "資料刪除後無法回復！",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2BB1A6",
        cancelButtonColor: "#EDD78A",
        confirmButtonText: "對！刪掉這傢伙！",
        cancelButtonText: "讓我再想想...",
      }).then((result) => {
        if (result.isConfirmed) {
          apiManagerDel(data)
            .then((res) => {
              Swal.fire({
                title: "已刪除",
                text: "該管理人員已被刪除",
                icon: "success",
              }).then(() => {
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
