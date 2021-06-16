const path = require("path")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
  entry: {
    scripts: "./inc/js/scripts.js",
    vendors: "./inc/js/vendors.js",
    bootstrap: "./inc/scss/bootstrap.scss",
    main: "./inc/scss/main.scss"
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
      },
      {
        test: /\.(png|jpe?g|gif)$/i,
        use: {
          loader: "file-loader",
          options: {
            entry: path.resolve(__dirname, "inc/img"),
            name: "[name].[ext]",
            outputPath: "../img/"
          }
        }
      }
    ]
  },
  watch: true
}
