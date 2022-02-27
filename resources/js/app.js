
// チャット
$(function() {

    $("#send").on("click", function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/chat',
            dataType: 'json',
            data: {
                'to_user_id' : $("#to_user_id").val(),
                'message' : $("#message").val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

        }).done(function (data) {
            console.log('success');
            let html = '';

            $.each(data, function (index, value) {

                let id = value.from_user_id;
                let chat = value.chat;

                html = `
                <div class="message d-flex flex-row-reverse align-items-start mb-4">

                    <!-- .message-icon -->
                        <p class="message-text p-2 me-2 mb-0 bg-info" style="border-radius:24px;">
                            ${chat}
                        </p><!-- .message-text -->
                </div>

                                `
                            });
            $('.chat').append(html);
            $('.chat').scrollTop( $(".chat")[0].scrollHeight );
            $("#message").val("");

            if (data.length === 0) {
                $('#message').after('<p>**start chat!!**</p>');
            }

        }).fail(function(msg) {
            console.log('Ajax Err');
        });
  });
});

// モーダル
$(function(){

	var open = $('#openSetting'),
		close = $('#closeSetting'),
		container = $('.modal-container');

	open.on('click',function(){
		container.addClass('active');
		return false;
	});

	close.on('click',function(){
		container.removeClass('active');
	});

	$(document).on('click',function(e) {
		if(!$(e.target).closest('.modal-body').length) {
			container.removeClass('active');
		}
	});
});

