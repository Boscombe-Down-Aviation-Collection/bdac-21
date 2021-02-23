const TerserPlugin = require("terser-webpack-plugin")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
  entry: {
    scripts: "./inc/js/scripts.js",
    vendors: "./inc/js/vendors.js",
    bootstrap: "./inc/scss/bootstrap.scss",
    main: "./inc/scss/main.scss"
  },
  optimization: {
    minimizer: [new TerserPlugin()]
  },
  plugins: [new MiniCssExtractPlugin({ filename: "[name].css" })],
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
