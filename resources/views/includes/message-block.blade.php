@if (Session::has('messageSuccess'))
<div id="bloc-10"><div class="alert alert-success"><script> setInterval(function(){ var obj = document.getElementById("bloc-10"); obj.innerHTML = "";},3000);</script>
    <center>{{ Session::get('messageSuccess') }}</center></div></div>
{{Session::forget('messageSuccess')}}
@endif
@if (Session::has('messageError'))
<div id="bloc-10"><div class="alert alert-danger"><script> setInterval(function(){ var obj = document.getElementById("bloc-10"); obj.innerHTML = "";},3000);</script>
    <center>{{ Session::get('messageError') }}</center></div>
{{Session::forget('messageError')}}
@endif

