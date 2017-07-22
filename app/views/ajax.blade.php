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

  $('.modal-footer').on('click', '.edit', function() {
        var id= {{$permission->id}}
        $.ajax({
            type: 'PUT',
            url: 'permissions/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id':id,
                'name': $('#name').val(),
                'label': $('#label').val()
            },
            success: function(data) {
                $('.errorName').addClass('hidden');
                $('.errorSurname').addClass('hidden');
                $('.errorEmail').addClass('hidden');
                $('.errorPassword').addClass('hidden');
                $('.errorPasswordConfirmation').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        $('#editModal').modal('show');
                        $.map(data.errors,function (val,key) {
                            toastr.error('Hata!', val, {timeOut: 5000});
                        })
                    }, 500);

                    if (data.errors.name) {
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }

                } else {
                    toastr.success('İzin başarıyla güncenllendi!', 'Başarılı', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.label + "</td><td><button class='edit-modal btn-xs btn btn-info' data-id='" + data.id +"'>  <i class='fa fa-edit' aria-hidden='true'></i> Düzenle</button> <button class='delete-modal btn-xs btn btn-danger' data-id='" + data.id + "'> <i class='fa fa-trash-o' aria-hidden='true'></i>Sil</button></td></tr>");
                }
            }
        });
    });
