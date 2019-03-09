const { resolve } = require("path");
const { execSync } = require("child_process");
const { upAll, stop } = require("docker-compose");
const browsersync = require("browser-sync");
const mysql = require("mysql");

const name = "windycoys";

const dockerOptions = {
  cwd: resolve(__dirname),
  log: true,
};

const browserSyncOptions = {
  files: ["theme/**/*"],
  watchtask: true,
  open: false,
};

const mysqlConfig = {
  user: "root",
  password: "password",
  database: "wordpress",
};

process.env.COMPOSE_PROJECT_NAME = name;

// Get IP address
const getIpAddr = function getIpAddr(id) {
  return execSync(
    `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' ${id}`,
  )
    .toString("utf8")
    .trim();
};

// Update URIs in MYSQL database
const updateUriData = function updateUriData(wordpress, db) {
  mysqlConfig.host = db;
  const con = mysql.createConnection(mysqlConfig);
  con.connect();

  const query = `UPDATE wp_options SET option_value='http://${wordpress}' WHERE option_name in ('siteurl', 'home')`;

  con.query(query, error => {
    if (error) {
      process.stderr.write(`Error: ${error.sqlMessage}\n`);
      process.exit(1);
    }
  });

  con.end();
};

// Register Exit handler to stop Docker containers on exit
const exitHandler = function exitHandler() {
  stop(dockerOptions).then(
    () => {
      process.stdout.write("\n");
      process.exit();
    },
    err => {
      process.stderr.write(`Error: ${err.message}\n`);
      process.exit(1);
    },
  );
};

process.on("beforeExit", exitHandler.bind());
process.on("SIGINT", exitHandler.bind());
process.on("SIGUSR1", exitHandler.bind());
process.on("SIGUSR2", exitHandler.bind());
process.on("uncaughtException", exitHandler.bind());

// Start Docker containers
upAll(dockerOptions).then(
  () => {
    process.stdout.write(
      "Docker containers launched, starting browser-sync...",
    );
    const wordpress = getIpAddr(`${name}_wordpress_1`);
    const db = getIpAddr(`${name}_db_1`);
    if (wordpress && db) {
      updateUriData(wordpress, db);
      const bs = browsersync.create();
      browserSyncOptions.proxy = wordpress;
      bs.init(browserSyncOptions);
    } else {
      process.stderr.write(
        "Error: No IP address for Docker containers. Aborting.\n",
      );
      process.exit(1);
    }
  },
  err => {
    process.strerr.write(`Error: ${err.message}\n`);
    process.exit(1);
  },
);
