// Slider Section start
function updateSliderStatus(id){
    swal({
        title: 'Are You Sure ?',
        text: "This Slider Will be Visible In Home Page",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "slider-section-status-update/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true)
                    {
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500);
                    }
                    else
                    {
                        toastr.error(result.message);
                    }
                }
            });
        }
        else
        {
            e.dismiss;
        }
    }, function (dismiss){
        return false;
    });
}
function deleteSliderSection(id){
    swal({
        title: 'Are You Sure !',
        text: "You won't Be able to revert this !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "slider-section-delete/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true){
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500)
                    }else {
                        toastr.error(result.message);
                    }
                }
            });
        }else {
            e.dismiss;
        }
    },function (dismiss){
        return false;
    });
}

 // Slider Section End
