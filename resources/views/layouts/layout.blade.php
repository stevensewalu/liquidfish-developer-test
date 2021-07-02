<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LIQUID FISH DEVELOPER TEST</title>
    <link rel="icon" href="{{asset('fav.png')}}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="toast-container position-absolute p-3 bottom-0 end-0" id="toastPlacement">
    <div class="toast success-toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="response"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="toast error-toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="error"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<div class="container-sm mx-auto" >
    <div class="row main">
        <div class="col-sm col-xs-12 col-sm-12 col-md-12 col-lg-3 sidebar">
            @yield('info')
        </div>
        <div class="col content">
            @yield('form')
        </div>

    </div>
</div>
<script type="text/javascript">
    //Send Message for posting
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
            url:'{{route('messages.store')}}',
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

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
