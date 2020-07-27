$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var gridLineColor = 'rgba(77, 138, 240, .1)';
  var colors = {
    primary:         "#727cf5",
    secondary:       "#7987a1",
    success:         "#42b72a",
    info:            "#68afff",
    warning:         "#fbbc06",
    danger:          "#ff3366",
    light:           "#ececec",
    dark:            "#282f3a",
    muted:           "#686868"
  }
  var grade = $('#gradeperlevel');
  $.ajax({
    url: '/admin/gradelevel',
    type: 'GET',
  })
  .done(function(res) {
    new Chart(grade, {
      type: 'bar',
      data: {
        labels: res.gradelvl,
        datasets: [{
          label: 'Grade',
          data:res.count,
          backgroundColor: colors.primary
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false,
          labels: {
            display: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            barPercentage: .3,
            categoryPercentage: .6,
            gridLines: {
              display: false
            },
            ticks: {
              fontColor: '#8392a5',
              fontSize: 10
            }
          }],
          yAxes: [{
            gridLines: {
              color: gridLineColor
            },
            ticks: {
              fontColor: '#8392a5',
              fontSize: 10,
              min: 0,
            }
          }]
        }
      }
    });
  })




$('.showPassword').click(function(e){
  $(this).is(":checked") ? ($('.pw').attr('type','text'),$('.cpw').attr('type','text')) :
  ($('.pw').attr('type','password'),$('.cpw').attr('type','password'))
})

$('.approved').click(function(e){
  e.preventDefault()
  id = $(this).data('ids'),
  uid = $(this).data('user');

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-primary'
    },
    buttonsStyling: false,
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You want to approve this student?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonClass: 'ml-2',
    confirmButtonText: 'Yes!',
    cancelButtonText: 'Cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '/admin/approve',
        type: 'POST',
        data: {ids: id,uid:uid}
      })
      .then(function(res){
        if(res.msg == 'success'){
          swalWithBootstrapButtons.fire(
            'Success!',
            '',
            'success'
          )
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

$('.btn-unpublish').click(function(e){
  e.preventDefault()
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
    text: "You want to approve this student?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonClass: 'ml-2',
    confirmButtonText: 'Yes!',
    cancelButtonText: 'Cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '/admin/unpublish',
        type: 'POST',
        data: {ids: id}
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

$('.for-approval').click(function(e){
  e.preventDefault()
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
    text: "You want to approve this student?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonClass: 'ml-2',
    confirmButtonText: 'Yes!',
    cancelButtonText: 'Cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '/admin/for-approval',
        type: 'POST',
        data: {ids: id}
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

$('#frmAddTeacher').submit(function(e){
  e.preventDefault()
  $.ajax({
    url: '/admin/create/teacher-account',
    type: 'POST',
    processData: false,
    contentType: false,
    dataType: 'JSON',
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
        title: '<p class="text-white">Success!</p'
      });
    }
  }).done(function() {
    setInterval(function(){
      window.location.reload();
    },1500);
  }).fail(function(data) {
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
