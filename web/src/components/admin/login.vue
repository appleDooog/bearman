<template>
  <div class="container-fluid">
    <div class="row justify-content-center align-content-center vh-100 m-0">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <span class="h2 card-header card-title bg-g2 text-white">
            管理員登入
          </span>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-8 form-floating">
                <input
                  type="text"
                  name="username"
                  id="username"
                  class="form-control"
                  v-model="data.username"
                />
                <label for="username">帳號</label>
              </div>
              <div class="col-8 mt-3 form-floating">
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  v-model="data.password"
                />
                <label for="password">密碼</label>
              </div>
              <div class="col-8">
                <hr />
                <div class="d-flex align-items-center justify-content-around flex-nowrap">
                  <img
                    :src="img_src"
                    alt=""
                    class="col-9 img-fluid"
                    style="min-width: 140px;"
                  />
                  <button
                    class="col-2 btn btn-danger rounded-circle w-100 h-auto"
                    style="max-width: 60px; max-height: 60px; aspect-ratio: 1/1"
                    @click="getCaptcha"
                  >
                    <i class="fa fa-refresh"></i>
                  </button>
                </div>
                <div class="row mt-3 justify-content-center">
                  <div class="col">
                    <input
                      type="text"
                      class="form-control text-center"
                      placeholder="請輸入驗證碼"
                      v-model="data.userKey"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button
                class="btn btn-primary mt-3 bg-b2 border-0 me-3"
                @click="userLogin"
              >
                登入
              </button>
              <button
                type="reset"
                class="btn btn-warning mt-3 bg-yellow text-white border-0"
              >
                清除
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
/* 針對手機版的樣式調整 */
@media (max-width: 576px) {
  .card {
    width: 100%; /* 卡片全版寬度 */
    margin: 0 auto; /* 水平居中 */
    border-radius: 0; /* 移除圓角讓其更像全版 */
    box-shadow: none; /* 移除陰影 */
  }
}
</style>


<script>
import { apiManagerCaptcha, apiManagerLogin } from "@/api";

export default {
  name: "adminLogin",
  data() {
    return {
      data: {
        username: "",
        password: "",
        userKey: "",
        captchaKey: "",
      },
      img_src: "",
    };
  },
  methods: {
    async getCaptcha() {
      try {
        const res = await apiManagerCaptcha();
        this.img_src = res.data.data.img;
        this.data.captchaKey = res.data.data.key;
      } catch (error) {
        console.log(error);
      }
    },

    userLogin() {
      const res = apiManagerLogin(this.data)
        .then((res) => {
          var valid = res.data.message;
          if (valid == "success") {
            console.log(res.data);
            var token = res.data.token;
            var job = res.data.job;
            var username = this.data.username;

            this.$store.dispatch("auth/setAuth", {
              username: username,
              token: token,
              job: job,
              isLogin: true,
            });

            this.$router.push({ name: "home" });
          } else {
            this.$router.go(0);
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  mounted() {
    this.getCaptcha();
  },
};
</script>
