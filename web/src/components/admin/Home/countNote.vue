<template>
  <div class="countNote d-flex justify-content-center align-items-center text-center rounded-5">
    <!-- 圖示 -->
    <div class="icon-container mb-2" :class="bg_color" v-if="icon">
      <i class="fa-solid text-white" :class="icon"></i>
    </div>

    <!-- 內容 -->
    <div class="content text-nowrap">
      <div class="value mb-1" :class="color"><slot></slot></div>
      <div class="title">{{ title }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "countNote",
  props: {
    title: {
      type: String,
      default: "會員人數",
    },
    bg_color: {
      type: String,
      default: "bg-yellow",
    },
    color: {
      type: String,
      default: "text-yellow",
    },
    icon: {
      type: String,
      default: "fa-people-group",
    },
  },
};
</script>

<style>
.countNote {
  font-size: 1rem; /* 基礎字體大小 */
  gap: 0.5rem; /* 增加內部元素間距 */
  background-color: #f8f9fa;
}

.countNote .icon-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px; /* 調整圖示容器大小 */
  height: 50px;
  border-radius: 50%; /* 保持圓形容器 */
  font-size: 1.25rem; /* 圖示大小 */
}

.countNote .content {
  text-align: center;
}

.countNote .value {
  font-size: 1.25rem; /* 數值字體大小 */
  font-weight: bold;
}

.countNote .title {
  font-size: 1rem; /* 標題字體大小 */
  color: #6c757d; /* 默認灰色 */
}

/* RWD 支持 */
@media (max-width: 768px) {
  .countNote {
    font-size: 1rem; /* 手機上保持一致 */
    gap: 0.5rem;
  }

  .countNote .icon-container {
    width: 40px; /* 手機上稍微縮小圖示容器 */
    height: 40px;
    font-size: 1rem; /* 縮小圖示大小 */
  }

  .countNote .value {
    font-size: 1.125rem; /* 略微縮小數值 */
  }

  .countNote .title {
    font-size: 0.875rem; /* 略微縮小標題 */
  }
}
</style>
