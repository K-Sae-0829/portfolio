import scrollLock from '../functions/_scrollLock.js' // スクロールロック
const spMenuTrigger = document.querySelectorAll('#gNav-open,.gNav-close,#gNav a,#overlay')
const spMenuTarget = document.querySelectorAll('#gNav-open,#gNav,#overlay')
for (let index = 0; index < spMenuTrigger.length; index++) {
  const element = spMenuTrigger[index]
  element.addEventListener(
    'click',
    function () {
      for (let index = 0; index < spMenuTarget.length; index++) {
        const element = spMenuTarget[index]
        element.classList.toggle('active')
      }
      scrollLock('body', '#overlay')
    },
    false
  )
}
