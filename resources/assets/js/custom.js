$(document).ready(function(){
    $('.delete').click(function(){
        $("#confirm").attr("href", $(this).attr("href"));
        $("#confirmSingleDelete").modal('toggle');
        return false;
    });
    $('#confirm-multiple').click(function () {
        $('#formfield').submit();
        return false;
    });
    $('#delete-selecionados').click(function(){
        $("#confirmMultipleDelete").modal('toggle');
        return false;
    });
    $("#all").click(function () {
        $(".item").prop('checked', $(this).prop('checked'));
    });
    $('.cpf').inputmask("999.999.999-99");
    $('.cnpj').inputmask("99.999.999/9999-99");
    $('.date').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: true,
        language: "pt-BR",
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true
    }).inputmask('dd/mm/yyyy');
    $('.select').select2();
});