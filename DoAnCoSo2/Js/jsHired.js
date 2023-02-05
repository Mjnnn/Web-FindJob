function animateNumber(finalNumber, duration = 5000, startNumber = 0, callback) {
    let currentNumber = startNumber
    const interval = window.setInterval(updateNumber, 17)
    function updateNumber() {
      if (currentNumber >= finalNumber) {
        clearInterval(interval)
      } else {
        let inc = Math.ceil(finalNumber / (duration / 17))
        if (currentNumber + inc > finalNumber) {
          currentNumber = finalNumber
          clearInterval(interval)
        } else {
          currentNumber += inc
        }
        callback(currentNumber)
      }
    }
  }
  
  document.addEventListener('DOMContentLoaded', function () {
    animateNumber(200, 3000, 0, function (number) {
      const formattedNumber = number.toLocaleString()
      document.getElementById('s1').innerText = formattedNumber
    })
    
    animateNumber(300, 3000, 0, function (number) {
      const formattedNumber = number.toLocaleString()
      document.getElementById('s2').innerText = formattedNumber
    })
    
    animateNumber(2, 3000, 0, function (number) {
      const formattedNumber = number.toLocaleString()
      document.getElementById('s3').innerText = formattedNumber
    })
    animateNumber(17, 3000, 0, function (number) {
        const formattedNumber = number.toLocaleString()
        document.getElementById('s4').innerText = formattedNumber
      })
  })