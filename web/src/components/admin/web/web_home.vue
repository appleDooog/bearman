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
          <li class="nav-item">
            <a href="#typeS" class="nav-link" data-bs-toggle="tab"
              >圖片按鈕連結區塊</a
            >
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <!-- Tab1 Start-->
          <div class="tab-pane active show" id="frontHomeSeq">
            <form @submit.prevent="">
              <h4>首頁版面排序</h4>
              <div class="table-responsive">
                <table
                  class="table table-hover table-bordered text-center align-middle"
                >
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>ID</th>
                      <th>名稱</th>
                      <th>首頁排序</th>
                      <th>類型</th>
                      <th>狀態</th>
                      <th>建立時間</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="list in item_list" :key="list.id">
                      <td>{{ list.id }}</td>
                      <td class="text-start">{{ list.title }}</td>
                      <td>{{ list.seq }}</td>
                      <td>
                        <span class="badge">{{
                          list.type === "P"
                            ? "輪播幻燈片"
                            : list.type === "T"
                              ? "文案區塊"
                              : list.type === "S"
                                ? "圖片按鈕連結區塊"
                                : "LOGO區塊"
                        }}</span>
                      </td>
                      <td class="justify-content-center">
                        <label class="form-check form-switch">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            v-model="list.active"
                            true-value="Y"
                            false-value=""
                          />
                        </label>
                      </td>
                      <td>{{ list.createTime }}</td>
                      <td>
                        <div
                          class="btn-list justify-content-center text-center"
                        >
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
                  </tbody>
                </table>
              </div>
            </form>
          </div>
          <!-- Tab1 End -->

          <!-- Tab2 Start-->
          <div class="tab-pane" id="typeT">
            <h4>文案內容設定</h4>
            <form @submit.prevent="">
              <AdminFrontTypeT></AdminFrontTypeT>
            </form>
          </div>
          <!-- Tab2 End -->

          <!-- Tab3 Start-->
          <div class="tab-pane" id="typeS">
            <h4>圖片按鈕連結區塊</h4>
            <AdminFrontTypeS></AdminFrontTypeS>
          </div>
          <!-- Tab3 End -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { apiWebPageList } from "@/api/adminApi";
import AdminFrontTypeT from "./home_features/AdminFrontTypeT.vue";
import AdminFrontTypeS from "./home_features/AdminFrontTypeS.vue";

export default {
  components: {
    AdminFrontTypeT,
    AdminFrontTypeS,
  },
  data() {
    return {
      item_list: {
        id: "",
        title: "",
        seq: "",
        type: "",
        active: "",
        createTime: "",
        items: [],
      },
    };
  },
  methods: {
    submitTypeT() {
      console.log("送出主標題：", this.item_typeT.title);
    },
    async getList() {
      try {
        const res = await apiWebPageList();
        this.item_list = res.data.list;
      } catch (err) {
        console.log(err);
      }
    },
  },
  created() {
    this.getList();
  },
};
</script>

<style lang="scss" scoped></style>
