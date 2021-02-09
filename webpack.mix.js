const mix = require("laravel-mix");
const webpack = require("webpack");

require("dotenv").config();

// The theme name should be located in your .env file
const THEME_NAME = process.env.THEME_NAME,
  PROXY = process.env.PROXY,
  THEME_DIRECTORY = `webroot/wp-content/themes/${THEME_NAME}`,
  ASSETS_DIR = `${THEME_DIRECTORY}/assets`,
  BUILD_DIR = `${ASSETS_DIR}/build`,
  // Add into the array the vendor libraries you're using:
  VENDOR_LIBRARIES = ["jquery"],
  BUILD_MESSAGE = `We are building the ${THEME_NAME} theme`;

mix
  .setPublicPath(BUILD_DIR)
  .js(`${ASSETS_DIR}/js/main.js`, BUILD_DIR)
  .extract(VENDOR_LIBRARIES)
  .sass(`${ASSETS_DIR}/scss/style.scss`, BUILD_DIR)
  .options({ processCssUrls: false })
  .sass(`${ASSETS_DIR}/scss/style-editor.scss`, BUILD_DIR)
  .options({ processCssUrls: false })
  .sourceMaps(true, "source-map")
  .browserSync(PROXY);

mix.browserSync({
  proxy: PROXY,
  files: [
    `${BUILD_DIR}/master.css`,
    `${BUILD_DIR}/main.js`,
    `${THEME_DIRECTORY}/**/*.+(html|php)`
  ],
  notify: {
    styles: {
      top: "auto",
      bottom: "0"
    }
  }
});

mix.webpackConfig({
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery"
    })
  ]
});

if (mix.inProduction()) {
  console.log(BUILD_MESSAGE);
  mix
    .minify([
      `${BUILD_DIR}/master.css`,
      `${BUILD_DIR}/manifest.js`,
      `${BUILD_DIR}/vendor.js`,
      `${BUILD_DIR}/main.js`
    ])
    .version([]);
}