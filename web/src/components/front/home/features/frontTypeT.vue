<template>
  <div class="container">
    <div class="row">
      <div
        class="col-12 text-center"
        style="font-family: 'Noto Serif TC', serif; letter-spacing: 0.5em;"
      >
        <!-- LOGO 圖片 -->
        <img src="@/assets/LOGO/Logo-black-md.png" alt="Logo" height="100px" />

        <!-- 自訂標題插槽 -->
        <p class="h3 my-3">
          <slot name="title">預設標題</slot>
        </p>

        <!-- 自訂內容插槽 -->
        <p class="h1 my-5 lh-lg">
          <slot name="subtitle">
            預設內容：＂從啟蒙到精進，陪伴您音樂成長的每一步<br />
            ——為未來鋪就美好旋律。＂
          </slot>
        </p>
        <p class="h4 my-5 lh-base">
          <slot name='content'>
          我們不僅提供高品質的樂器，同時提供專業的音樂教育和全面的配件支持。<br />
          無論您需要樂器本身還是相關的配件和教學，我們都能提供全方位的解決方案。
          </slot>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "frontTypeT",
};
</script>

