$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  if($('.perfect-scrollbar-example').length) {
    var scrollbarExample = new PerfectScrollbar('.perfect-scrollbar-example');
  }

  $('#datetimepickerExample').datetimepicker();

  $('.questionnaire').summernote({
    height: 100
  });
  $('#subj_desc').summernote({
    height:100
  })

  $('.file').dropify({
    messages: {
      'default': 'Upload or drag and drop image',
    }
  })

  $('.time').click(function(e){
    $(this).is(':checked') ? $('.div_time').removeClass('d-none'):$('.div_time').addClass('d-none')
  })
  $('.p_score').click(function(e){
    $(this).is(':checked') ? $('.div_score').removeClass('d-none'):$('.div_score').addClass('d-none')
  })

//Reset Password
$('.showpass').click(function(e){
if($(this).is(':checked')){
  $('#current-password').attr('type','text')
  $('#password').attr('type','text')
  $('#password_confirmation').attr('type','text')
}else{
  $('#current-password').attr('type','password')
  $('#password').attr('type','password')
  $('#password_confirmation').attr('type','password')
}
})

$('#form-edit-profile').on('submit',function(e){
  e.preventDefault()
  $.ajax({
    url: '/teacher/edit/profile',
    type: 'POST',
    processData: false,
    contentType: false,
    dataType: 'JSON',
    data: new FormData(this)
  })
  .then(function(res){
    if(res.msg == 'success'){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        background:'#6AC04C',
        icon:'text-white',
        showConfirmButton: false,
        timer: 1113000
      });

      Toast.fire({
        icon: 'success',
        title: '<p class="text-white">Successful!</p>',
      })
    }
  })
  .done(function() {
    setTimeout(function(){
      location.reload();
    }, 2000);
  })
  .fail(function(data) {
    let errors = data.responseJSON.errors;
    if(errors){
      $.each(errors,function(key,value){
        var elem = $('.' + key);
        elem.closest('div.form-group')
        .removeClass('has-error')
        .addClass(value.length > 0 ? 'has-error' : 'has-success')
        .find('.text-danger').remove();
        $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
        elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
        // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
      });
    }
  })

})
$('#form-change-password').on('submit',function(e){
  e.preventDefault()
  $.ajax({
    url: '/teacher/password/reset',
    type: 'POST',
    processData: false,
    contentType: false,
    dataType: 'JSON',
    data: new FormData(this)
  })
  .then(function(res){
    if(res.msg == 'success'){
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        background:'#6AC04C',
        icon:'text-white',
        showConfirmButton: false,
        timer: 1113000
      });

      Toast.fire({
        icon: 'success',
        title: '<p class="text-white">Successful!</p>',
      })
    }
  })
  .done(function() {
    setTimeout(function(){
      location.reload();
    }, 2000);
  })
  .fail(function(data) {
    let errors = data.responseJSON.errors;
    if(errors){
      $.each(errors,function(key,value){
        var elem = $('.' + key);
        elem.closest('div.form-group')
        .removeClass('has-error')
        .addClass(value.length > 0 ? 'has-error' : 'has-success')
        .find('.text-danger').remove();
        $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
        elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
        // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
      });
    }
  })

})
  //publish
  $('.btnpublish').click(function(e){
    id = $(this).data('ids')
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-primary'
      },
      buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You want to publish this subject?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'ml-2',
      confirmButtonText: 'Yes!',
      cancelButtonText: 'Cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '/teacher/publish/'+id,
          type: 'POST',
          data: {ids: 2}
        })
        .then(function(){
          swalWithBootstrapButtons.fire(
            'Success!',
            '',
            'success'
          )
        })
        .done(function() {
          location.reload()
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });


      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          '',
          'error'
        )
      }
    })
  })

  $('.btn-cancel-request').click(function(e){
    id = $(this).data('ids')
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-primary'
      },
      buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You want to publish this subject?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'ml-2',
      confirmButtonText: 'Yes!',
      cancelButtonText: 'Cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '/teacher/cancel-request/'+id,
          type: 'POST',
          data: {ids: 0}
        })
        .then(function(){
          swalWithBootstrapButtons.fire(
            'Success!',
            '',
            'success'
          )
        })
        .done(function() {
          location.reload()
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });


      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          '',
          'error'
        )
      }
    })
  })
  //Create Subject
  $('.createSubj').click(function(e){
    e.preventDefault()
    var grade = $('.grade').val(),
    subject = $('.subject').val();
    $.ajax({
      url: '/teacher/create/subject',
      type: 'POST',
      data: {
        grade:grade,subject:subject
      }
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          icon:'text-white',
          showConfirmButton: false,
          timer: 1113000
        });

        Toast.fire({
          icon: 'success',
          title: '<p class="text-white">Successfully</p>',
        })
      }
    })
    .done(function() {
      setTimeout(function(){
        location.reload();
      }, 2000);

    })
    .fail(function(data) {
      let errors = data.responseJSON.errors;
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    })
  })


  $('#frmEditSubj').submit(function(e){
    var id = $(this).data('ids');
    e.preventDefault()
    // var form_data = new FormData()
    $.ajax({
      url: '/teacher/edit/subject/'+id,
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data:  new FormData(this)
    }).then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          icon:'text-white',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1000);
    })


  })


  //Change Subject Thumbnail
  $('.file').on('change',function(e){
    e.preventDefault()
    var id = $(this).data("ids");
    var file_data = $(this).prop('files')[0];
    var form_data = new FormData();
    form_data.append('thumbnail', file_data);
    // var frm = new FormData();
    // frm.append('thumbnail',val);
    $.ajax({
      url: '/teacher/edit/thumbnail/' + id,
      type: 'POST',
      processData: false,
      contentType: false,
      enctype:'multipart/form-data',
      data: form_data
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1000);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })
  i = 0;
  $('.addInst').on('click',function(e){
    i++;
    e.preventDefault()
    html = '';
    html += '<div class="form-group del'+i+'">'
    html += '<label for="">Select &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="cancel'+i+'" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="mdi mdi-close text-danger" style="font-size:18px;"></i></a></label>'
    html += '<select name="ints_type[]" id="" class="form-control i-discussion">'
    html += '<option disabled selected>-- Type --</option>'
    html += '<option value="a'+i+'">Quiz</option>'
    html += '<option value="t'+i+'">Topic</option>'
    html += '</select>'
    html += '</div>'

    html += '<div class="form-group del'+i+'">'
    html += '<label for="">Title</label>'
    html += '<input type="text" name="inst_title[]" value="" class="form-control i-discussion">'
    html += '</div>'
    $('.ins').append(html)
    $(document).on('click','#cancel'+i,function(e){
      e.preventDefault()
      $('.del'+i).remove()
      i--;

    })
  })




  //Instructional Design
  $(document).on('submit','#idesign',function(e){
    e.preventDefault();
    $.ajax({
      url: '/teacher/instructional-design',
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    })
    .then(function(res){

      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }

    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1000);
    })
    .fail(function() {
      Swal.fire({
        icon: 'error',
        title: "Oops...",
        text: "Something went wrong!",
        confirmButtonColor: "#348cd4",
      })
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('.dd').each(function(){
    $(this).nestable({
      maxDepth: 1,
      group: $(this).prop('id'),
    });
  });

  $('.dd').on('change', function () {
    var data = window.JSON.stringify($(this).nestable('serialize'));
    var a = JSON.parse(data);
    $.ajax({
      url: '/teacher/sort/instructional-design',
      type: 'POST',
      data: {ids: a}
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  });
  $('.close').click(function(e){
    location.reload()
  })
  $('.btn_edit').on('click',function(e){
    e.preventDefault();
    let id = $(this).data('ids');
    $.ajax({
      url: '/teacher/get/inst-design/' + id,
      type: 'GET',
    })
    .done(function(data) {
      let html = '';
      if(data.msg == 'success'){

        $('.dd3-handle').addClass('d-none');
        $('#inst'+id).wrapAll('<form></form>');
        $('.btn_add').hide();
        $('.'+data.data.i_uuid).show();
        $('#'+data.data.i_uuid).hide();
        $('.modal-footer').hide();
        $('.btn-sub').prop('disabled',true);

        $('.close'+id).on('click',function(){
          $('.dd3-handle').removeClass('d-none');

          $('.btn_add').show();
          $('.form').empty();
          $('#'+data.data.i_uuid).show();
          $('.'+data.data.i_uuid).hide();
          $('.modal-footer').show();
          $('.btn-sub').prop('disabled',false);
        })

        $('.save'+id).on('click',function(e){
          let input = $('#inst'+id).val();
          $.ajax({
            url: '/teacher/put/inst-design/' + id,
            type: 'PUT',
            data: {
              input : input
            }
          })
          .done(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: 'Successful!'
            });
            setInterval(function(){
              window.location.reload();
            },1000);
          })
          .fail(function() {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              confirmButtonColor: "#348cd4",
            })
          })
          .always(function() {
            console.log("complete");
          });
        })

        $('.del'+id).on('click',function(e){
          let del_id = $(this).data('ids');
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
          })
          e.preventDefault();
          Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ml-2 mt-2",
            buttonsStyling: !1
          }).then(function(t) {
            t.value ?
            $.ajax({
              url: '/teacher/del/inst-design/'+del_id,
              type:'DELETE'
            }).done(function(res){
              if(res.msg == 'success'){
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                // Swal.fire({
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // })
                location.reload();
              }
            }) : t.dismiss === Swal.DismissReason.cancel && swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          })
        })
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })

  //END Instructional

  // Subject Assessment
  $('.btn-event').click(function(e){
    e.preventDefault()
    id = $(this).data('ids');
    $('.data-ids').attr('value',id)
  })
  $('#frmSubjAssess').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: '/teacher/add/subject-assessment',
      type: 'POST',
      processData: false,
      contentType: false,
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1000);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })

  //END Subject Assessment

  //Quiz Details

  $('#frmEditQuiz').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/subject-assessment/'+id,
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('#btn-ac').click(function(e){
    i++;
    e.preventDefault()
    html = "";
    html += '<div id="rem'+i+'">'
    html += '<div class="input-group mb-3">'
    html += '<div class="input-group-prepend">'
    html += '<div class="input-group-text">'
    html += '<input type="radio"  class="choices" name="r_choices[]">'
    html += '</div>'
    html += '</div>'
    html += '<input type="text" class="form-control choices" name="choices[]" placeholder="Choices">'
    html += '<div class="input-group-append">'
    html += '<a href="#" class="btn btn-danger" id="cdel'+i+'"><i class="mdi mdi-delete"></i></a>'
    html += '</div>'
    html += '</div>'
    html += '</div>'

    $('.input_container').append(html)
    $(document).on('click','#cdel'+i,function(e){
      e.preventDefault()
      $('#rem'+i).remove()
      i--;
    })
  })

  $(window).on('load',function(e){
    e.preventDefault()
    let val = $('#q_type').val(),
    mc = $('.input_container'),
    html = '',
    choice = ['Choice A','Choice B','Choice C','Choice D'];
    if(val == 'mc'){
      // mc.empty(),
      $.each(choice,function(i,v){
        html += '<div class="form-group">';
        html += '<label for="choice_'+i+'"><strong>'+v+'</strong></label>';
        html += '<div class="input-group mb-3">';
        html += '<div class="input-group-prepend">';
        html += '<span class="input-group-text">';
        html += '<input id="'+i+'" type="radio" name="answer" class="pre_test_answer answer'+i+'">';
        html += '</span>';
        html += '</div>';
        html += '<input type="text" name="ans[]" class="form-control answer'+i+' answer">';
        html += '</div>';
        html += '</div>';
      })
      mc.append(html)
      $('.answer').each(function(i,v){
        $(document).on('change','.answer'+i,function(){
          $('#'+i).attr('value',$(this).val())
        })
        $(document).on('click','.answer'+i,function(){
          $('.correct_answer').attr('value',$(this).val())
        })
      })
    }
    else if(val == 'tof'){
      choice = ['True','False']
      $.each(choice,function(i,v){
        html += '<div class="form-group">';
        html += '<div class="input-group mb-3">';
        html += '<div class="input-group-prepend">';
        html += '<span class="input-group-text">';
        html += '<input id="'+i+'" type="radio" name="answer" class="pre_test_answer  answer answer'+i+'" value="'+v+'">';
        html += '</span>';
        html += '</div>';
        html += '<input type="text" name="ans[]" class="form-control answer'+i+' answer" value="'+v+'">';
        html += '</div>';
        html += '</div>';
      })
      mc.append(html)

      $('.answer').each(function(i,v){
        $(document).on('change','.answer'+i,function(){
          $('#'+i).attr('value',$(this).val())
        })
        $(document).on('click','.answer'+i,function(){
          $('.correct_answer').attr('value',$(this).val())
        })
      })
    }
  })

  $('#type').on('change',function(e){
    let val = $('#type').val(),
    mc = $('.input_container'),
    html = '',
    choice = ['Choice A','Choice B','Choice C','Choice D'];
    mc.empty()

    $('.correct_answer').attr('hidden',true)
    if(val == 'mc'){
      // mc.empty(),
      $.each(choice,function(i,v){
        html += '<div class="form-group">';
        html += '<label for="choice_'+i+'"><strong>'+v+'</strong></label>';
        html += '<div class="input-group mb-3">';
        html += '<div class="input-group-prepend">';
        html += '<span class="input-group-text">';
        html += '<input id="'+i+'" type="radio" name="answer" class="pre_test_answer answer'+i+'">';
        html += '</span>';
        html += '</div>';
        html += '<input type="text" name="ans[]" class="form-control answer'+i+' answer">';
        html += '</div>';
        html += '</div>';
      })
      mc.append(html)
      $('.answer').each(function(i,v){
        $(document).on('change','.answer'+i,function(){
          $('#'+i).attr('value',$(this).val())
          $('.correct_answer').attr('value',$(this).val())

        })
        $(document).on('click','.answer'+i,function(){
          $('.correct_answer').attr('value',$(this).val())
        })
      })
    }
    else if(val == 'tof'){
      choice = ['True','False']
      $.each(choice,function(i,v){
        html += '<div class="form-group">';
        html += '<div class="input-group mb-3">';
        html += '<div class="input-group-prepend">';
        html += '<span class="input-group-text">';
        html += '<input id="'+i+'" type="radio" name="answer" class="pre_test_answer  answer'+i+'" value="'+v+'">';
        html += '</span>';
        html += '</div>';
        html += '<input type="text" name="ans[]" class="form-control answer'+i+' answer" value="'+v+'">';
        html += '</div>';
        html += '</div>';
      })
      mc.append(html)
      $('.answer').each(function(i,v){
        $(document).on('change','.answer'+i,function(){
          $('#'+i).attr('value',$(this).val())
        })
        $(document).on('click','.answer'+i,function(){
          $('.correct_answer').attr('value',$(this).val())
        })
      })
    }
    else{
      $('.correct_answer').removeAttr('hidden').attr('placeholder','Answer')
    }
  })

  $(document).on('submit','#addQuestion',function(e){
    id = $(this).data('ids');
    e.preventDefault();

    $.ajax({
      url: '/teacher/add/quiz-question/' + id,
      type:'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Question Created!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function(data) {
      let errors = data.responseJSON.errors;
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    })
    .always(function() {
      console.log("complete");
    });

  })

  //End Quiz Details


  //lesson
  $('.builder').click(function(e){
    id = $(this).data('ids')
    e.preventDefault()
    $('.btn-go').attr('data-ids',id)
  })
  $('.btn-go').click(function(e){
    e.preventDefault()
    lesson = $('.getLesson').val(),html = '', id = $(this).data('ids');
    if(lesson != ''){
      html += '<li class="dd-item dd3-item parent" data-id="">';
      html += '<div class="dd-handle dd3-handle"></div>'
      html += '<a href="#" data-ids="" id="" class="btn_edit">'
      html += '<div class="dd3-content">'+lesson+'</div>'
      html += '</a>'
      html += '</li>'
      html += '<input name="lesson[]" value="'+lesson+'" hidden/>'
    }
    $('.getID').attr('value',id)
    $('#listainer').append(html);
    $('.getLesson').val('')
  })
  $(document).on('submit','#frmSaveLesson',function(e){
    e.preventDefault()
    $.ajax({
      url: '/teacher/add/lesson',
      type: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1000);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })
  // $('.d3').on('change',function(e){
  //   alert()
  // })

  // End lesson

  //Learning Material
  $('#select_type').change(function(){
    var val = $('#select_type').val();

    if (val == 'v') {
      $('.cm').attr('name','mp4');
      $('#type_file').show();
      $('#tn').show();
      $('#video').show();
      $('#type_url').hide();
    }
    else if (val == 'f') {
      $('.cm').attr('name','files')
      $('#type_file').show();
      $('#tn').hide();
      $('#type_url').hide();
      $('#video').hide();
    }
    else if (val == 'u') {
      $('#type_url').show();
      $('#type_file').hide();
      $('#tn').hide();
      $('#video').hide();
    }
    else{
      $('#type_url').hide();
      $('#type_file').hide();
      $('#tn').hide();
      $('#video').hide();
    }
  });

  $(document).on("change", ".cm", function(evt) {
    var $source = $('#video_here');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
  });


  $('#frmSaveLearningMaterial').ajaxForm({
    beforeSend:function(){
      $('.progress-bar').text('0%');
      $('.progress-bar').css('width', '0%');
      $('.btn_vid').prop('disabled',true);
    },
    uploadProgress:function(event, position, total, percentComplete){
      $('.progress-bar').text(percentComplete + '%');
      $('.progress-bar').css('width', percentComplete + '%');
      $('.btn_vid').prop('disabled',true);
    },
    success:function(res){
      if(res.error == 'Invalid File extension'){
        $('.mp4').empty();
        $('.mp4').html("<h6 class='text-danger'  role='alert'>"+res.error+"</h6>")
        $('.btn_vid').prop('disabled',false);
        $('.progress-bar').text('0%');
        $('.progress-bar').css('width', '0%');
      }else{
        $('.mp4').empty();
        $('.progress-bar').text('Uploaded');
        $('.progress-bar').css('width', '100%');
        let timerInterval
        Swal.fire({
          allowOutsideClick: false,
          title: res.success,
          html: 'I will close in <strong></strong> seconds.',
          timer: 1500,
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              Swal.getContent().querySelector('strong')
              .textContent = Swal.getTimerLeft()
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.timer
          ) {
            $('.up-done').show();
            $('.up-done-text').text(res.success);
            // window.location.href = BASE +'/instructor/confirm/quiz/'+res.data.id;
            window.location.href = res.url;
            // console.log('I was closed by the timer')
          }
        });
      }
    },
    error:function(data){
      let errors = data.responseJSON.errors;
      $('.btn_vid').prop('disabled',false);
      $('.progress-bar').text('0%');
      $('.progress-bar').css('width', '0%');
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<h6 class='text-danger'  role='alert'>"+value+"</h6>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    }
  })


  $('#frmEditTopic').ajaxForm({
    beforeSend:function(){
      $('.progress-bar').text('0%');
      $('.progress-bar').css('width', '0%');
      $('.btn_vid').prop('disabled',true);
    },
    uploadProgress:function(event, position, total, percentComplete){
      $('.progress-bar').text(percentComplete + '%');
      $('.progress-bar').css('width', percentComplete + '%');
      $('.btn_vid').prop('disabled',true);
    },
    success:function(res){
      if(res.error == 'error'){
        $('.mp4').empty();
        $('.mp4').html("<h6 class='text-danger'  role='alert'>Invalid File extension</h6>")
        $('.btn_vid').prop('disabled',false);
        $('.progress-bar').text('0%');
        $('.progress-bar').css('width', '0%');
      }else{
        $('.mp4').empty();
        $('.progress-bar').text('Uploaded');
        $('.progress-bar').css('width', '100%');
        let timerInterval
        Swal.fire({
          allowOutsideClick: false,
          title: res.success,
          html: 'I will close in <strong></strong> seconds.',
          timer: 1500,
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              Swal.getContent().querySelector('strong')
              .textContent = Swal.getTimerLeft()
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.timer
          ) {
            $('.up-done').show();
            $('.up-done-text').text(res.success);
            setInterval(function(){
              window.location.reload();
            },1000);
          }
        });
      }
    },
    error:function(data){
      let errors = data.responseJSON.errors;
      $('.btn_vid').prop('disabled',false);
      $('.progress-bar').text('0%');
      $('.progress-bar').css('width', '0%');
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<h6 class='text-danger'  role='alert'>"+value+"</h6>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    }
  })
  //End LEarning Material

  //Add Topic QUiz
  $('#frmTopicAssess').submit(function(e){
    e.preventDefault()
    $.ajax({
      url: '/teacher/add/topic-assessment',
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $('.frmEditQuestion').submit(function(e){
    e.preventDefault()
    $.ajax({
      url: '/teacher/edit/quiz-question',
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('.frmEditTopicQuestion').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/topic-question',
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $(document).on('submit','#addTopicQuestion',function(e){
    id = $(this).data('ids');
    e.preventDefault();
    $.ajax({
      url: '/teacher/add/topic-question/' + id,
      type:'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Question Created!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function(data) {
      let errors = data.responseJSON.errors;
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    })
    .always(function() {
      console.log("complete");
    });

  })
  $('.btn-del').click(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/del/topic-question/' + id,
      type: 'delete',
      data: {ids: id}
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })

  $('.btn-quiz-del').click(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/del/quiz-question/' + id,
      type: 'delete',
      data: {ids: id}
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $('#frmEditTopicAssessment').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/topic-assessment/'+id,
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('.r_answer').on('click',function(){
    $('.right_answer').attr('value',$(this).val())
  })

  $('#frmEditActivity').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/activity/'+id,
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $(document).on('submit','#addActivityQuestion',function(e){
    id = $(this).data('ids');
    e.preventDefault();
    $.ajax({
      url: '/teacher/add/activity-question/' + id,
      type:'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Question Created!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function(data) {
      let errors = data.responseJSON.errors;
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('.frmEditActivityQuestion').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/acitivity-question',
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $('.btn-del-acitivity').click(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/del/activity-question/' + id,
      type: 'delete',
      data: {ids: id}
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })

  // Assignment
  $('#frmEditAssignment').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/assignment/'+id,
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })

  $(document).on('submit','#addAssignmentQuestion',function(e){
    id = $(this).data('ids');
    e.preventDefault();
    $.ajax({
      url: '/teacher/add/assignment-question/' + id,
      type:'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      data: new FormData(this)
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Question Created!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function(data) {
      let errors = data.responseJSON.errors;
      if(errors){
        $.each(errors,function(key,value){
          var elem = $('.' + key);
          elem.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger').remove();
          $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
          elem.html("<div class='text-danger'  role='alert'>"+value+"</div>");
          // elem.addClass(value.length > 0 ? 'border border-danger' : 'border border-success');
        });
      }
    })
    .always(function() {
      console.log("complete");
    });

  })


  $('.frmEditAssignmentQuestion').submit(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/edit/assignment-question',
      type: 'POST',
      processData: false,
      contentType: false,
      dataType: 'JSON',
      data: new FormData(this)
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p>'
        });
      }
    })
    .done(function() {
      location.reload()
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  })



  $('.btn-del-assignment').click(function(e){
    e.preventDefault()
    id = $(this).data('ids')
    $.ajax({
      url: '/teacher/del/assignment-question/' + id,
      type: 'delete',
      data: {ids: id}
    }).then(function(res){
      if(res.msg == 'success') {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          background:'#6AC04C',
          timer: 3000
        });
        Toast.fire({
          type: 'success',
          title: '<p class="text-white">Success!</p'
        });
      }
    })
    .done(function() {
      setInterval(function(){
        window.location.reload();
      },1500);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  })
  //end assignment
});
