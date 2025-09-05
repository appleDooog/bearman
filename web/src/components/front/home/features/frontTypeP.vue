<template>
  <div class="container">
    <div class="row row-cols-2 my-3">
      <!-- 左側兩張 -->
      <div class="col d-flex flex-column text-center">
        <div
          v-for="(img, index) in images.slice(0, 2)"
          :key="'left-' + index"
          class="bg-cover r-box rounded-5 mb-3"
          :style="{ backgroundImage: `url(${img.src})`, height: '250px' }"
        >
          <div class="roller">
            <a :href="img.url  || 'javascript:void(0)'" class="btn bg-g1 text-white">更多資訊</a>
          </div>
        </div>
      </div>

      <!-- 右側一張 -->
      <div class="col align-content-center text-center">
        <div
          v-if="images[2]"
          class="bg-cover h-100 r-box rounded-5"
          :style="{ backgroundImage: `url(${images[2].src})` }"
        >
          <div class="roller">
            <a :href="images[2].url  || 'javascript:void(0)'" class="btn bg-g1 text-white">更多資訊</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
      default: () => [],
    },
  },
};
</script>

<style scoped>
.bg-cover {
  background-size: cover;
  background-position: center;
}
.r-box {
  position: relative;
}
.roller {
  position: absolute;
  left: -50%;
  transform: translateX(-50%);
}
</style>
