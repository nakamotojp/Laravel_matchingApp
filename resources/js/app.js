// $("#sendmessage").on("click", function () {
//     var str1 = $("#message").val(); // テキストボックスのvalue値を取得
//     console.log(str1); // spanタグに値を設定
//   });



  $("#sendmessage").on("click", function () {
    $.ajax({
        type: 'post',
        url: '/chat',
        data: {
            'to_user_id' : $("#to_user_id").val(),
            'message' : $("#message").val()
        }
    }).done(function(data){
        console.log('Ajax Success');
    }).fail(function(msg) {
        console.log('Ajax Error');
    });
  });
