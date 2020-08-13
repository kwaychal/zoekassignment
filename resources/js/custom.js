$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      $(".delete-data").on("click", function(){

        let rowId = $(this).data('row-id');
		let url = $(this).data('url');
		
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax(
              {
                  url: url,
                  type: 'delete', // replaced from put
                  dataType: "JSON",
                  data: {
                      "_method": "DELETE" // method and token not needed in data
                  },
                  success: function (response)
                  {
					  console.log(response); // see the response sent
					  if(response){
						$("#"+rowId).remove();
					  }
                  },
                  error: function(xhr) {
                   console.log(xhr.responseText); // this line will save you tons of hours while debugging
                  // do something here because of error
                 }
              });
          }
        })
        
      });

      
    
});