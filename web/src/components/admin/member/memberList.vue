<template>
  <div>
    <div class="container">
      <div class="card mt-3">
        <div class="card-header">
          <h2>會員列表</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <button type="button" class="btn btn-primary">新增</button>
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
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in datalist" :key="item.id">
                  <td>{{ item.id }}</td>
                  <td>{{ item.name }}</td>
                  <td>{{ item.address }}</td>
                  <td>{{ item.tel }}</td>
                  <td>{{ item.email }}</td>
                  <td>{{ item.level }}</td>
                  <td>{{ item.active }}</td>
                  <td>{{ item.remark }}</td>
                  <td class="d-flex justify-content-around">
                    <button type="button" class="btn btn-outline-warning me-2">
                      修改
                    </button>
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
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "memberList",
  data: function () {
    return {
      datalist: [],
    };
  },
  methods: {
    getlist() {
      axios
        .get("http://127.0.0.1:8000/admin/member/list")
        .then((res) => {
          // 當請求成功時
          // console.log(res.data);
          this.datalist = res.data;
        })
        .catch(function (error) {
          // 請求失敗時
          console.log(error);
        });
    },
  },
  mounted() {
    this.getlist();
  },
};
</script>
