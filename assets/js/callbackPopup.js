/**
 * Created by work on 14.02.2016.
 */

jQuery(document).ready(function(){

    var entity = '';
    var title = '';

    /* подгружаем содержимое форму в popup*/
    $('.callback').on('click',function(event){

        event.preventDefault();
        entity = $(this).attr('entity');
        title = $(this).text();

        var modalContainer = $('#callbackpop');

        modalContainer.find('#myModalLabel').html(title);
        $('#callbackform-entity').val(entity);
        modalContainer.modal({show:true});
        afterSuccess();

    });

    /**
     * отправка данных из формы на обработку в контроллер
     */
    function afterSuccess(){
        $('.modal-body').on('submit','.callback-form',function(event){
            event.preventDefault();
            var form = $(this);
            $.ajax({
                url: 'callback/callback/callback',
                type: 'POST',
                data: form.serialize(),
                success: function(data){
                    var modalBody = $('.modal-body');
                    if (data == 'true') {
                        modalBody.html("<div class='alert alert-success'>" +
                                            "<strong>Спасибо! Ваше сообщение отправлено.</strong>" +
                                            "</div>");
                        setTimeout(function() {
                            $("#callbackpop").modal('hide');
                        }, 2000);
                    }
                    else {
                        $('.modal-body').html(data);
                    }
                }
            });
        });
    }
});
