const { defineConfig } = require("@vue/cli-service");
const webpack = require("webpack");

module.exports = defineConfig({
  configureWebpack: {
    plugins: [
      new webpack.DefinePlugin({
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false, // 明確定義旗標
      }),
    ],
  },
  pages: {
    index: {
      entry: "src/main.js",
      // the source template
      template: "public/index.html",
      // output as dist/index.html
      filename: "index.html",
      title: "BearMan 遠雄音樂",
    },
    admin: {
      entry: "src/mainAdmin.js",
      // the source template
      template: "public/adminIndex.html",
      // output as dist/admin/index.html
      filename: "admin/index.html",
      title: "Admin",
    },
  },
});
