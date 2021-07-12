<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- bootstap bundle js -->
<script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js -->
<script src="{{ asset('public/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- main js -->
<script src="{{ asset('public/assets/libs/js/main-js.js') }}"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
    function notify_success(message) {
        let html_str = '<div class="alert alert-success text-center"><strong>'+ message +'</strong></div>';
        $('#alert_message').fadeIn();
        $('#alert_message').html(html_str).fadeOut(3000);
    }
    function notify_error(message = '') {
        if (message === '') {
            message = "Sorry, we have to face some technical issues please try again later."
        } 
        let html_str = '<div class="alert alert-danger text-center"><strong>'+ message +'</strong></div>';
        $('#alert_message').fadeIn();
        $('#alert_message').html(html_str).fadeOut(3000);
    }
</script>