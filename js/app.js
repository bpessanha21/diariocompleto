const menuMobile = document.querySelector('.header__menu-mobile')
const iconMenu = document.querySelector('.header__icon')
const headerItems = document.querySelector('.header__items')

const handleButtonClick = () => {
  const menuIsActive = headerItems.classList.toggle('header__items--active')

  if (menuIsActive) {
    iconMenu.setAttribute('src', './assets/images/icon-close.svg')
    return
  }

  iconMenu.setAttribute('src', './assets/images/icon-hamburger.svg')
}

menuMobile.addEventListener('click', handleButtonClick)


function downloadFile(selectedFileType)
{
  console.log(selectedFileType.value)
  fetch("/server/index.php").then(res => res.json()).then(data => {
    let file = data.filter(el => el.name.indexOf(selectedFileType.value) !== -1)
    if (file){
      window.open(file[0].url)
    }
  })
}

function getCurrentDate()
{
  fetch("/server/current_day.php").then(res => res.json()).then(data => {
    $('#day').text(data.day)
  })
}

getCurrentDate();