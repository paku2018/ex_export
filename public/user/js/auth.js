let $validator = $('form#registerForm').validate({
    ignore: 'input[type=hidden]', // ignore hidden fields
    highlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function(error, element) {
        error.appendTo( element.parent().parent().find('label.error-part') );
    },
    rules: {
        name:{
            required: true
        },
        password_register: {
            required: true,minlength: 6
        },
        password_confirmation: {
            required: true,
            equalTo: '#password_register'
        },
        email: {
            email: true,required: true,
        }
    },
    messages: {
        name:{
          required: 'Please input name',
        },
        password_register: {
            required: 'Please input password',
            minlength: 'Please input more {0} characters',
        },
        password_confirmation: {
            required: 'Confirm the password',
            equalTo: 'Password is not equal',
        },
        email: {
            required: 'Please input email',
            email:'Please input email type'
        },
    }
});

let $validator2 = $('form#loginForm').validate({
    ignore: 'input[type=hidden]', // ignore hidden fields
    highlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function(error, element) {
        error.appendTo( element.parent().parent().find('label.error-part') );
    },
    rules: {
        password: {
            required: true,minlength: 6
        },
        email: {
            email: true,required: true,
        }
    },
    messages: {
        password: {
            required: 'Please input password',
            minlength: 'Please input more {0} characters',
        },
        email: {
            required: 'Please input email',
            email:'Please input email type'
        },
    }
});

function validRegCheck() {
    let $valid = $('form#registerForm').valid();
    if (!$valid) {
        $validator.focusInvalid();
        return false;
    }
    return true;
}

function validLogCheck() {
    let $valid = $('form#loginForm').valid();
    if (!$valid) {
        $validator2.focusInvalid();
        return false;
    }
    return true;
}



