<template>
  <div class="memberAdd container-fluid">
    <div class="row justify-content-center">
      <RouterLink to="../member/">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <form action="insert" id="memberAdd">
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
                    v-model.lazy.trim="name"
                    required
                  />
                </div>

                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="password"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >密碼</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="password"
                    id="password"
                    placeholder="英數6-10字"
                    class="form-control"
                    v-model="password"
                    @input="passwordVaild"
                    :class="{'is-vaild': isVaildPassword}"
                    required
                  />
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>

              <div class="row mt-3">
                <label
                  for="passwordchk"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >確認密碼</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="passwordchk"
                    id="passwordchk"
                    placeholder="再次確認密碼"
                    class="form-control"
                    required
                  />
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
                    v-model.lazy.trim="address"
                    required
                  />
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="row mt-3">
                <label
                  for="tel"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >聯絡電話</label
                >
                <div class="col-md-8">
                  <input
                    type="tel"
                    name="tel"
                    id="tel"
                    placeholder="ex. 23456789、0987654321"
                    class="form-control"
                    v-model.lazy.trim="address"
                    required
                  />
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
                    v-model.lazy.trim="email"
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
                    v-model.lazy.trim="remark"
                  />
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-md-1 text-end pe-0">
                  <input
                    type="checkbox"
                    name="privateChk"
                    id="privateChk"
                    class="form-check-input"
                    required
                  />
                </div>
                <label for="privateChk" class="form-check-label col-7 ps-2"
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
export default {
  name: "memberAdd",
  data() {
    return {
      name: "",
      password: "",
      isVaildPassword: "",
      address: "",
      tel: "",
      email: "",
      remark: "",
    };
  },
  methods:{
    passwordVaild(){
      if(this.password>6){
        return this.isVaildPassword = true;
      }
      return this.isVaildPassword = false;
    },
  },
};
</script>
