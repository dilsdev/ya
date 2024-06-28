@if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
@include('user.mobile.index')
@else
@include('user.web.index')
@endif

