<template>
  <div class="container-fluid">
    <div class="row justify-content-center align-content-center">
      <div class="col-4">
        <div class="card">
          <span class="h2 card-header card-title bg-g2 text-white">管理員登入</span>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-8 form-floating">
                <input
                  type="text"
                  name="username"
                  id="username"
                  class="form-control"
                  v-model="username"
                />
                <label for="username">帳號</label>
              </div>
              <div class="col-8 mt-3 form-floating">
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  v-model="password"
                />
                <label for="password">密碼</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 bg-b2 border-0 me-3">登入</button>
            <button type="reset" class="btn btn-primary mt-3 bg-pink border-0 color-g2">清除</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "adminLogin",
  data() {
    return {
      username: "",
      password: "",
    };
  },
};
</script>
