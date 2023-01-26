const bs = require("browser-sync").create();

bs.watch("dist/styles.css", (e) => {
  if (e === "change") {
    bs.reload("styles.css");
  }
});

bs.watch("dist/bundle.js", (e) => {
  if (e === "change") {
    bs.reload("bundle.js");
  }
});

bs.watch("dist/**/*.php", () => bs.reload());

bs.init({
  open: false,
  proxy: "http://windycoys_wordpress",
});
