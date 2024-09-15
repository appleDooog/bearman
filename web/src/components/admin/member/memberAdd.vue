<template>
  <div class="memberAdd container-fluid">
    <div class="row justify-content-center">
      <RouterLink to="../member/">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>
    </div>
    <div class="row my-3">
      <div class="col-md-12">
        <form @submit.prevent="handleSubmit" id="memberAdd">
          <div class="card">
            <div class="card-body">
              <div class="h1 text-center mb-3">新增會員</div>
              <div class="row">
                <label
                  for="name"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >會員姓名</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="ex. 王大明"
                    class="form-control"
                    v-model.lazy.trim="memberInfo.name"
                    required
                  />
                </div>

                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="password"
                  class="form-label col-md-2 justify-content-center align-baseline text-end"
                  >密碼</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="password"
                    id="password"
                    placeholder="密碼長度六位"
                    class="form-control"
                    v-model="memberInfo.password"
                    @input="passwordValid"
                    :class="{
                      'is-valid': isValidPassword,
                      'is-invalid': !isValidPassword,
                    }"
                    required
                  />
                  <div class="invalid-feedback">
                    密碼格式不符, 請設定長度大於六位之英數混合密碼
                  </div>
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>

              <div class="row mt-3">
                <label
                  for="passwordchk"
                  class="form-label col-md-2 justify-content-center align-baseline text-end"
                  >確認密碼</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="passwordchk"
                    id="passwordchk"
                    placeholder="再次確認密碼"
                    class="form-control"
                    v-model="passwordchk"
                    @input="passwordChecked"
                    :class="{
                      'is-valid': ispasswordchked,
                      'is-invalid': !ispasswordchked,
                    }"
                    required
                  />
                  <div class="invalid-feedback">
                    請確認輸入內容是否與密碼相同
                  </div>
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="address"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >聯絡地址</label
                >
                <div class="col-md-8">
                  <input
                    type="text"
                    name="address"
                    id="address"
                    placeholder="ex. 407台中市西屯區重慶路256號"
                    class="form-control"
                    v-model.lazy.trim="memberInfo.address"
                    required
                  />
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="tel"
                  class="form-label col-md-2 justify-content-center align-baseline text-end"
                  >聯絡電話</label
                >
                <div class="col-md-8">
                  <input
                    type="tel"
                    name="tel"
                    id="tel"
                    placeholder="ex. 23456789、0987654321"
                    class="form-control"
                    v-model.trim="memberInfo.tel"
                    @input="telChecked"
                    :class="{
                      'is-valid': isValidTel,
                      'is-invalid': !isValidTel,
                    }"
                    required
                  />
                  <div class="invalid-feedback">請輸入有效電話號碼</div>
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="email"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >電子信箱</label
                >
                <div class="col-md-6">
                  <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="請輸入電子信箱"
                    class="form-control"
                    v-model.lazy.trim="memberInfo.email"
                  />
                </div>
              </div>
              <div class="row mt-3">
                <label
                  for="remark"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >備註</label
                >
                <div class="col-md-9">
                  <input
                    type="text"
                    name="remark"
                    id="remark"
                    placeholder="ex.要開統編...等"
                    class="form-control"
                    v-model.lazy.trim="memberInfo.remark"
                  />
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-1 col-md-1 text-end pe-0">
                  <input
                    type="checkbox"
                    name="privateChk"
                    id="privateChk"
                    class="form-check-input"
                    required
                  />
                </div>
                <label for="privateChk" class="h5 form-check-label col-5 ps-2"
                  >我已知曉並同意遵守《會員守則》及《隱私條款》相關內容。</label
                >
              </div>
            </div>
            <div class="text-center mb-3">
              <button type="submit" class="btn btn-primary me-3">送出</button>
              <button type="reset" class="btn btn-warning">清空</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { apiMemberAdd } from "@/api";

export default {
  name: "memberAdd",
  data() {
    return {
      memberInfo: {
        name: "",
        password: "",
        address: "",
        tel: "",
        email: "",
        remark: "",
      },
      passwordchk: "",
      isValidPassword: false,
      ispasswordchked: false,
      isValidTel: false,
    };
  },
  methods: {
    passwordValid() {
      if (this.memberInfo.password.length >= 6) {
        this.isValidPassword = true;
      } else this.isValidPassword = false;
    },
    passwordChecked() {
      if (
        this.passwordchk === this.memberInfo.password &&
        this.passwordchk != ""
      ) {
        this.ispasswordchked = true;
      } else {
        this.ispasswordchked = false;
      }
    },
    telChecked() {
      if (this.memberInfo.tel.length >= 7) {
        this.isValidTel = true;
      } else {
        this.isValidTel = false;
      }
    },
    handleSubmit() {
      if (this.isValidPassword) {
        if (this.ispasswordchked) {
          if (this.isValidTel) {
            apiMemberAdd(this.memberInfo)
              .then((res) => {
                Swal.fire({
                  icon: "success",
                  title: "新增會員成功",
                  showConfirmButton: true,
                  confirmButtonText: "太棒了！",
                  confirmButtonColor: "#2BB1A6"
                }).then(() => {
                  this.$router.replace({ name: "list" });
                });
                
              })
              .catch((err) => {
                console.log(err);
              });
          } else {
            alert("電話格式錯誤");
          }
        } else {
          alert("請確認密碼無誤");
        }
      } else {
        alert("密碼格式錯誤");
      }
    },
  },
};
</script>
