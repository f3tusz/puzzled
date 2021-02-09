import WebFont from "webfontloader";

export default {
  init() {
    WebFont.load({
      google: {
        families: ["Work Sans:300,400,500,700"]
      }
    });
  }
};
