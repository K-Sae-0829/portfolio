// PHPをHTMLに変換
const config = require('../config.js') // 設定ファイル
const glob = require('glob') // glob
const chokidar = require('chokidar') // 監視モジュール
const fs = require('fs-extra') // ファイル操作

const php2html = require('php2html') // PHPをHTMLに変換
const iconv = require('iconv-lite') // 文字コード

// const prettier = require('prettier') // フォーマッター
// // prettierのコンフィグファイルをロード
// const prettierConfig = prettier.resolveConfig(process.cwd() + '/.prettierrc')
// prettierConfig.parser = 'html' // HTMLパーサーを追加
// prettierConfig.printWidth = 10000 // 字数による折り返し判定をなくす

const buildPath = config.src + '**/!(_*).php' // 生成用パス
const watchPath = config.src + '**/*.php' // 監視用パス

const logHead = '[\u001b[1;34mPHP->HTML\u001b[0m] ' // ログヘッダー

let timestamp // タイムスタンプ

// パーシャル以外の全ファイルを処理する
function taskAll() {
  glob(buildPath, (er, files) => {
    for (let file of files) {
      task(file)
    }
  })
}

function task(srcPath) {
  // 出力パスを生成
  const destPath =
    config.dest.root + srcPath.replace('src\\', '').replace(config.src, '').replace(/\.php/, '.html').replace(/\\/, '/')

  php2html(srcPath, function (err, output) {
    if (~srcPath.indexOf('_copy')) {
      // コピーディレクトリ内のPHPは処理しない
      return
    }
    // 実行エラーで停止
    if (err) {
      console.log(logHead + 'Error: ' + err)
      return
    }
    // エラーらしい文字列を生成データから検出したら停止
    if (~output.indexOf(' on line ')) {
      console.log(logHead + '\u001b[0;31mError: ' + srcPath + '\u001b[0m')
      output = output
        .replace(/^(?!.* on line ).+$/gm, '') // エラーと関係ない出力を削除
        .replace(/^\n/gm, '') // 空行を削除
        .replace(/<.+?>/g, '') // タグを削除
      console.log(output)
      return
    }

    outputHtml(srcPath, destPath, output)
  })
}

// コンパイルしたHTMLを出力
function outputHtml(srcPath, destPath, output) {
  // prettierでフォーマット
  // try {
  //   output = prettier.format(output, prettierConfig)
  // } catch (error) {
  //   // フォーマットに失敗したら停止
  //   console.log(logHead + 'Error: ' + srcPath)
  //   console.log(error.name + ': ' + error.message)
  //   return
  // }
  // ファイルパスにタイムスタンプを追記してキャッシュ除去
  output = output.replace(
    /(<script.+?src=".+?\.js|<link.+?href=".+?\.css|<img.+?src=".+?\.(jpe?g|png|gif|svg))"/g,
    '$1?v' + timestamp + '"'
  )
  // 出力されるHTMLファイル
  fs.outputFile(destPath, iconv.encode(output, 'utf-8'))
    .then(() => {
      console.log(logHead + 'Add: ' + destPath)
    })
    .catch((error) => {
      console.log(logHead + 'Error: ' + error)
    })
}

if (config.php2html) {
  if (process.argv[2] === 'watch') {
    // 引数watchがある場合は監視
    chokidar
      .watch(watchPath, {
        ignoreInitial: true, // 監視開始時はAdd系のトリガー無効
        awaitWriteFinish: {
          // 追加・変更の確認に時間をとる
          stabilityThreshold: 100, // 完了とみなすまでの時間
          pollInterval: 10, // 完了を確認する間隔
        },
      })
      .on('all', (name, path) => {
        timestamp = new Date().getTime()
        if (path.includes('\\_')) {
          // パーシャルが更新された場合は全ファイルを処理
          taskAll()
        } else {
          task(path)
        }
      })
  } else {
    //単発実行
    timestamp = new Date().getTime()
    taskAll()
  }
}
