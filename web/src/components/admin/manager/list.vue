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
                <td class="col-5" v-text="item.job == 0 ? '管理員':'小編'"></td>
                <td class=" d-flex justify-content-around px-3 col">
                  <RouterLink
                    :to="{ name: 'adminEdit', params: { id: item.id } }"
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
import { apiManagerList } from '@/api';

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
  },
  mounted() {
    this.getlist();
  },
};
</script>
