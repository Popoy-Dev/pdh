$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  $('.subjectAssess').click(function(e){
    e.preventDefault()
    id = $(this).data('ids');
    $('#start').hide();
    $.ajax({
      url:"/quiz/"+id,
      type: "GET",
      datatype: "json",
      success: function(data){
        $('#slickQuiz').slickQuiz({
          json: data,
          perQuestionResponseMessaging:false,
          preventUnanswered: true,
          displayQuestionNumber : false,
          randomSortQuestions : true,
          disableRanking : true,
          randomSortAnswers : true,
          skipStartButton : true,

          // events: {
          //   onCompleteQuiz: function (options) {
          //     $.ajax({
          //       url: '/store/self-assessment/' + id,
          //       type: 'POST',
          //       data: {
          //         slickScore: options.score ,
          //         slickCount: options.questionCount
          //       }
          //     })
          //     .done(function() {
          //       console.log("success");
          //     })
          //     .fail(function() {
          //       console.log("error");
          //     })
          //     .always(function() {
          //       console.log("complete");
          //     });
          //   }
          // },
        });
      }
    });
  });
  $(document).on('click','.radio_active',function(){
    let  val = $(this).val(),
    qid = $(this).data('qid'),
    said = $(this).data('said'),
    bqid = $('.checkAnswer').data('ids');
    $('.checkAnswer').attr('data-said',said);
    $('.checkAnswer').attr('data-ans',val);
  });
  $(document).on('click','.checkAnswer',function(){
    let qid = $(this).data('ids'),
    val = $(this).data('ans'),
    said = $(this).data('said');
    assess(val,qid,said)
  })
  function assess(val,qid,said){

    $.ajax({
      url: '/save/quiz',
      type: 'POST',
      data: {ans: val, qd:qid,sid:said}
    })
    .done(function() {
      console.log("success");
    })
  }
  //Top Assessment
  $('.topicAssess').click(function(e){
    e.preventDefault()
    id = $(this).data('ids');
    $('#start').hide();
    $.ajax({
      url:"/topic-quiz/"+id,
      type: "GET",
      datatype: "json",
      success: function(data){
        $('#slickQuiz').slickQuiz({
          json: data,
          perQuestionResponseMessaging:false,
          preventUnanswered: true,
          displayQuestionNumber : false,
          randomSortQuestions : true,
          disableRanking : true,
          randomSortAnswers : true,
          skipStartButton : true,
          // events: {
          //   onCompleteQuiz: function (options) {
          //     $.ajax({
          //       url: '/store/self-assessment/' + id,
          //       type: 'POST',
          //       data: {
          //         slickScore: options.score ,
          //         slickCount: options.questionCount
          //       }
          //     })
          //     .done(function() {
          //       console.log("success");
          //     })
          //     .fail(function() {
          //       console.log("error");
          //     })
          //     .always(function() {
          //       console.log("complete");
          //     });
          //   }
          // },
        });
      }
    });
  });
  $('.topIdentification').click(function(e){
    e.preventDefault()
    $('#start').hide()
    $('.iden').removeClass('d-none')
  })
  //End

  $('.activity').click(function(e){
    e.preventDefault()
    id = $(this).data('ids');
    $('#start').hide();
    $.ajax({
      url:"/get/activity/"+id,
      type: "GET",
      datatype: "json",
      success: function(data){
        $('#slickQuiz').slickQuiz({
          json: data,
          perQuestionResponseMessaging:false,
          preventUnanswered: true,
          displayQuestionNumber : false,
          randomSortQuestions : true,
          disableRanking : true,
          randomSortAnswers : true,
          skipStartButton : true,
          // events: {
          //   onCompleteQuiz: function (options) {
          //     $.ajax({
          //       url: '/store/self-assessment/' + id,
          //       type: 'POST',
          //       data: {
          //         slickScore: options.score ,
          //         slickCount: options.questionCount
          //       }
          //     })
          //     .done(function() {
          //       console.log("success");
          //     })
          //     .fail(function() {
          //       console.log("error");
          //     })
          //     .always(function() {
          //       console.log("complete");
          //     });
          //   }
          // },
        });
      }
    });
  });

  $('.assignment').click(function(e){
    e.preventDefault()
    id = $(this).data('ids');
    $('#start').hide();
    $('.sub').removeClass('d-none');
    $.ajax({
      url:"/get/assignment/"+id,
      type: "GET",
      datatype: "json",
      success: function(data){
        $('#slickQuiz').slickQuiz({
          json: data,
          perQuestionResponseMessaging:false,
          preventUnanswered: true,
          displayQuestionNumber : false,
          randomSortQuestions : true,
          disableRanking : true,
          randomSortAnswers : true,
          skipStartButton : true,
          // events: {
          //   onCompleteQuiz: function (options) {
          //     $.ajax({
          //       url: '/store/self-assessment/' + id,
          //       type: 'POST',
          //       data: {
          //         slickScore: options.score ,
          //         slickCount: options.questionCount
          //       }
          //     })
          //     .done(function() {
          //       console.log("success");
          //     })
          //     .fail(function() {
          //       console.log("error");
          //     })
          //     .always(function() {
          //       console.log("complete");
          //     });
          //   }
          // },
        });
      }
    });
  });
});
