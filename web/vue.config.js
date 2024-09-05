const { defineConfig } = require("@vue/cli-service");
const webpack = require("webpack");

module.exports = defineConfig({
  configureWebpack: {
    plugins: [
      new webpack.DefinePlugin({
        // Vue CLI is in maintenance mode, and probably won't merge my PR to fix this in their tooling
        // https://github.com/vuejs/vue-cli/pull/7443
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: "false",
      }),
    ],
  },
});

module.exports = {
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
      template: "public/index.html",
      // output as dist/index.html
      filename: "admin.html",
      title: "Admin",
    },
  },
};
