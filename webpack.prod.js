const path = require("path")
const TerserPlugin = require("terser-webpack-plugin")
const common = require("./webpack.common")
const { merge } = require("webpack-merge")

module.exports = merge(common, {
  mode: "production",
  output: {
    filename: "/js/[name].js",
    path: path.resolve(__dirname, "dist/js")
  },
  optimization: {
    minimizer: [new TerserPlugin()]
  }
})
