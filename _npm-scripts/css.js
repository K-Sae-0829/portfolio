const config = require('../config.js') // 設定ファイル
const postcss = require('postcss')
const fs = require('fs-extra') // ファイル操作

const chokidar = require('chokidar') // 監視モジュール
const glob = require('glob') // glob
const path = require('path') // パス制御

const buildPath = config.src + 'scss/**/!(_*).scss' // 生成用パス
const watchPath = config.src + 'scss/**/*.scss' // 監視用パス
const CssImporter = require('node-sass-css-importer')({
  import_paths: ['app/assets/stylesheets', 'app/assets/components'],
})

let taskExec = [] // 実行中フラグ
let lastResult = [] // 最終実行結果

const logHead = '[\u001b[1;35mCSS\u001b[0m] ' // ログヘッダー

function task(srcPath) {
  if (taskExec[srcPath]) {
    // 多重実行を防止
    return
  }
  taskExec[srcPath] = true
  // console.time('CSS')
  fs.readFile(srcPath, (err, css) => {
    if (err) {
      console.log(err)
      taskExec[srcPath] = false
      return
    }
    // console.log(srcPath)
    const destPath =
      config.dest.css +
      srcPath
        .replace(/\\/g, '/')
        .replace(config.src + 'scss/', '')
        .replace(/\.scss$/, '.css') // 出力パスを生成
    const destName = path.basename(destPath) // 出力ファイル名を取得

    // console.log('Path:' + srcPath)
    // console.log('destPath:' + destPath)
    // console.log('destName:' + destName)

    postcss([
      require('./css/glob-importer'), // globが使われたimportを変換
      require('postcss-node-sass')({
        importer: [CssImporter],
      }), // node-sassでコンパイル
      require('./css/cache-buster'), // キャッシュバスティング
      require('postcss-sort-media-queries')({
        // 同一メディアクエリの統合
        sort: 'mobile-first',
      }),
      require('autoprefixer')({
        // ベンダープレフィックス
        grid: true, // GridをIE10に対応させる
        cascade: false, // 整形はしない
      }),
      require('cssnano')({
        // Minify
        autoprefixer: false, // ベンダープレフィックス
      }),
    ])
      .process(css, {
        parser: require('postcss-scss'),
        from: srcPath,
        to: destPath,
        map: {},
      })
      .then((result) => {
        if (lastResult[destName] === result.css) {
          // 前と実行結果が同じだったら省略
          console.log(logHead + 'Skip: ' + destPath)
          taskExec[srcPath] = false
          return
        }
        lastResult[destName] = result.css

        fs.outputFile(destPath, result.css + '/*# sourceMappingURL=' + destName + '.map */', () => true)
        if (result.map) {
          fs.outputFile(destPath + '.map', result.map.toString(), () => true)
        }
        console.log(logHead + 'Add: ' + destPath)
        // console.timeEnd('CSS')
        taskExec[srcPath] = false
      })
      .catch((error) => {
        console.log(logHead + error)
        console.log(logHead + error.formatted)
        taskExec[srcPath] = false
      })
  })
}

function taskAll() {
  // パーシャル以外の全ファイルを処理する
  glob(buildPath, {}, (er, files) => {
    for (let file of files) {
      task(file)
    }
  })
}

if (process.argv[2] === 'watch') {
  //引数watchがある場合は監視
  chokidar
    .watch(watchPath, {
      ignoreInitial: true, // 監視開始時はAdd系のトリガー無効
      awaitWriteFinish: {
        // 追加・変更の確認に時間をとる
        stabilityThreshold: 100, // 完了とみなすまでの時間
        pollInterval: 10, // 完了を確認する間隔
      },
    })
    .on('all', (name, srcPath) => {
      if (srcPath.includes('_')) {
        //パーシャルが更新された場合は全ファイルを処理
        taskAll()
      } else {
        task('./' + srcPath)
      }
    })
} else {
  //単発実行
  taskAll()
}
