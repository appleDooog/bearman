<template>
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header">新增首頁板塊</div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <!-- 類型選擇 -->
            <div class="row mb-3 align-items-center">
              <div class="col-auto fw-bold">
                <label for="type" class="col-form-label">類型</label>
              </div>
              <div class="col-md-3">
                <select
                  name="type"
                  id="type"
                  class="form-select"
                  v-model="form.type"
                >
                  <option value="" disabled selected>請選擇</option>
                  <option value="T">文案區塊</option>
                  <option value="S">輪播幻燈片</option>
                  <option value="P">圖片按鈕連結區塊</option>
                  <option value="L">LOGO區塊</option>
                </select>
              </div>
            </div>

            <!-- 文案板塊 -->
            <template v-if="form.type === 'T'">
              <!-- 版塊名稱 -->
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="name" class="col-form-label">版塊名稱</label>
                </div>
                <div class="col-md-4">
                  <input type="text" id="name" class="form-control" />
                </div>
              </div>

              <!-- 大標題 -->
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="title" class="col-form-label">大標題</label>
                </div>
                <div class="col-md-6">
                  <input type="text" id="title" name="title" class="form-control" />
                </div>
              </div>

              <!-- 次標題 -->
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="subtitle" class="col-form-label">次標題</label>
                </div>
                <div class="col-md-6">
                  <input type="text" id="subtitle" name="subtitle" class="form-control" />
                </div>
              </div>

              <!-- 內容 -->
              <div class="row mb-3 align-items-start">
                <div class="col-auto fw-bold">
                  <label for="content" class="col-form-label">內容</label>
                </div>
                <div class="col-md-8">
                  <textarea id="content" name="content" class="form-control" rows="3"></textarea>
                </div>
              </div>
            </template>

            <!-- 幻燈片板塊 -->
            <template v-if="form.type === 'S'">
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="name" class="col-form-label">版塊名稱</label>
                </div>
                <div class="col-md-4">
                  <input type="text" id="name" class="form-control" />
                </div>
              </div>
                <div class="col-auto fw-bold">
                  <label for="name" class="col-form-label">上傳圖片</label>
                </div>
              <!-- 更多幻燈片設定欄位可補上 -->
            </template>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        type: "",
      },
    };
  },
};
</script>

<style lang="sass" scoped></style>
