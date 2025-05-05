<template>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
          <li class="nav-item">
            <a href="#frontHomeSeq" class="nav-link active" data-bs-toggle="tab"
              >版面排序</a
            >
          </li>
          <li class="nav-item">
            <a href="#typeT" class="nav-link" data-bs-toggle="tab">文案版面</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <!-- Tab1 Start-->
          <div class="tab-pane" id="frontHomeSeq">
            <form @submit.prevent="">
              <h4>首頁版面排序</h4>
              <div>調整首頁排序，總之去參考老師的Code</div>
            </form>
          </div>
          <!-- Tab1 End -->

          <!-- Tab2 Start-->
          <div class="tab-pane active show" id="typeT">
            <h4>文案內容設定</h4>
            <form @submit.prevent="">
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th>主標題</th>
                    <th>次標題</th>
                    <th>內容</th>
                    <th>是否啟用</th>
                    <th>建立時間</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        v-model="item_typeT.title"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        v-model="item_typeT.subtitle"
                      />
                    </td>
                    <td>
                      <textarea
                        class="form-control"
                        v-model="item_typeT.content"
                        rows="3"
                      ></textarea>
                    </td>
                    <td>
                      <label class="form-check form-switch">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          v-model="item_typeT.active"
                        />
                      </label>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
          <!-- Tab2 End -->

          <!-- Tab3 Start-->
          <div class="tab-pane" id="typeP">
            <h4>圖片板塊內容設定</h4>
            <div>只能設定文字內容唷</div>
          </div>
          <!-- Tab3 End -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      item_typeT: {
        title: "",
        subtitle: "",
        content: "",
        active: true,
      },
    };
  },
  methods: {
    submitTypeT() {
      console.log("送出主標題：", this.item_typeT.title);
    },
  },
};
</script>

<style lang="scss" scoped></style>
