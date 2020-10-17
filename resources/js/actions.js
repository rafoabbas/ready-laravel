(function($) {
    'use strict'

    $(function() {

        $('[data-toggle="click-number"]').on('click', function(){
            let number = $(this).attr('data-number');

            let phone_number = $("#phone_number_input");
            console.log(number);

            phone_number.val(phone_number.val() + number);
        });

        $('[data-toggle="select2"]').select2();

        $('[data-ajax-sweet="item"]').on('click', function(){

            let _token = $('#csrf-token').attr('content');
            let url = $(this).attr('data-url');
            let method = $(this).attr('data-method');

            //
            // Swal.fire({
            //     title: "Are you sure?",
            //     text: "You won't be able to revert this!",
            //     type: "warning",
            //     showCancelButton: !0,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Yes, delete it!" }
            //     ).then(
            //     function (t) {
            //         t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success");
            //     }
            // );

            swal.fire({
                title: $(this).attr('data-title'),
                text: $(this).attr('data-message'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: $(this).attr('data-yes'),
                cancelButtonText: $(this).attr('data-no'),
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                // confirmButtonClass: 'btn btn-success',
                // cancelButtonClass: 'btn btn-danger',
                // buttonsStyling: false


            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        url: url,
                        type: method,
                        data: {
                            "_token": _token,
                        },
                        success: function (data){
                            //console.log(data);
                            swal.fire({
                                text: data.message,
                                type: data.icon
                            });

                            if (data.reload){
                                setTimeout(function(){
                                    location.reload();
                                }, data.delay);
                            }

                            if (data.redirect){
                                setTimeout(function(){
                                    location.reload();
                                    $(location).attr('href', data.redirect)
                                }, data.delay);
                            }
                        }
                    });
                }
            });

        });



        $('[data-toggle="pagination"]').change('click',function () {
            var selected = $(this).children("option:selected").val();
            var pathname = $(location).attr('pathname');
            let params = new URLSearchParams(document.location.search.substring(1));
            params.set('limit',selected);
            $(location).attr('href', pathname+'?'+params.toString())
        });

    });
}(jQuery))
