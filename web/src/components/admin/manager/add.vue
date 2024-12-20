<template>
  <div class="text-center">
    <div class="justify-content-center">
      <RouterLink to="../manager/">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>
    </div>
    <div class="row my-3">
      <div class="col-md-12">
        <form @submit.prevent="submit">
          <div class="card">
            <div class="card-body">
              <div class="h1">新增管理員</div>
              <div class="d-flex justify-content-center">
                <label
                  for="name"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >帳號</label
                >
                <div class="ms-3 col-md-3">
                  <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="ex. 王大明"
                    class="form-control"
                    v-model.trim="managerInfo.name"
                    required
                  />
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="d-flex mt-3 justify-content-center">
                <label
                  for="password"
                  class="form-label col-md-2 justify-content-center align-baseline text-end"
                  >密碼</label
                >
                <div class="ms-3 col-md-3">
                  <input
                    type="text"
                    name="password"
                    id="password"
                    placeholder="密碼長度六位"
                    class="form-control"
                    v-model.trim="managerInfo.password"
                    required
                  />
                  <div class="invalid-feedback">
                    密碼格式不符, 請設定長度大於六位之英數混合密碼
                  </div>
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="d-flex mt-3 justify-content-center">
                <label
                  for="password"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >職位</label
                >
                <div class="ms-3 col-2 col-md-3">
                  <select name="job" id="job" class="form-select">
                    <option value="1">小編</option>
                    <option value="0">管理員</option>
                  </select>
                </div>
              </div>
              <div class="text-center my-3">
                <button type="submit" class="btn btn-primary me-3">送出</button>
                <button type="reset" class="btn btn-warning">清空</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import { apiManagerAdd } from "@/api";

export default {
  name: "managerAdd",
  data() {
    return {
      managerInfo: {
        name: "",
        password: "",
        job: "1",
      },
    };
  },
  methods: {
    submit() {
      apiManagerAdd(this.managerInfo)
        .then((res) => {
          console.log(res);
          Swal.fire({
            icon: "success",
            title: "新增管理員成功",
            showConfirmButton: true,
            confirmButtonText: "太棒了！",
            confirmButtonColor: "#2BB1A6",
          }).then(() => {
            this.$router.replace({ name: "adminList" });
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
