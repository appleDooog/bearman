<template>
  <div class="container-fluid">
    <div class="row justify-content-center align-content-center">
      <div class="col-4">
        <div class="card">
          <span class="h2 card-header card-title bg-g2 text-white"
            >管理員登入</span
          >
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
              <div class="col-8">
                <hr>
                <div class="row">
                  <img :src="img_src" alt="" class="col-9" />
                  <div class="col align-self-center">
                    <button class="btn btn-danger rounded-circle">
                      <i class="fa fa-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="row mt-3 justify-content-center">
                  <div class=" col">
                    <input
                      type="text"
                      class="form-control text-center"
                      placeholder="輸入驗證碼"
                    />
                  </div>
                </div>
              </div>
            </div>
            <button
              type="submit"
              class="btn btn-primary mt-3 bg-b2 border-0 me-3"
            >
              登入
            </button>
            <button
              type="reset"
              class="btn btn-warning mt-3 bg-yellow text-white text- border-0"
            >
              清除
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { apiManagerCaptcha } from "@/api";

export default {
  name: "adminLogin",
  data() {
    return {
      username: "",
      password: "",
      img_src: "",
      captcha_key: "",
    };
  },
  methods: {
    async getCaptcha() {
      try {
        const res = await apiManagerCaptcha();
        this.img_src = res.data.data.img;
        console.log(res.data.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.getCaptcha();
  },
};
</script>
