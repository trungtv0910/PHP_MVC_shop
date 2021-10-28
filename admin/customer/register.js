function check(bien) {

    $(bien).blur(function () {
        var x = $(this).val();
        if (x != 0 && x != null) {

            switch (bien) {
                case '#username': {
                    if (/\s/g.test(x)) {
                        $('#message_username').html("Không Đúng Định Dạng");
                        $('#message_username').addClass('text-danger');
                        $('#message_username').removeClass('text-success');
                        $('#addCust').attr('disabled', 'disabled');
                        $('#addCust').addClass('btn-danger');
                    } else {

                        $.get('./model_ajax/check_customer.php', { username: x }, function (data) {

                            if (data != 0) {
                                $('#message_username').html("Đã tồn tại tài khoản");
                                $('#message_username').addClass('text-danger');
                                $('#message_username').removeClass('text-success');
                                $('#addCust').attr('disabled', 'disabled');
                                $('#addCust').addClass('btn-danger');

                            } else {
                                $('#message_username').html("Tên đăng nhập hợp lệ");
                                $('#message_username').addClass('text-success');
                                $('#message_username').removeClass('text-danger');
                                $('#addCust').removeAttr("disabled");
                                $('#addCust').removeClass('btn-danger');
                                

                            }
                        });
                    }

                } break;
                case '#name': {

                    const isAlpha = /^[\p{L}'][ \p{L}'-]*[\p{L}]$/u

                        ;
                    if (isAlpha.test(x)) {
                        $('#message_name').html("Tên hợp lệ");
                        $('#message_name').addClass('text-success');
                        $('#message_name').removeClass('text-danger');
                        $('#addCust').removeAttr("disabled");
                        $('#addCust').removeClass('btn-danger');
                    } else {
                        $('#message_name').html("Họ tên chứa ký tự không hợp lệ");
                        $('#message_name').addClass('text-danger');
                        $('#message_name').removeClass('text-success');
                        $('#addCust').attr('disabled', 'disabled');
                        $('#addCust').addClass('btn-danger');
                    }




                } break;
                case '#email': {
                    const isEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                    if (isEmail.test(x)) {
                        $.get('./model_ajax/check_customer.php', { email: x }, function (data) {

                            if (data != 0) {
                                $('#message_email').html("Đã Tồn Tại Email Này");
                                $('#message_email').addClass('text-danger');
                                $('#message_email').removeClass('text-success');
                                $('#addCust').attr('disabled', 'disabled');
                                $('#addCust').addClass('btn-danger');

                            } else {
                                $('#message_email').html("Email Hợp Lệ");
                                $('#message_email').addClass('text-success');
                                $('#message_email').removeClass('text-danger');
                                $('#addCust').removeAttr("disabled");
                                $('#addCust').removeClass('btn-danger');

                            }
                        });
                    } else {
                        $('#message_email').html("Email không hợp lệ");
                        $('#message_email').addClass('text-danger');
                        $('#message_email').removeClass('text-success');
                        $('#addCust').attr('disabled', 'disabled');
                        $('#addCust').addClass('btn-danger');
                    }

                } break;
                case '#phone': {

                    const isPhone = /^\d+$/;


                    if (isPhone.test(x)) {
                        $('#message_phone').html("Số điện thoại hợp lệ ");
                        $('#message_phone').addClass('text-success');
                        $('#message_phone').removeClass('text-danger');
                    } else {
                        $('#message_phone').html("Số điện thoại không hợp lệ");
                        $('#message_phone').addClass('text-danger');
                        $('#message_phone').removeClass('text-success');
                    }




                } break;

            }
        }

    });




}
function check_pass(pass) {
    $(pass).blur(function () {
        var first_pass = $(this).val();
        const isPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (isPass.test(first_pass) == false) {
            $('#message_password').html("Mật khẩu ít nhất 8 chứ số, gồm chữ và số");
            $('#message_password').addClass('text-danger');
            $('#message_password').removeClass('text-success');
            $('#addCust').attr('disabled', 'disabled');
            $('#addCust').addClass('btn-danger');
        } else {
            $('#message_password').html("Mật khẩu hợp lệ");
            $('#message_password').addClass('text-success');
            $('#message_password').removeClass('text-danger');
            $('#addCust').removeAttr("disabled");
            $('#addCust').removeClass('btn-danger');
        }


    });


}
function check_pass_repass(pass, pass2) {

    $(pass2).blur(function () {
        var re_pass = $(this).val();
        var first_pass = $(pass).val();
        const isPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (isPass.test(re_pass)) {
            if (re_pass != first_pass) {
                $('#message_password_re').html("Không trùng mật khẩu");
                $('#message_password_re').addClass('text-danger');
                $('#message_password_re').removeClass('text-success');
                $('#addCust').attr('disabled', 'disabled');
                $('#addCust').addClass('btn-danger');
            } else {
                $('#message_password_re').html(" ");
                $('#message_password_re').removeClass('text-danger');
                $('#addCust').removeAttr("disabled");
                $('#addCust').removeClass('btn-danger');
            }
        } else {

        }


    });
}
