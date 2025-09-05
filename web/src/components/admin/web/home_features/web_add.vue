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
          <option value="P">圖片選項區塊</option>
        </select>
      </div>
      <!-- type_T start -->
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
      <!-- type_T end -->
      <!-- type_S start -->
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
        <!-- 預覽圖片 + 連結輸入（S：卡片版） -->
        <div class="row row-cards" v-if="form.slides.length">
          <div
            v-for="(img, index) in form.slides"
            :key="index"
            class="col-md-4"
          >
            <div class="card">
              <div class="card-body position-relative">
                <!-- 右上角刪除按鈕（統一樣式） -->
                <button
                  type="button"
                  class="btn btn-icon btn-danger position-absolute top-0 end-0 m-2"
                  title="刪除這張圖片"
                  @click="removeSlide(index)"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>

                <!-- 16:9 預覽框，保持比例 -->
                <div class="ratio ratio-16x9">
                  <img
                    :src="img.preview"
                    class="img-fluid border rounded object-fit-contain"
                    alt="預覽圖片"
                  />
                </div>

                <!-- 連結輸入 -->
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
        </div>
        <!-- 預覽圖片結束 -->
      </div>
      <!-- type_S end -->
      <!-- type_P start -->
      <div v-if="form.type === 'P'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>

        <div class="row">
          <!-- 左上 lt -->
          <div class="col-md-4 mb-3">
            <label class="form-label">左上圖片</label>
            <input
              type="file"
              class="form-control"
              accept="image/*"
              @change="setPImage('lt', $event)"
            />

            <div class="card mt-2" v-if="form.p.lt.preview">
              <div class="card-body position-relative">
                <button
                  type="button"
                  class="btn btn-icon btn-danger position-absolute button-0 end-0 me-3 mt-2"
                  title="刪除這張圖片"
                  @click="removePImage('lt')"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>

                <div class="ratio ratio-16x9">
                  <img
                    :src="form.p.lt.preview"
                    class="img-fluid border rounded object-fit-contain"
                    alt="左上預覽"
                  />
                </div>

                <div class="mt-2">
                  <label class="form-label small">左上圖片連結</label>
                  <input
                    v-model="form.p.lt.url"
                    type="text"
                    class="form-control"
                    placeholder="https://..."
                  />
                </div>
              </div>
            </div>
          </div>
          <!-- 左下 lb -->
          <div class="col-md-4 mb-3">
            <label class="form-label">左下圖片</label>
            <input
              type="file"
              class="form-control"
              accept="image/*"
              @change="setPImage('lb', $event)"
            />

            <div class="card mt-2" v-if="form.p.lb.preview">
              <div class="card-body position-relative">
                <button
                  type="button"
                  class="btn btn-icon btn-danger position-absolute button-0 end-0 me-3 mt-2"
                  title="刪除這張圖片"
                  @click="removePImage('lb')"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>

                <div class="ratio ratio-16x9">
                  <img
                    :src="form.p.lb.preview"
                    class="img-fluid border rounded object-fit-contain"
                    alt="左下預覽"
                  />
                </div>

                <div class="mt-2">
                  <label class="form-label small">左下圖片連結</label>
                  <input
                    v-model="form.p.lb.url"
                    type="text"
                    class="form-control"
                    placeholder="https://..."
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- 右側 large -->
          <div class="col-md-4 mb-3">
            <label class="form-label">右側大圖</label>
            <input
              type="file"
              class="form-control"
              accept="image/*"
              @change="setPImage('right', $event)"
            />

            <div class="card mt-2" v-if="form.p.right.preview">
              <div class="card-body position-relative">
                <button
                  type="button"
                  class="btn btn-icon btn-danger position-absolute button-0 end-0 me-3 mt-2"
                  title="刪除這張圖片"
                  @click="removePImage('right')"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>

                <div class="ratio ratio-16x9">
                  <img
                    :src="form.p.right.preview"
                    class="img-fluid border rounded object-fit-contain"
                    alt="右側預覽"
                  />
                </div>

                <div class="mt-2">
                  <label class="form-label small">右側圖片連結</label>
                  <input
                    v-model="form.p.right.url"
                    type="text"
                    class="form-control"
                    placeholder="https://..."
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- type_P end -->

      <!-- type_L start -->
      <div v-if="form.type === 'L'">
        <div class="mb-3">
          <label class="form-label">區塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>

        <div class="mb-3">
          <label class="form-label">選擇要顯示的品牌</label>
          <div v-for="logo in logos" :key="logo.id" class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              :value="logo.id"
              v-model="form.logo_ids"
            />
            <label class="form-check-label">
              <img
                :src="logo.image"
                alt=""
                style="height: 30px; margin-right: 5px"
              />
              {{ logo.name }}
            </label>
          </div>
        </div>
      </div>
      <!-- type_L end -->

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
        slides: [],
        p: {
          lt: { file: null, preview: "", url: "" },
          lb: { file: null, preview: "", url: "" },
          right: { file: null, preview: "", url: "" },
        },
        logo_ids: [], // ✅ 勾選的品牌 ID
      },
      logos: [], // ✅ 從 apiLogosList() 撈品牌清單

      maxSlides: 5,
    };
  },

  methods: {
    /* ---------------- S：輪播 ---------------- */
    removeSlide(index) {
      const s = this.form.slides[index];
      if (s?.preview?.startsWith("blob:")) URL.revokeObjectURL(s.preview);
      this.form.slides.splice(index, 1);
    },

    handleSlideImages(e) {
      const files = Array.from(e.target.files || []);
      if (!files.length) return;

      if (files.length > this.maxSlides) {
        alert(`最多只能上傳 ${this.maxSlides} 張圖片！`);
        e.target.value = "";
        return;
      }

      // 釋放舊 blob
      this.form.slides.forEach((s) => {
        if (s.preview?.startsWith("blob:")) URL.revokeObjectURL(s.preview);
      });

      // 重建預覽
      this.form.slides = files.map((file) => ({
        file,
        preview: URL.createObjectURL(file),
        url: "",
      }));

      e.target.value = "";
    },

    /* ---------------- P：圖片選項（固定三槽） ---------------- */
    setPImage(slot, e) {
      const file = (e.target.files && e.target.files[0]) || null;
      if (!file) return;

      const cur = this.form.p[slot] || { file: null, preview: "", url: "" };

      // 釋放舊 blob
      if (cur.preview?.startsWith("blob:")) URL.revokeObjectURL(cur.preview);

      // 建立新預覽，保留原本 url
      this.form.p[slot] = {
        file,
        preview: URL.createObjectURL(file),
        url: cur.url || "",
      };

      e.target.value = "";
    },

    removePImage(slot) {
      const cur = this.form.p?.[slot];
      if (!cur) return;

      if (cur.preview?.startsWith("blob:")) URL.revokeObjectURL(cur.preview);
      this.form.p[slot] = { file: null, preview: "", url: "" };
    },

    /* ---------------- L：Logo 多圖 ---------------- */
    handleLogos(e) {
      const files = Array.from(e.target.files || []);
      if (!files.length) return;

      // 新增到 logos 陣列
      files.forEach((file) => {
        this.form.logos.push({
          file,
          preview: URL.createObjectURL(file),
          url: "",
        });
      });

      e.target.value = "";
    },

    removeLogo(index) {
      const logo = this.form.logos[index];
      if (logo.preview?.startsWith("blob:")) URL.revokeObjectURL(logo.preview);
      this.form.logos.splice(index, 1);
    },

    /* ---------------- 送出 ---------------- */
    submit() {
      const fd = new FormData();
      fd.append("type", this.form.type);
      fd.append("name", this.form.name || "");

      if (this.form.type === "T") {
        fd.append("title", this.form.title || "");
        fd.append("subtitle", this.form.subtitle || "");
        fd.append("content", this.form.content || "");
      }

      if (this.form.type === "S") {
        this.form.slides.forEach((slide, i) => {
          if (slide.file) fd.append(`images[${i}]`, slide.file);
          fd.append(`urls[${i}]`, slide.url || "");
        });
      }

      if (this.form.type === "P") {
        const { lt, lb, right } = this.form.p;
        const arr = [lt, lb, right];

        arr.forEach((slot, i) => {
          if (slot.file) fd.append(`images[${i}]`, slot.file);
          fd.append(`urls[${i}]`, slot.url || "");
        });
      }

      if (this.form.type === "L") {
        this.form.logo_ids.forEach((id, i) => {
          fd.append(`logo_ids[${i}]`, id);
        });
      }

      // 偵錯用（需要可開）
      // for (const [k, v] of fd.entries()) console.log(k, v);

      apiWebPageAdd(fd)
        .then(() => {
          alert("新增成功！");
          this.$router.replace({ name: "web_home" });
        })
        .catch((err) => {
          console.error(err);
          alert(err?.response?.data?.message || err.message || "送出失敗");
        });
    },
  },

  // Vue 3 Options API 用 beforeUnmount；若是 Vue 2 才用 beforeDestroy
  beforeUnmount() {
    // 釋放 S 的 blob
    this.form.slides.forEach((s) => {
      if (s.preview?.startsWith("blob:")) URL.revokeObjectURL(s.preview);
    });
    // 釋放 P 的 blob
    Object.values(this.form.p).forEach((slot) => {
      if (slot.preview?.startsWith("blob:")) URL.revokeObjectURL(slot.preview);
    });
  },
};
</script>
