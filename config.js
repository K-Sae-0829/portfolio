// 全体設定ファイル
// 必須設定項目
const pathDest = './portfolio2022/' // destパス（テーマ名）
const bsProxy = 'http://kimurasae.lo/' // ローカル環境のURL　静的サイトなら空欄

const php2html = false // 静的サイト構築用　PHPをHTMLに変換する

let copyPath =
  '**/{*.{css,htm,html,xml,php,pdf,mp4,webm,webp,mp3,wav,ogg,ico,doc,docx,xls,xlsm,xlsx,liquid},_copy/**,(.htaccess),manifest.json}'
if (php2html) {
  // _copy以外のPHPを除外する
  copyPath =
    '**/{*.{css,htm,html,xml,pdf,mp4,webm,webp,mp3,wav,ogg,ico,doc,docx,xls,xlsm,xlsx,liquid},_copy/**,(.htaccess),manifest.json}'
}
// 任意設定項目
const pathSrc = './src/' // srcパス
module.exports = {
  src: pathSrc,
  dest: {
    // 各タスクの出力先を細かく帰る場合は以下も編集設定
    root: pathDest,
    img: pathDest + 'img/', // 画像
    js: pathDest + 'js/', // JS
    css: pathDest + 'css/', // CSS
    iconFont: pathDest + 'css/font/icon/', // アイコンフォント
    iconFontCss: 'font/icon/', // CSSから見たアイコンフォント位置
    styleGuide: './_docs/StyleGuide', // スタイルガイド
    jsdoc: './_docs/JSDoc', // JSDoc
  },

  // BrowserSync
  browserSync: {
    use: true, // 有効無効
    // BrowserSyncでライブリロードしたいURLを設定　空欄ならdestをライブリロード（静的サイトモード）
    // 「.local」はライブリロードが遅い不具合があるので「.lo」などに変える
    // BSync側にSSL証明書がないのでhttpsは不可
    proxy: bsProxy,
  },

  php2html: php2html, // 静的サイト構築時:PHPをHTMLに変換する

  // 加工せずにコピーするファイル
  copySrc: pathSrc + copyPath,

  // JPG最適化
  imageminJpg: {
    quality: 90, // 画質レベル
    progressive: false, // 読み込み段階に応じて画質を変える
  },
  // PNG最適化
  imageminPng: {
    quality: [0.8, 0.9], // 画質レベル
    speed: 1, // 圧縮速度（低速ほど高品質）
    floyd: 0,
    strip: true, // メタデータを消す
  },
  // GIF最適化
  imageminGif: {
    interlaced: false, // 読み込み段階に応じて画質を変える
    optimizationLevel: 3,
    colors: 180, // 色数
  },
  // WebP生成
  imageminWebp: {
    use: false, // ONOFF
    quality: 80, // 画質レベル
    method: 6, // 圧縮方法（6が低速・高品質）
  },
}
