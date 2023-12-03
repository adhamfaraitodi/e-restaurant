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
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
@endif
