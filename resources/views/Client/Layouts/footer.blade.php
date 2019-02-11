@section('footer')
    <script src="{{url('public/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{url('public/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        (function ($) {

            // Add smooth scrolling to all links in navbar
            $(".navbar a,a.btn-appoint, .quick-info li a, .overlay-detail a").on('click', function(event) {

                var hash = this.hash;
                if( hash ) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }

            });
            //to hide the session message
            $(document).ready(function () {
                setTimeout(function () {
                    $('#messages').hide();

                },4000)

            });
            $(window).scroll(function() {
                if ($(".navbar-default").offset().top > 30) {
                    $(".navbar-fixed-top").addClass("color");
                } else {
                    $(".navbar-fixed-top").removeClass("color");
                }
            });

            //contact form
            $(function()
            {
                function after_form_submitted(data)
                {
                    if(data.result == 'success')
                    {
                        $('form#reused_form').hide();
                        $('#success_message').show();
                        $('#error_message').hide();
                    }
                    else
                    {
                        $('#error_message').append('<ul></ul>');

                        jQuery.each(data.errors,function(key,val)
                        {
                            $('#error_message ul').append('<li>'+key+':'+val+'</li>');
                        });
                        $('#success_message').hide();
                        $('#error_message').show();

                        //reverse the response on the button
                        $('button[type="button"]', $form).each(function()
                        {
                            $btn = $(this);
                            label = $btn.prop('orig_label');
                            if(label)
                            {
                                $btn.prop('type','submit' );
                                $btn.text(label);
                                $btn.prop('orig_label','');
                            }
                        });

                    }//else
                }

                $('#reused_form').submit(function(e)
                {
                    e.preventDefault();

                    $form = $(this);
                    //show some response on the button
                    $('button[type="submit"]', $form).each(function()
                    {
                        $btn = $(this);
                        $btn.prop('type','button' );
                        $btn.prop('orig_label',$btn.text());
                        $btn.text('Sending ...');
                    });


                    $.ajax({
                        type: "POST",
                        url: 'handler.php',
                        data: $form.serialize(),
                        success: after_form_submitted,
                        dataType: 'json'
                    });

                });
            });

        })(jQuery);
    </script>
    </body>
    </html>

@endsection