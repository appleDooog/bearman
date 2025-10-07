<template>
  <div class="container mt-4">
    <h2 class="mb-3">LOGO 列表管理</h2>

    <!-- 新增 Logo -->
    <form @submit.prevent="submit" class="card mb-4">
      <div class="card-body">
        <div class="row">
          <!-- 中文名稱 -->
          <div class="col-2">
            <label class="form-label">中文名稱</label>
            <input
              v-model="newLogo.name"
              type="text"
              class="form-control"
              placeholder="輸入名稱"
              required
            />
          </div>

          <!-- URL -->
          <div class="col-4">
            <label class="form-label">URL</label>
            <input
              v-model="newLogo.url"
              type="url"
              class="form-control"
              placeholder="https://example.com"
              required
            />
          </div>

          <!-- 圖片 -->
          <div class="col-4">
            <label class="form-label">LOGO 圖片</label>
            <input type="file" class="form-control" @change="onFileChange" />
          </div>

          <!-- 按鈕靠底 -->
          <div class="col-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">新增</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Logo 列表 -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">LOGO 列表</h3>
      </div>
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>中文名稱</th>
              <th>LOGO</th>
              <th>URL</th>
              <th>建立日期</th>
              <th>建立人</th>
              <th class="w-1">操作</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(logo, index) in logos" :key="index">
              <td>{{ logo.name }}</td>
              <td>
                <img :src="logo.image" alt="logo" class="avatar avatar-md" />
              </td>
              <td>
                <a :href="logo.url" target="_blank">{{ logo.url }}</a>
              </td>
              <td>{{ logo.createTime }}</td>
              <td>{{ logo.created_by }}</td>
              <td>
                <button
                  class="btn btn-danger btn-sm"
                  @click="removeLogo(index)"
                >
                  刪除
                </button>
              </td>
            </tr>
            <tr v-if="logos.length === 0">
              <td colspan="6" class="text-center text-muted">目前沒有資料</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { apiLogosList } from "@/api/adminApi";
import { mapState } from "vuex";

export default {
  data() {
    return {
      newLogo: {
        name: "",
        url: "",
        image: "",
      },
      logos: [],
    };
  },
  computed: {
    // 抓取 auth 模組的 username
    ...mapState("auth", ["username"]),
  },
  methods: {
    async list() {
      try {
        const res = await apiLogosList();
        this.logos = res.data.list;
      } catch (err) {
        console.log(err);
      }
    },
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.newLogo.image = URL.createObjectURL(file);
      }
    },
    submit() {
      try {
        if (this.newLogo.name && this.newLogo.url && this.newLogo.image) {
          const now = new Date().toLocaleString(); // 建立日期
          this.logos.push({
            ...this.newLogo,
            createTime: now,
            created_by: this.username,
          });
          this.newLogo = { name: "", url: "", image: "" };
        } else {
          alert("請填寫完整資料");
        }
      } catch (error) {}
    },
    removeLogo(index) {
      this.logos.splice(index, 1);
    },
  },
};
</script>
