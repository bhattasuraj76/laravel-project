@section('footer')
</div>
<script src="{{url('public/bootstrap/js/jquery.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/fastclick.js')}}"></script>
<script src="{{url('public/bootstrap/js/nprogress.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/jquery.hotkeys.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/prettify.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.min.js')}}"></script>
<script src="{{url('public/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function validation(){
        swal({
            title: "Oops",
            text: "User was deleted",
            icon: "warning",
        })
    }
</script>

</body>
</html>

@endsection