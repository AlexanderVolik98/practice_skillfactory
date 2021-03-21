$(document).ready(function(){
    $('button#sent_comment').on('click', function() {
      let commentValue = $('textarea#comment').val();
      let user_idValue = $('input#user_id').val();
      let img_nameValue = $('input#img_name').val();

      $.ajax({
        method: "POST",
        url: "create",
        data: { user_id: user_idValue, comment: commentValue, img_name: img_nameValue}
      })
    .done(function() {
      alert( "ваш комментарий отправлен");


    });

    $('textarea#comment').val('');
    $('input#user_id').val('');
    $('input#img_name').val('');
    })



	$('button#buttonDelete').on('click', function() {
		let commentDeleteValue = $("input#comment_id").val();
 console.log('fjsldkf');
  
		$.ajax({
		  method: "POST",
		  url: "create",
		  data: { comment_id: commentDeleteValue}
		})
	  .done(function() {
		alert( "ваш комментарий удален");
  
  
	  });

	 // $("input#comment_id").val('');
	
	  })


  



  



  });