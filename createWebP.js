const fs = require("fs");
const path = require("path");
const process = require("process");
const { exec } = require('child_process')

const args = process.argv.slice(2)



const BASE_MEDIA_DIR = "./static/media";
const imageDir = path.join(BASE_MEDIA_DIR, args[0]);

console.log("create webps in '%s'", imageDir);

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


        const fileName = path.basename(filePath)
        console.log("create webp for '%s'", fileName);

        exec('cwebp -q 70 ' + filePath + ' -o ' + filePath.replace('.jpg','.webp'), (err, output) => {
            if (err) {
                console.error("could not execute command: ", err)
                return
            }
            console.log("Output: \n", output)
          })




      }
    });
  });
});
