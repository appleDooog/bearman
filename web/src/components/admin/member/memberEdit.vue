<template>
  <div class="container">
    <div class="row">
      <RouterLink to="../">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>
      <div class="col-9 align-content-center mt-3">
        <div class="col-md-12">
          <form @submit.prevent="updateSubmit" id="memberAdd">
            <div class="card">
              <div class="card-body">
                <div class="h1 text-center mb-3">會員資料修改</div>
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
                      v-model.lazy.trim="data.name"
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
                      v-model="data.password"
                      @input="passwordValid"
                      :class="{
                        'is-valid': isValidPassword,
                        'is-invalid': !isValidPassword,
                      }"
                      required
                    />
                    <div class="invalid-feedback">
                      <!-- 密碼格式不符, 請設定長度大於六位之英數混合密碼 -->
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
                      <!-- 請確認輸入內容是否與密碼相同 -->
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
                      v-model.lazy.trim="data.address"
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
                      v-model.trim="data.tel"
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
                      v-model.lazy.trim="data.email"
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
                      v-model.lazy.trim="data.remark"
                    />
                  </div>
                </div>
              </div>
              <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary me-3">送出</button>
                <button type="reset" class="btn btn-warning" @click="clear">清空</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// 動態id在router設定, 賦值
// 參考辛西亞巢狀路由頁面
//   const id = this.$route.params.id;
import { apiMemberEdit } from "@/api";
export default {
  data() {
    return {
      data: [],
      passwordchk: "",
      isValidPassword: "",
      ispasswordchked: "",
      isValidTel: "",
    };
  },
  methods: {
    async getlist() {
      try {
        const id = this.$route.params.id;
        const res = await apiMemberEdit(id);
        this.data = res.data.list;
        this.passwordValid();
        this.passwordChecked();
        this.telChecked();
        console.log(this.data);
      } catch (error) {
        console.log(error);
      }
    },
    passwordValid() {
      if (this.data.password.length >= 6) {
        this.isValidPassword = true;
      } else this.isValidPassword = false;
    },
    passwordChecked() {
      if (this.passwordchk === this.data.password && this.passwordchk != "") {
        this.ispasswordchked = true;
      } else {
        this.ispasswordchked = false;
      }
    },
    telChecked() {
      var tel = this.data.tel.toString().length;
      if (tel >= 6) {
        this.isValidTel = true;
      } else {
        this.isValidTel = false;
      }
    },
    clear() {

    },
    updateSubmit() {},
  },
  mounted() {
    this.getlist();
  },
};
</script>
