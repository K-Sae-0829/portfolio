// .gitignoreにdestパスを追記する
const config = require('../config.js') // 設定ファイル
const fs = require('fs-extra') // ファイル操作

const logHead = '[gitignore] ' // ログヘッダー

const filePath = '.gitignore'

const destPath = config.dest.root.replace('./', '').replace(/\/$/, '') // ./と末尾/を除去したdestパス

// ファイル読み込み
fs.readFile(filePath, 'utf8', (err, data) => {
  if (err) {
    console.log(err)
    throw err
  }
  // 改行を基準に逆順で配列に入れる（下の方ほど加筆の可能性があるため）
  const ignoreList = data.toString().split('\r\n').reverse()
  for (const line of ignoreList) {
    if (line === destPath) {
      // ignore済みなら終了
      console.log(logHead + 'OK')
      return
    }
  }
  // 未記入なら加筆
  fs.outputFile(filePath, data + '\r\n' + destPath, () => {
    console.log(logHead + 'Add: ' + destPath)
  })
})
