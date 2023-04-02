function changeType(type) {
  let tabs = ['alacak', 'fatura', 'gider']

  tabs.forEach((el) => {
    console.log(el)

    document.getElementById(el).classList.remove('is-active')
    document.getElementById(type).classList.add('is-active')
  })
}
