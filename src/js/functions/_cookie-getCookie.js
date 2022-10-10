/**
 * Cookie取得関数
 * @function getCookie
 * @param  {string} key キー名
 * @return {string} 値
 * @return {string} Cookieの値
Use
import getCookie from './functions/_cookie-getCookie.js' // Cookie取得
const hogeData = getCookie('hogeData') // Cookie取得
 */
const getCookie = (key) => {
  if (document.cookie === '') {
    return false
  }
  return ((document.cookie + ';').match(key + '=([^¥S;]*)') || [])[1]
}
export default getCookie
