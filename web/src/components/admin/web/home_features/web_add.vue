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
                  <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                  />
                </div>
              </div>

              <!-- 次標題 -->
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="subtitle" class="col-form-label">次標題</label>
                </div>
                <div class="col-md-6">
                  <input
                    type="text"
                    id="subtitle"
                    name="subtitle"
                    class="form-control"
                  />
                </div>
              </div>

              <!-- 內容 -->
              <div class="row mb-3 align-items-start">
                <div class="col-auto fw-bold">
                  <label for="content" class="col-form-label">內容</label>
                </div>
                <div class="col-md-8">
                  <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="3"
                  ></textarea>
                </div>
              </div>
            </template>

            <!-- 幻燈片板塊 -->
            <template v-if="form.type === 'S'">
              <!-- 版塊名稱 -->
              <div class="row mb-3 align-items-center">
                <div class="col-auto fw-bold">
                  <label for="name" class="col-form-label">版塊名稱</label>
                </div>
                <div class="col-md-4">
                  <input type="text" id="name" class="form-control" />
                </div>
              </div>

              <!-- 上傳圖片（多張） -->
              <div class="row mb-3">
                <div class="col-auto fw-bold">
                  <label for="slidePic" class="col-form-label">上傳圖片</label>
                </div>
                <div class="col-md-6">
                  <input
                    type="file"
                    id="slidePic"
                    name="slidePic"
                    class="form-control"
                    multiple
                    accept="image/*"
                    @change="handleSlideImages"
                  />
                  <small class="form-hint text-muted"
                    >支援拖拉、選擇多張圖，但最多只能 5 張喔！</small
                  >
                </div>
              </div>

              <!-- 預覽圖片 -->
              <div class="row mb-3" v-if="previewSlides.length">
                <div class="col-12 d-flex flex-wrap gap-3">
                  <div
                    v-for="(img, index) in previewSlides"
                    :key="index"
                    class="border rounded p-2 shadow-sm"
                    style="width: 150px"
                  >
                    <img
                      :src="img"
                      alt="預覽圖片"
                      class="img-fluid rounded mb-1"
                    />
                    <div class="text-center">
                      <small>圖片 {{ index + 1 }}</small>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 更多幻燈片設定欄位可補上 -->
            </template>
            <div class="text-center" @click="submit()">
              <div class="btn btn-primary">送　出</div>
            </div>
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
        slides: [], // 儲存使用者實際上傳的圖片檔案
      },
      previewSlides: [], // 儲存預覽用的圖片網址
    };
  },
  methods: {
    handleSlideImages(event) {
      const files = Array.from(event.target.files);

      if (files.length > 5) {
        alert("最多只能上傳 5 張圖片喔！");
        return;
      }

      // 釋放舊的圖片 URL
      this.previewSlides.forEach((url) => URL.revokeObjectURL(url));

      // 儲存檔案本體
      this.form.slides = files;

      // 預覽圖片網址
      this.previewSlides = files.map((file) => URL.createObjectURL(file));
    },
    submit() {
      alert("上傳成功");
      this.$router.replace({ name: "web_home" });
    },
  },
};
</script>

<style lang="sass" scoped></style>
