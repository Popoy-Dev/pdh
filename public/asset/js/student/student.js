$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('[data-toggle="tooltip"]').tooltip({
    container: '.page-wrapper'
  })

  $('#summernote').summernote({
    height: 100
  });

  function today(){
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    var today = curr_date + "-" + curr_month + "-" + curr_year;
    return today;
  }


  var ava = $('.avatar');

  for(var i = 0; i < ava.length; i++) {
    ava.click(function(){
      var current = $(".active"), val = $(this).data("name");
      current[0].className = current[0].className.replace(" active", "");

      this.className += " active";
      $('.avatars').attr('value',val);
    });
  }

  $('#proceed').click(function(e){
      $('.btn-warning').addClass('d-none')
      $('.ppayment').removeClass('d-none')

  })

  $('#frmAvatar').submit(function(e){
    e.preventDefault();
    var val = $('.avatars').val(),
    ids = $('.data-ids').val();
    var frm =new FormData();
    frm.append('image',val);
    $.ajax({
      url: '/change/avatar/' + ids,
      type: 'POST',
      dataType: 'JSON',
      processData: false,
      contentType: false,
      enctype:'multipart/form-data',
      data: frm
    })
    .then(function(res){
      if(res.msg == 'success'){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          background:'#6AC04C',
          showConfirmButton: false,
          timer: 1113000
        });

        Toast.fire({
          icon: 'success',
          title: 'Successfully'
        })
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

  $('#datepicker').datepicker();
  $('#datepicker').on('changeDate', function() {
    $('#my_hidden_input').val(
      $('#datepicker').datepicker('getFormattedDate').datepicker("setDate", today())
    );
  });


  $('.pisopay').on('click',function(e){
    e.preventDefault()
    $('.bg-pisopay').addClass('bg-blue')
    $('.bg-otc').removeClass('bg-blue')
    $('.pisopay-container').removeClass('d-none')
    $('.date').removeClass('d-none')
    $('.otc-container').addClass('d-none')
    $('.otc-amount').attr('type','hidden')

  })
  $('.otc').on('click',function(e){
    e.preventDefault()
    body = $('.p-body'),
    footer = $('.p-footer')
    html = '';
    $('.otc-amount').attr('type','text').attr('value','')

    footer.empty()
    body.empty()
    html += '<p>Choose Payment</p>'
    body.append(html)

    $('.bg-otc').addClass('bg-blue')
    $('.bg-pisopay').removeClass('bg-blue')
    $('.otc-container').removeClass('d-none')
    $('.pisopay-container').addClass('d-none')
    $('.date').addClass('d-none')

    $('.others-container').addClass('d-none')
    $('.others').attr('type','hidden').attr('value',' ')
  })


  $('.payment').change(function(e){
    var html = '',
    ftml ='',
    body = $('.p-body'),
    footer = $('.p-footer');
    e.preventDefault()
    body.empty()
    footer.empty()
    $('.others-container').addClass('d-none')
    $('.others').attr('type','hidden').attr('value',' ')
    if($(this).val() == 'f'){
      html += '<p class="nav-style" style="font-size:20px;">'
      html +=  '₱ 28,000 <br/>'
      html += '1 Year'
      html += '</p>'

      ftml += '<p class="nav-style">'
      ftml +=  'Full Payment <br/>'
      ftml += '(1 Year)'
      ftml += '</p>'

      body.append(html)
      footer.append(ftml)
      $('.others').attr('value',28000)
    }else if($(this).val() == 'm'){
      html += '<p class="nav-style" style="font-size:20px;">'
      html +=  '₱ 2,800 <br/>'
      html += 'Monthly'
      html += '</p>'

      ftml += '<p class="nav-style">'
      ftml +=  'Monthly Payment</br>'
      ftml += '(10 months)'
      ftml += '</p>'

      body.append(html)
      footer.append(ftml)
      $('.others').attr('value',2800)

    }else if($(this).val() == 'q'){
      html += '<p class="nav-style" style="font-size:20px;">'
      html +=  '₱ 7,000 <br/>'
      html += '</p>'

      ftml += '<p class="nav-style">'
      ftml +=  'Quarterly Payment</br>'
      ftml += '</p>'

      body.append(html)
      footer.append(ftml)
      $('.others').attr('value',7000)
    }
    else{
      $('.others-container').removeClass('d-none')
      $('.others').attr('type','text')
      $('.others').attr('value','')
      html += '<p class="others-text nav-style" style="font-size:20px;"></p>'
      ftml += '<p class="nav-style">'
      ftml +=  'Others</br>'
      ftml += '</p>'

      body.append(html)
      footer.append(ftml)
    }
  })

  $('.others').on('keyup',function(e){
    var val = $(this).val();
    $('.others-text').text(val)
  })



  $('#formSample').submit(function(e){
    e.preventDefault();
    var amt = $('#otc-amount');
    if(amt.val() < 2800){
      amt.addClass('border border-danger')
      $('div.amount').html(
        '<p class="nav-style text-danger">Minimum of 2,800.00 </>'
      )
      return false;
    }else{
      $.ajax({
        url: '/otc/payment',
        type: 'POST',
        dataType: 'JSON',
        processData: false,
        contentType: false,
        enctype:'multipart/form-data',
        data: new FormData(this)
      })
      .then(function(res){
        if(res.msg == 'success'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            background:'#6AC04C',
            showConfirmButton: false,
            timer: 1113000
          });
          Toast.fire({
            icon: 'success',
            title: 'Successfully'
          })
        }

      })
      .done(function() {
         // location.replace(BASE+'payment-transaction')
         location.reload();
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
    }
  })

  $('#changeEmail').on('submit',function(e){
    e.preventDefault();
      $.ajax({
        url: '/put/email',
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
            timer: 1113000
          });
          Toast.fire({
            icon: 'success',
            title: 'Successfully'
          })
        }
      })
      .done(function() {
        location.reload();
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

});
