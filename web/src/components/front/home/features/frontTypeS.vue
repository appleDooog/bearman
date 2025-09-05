<template>
  <div class="container-fluid">
    <div class="row">
  <div class="slick-wrapper">
    <div class="slider center">
      <div v-for="(img, index) in images" :key="index" class="slide-item">
        <a
          :href="img.url || 'javascript:void(0)'"
          rel="noopener noreferrer"
        >
          <img :src="img.src" class="img-slide" :alt="'Slide ' + (index + 1)" />
        </a>
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
  mounted() {
    this.$nextTick(() => {
      $(".slider.center").slick({
        centerMode: true,
        centerPadding: "40px",
        slidesToShow: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              centerPadding: "20px",
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              centerPadding: "10px",
              slidesToShow: 1,
            },
          },
        ],
      });
    });
  },
};
</script>

<style>
/* 讓 slick 容器有定位基準 */
.slick-wrapper {
  position: relative;
  padding: 30px 0;
}

/* 圖片滑動容器 */
.slider.center {
  width: 100%;
}

/* 每張圖片包裹容器 */
.slide-item {
  padding: 10px;
  box-sizing: border-box;
}

/* 圖片樣式 */
.img-slide {
  width: 90%;
  aspect-ratio: 16 / 9;
  object-fit: cover;
  border-radius: 1.5rem;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  transition: transform 0.4s ease;
}

.img-slide:hover {
  transform: scale(1.02);
}

/* 點點樣式 */

.slick-dots li button:before {
  font-size: 12px;
  color: #f5d6dc;
  opacity: 0.8;
}

.slick-dots li.slick-active button:before {
  color: #2bb1a6;
  opacity: 1;
}

/* 箭頭樣式 */
.slick-prev,
.slick-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 1000;
  width: 40px;
  height: 40px;
  background-color: rgba(245, 214, 220, 0.85);
  border-radius: 50%;
  border: none;
  display: flex !important;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.slick-prev {
  left: 10px;
}

.slick-next {
  right: 10px;
}

.slick-prev:hover,
.slick-next:hover {
  background-color: #f5d6dc;
}
</style>
