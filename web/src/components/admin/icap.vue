<template>
  <div class="container vh-100 align-content-center justify-content-center">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <label for="account" class="form-label col-2 text-end"
                >帳號</label
              >
              <div class="col-5">
                <input
                  type="text"
                  name="account"
                  id="account"
                  class="form-control col"
                  v-model="data.account"
                  @input="accountchk"
                  :class="{ ' is-invalid': !isAccountOK }"
                />
                <div class="invalid-feedback">帳號格式錯誤</div>
              </div>
            </div>
            <div class="row mt-3">
              <label for="password" class="form-label col-2 text-end"
                >密碼</label
              >
              <div class="col-5">
                <input
                  type="text"
                  name="password"
                  id="password"
                  class="form-control col"
                  v-model="data.password"
                  @input="pwdchk"
                  :class="{ ' is-invalid': !isPwdOK }"
                />
                <div class="invalid-feedback">密碼格式錯誤</div>
              </div>
            </div>
            <div class="row mt-3">
              <label for="passwordchk" class="form-label col-2 text-end"
                >確認密碼</label
              >
              <div class="col-5">
                <input
                  type="text"
                  name="passwordchk"
                  id="passwordchk"
                  class="form-control col"
                  v-model="passwordchk"
                  @input="pwddbchk"
                  :class="{ ' is-invalid': !isPwdchkOK }"
                />
                <div class="invalid-feedback">密碼不符</div>
              </div>
            </div>
            <div class="row mt-3">
              <label for="email" class="form-label col-2 text-end">Email</label>
              <div class="col-5">
                <input
                  type="email"
                  name="email"
                  id="eamil"
                  class="form-control col"
                  v-model="data.email"
                />
                <div class="invalid-feedback">密碼不符</div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-5 ms-5">興趣:</div>
            </div>
            <div class="row row-cols-3 mx-5 mt-3">
              <div class="col form-check">
                <input
                  type="checkbox"
                  name="hobbit"
                  id="hobbit"
                  class="form-check-input"
                  v-model="data.hobbit"
                  @click="data.hobbit.push('閱讀')"
                />
                <label for="hobbit" class="form-check-label">閱讀</label>
              </div>
              <div class="col form-check">
                <input
                  type="checkbox"
                  name="hobbit"
                  id="hobbit"
                  class="form-check-input"
                  @click="data.hobbit.push('打球')"
                />
                <label for="hobbit" class="form-check-label">打球</label>
              </div>
              <div class="col form-check">
                <input
                  type="checkbox"
                  name="hobbit"
                  id="hobbit"
                  class="form-check-input"
                  v-model="hobbit"
                  @click="data.hobbit.push('電影')"
                />
                <label for="hobbit" class="form-check-label">電影</label>
              </div>
              <div class="col form-check">
                <input
                  type="checkbox"
                  name="hobbit"
                  id="hobbit"
                  class="form-check-input"
                  v-model="hobbit"
                  @click="data.hobbit.push('爬山')"
                />
                <label for="hobbit" class="form-check-label">爬山</label>
              </div>
              <div class="col form-check">
                <input
                  type="checkbox"
                  name="hobbit"
                  id="hobbit"
                  class="form-check-input"
                  v-model="hobbit"
                  @click="data.hobbit.push('逛街')"
                />
                <label for="hobbit" class="form-check-label">逛街</label>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-2">
                <button class="btn btn-primary" @click="handleSubmit">
                  確認
                </button>
              </div>
              <div class="col-2">
                <button class="btn btn-warning">取消</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { adminIcapGetApi, adminIcapAddApi } from "@/api";

export default {
  name: "icap",
  data() {
    return {
      data: {
        account: "",
        password: "",
        email: "",
        hobbit: [],
      },
      passwordchk: "",
      isAccountOK: false,
      isPwdOK: false,
      isPwdchkOK: false,
      list: [],
    };
  },
  methods: {
    accountchk() {
      if (this.data.account.length < 5 || this.data.account.length > 10) {
        this.isAccountOK = false;
      } else {
        this.isAccountOK = true;
      }
    },
    pwdchk() {
      if (this.data.password.length < 8 || this.data.password.length > 12) {
        this.isPwdOK = false;
      } else {
        this.isPwdOK = true;
      }
    },
    pwddbchk() {
      if (this.passwordchk != this.data.password) {
        this.isPwdchkOK = false;
      } else {
        this.isPwdchkOK = true;
      }
    },

    async getList() {
      try {
        const res = await adminIcapGetApi();
        this.list = res.data;
      } catch (err) {
        console.log(err);
      }
    },

    handleSubmit() {
      console.log(this.data);
      if (this.isAccountOK) {
        if (this.isPwdOK) {
          if (this.isPwdchkOK) {
            console.log(this.data.hobbit.length);
            if (this.data.hobbit.length > 0 ) {
              this.data.hobbit.join(",");

            } else {
              this.data.hobbit.push("無");
            }

            console.log(this.data);

            Swal.fire({
              title: "確認新增?",
              showDenyButton: true,
              showCancelButton: false,
              confirmButtonText: "確認",
              denyButtonText: "取消",
            }).then((result) => {
              if (result.isConfirmed) {
                adminIcapAddApi(this.data)
                  .then((res) => {
                    Swal.fire("Saved!", "", "success");
                    console.log(res);
                  })
                  .catch((err) => {
                    console.log(err);
                  });
              } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
              }
            });
          } else {
            alert("請再次確認密碼");
          }
        } else {
          alert("密碼格式錯誤");
        }
      } else {
        alert("帳號格式錯誤");
      }
    },
  },
  mounted() {
    this.getList();
  },
};
</script>
