$("#pollBtn").click(function(){

  let answers =$('input[name="poll"]');
  let questionID = $('#questionsID').val();
  let userID = $('#userID').val();
  let selected = '';

  let pollError = $('#hint');

  for (let i = 0; i < answers.length; i++) {
    if (answers[i].checked) {
      selected = answers[i].value;
      break;
    }
  }

  if (selected == '') {
    pollError.text("Morate izabrati jedan od odgovora!");
  } else {

    $.ajax({
      url: 'modules/poll.php',
      method: "POST",
      dataType: "json",
      data: {
        pollBtn : 'send',
        questionID : questionID,
        answer : selected,
        userID : userID,
      },
      success: function (data) {
        location.reload();
      },
      error: function (err, status, statusText) {
        console.log(err);
        console.log(statusText);
      }
    });
  }
});


///////////////////SCROLL FROM BOTTOM TO TOP////////////////////////////

$(document).ready(function () {

  $(document).scroll(function () {
    if ($(this).scrollTop() >= 10) {
      $('#return-to-top').fadeIn();
    } else {
      $('#return-to-top').fadeOut();
    }
  });
  $('#return-to-top').click(function (e) {
    e.preventDefault();
    $('body,html').animate({
      scrollTop: 0
    }, 1000);
  });


//////////////////PAGINATION/////////////////////////////

$(".link").click(function(){

  let link = parseInt($(this).data('id'));

  $.ajax({
    type: "POST",
    url: "modules/pagination.php",
    data:{
      sendBtn: "send",
      link: link
    },
    dataType: "json",
    success: function (data) {
      location.reload();
      $('.card').animate({ scrollTop: 0}, 3000);
    },
    error: function(err, status, statusText) {
      console.log(err);
      location.reload();
    }
  });
});
});