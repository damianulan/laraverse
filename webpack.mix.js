// webpack.mix.js

let mix = require("laravel-mix");
require("laravel-mix-string-replace");
require("dotenv").config();

// const locale = process.env.APP_LOCALE;
// const replace_js = {
//   test: /\.js$/,
//   loader: "string-replace-loader",
//   options: {
//     search: "ENV_LOCALE",
//     replace: JSON.stringify(locale),
//   },
// };

mix.webpackConfig((webpack) => {
  return {
    plugins: [],
  };
});

const scssOptions = {
  outputStyle: "compressed",
};

// misc

// base-theme
mix.js("resources/js/app.js", "public/build/js").version();

mix
  .sass("resources/sass/app.scss", "public/build/app.min.css", {
    sassOptions: scssOptions,
  })
  .version();
