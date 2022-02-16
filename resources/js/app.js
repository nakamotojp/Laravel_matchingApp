// $("#sendmessage").on("click", function () {
//     var str1 = $("#message").val(); // テキストボックスのvalue値を取得
//     console.log(str1); // spanタグに値を設定
//   });

  $("#sendmessage").on("click", function () {
    $.ajax({
        type: 'post',
        url: '',
        data: {
            'message' : $("#message").val()
        }
    })
  });
