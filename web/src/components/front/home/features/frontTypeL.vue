<template>
  <div class="row justify-content-center">
    <div
      v-for="(logo, index) in logos"
      :key="logo.id || index"
      class="col-auto mx-2 flip-card"
    >
      <div class="circle flip-card-inner">
        <!-- 正面 -->
        <div
          class="circle flip-card-front h-100 w-100 bg-b1 d-flex align-items-center justify-content-center"
        >
          {{ logo.name || "品牌LOGO" }}
        </div>

        <!-- 背面 -->
        <div class="circle flip-card-back">
          <a
            v-if="logo.url"
            :href="logo.url"
            target="_blank"
            rel="noopener noreferrer"
          >
            <img
              :src="logo.image"
              :alt="logo.name || ('Logo ' + (index + 1))"
              class="h-100 w-100 img-fluid"
            />
          </a>
          <img
            v-else
            :src="logo.image"
            :alt="logo.name || ('Logo ' + (index + 1))"
            class="h-100 w-100 img-fluid"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "frontTypeL",
  props: {
    logos: {
      type: Array,
      default: () => [],
    },
  },
};
</script>
