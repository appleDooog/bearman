<style>
#map {
  height: 300px;
}
</style>

<template>
  <div class="footer text-white bg-g2">
    <div class="container-fluid">
      <div class="row justify-content-center mx-2">
        <div class="col align-content-center ms-5">
          <div class="row d-block my-5 ms-5">
            <div class="col">
              <span class="h1">遠熊樂器 Bearman Music</span>
              <p class="mt-3 h5">
                電話：04 2359 2181<br />
                地址：407台中市西屯區工業一路200號  <br />
                <br />
                <a
                  href="https://www.instagram.com/bearman_music/"
                  class="text-decoration-none link-light"
                >
                  <i class="fab fa-instagram"></i>
                  IG </a
                >|
                <a
                  href="https://www.facebook.com/bearmanmusic2013/"
                  class="text-decoration-none link-light"
                >
                  <i class="fab fa-facebook-square"></i> FB </a
                >|
                <a
                  href="https://line.me/ti/p/@vuu3135c"
                  class="text-decoration-none link-light"
                >
                  <i class="fab fa-line"></i> LINE </a
                >|
                <a
                  href="https://www.youtube.com/channel/UCc0Fgi8IlrOt1-FiE2JcIKA"
                  class="text-decoration-none link-light"
                  ><i class="fab fa-youtube"></i> YouTube</a
                >
              </p>
            </div>
            <div class="row mt-5">
              <div class="col-2 pe-0 ge-0">客服時間: </div>
              <div class="col text-start g-0">
                週一～週五<br />
                早上8:00～晚上22:00
              </div>
            </div>
          </div>
        </div>
        <div class="col my-5">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "footer",
  methods: {
    map() {
      const map = L.map("map").setView(
        [24.169611658594647, 120.6611577419661],
        18
      );

      const tiles = L.tileLayer(
        "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
          maxZoom: 19,
          attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }
      ).addTo(map);

      var popupHTML = "<div>遠熊音樂</div>";

      L.marker([24.169611658594647, 120.6611577419661])
        .addTo(map)
        .bindPopup(popupHTML)
        .openPopup();
    },
  },
  mounted() {
    this.map();
  },
};
</script>
