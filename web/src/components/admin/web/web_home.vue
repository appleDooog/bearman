<template>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="display-6 strong">首頁版面排序</div>
      </div>
      <div class="card-body">
        <RouterLink :to="{ name: 'web_home_add' }">
          <div class="btn btn-primary mb-3">新 增 版 塊</div>
        </RouterLink>
        <div class="table-responsive">
          <table
            class="table table-hover table-bordered text-center align-middle"
          >
            <thead class="bg-primary text-white">
              <tr>
                <th class="d-none">ID</th>
                <th>首頁排序</th>
                <th>名稱</th>
                <th>類型</th>
                <th>啟用狀態</th>
                <th>建立時間</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="list in item_list" :key="list.id">
                <td class="d-none">{{ list.id }}</td>
                <td>{{ list.seq }}</td>
                <td class="text-start">{{ list.title }}</td>
                <td>
                  <span class="badge">
                    {{
                      list.type === "S"
                        ? "輪播幻燈片"
                        : list.type === "T"
                          ? "文案區塊"
                          : list.type === "P"
                            ? "圖片按鈕連結區塊"
                            : "LOGO區塊"
                    }}
                  </span>
                </td>
                <td class="d-flex p-3 justify-content-center">
                  <label class="form-check form-switch">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      v-model="list.active"
                      true-value="Y"
                      false-value=""
                      @change="active_toggle(list)"
                    />
                  </label>
                </td>
                <td>{{ list.createTime }}</td>
                <td>
                  <div class="btn-list justify-content-center text-center">
                    <RouterLink
                      :to="{ name: 'web_home_edit', params: { id: list.id } }"
                      class="btn btn-success btn-icon"
                    >
                      <i class="fa fa-edit ms-1"></i>
                    </RouterLink>

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
      </div>
    </div>
  </div>
</template>

<script>
import {
  apiWebPageList,
  apiWebActiveChange,
  apiWebDelete,
} from "@/api/adminApi";

export default {
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
    async getList() {
      try {
        const res = await apiWebPageList(); // ✅ 正確用法
        this.item_list = res.data.list;
      } catch (err) {
        console.log(err);
      }
    },
    async active_toggle(item) {
      try {
        const res = await apiWebActiveChange({
          id: item.id,
          active: item.active,
        }).then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.status === "Y" ? "已啟用" : "已停用",
            showConfirmButton: true,
          }).then(() => {
            this.$router.replace({ name: "web_home" });
          });
        });
      } catch (err) {
        console.error("更新失敗", err);
        // 可選：回復狀態
        console.log("送出的資料：", item.id, item.active);
        item.active = item.active === "Y" ? "" : "Y";
      }
    },
    async onDelete(item) {
      const result = await Swal.fire({
        icon: "warning",
        title: "確定要刪除嗎？",
        showCancelButton: true,
        confirmButtonText: "刪除",
        cancelButtonText: "取消",
      });

      if (result.isConfirmed) {
        try {
          await apiWebDelete(item.id); // 呼叫你的刪除 API
          Swal.fire({
            icon: "success",
            title: "刪除成功",
            timer: 1500,
          });
          this.getList(); // ✅ 刪除後直接刷新列表
        } catch (err) {
          console.error("刪除失敗", err);
        }
      }
    },
  },
  created() {
    this.getList();
  },
};
</script>

<style lang="scss" scoped></style>
