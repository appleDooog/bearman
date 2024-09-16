<template>
  <div class="text-center">
    <div class="row justify-content-center">
      <RouterLink to="../member/">
        <button type="button" class="btn btn-primary">上一頁</button>
      </RouterLink>
    </div>
    <div class="row my-3">
      <div class="col-md-12">
        <form action="">
          <div class="card">
            <div class="card-body">
              <div class="h1">新增管理員</div>
              <div class="row">
                <label
                  for="name"
                  class="form-label col-md-2 justify-content-center align-content-center text-end"
                  >帳號</label
                >
                <div class="col-md-3">
                  <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="ex. 王大明"
                    class="form-control"
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
                    required
                  />
                  <div class="invalid-feedback">
                    密碼格式不符, 請設定長度大於六位之英數混合密碼
                  </div>
                </div>
                <div class="badge text-danger col-md-1 text-start">*必填</div>
              </div>
              <div class="text-center mb-3">
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
