const path = require("path")
const common = require("./webpack.common")
const { merge } = require("webpack-merge")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = merge(common, {
  mode: "development",
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "dist/js")
  },
  plugins: [new MiniCssExtractPlugin({ filename: "../css/[name].css" })]
})
