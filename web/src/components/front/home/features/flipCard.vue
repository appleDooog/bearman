<template>
  <div class="col mx-1 flip-card">
    <div class="circle flip-card-inner">
      <div class="circle flip-card-front h-100 w-100 bg-b1">
        <slot name="front">{{ name }}</slot>
      </div>
      <div class="circle flip-card-back">
        <img
          :src="backImage"
          :alt="altText"
          srcset=""
          class="h-100 w-100 img-fluid"
        />
      </div>
    </div>
  </div>
</template>

<script>
import DefaultLogo from "@/assets/LOGO/Logo-black-md.png";

export default {
  name: "flipCard",
  props: {
    backImage: {
      type: String,
      default: () => DefaultLogo,
    },
    altText: {
      type: String,
      default: "Image",
    },
    name: {
      type: String,
      default: "品牌LOGO",
    },
  },
};
</script>
