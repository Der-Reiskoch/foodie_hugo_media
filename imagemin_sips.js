'use strict';
const fs = require('fs');

const minifyFile = (filename) => {
  

  new Promise((resolve, reject) => {

    if (true) {
      console.log('minfy',filename);
      // sips -s format jpeg -s formatOptions 55 <biggerFile>.png --out "./<mediumFile>.jpeg"

      
      resolve(filename);



    }
    else {
      reject(err)
    }
  })



  // https://rachelrly.medium.com/how-to-compress-images-in-the-mac-terminal-57f8ddd11926
}


Promise.resolve(process.argv)
  .then(x => x.slice(2))
  .then(x => x.map(minifyFile))
  .then(x => Promise.all(x))
  .catch(e => {
    console.error(e)
    process.exit(1)
  }) 