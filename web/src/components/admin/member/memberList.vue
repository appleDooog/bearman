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
          <div class="col-md-1">
            <RouterLink :to="{ name: 'edit' }"
              ><button type="button" class="btn btn-warning">修改</button>
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
                <th>會員等級</th>
                <th>會員狀態</th>
                <th>備註</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in datalist"
                :key="item.id"
                class="align-baseline"
              >
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.tel }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.level }}</td>
                <td>{{ item.active }}</td>
                <td>{{ item.remark }}</td>
                <td class="d-flex justify-content-around px-3">
                  <RouterLink :to="{ name: 'edit', params:{id: item.id}}"
                    ><button type="button" class="btn btn-outline-warning">
                      修改
                    </button>
                  </RouterLink>
                  <button type="button" class="btn btn-outline-danger">
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
import { apiMemberList } from "@/api";
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
        console.log(res.data.list);
      } catch (err) {
        console.log(err);
      }
    },
  },
  mounted() {
    this.getlist();
  },
};
</script>
