$(document).ready(function () {
    $('#qrup').change(function () {
//        console.log($(this).val());
        $('#secim').parent().addClass('hidden');
        $.ajax({
            url: 'getModels.php',
            type: 'GET',
            dataType: 'json',
            data: {
                id: $(this).val()
            },
            success: function (data) {
                $('#secim').html('<option value="0">Fennler</option>');
                $('#secim').parent().removeClass('hidden');
                for (var i = 0; i < data.length; i++) {
                    $('#secim').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }
            }
        });
    });