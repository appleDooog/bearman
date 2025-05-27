<template>
  <table class="table card-table table-vcenter text-nowrap">
    <thead>
      <tr>
        <th>主標題</th>
        <th>次標題</th>
        <th>內容</th>
        <th>是否啟用</th>
        <th>建立時間</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <template v-for="item in list" :key="item.id">
        <tr>
          <td>{{ item.title }}</td>
          <td>
            <div v-html="item.subtitle"></div>
          </td>
          <td>
            <div class="text-wrap" v-html="item.content"></div>
          </td>
          <td
            :class="{
              'text-danger': item.active === 'Y',
              'text-secondary': item.active !== 'Y',
            }"
          >
            {{ item.active === "Y" ? "使用中" : "停用" }}
          </td>
          <td>{{ item.createTime }}</td>
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
      </template>
    </tbody>
  </table>
</template>

<script>
import { apiTypeTList } from "@/api/adminApi";

export default {
  name: "AdminTypeT",
  data() {
    return {
      list: [],
    };
  },
  methods: {
    async apiTypeTList() {
      try {
        const res = await apiTypeTList();
        this.list = res.data.list;
        console.log(this.list);
      } catch (err) {
        console.log(err);
      }
    },
  },
  created() {
    this.apiTypeTList();
  },
};
</script>

<style lang="scss" scoped></style>
