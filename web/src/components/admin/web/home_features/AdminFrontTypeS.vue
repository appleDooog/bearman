<template>
  <table class="table card-table table-vcenter text-nowrap text-center">
    <thead>
      <tr>
        <th>序號</th>
        <th>模組名稱</th>
        <th>是否啟用</th>
        <th>建立時間</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <!-- 主列 -->
      <tr>
        <td>1</td>
        <td>
          <span class="me-3">首頁模組A</span>
          <button class="btn btn-sm btn-outline-primary" @click="toggleExpand">
            {{ expanded ? "收合" : "展開" }}
          </button>
        </td>
        <td><span class="text-success">使用中</span></td>
        <td>2025-05-22</td>
        <!-- 操作按鈕 -->
        <td>
          <div class="btn-list justify-content-center text-center">
            <a
              class="btn btn-primary btn-icon"
              @click="onEdit(list)"
              title="編輯"
            >
              <i class="fa fa-edit ms-1"></i>
            </a>
            <a
              class="btn btn-danger btn-icon"
              @click="onDelete(list)"
              title="刪除"
            >
              <i class="fa fa-trash ms-1"></i>
            </a>
          </div>
        </td>
      </tr>

      <!-- 展開列 -->
      <tr v-if="expanded">
        <td colspan="5" class="bg-light">
          <div class="p-3 rounded border">
            <div class="row row-cols-2" style="height: 100%">
              <!-- 左側兩張圖：上下分半 -->
              <div class="d-flex flex-column" style="height: 100%">
                <div
                  class="col flex-fill d-flex flex-column justify-content-between border-end pe-3"
                >
                  <h3 class="mb-2">左上圖片</h3>
                  <img
                    src="/img/test/bass_lr06.jpg"
                    class="img-fluid rounded"
                  />
                  <p class="mt-1">按鈕文字：了解更多</p>
                </div>
                <div
                  class="col flex-fill d-flex flex-column justify-content-between border-end pe-3"
                >
                  <h3 class="mb-2">左下圖片</h3>
                  <img src="/img/test/lr_bg01.jpg" class="img-fluid rounded" />
                  <p class="mt-1">按鈕文字：點我看看</p>
                </div>
              </div>

              <!-- 右側大圖 -->
              <div class="col d-flex flex-column justify-content-between ps-3">
                <h3 class="mb-2">右側大圖</h3>
                <img
                  src="/img/test/guitar_lr03.jpg"
                  class="img-fluid rounded"
                  style="object-fit: cover; height: 100%"
                />
                <p class="mt-1">按鈕文字：立即購買</p>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      expanded: false,
      module: {
        id: 1,
        title: "首頁模組A",
        active: "Y",
        createTime: "2025-05-22",
        images: {
          topLeft: {
            src: "/img/test/bass_lr06.jpg",
            text: "了解更多",
          },
          bottomLeft: {
            src: "/img/test/lr_bg01.jpg",
            text: "點我看看",
          },
          right: {
            src: "/img/test/guitar_lr03.jpg",
            text: "立即購買",
          },
        },
      },
    };
  },
  methods: {
    toggleExpand() {
      this.expanded = !this.expanded;
    },
  },
};
</script>

<style lang="sass" scoped></style>
