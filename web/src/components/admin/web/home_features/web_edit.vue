<template>
  <div class="container mt-4">
    <h3>編輯首頁板塊</h3>
    <form @submit.prevent="submit">
      <!-- 類型 -->
      <div class="mb-3">
        <label class="form-label">類型</label>
        <select v-model="form.type" class="form-select" disabled>
          <option value="T">文案區塊</option>
          <option value="S">輪播區塊</option>
          <option value="P">圖片選項區塊</option>
          <option value="L">品牌 LOGO 區塊</option>
        </select>
      </div>

      <!-- type_T -->
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

      <!-- type_S -->
      <div v-if="form.type === 'S'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>

        <div class="row row-cards" v-if="form.slides.length">
          <div
            v-for="(img, index) in form.slides"
            :key="index"
            class="col-md-4"
          >
            <div class="card">
              <div class="card-body">
                <img :src="img.preview" class="img-fluid border rounded" />
                <input
                  v-model="img.url"
                  type="text"
                  class="form-control mt-2"
                  placeholder="圖片連結"
                />
                <!-- ✅ 重新上傳 -->
                <input
                  type="file"
                  class="form-control mt-2"
                  accept="image/*"
                  @change="onReplaceSlide($event, index)"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- type_P -->
      <div v-if="form.type === 'P'">
        <div class="mb-3">
          <label class="form-label">版塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>
        <div class="row">
          <div class="col-md-4" v-for="(slot, key) in form.p" :key="key">
            <label class="form-label">{{ key }} 圖片</label>
            <img
              v-if="slot.preview"
              :src="slot.preview"
              class="img-fluid border rounded"
            />
            <input
              v-model="slot.url"
              type="text"
              class="form-control mt-2"
              placeholder="圖片連結"
            />
            <!-- ✅ 重新上傳 -->
            <input
              type="file"
              class="form-control mt-2"
              accept="image/*"
              @change="onReplacePImage($event, key)"
            />
          </div>
        </div>
      </div>

      <!-- type_L -->
      <div v-if="form.type === 'L'">
        <div class="mb-3">
          <label class="form-label">區塊名稱</label>
          <input v-model="form.name" type="text" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label">品牌 LOGO</label>
          <div v-for="logo in logos" :key="logo.id" class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              :value="logo.id"
              v-model="form.logo_ids"
            />
            <label class="form-check-label">
              <img :src="logo.image" style="height: 30px; margin-right: 5px" />
              {{ logo.name }}
            </label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>
</template>

<script>
import { apiWebPageDetail, apiWebPageUpdate } from "@/api/adminApi";

export default {
  props: ["id"],
  data() {
    return {
      form: {
        type: "",
        name: "",
        title: "",
        subtitle: "",
        content: "",
        slides: [], // [{preview, url, file}]
        p: {
          lt: { preview: "", url: "", file: null },
          lb: { preview: "", url: "", file: null },
          right: { preview: "", url: "", file: null },
        },
        logo_ids: [],
      },
      logos: [],
    };
  },
  created() {
    this.getDetail();
  },
  methods: {
    async getDetail() {
      try {
        const res = await apiWebPageDetail(this.id);
        const data = res.data.data;

        this.form.type = data.type;
        this.form.name = data.title;

        if (data.type === "T") {
          this.form.title = data.items.title;
          this.form.subtitle = data.items.subtitle;
          this.form.content = data.items.content;
        }

        if (data.type === "S") {
          try {
            this.form.slides = JSON.parse(data.items.image_data).map((img) => ({
              preview: `${process.env.VUE_APP_API_BASE.replace("/api/admin", "")}/${img.src}`,
              url: img.url,
              file: null,
              oldSrc: img.src, // ✅ 保留舊圖路徑
            }));
          } catch (e) {
            this.form.slides = [];
          }
        }

        if (data.type === "P") {
          try {
            const imgs = JSON.parse(data.items.image_data);
            ["lt", "lb", "right"].forEach((key, i) => {
              if (imgs[i]) {
                this.form.p[key] = {
                  preview: `${process.env.VUE_APP_API_BASE.replace("/api/admin", "")}/${imgs[i].src}`,
                  url: imgs[i].url,
                  file: null,
                  oldSrc: imgs[i].src, // ✅ 保留舊圖路徑
                };
              }
            });
          } catch (e) {}
        }

        if (data.type === "L") {
          this.form.logo_ids = data.items.logos.map((l) => l.id);
          this.logos = data.items.logos;
        }
      } catch (err) {
        console.error("讀取失敗", err);
      }
    },

    // ✅ 換 S 的圖片
    onReplaceSlide(e, index) {
      const file = e.target.files[0];
      if (!file) return;
      const newPreview = URL.createObjectURL(file);
      this.form.slides[index] = {
        ...this.form.slides[index],
        file,
        preview: newPreview,
      };
    },

    // ✅ 換 P 的圖片
    onReplacePImage(e, key) {
      const file = e.target.files[0];
      if (!file) return;
      const newPreview = URL.createObjectURL(file);
      this.form.p[key] = {
        ...this.form.p[key],
        file,
        preview: newPreview,
      };
    },

    // ✅ 送出
    async submit() {
      try {
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
            if (slide.file) {
              fd.append(`images[${i}]`, slide.file); // 新圖
            } else {
              fd.append(`oldImages[${i}]`, slide.oldSrc || ""); // 舊圖
            }
            fd.append(`urls[${i}]`, slide.url || "");
          });
        }

        if (this.form.type === "P") {
          ["lt", "lb", "right"].forEach((key, i) => {
            const slot = this.form.p[key];
            if (slot.file) {
              fd.append(`images[${i}]`, slot.file); // 新圖
            } else {
              fd.append(`oldImages[${i}]`, slot.oldSrc || ""); // 舊圖
            }
            fd.append(`urls[${i}]`, slot.url || "");
          });
        }

        if (this.form.type === "L") {
          this.form.logo_ids.forEach((id, i) => {
            fd.append(`logo_ids[${i}]`, id);
          });
        }

        // 偵錯用
        // for (let [k, v] of fd.entries()) console.log(k, v);

        await apiWebPageUpdate(this.id, fd);
        alert("更新成功！");
        this.$router.replace({ name: "web_home" });
      } catch (err) {
        console.error(err);
        alert(err?.response?.data?.message || err.message || "更新失敗");
      }
    },
  },
};
</script>
