const fs = require('fs');

const rootFolder = __dirname + '/../'

var walk = function (dir) {
  var results = {};
  var list = fs.readdirSync(dir)
  list.forEach(function (file) {
    file = dir + '/' + file;
    var stat = fs.statSync(file);
    if (stat && stat.isDirectory()) {
      let fileName = file.replace(rootFolder, '')
      results[fileName] = walk(file)
    }
  });
  return results;
}

function flatten(object) {
  var results = [];
  if (typeof object === 'object') {
    for (var key in object) {
      if (typeof object[key] === 'object') {
        results.push(key)
        results = results.concat(flatten(object[key]));
      }
    }
  }

  return results.reverse();
}
let output = walk(rootFolder + 'opensource')
output = flatten(output)


let contentFiles = {}


output.forEach(dir => {
  if(dir === "opensource") {
    return
  }
  contentFiles[`/${dir}/`] = []
  var list = fs.readdirSync(dir)
  contentFiles[`/${dir}/`].push('../')
  contentFiles[`/${dir}/`].push('./')
  list.forEach(function (file) {
    if (/\.md$/.test(file) && file.indexOf('docs-versions') === -1 && file.indexOf('index.md') === -1 && file.indexOf('README.md') === -1) {
        contentFiles[`/${dir}/`].push(file)
    }
  })
})

fs.writeFile(rootFolder + "files.json", JSON.stringify(contentFiles), function (err) {
  if (err) throw err;
});

module.exports = contentFiles