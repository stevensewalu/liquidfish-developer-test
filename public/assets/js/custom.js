$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".submit").click((e) => {
    e.preventDefault();
    document.getElementById('spinner').style.display = 'inline';
    const data = {
        firstName: $("input[name=firstName]").val(),
        lastName: $("input[name=lastName]").val(),
        email: $("input[name=email]").val(),
        phone: $("input[name=phone]").val(),
        subject: $("input[name=subject]").val(),
        message: $("textarea[name=message]").val()
    }

    $.ajax({
        type:'POST',
        url: postUrl,
        data,
        success:(response) => {
            document.getElementById('response').innerText = response.data.firstName + "'s message has been successfully sent"
            $('.success-toast').toast('show');
            document.getElementById('spinner').style.display = 'none';
            //reset form
            document.getElementById("form").reset();

        },
        error: (xhr, status, error) => {
            document.getElementById('spinner').style.display = 'none';
            if(xhr.responseJSON.message)
                document.getElementById('error').innerText = xhr.responseJSON.message
            if(xhr.responseJSON.errors)
                for (detail in xhr.responseJSON.errors) {
                    document.getElementById('error').innerText = xhr.responseJSON.errors[detail];
                    $('.error-toast').toast('show');

                }

        }

    });

});
