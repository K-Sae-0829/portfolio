/**
 * UserAgentをpc,sp,tabの形で返す
 *
 * @function isDevice
 * @return {String} pc,sp,tab
 *
 * Use
import isDevice from './functions/_isDevice.js' // UserAgentをpc,sp,tabの形で返す
if(isDevice === 'pc'){

}
 *
 */
const isDevice = (function () {
  const userAgent = navigator.userAgent
  if (
    userAgent.indexOf('iPhone') > 0 ||
    userAgent.indexOf('iPod') > 0 ||
    (userAgent.indexOf('Android') > 0 && userAgent.indexOf('Mobile') > 0)
  ) {
    return 'sp'
  } else if (userAgent.indexOf('iPad') > 0 || userAgent.indexOf('Android') > 0) {
    return 'tab'
  }
  return 'pc'
})()
export default isDevice
