const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
  entry: {
    scripts: "./inc/js/scripts.js",
    vendors: "./inc/js/vendors.js",
    bootstrap: "./inc/scss/bootstrap.scss",
    main: "./inc/scss/main.scss"
  },
  plugins: [new MiniCssExtractPlugin({ filename: "../css/[name].css" })],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
      }
    ]
  },
  watch: true
}
