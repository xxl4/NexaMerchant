function leaveFromTop(e) {
  if (e.clientY < 0) {
    if (discountTimes == 1) {
      $('#leaveFade, #leavePop1').show()
      $('#timeInit').click()
      $('#timeInit').remove()
    } else if (discountTimes == 2) {
      $('#leaveFade, #leavePop2').show()
      $('#leavePop1').remove()
    } else {
      $('#leaveFade').remove()
    }
  }
}
/* start mobile exit-pop-up */
function leaveFromTop1(e) {
  if (discountTimes == 1) {
    $('#leaveFade, #leavePop1').show()
    $('#timeInit').click()
    $('#timeInit').remove()
  } else if (discountTimes == 2) {
    $('#leaveFade, #leavePop2').show()
    $('#leavePop1').remove()
  } else {
    $('#leaveFade').remove()
  }
}
/* end mobile exit */
$('#leaveX1, #leaveX2').click(function () {
  $('#leaveFade').fadeOut()
  setTimeout(function () {
    $('#leaveFade').hide()
  }, 700)
  discountTimes = 0
})
// ------ POP-UP timer ------ //
function startTimer() {
  var presentTime = $('#timeCount').text()
  var timeArray = presentTime.split(/[:]+/)
  var m = timeArray[0]
  var s = checkSecond(timeArray[1] - 1)
  if (s == 59) {
    m = m - 1
  }
  if (m < 0) {
    $('#leaveFade').fadeOut()
    setTimeout(function () {
      $('#leaveFade').hide()
    }, 700)
    discountTimes = 0
  }
  $('#timeCount').text(m + ':' + s)
  setTimeout(startTimer, 1000)
}
function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {
    sec = '0' + sec
  } // add zero in front of numbers < 10
  if (sec < 0) {
    sec = '59'
  }
  return sec
}
$('#timeInit').click(function () {
  $('#timeCount').text('05' + ' : ' + '00')
  startTimer()
})
// ------End of POP-UP timer------ //

//--------------Discpunt-pop-up-functionality + price changes-------------------//
$('#innerButton1').click(function () {
  discountTimes = 2
  $('#leaveFade').fadeOut('slow')
  $(window).scrollTop(0)
})
$('#innerButton2').click(function () {
  $('#leaveFade').fadeOut('slow')
  $(window).scrollTop(0)
})
