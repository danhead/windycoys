const path = require("path");

module.exports = (env) => {
  const prod = env.NODE_ENV === "production";
  return {
    entry: "./src/index.ts",
    mode: prod ? "production" : "development",
    module: {
      rules: [
        {
          test: /\.ts?$/,
          use: "ts-loader",
          exclude: /node_modules/,
        },
      ],
    },
    resolve: {
      extensions: [".ts", ".js"],
    },
    output: {
      filename: "bundle.js",
      path: path.resolve(__dirname, "dist"),
    },
  };
};
