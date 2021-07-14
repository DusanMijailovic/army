window.onload = function () {
  try {
    document.querySelector('#addComment').addEventListener('click', addComment);
  } catch (err) {
    console.clear();
  }
}

function addComment(e) {
  e.preventDefault();
  let comment = document.querySelector('#comment').value;
  let userID = document.querySelector('#userID').value;
  let postID = document.URL.split('=')[2];
  


  if (comment) {
    document.querySelector('.comment-hint').textContent = '';
  } else {
    document.querySelector('.comment-hint').textContent = 'Polje za komentar ne sme biti prazno!';
    return false;
  }

  try {
    document.querySelector('.no-comment').textContent = '';
  } catch(err) {
    console.clear();
  }


  $.ajax({
    url: 'modules/comment.php',
    method: "POST",
    dataType: "json",
    data: {
      commentBtn: "send",
      comment: comment,
      userID: userID,
      postID: postID
    },
    success: function (data) {
      let fullName = document.querySelector('#fullName').value;
      let content = '<div class="media mb-4">';
      content += '<div class="media-body">';
      content += '<h5 class="mt-0">' + fullName + '</h5>';
      content += '<p>' + comment + '</p>';
      content += '</div>';
      content += '</div>';
      document.querySelector('#comment-collection').innerHTML += content;
      document.querySelector('#comment').value = '';
    },
    error: function (err, status, statusText) {
      console.log(err);
      console.log(statusText);
    }
  });
}