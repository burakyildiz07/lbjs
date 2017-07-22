@extends('layout')

@section('jscontent')
    <form action="{{ action('AjaxController@dondur') }}" method="post">
        Ad <input type="text">
        <button id="btn">Gönder</button>
    </form>
    <div id="sonuc"></div>
    <script type="text/javascript">
        $(function(){
            $("#btn").click(function(){
               $.post('ajax', function(data){
                   $("#sonuc").html(data);
               });
            });
        });
    </script>
@stop