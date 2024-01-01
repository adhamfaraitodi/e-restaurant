<script>
    function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
</script>
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('js/nprogress.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
