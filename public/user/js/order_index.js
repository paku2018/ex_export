$('#transporter').select2({
    theme: "bootstrap"
});

$("#orderForm").validate({
    validClass: "success",
    rules: {
        order_desc: {
            required: true
        },
        quantity: {
            required: true
        },
        order_count: {
            required: true
        },
        delivery_name: {
            required: true
        },
        delivery_address: {
            required: true
        },
        delivery_number: {
            required: true
        },
        delivery_city: {
            required: true
        },
        delivery_state: {
            required: true
        },
        delivery_zip: {
            required: true
        },
        delivery_neighborhood: {
            required: true
        },
        request_at: {
            required: true
        }
    },
    messages: {
        bill_name: {
            required: 'This field is required.',
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
});

$('#btn-save').click(function(e) {
    if($('#transporter').val()!=0 && ($('#st').val()=="inactive"||$('#st').val()=="cancelled")){
        swal({
            title: 'Are you sure?',
            text: "You will send a request to the transporter.",
            type: 'question',
            icon: 'info',
            buttons:{
                confirm: {
                    text : 'Yes',
                    className : 'btn btn-custom'
                },
                cancel: {
                    visible: true,
                    text : 'Cancel',
                    className: 'btn btn-custom-error'
                }
            }
        }).then((confirmed) => {
            if (confirmed) {
                $('#orderForm').submit();
            }
        });
    }
    else{
        $('#orderForm').submit();
    }
})


function cancelOrder(id) {
    swal({
        title: 'Are you sure?',
        text: "You will cancel this request.",
        type: 'question',
        icon: 'info',
        buttons:{
            confirm: {
                text : 'Yes',
                className : 'btn btn-custom'
            },
            cancel: {
                visible: true,
                text : 'Cancel',
                className: 'btn btn-custom-error'
            }
        }
    }).then((confirmed) => {
        if (confirmed) {
            let formData = new FormData();
            formData.append('id',id);
            formData.append('_token',_token);
            $.ajax({
                url: path_cancel,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.result){
                        location.reload();
                    }else{
                        swal("Ops! You cannot update this request!", {
                            icon: "error",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-custom-error'
                                }
                            }
                        });
                    }
                },
            });
        }
    });
}
