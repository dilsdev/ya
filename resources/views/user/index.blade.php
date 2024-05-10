
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
    <!-- Tampilan untuk perangkat seluler -->
    @include('user.mobile.index')
    @else
    <!-- Tampilan untuk desktop -->
    {{-- @include('desktop_content') --}}
    @include('user.web.index')
@endif

