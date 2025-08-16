<template>
  <div class="container mt-4">
    <h3>新增首頁板塊</h3>
    <form @submit.prevent="submit">
      <div class="mb-3">
        <label class="form-label">類型</label>
        <select v-model="form.type" class="form-select" required>
          <option value="">請選擇</option>
          <option value="T">文案區塊</option>
          <option value="S">輪播區塊</option>
        </select>
      </div>

      <div v-if="form.type === 'T'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">大標題</label>
          <input v-model="form.title" type="text" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">副標題</label>
          <input v-model="form.subtitle" type="text" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">內容</label>
          <textarea
            v-model="form.content"
            rows="4"
            class="form-control"
          ></textarea>
        </div>
      </div>

      <!-- 這部分放在 <form> 裡，判斷 type === 'S' 時顯示 -->
      <div v-if="form.type === 'S'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>

        <!-- 上傳圖片 -->
        <div class="mb-3">
          <label class="form-label">上傳圖片（最多 5 張）</label>
          <input
            type="file"
            class="form-control"
            multiple
            accept="image/*"
            @change="handleSlideImages"
          />
        </div>

        <!-- 預覽圖片 + 連結輸入 -->
        <div class="row" v-if="form.slides.length">
          <div
            v-for="(img, index) in form.slides"
            :key="index"
            class="col-md-4 mb-3"
          >
            <img :src="img.preview" class="img-fluid border rounded" />
            <div class="mt-2">
              <label class="form-label small"
                >圖片 {{ index + 1 }} 的連結</label
              >
              <input
                v-model="img.url"
                type="text"
                class="form-control"
                placeholder="https://..."
              />
            </div>
          </div>
        </div>
      </div>
      <div v-if="form.type === 'P'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">上傳圖片</label>
          <input
            type="file"
            class="form-control"
            accept="image/*"
            @change="handleBgImages"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">上傳圖片</label>
          <input
            type="file"
            class="form-control"
            accept="image/*"
            @change="handleBgImages"
          />
        </div>
        <div class="mb-3">
          <label class="form-label">上傳圖片</label>
          <input
            type="file"
            class="form-control"
            accept="image/*"
            @change="handleBgImages"
          />
        </div>

        <!-- 預覽圖片 + 連結輸入 -->
        <div class="row" v-if="form.bgImages.length">
          <div
            v-for="(img, index) in form.bgImages"
            :key="index"
            class="col-md-4 mb-3"
          >
            <img :src="img.preview" class="img-fluid border rounded" />
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">送出</button>
    </form>
  </div>
</template>

<script>
import { apiWebPageAdd } from "@/api/adminApi";

export default {
  data() {
    return {
      form: {
        type: "",
        name: "",
        title: "",
        subtitle: "",
        content: "",
        slides: [], // ← 陣列中放物件 { file, preview, url }
        bgImages: [],
      },
    };
  },
  methods: {
    handleSlideImages(e) {
      const files = Array.from(e.target.files);

      // 2. 檢查張數限制
      if (files.length > 5) {
        alert("最多只能上傳 5 張圖片！");
        return;
      }

      this.form.slides.forEach((s) => URL.revokeObjectURL(s.preview));

      // 建立預覽與對應欄位
      this.form.slides = files.map((file) => ({
        file,
        preview: URL.createObjectURL(file),
        url: "", // 預設連結欄位為空
      }));
    },

    handleBgImages(f) {
      const files = Array.form(f.target.files);
    },

    submit() {
      const formData = new FormData();
      formData.append("type", this.form.type);
      formData.append("name", this.form.name);

      if (this.form.type === "T") {
        formData.append("title", this.form.title);
        formData.append("subtitle", this.form.subtitle);
        formData.append("content", this.form.content);
      }

      if (this.form.type === "S") {
        // 上傳圖片
        this.form.slides.forEach((slide, i) => {
          formData.append(`images[${i}]`, slide.file);
          formData.append(`urls[${i}]`, slide.url); // 同時送出網址對應
        });

        formData.forEach((value, key) => {
          console.log(key, value);
        });
      }

      apiWebPageAdd(formData)
        .then((res) => {
          alert("新增成功！");
          this.$router.replace({ name: "web_home" });
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
};
</script>
