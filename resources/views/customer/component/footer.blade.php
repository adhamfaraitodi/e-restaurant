<footer id="footer" class="overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="footer-top-area">
                <div class="row d-flex flex-wrap justify-content-center">
                    <div class="col-lg-4 col-sm-6 pb-3">
                        <div class="footer-menu">
                            <img src="{{asset('img/logooooo.png')}}" alt="logo">
                            <p>Nisi, purus vitae, ultrices nunc. Sit ac sit suscipit hendrerit. Gravida massa volutpat aenean odio erat nullam fringilla.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 pb-3">
                        <div class="footer-menu contact-item">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</footer>
<div id="footer-bottom">
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-end">
            <div class="col-md-4 col-sm-6 ">
                <div class="copyright">
                    <p>© Copyright 2023 E-restaurant.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
@if (!empty($snapToken))
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('{{$snapToken}}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
                /* You may add your own implementation here */
                alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
                /* You may add your own implementation here */
                alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
                /* You may add your own implementation here */
                alert("payment failed!"); console.log(result);
            },
            onClose: function () {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        });
    });
</script>
@endif
