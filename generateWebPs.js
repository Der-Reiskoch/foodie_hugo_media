const fs = require("fs");
const path = require("path");
const readline = require("readline");
const process = require("process");
const { exec } = require("child_process");

const BASE_MEDIA_DIR = "./static/media";

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

let workingDir;
let quality = 70;

rl.question("workingDir? ", function (wd) {
  workingDir = wd;

  rl.question(`quality? (default ${quality})`, function (q) {
    quality = q !== q ? q : quality;
    rl.close();
  });
});

rl.on("close", function () {
  generateWebPs();
});

function generateWebPs() {
  if (workingDir !== "") {
    const imageDir = path.join(BASE_MEDIA_DIR, workingDir);

    console.log("Generate webP images for '%s'", imageDir);
    console.log("Quality is set to '", quality);

    fs.readdir(imageDir, (err, files) => {
      if (err) {
        console.error("Could not list the directory.", err);
        process.exit(1);
      }

      files.forEach(function (file, index) {
        let filePath = path.join(imageDir, file);

        fs.stat(filePath, (error, stat) => {
          if (error) {
            console.error("Error stating file.", error);
            return;
          }

          if (stat.isFile()) {
            const fileName = path.basename(filePath);
            console.log("Generate webp for '%s'", fileName);

            exec(
              "cwebp -q " +
                quality +
                " " +
                filePath +
                " -o " +
                filePath.replace(".jpg", ".webp"),
              (err, output) => {
                if (err) {
                  console.error("could not execute command: ", err);
                  return;
                }
                console.log("Output: \n", output);
              }
            );
          }
        });
      });
    });
  } else {
    console.error("no workingDir given");
  }
}
