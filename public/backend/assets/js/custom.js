$(".btn-submit").click(function () {
    // e.preventDefault();

    let firstname = $("#firstname").val();
    let fullname = $("#fullname").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let status = $('input[name="status"]:checked').val();

    // alert(status);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "{{ route('store.employee') }}",
        data: {
            firstname: firstname,
            fullname: fullname,
            email: email,
            password: password,
            status: status,
        },
        success: function (data) {
            // alert(data.success);
        },
    });
});
