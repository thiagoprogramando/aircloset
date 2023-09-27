$(document).ready(function() {
    $("#afiliado").click(function() {
        var baseUrl = window.location.origin;
        var codigo = $(this).data("link");
        var link = baseUrl + "/cadastraCliente/" + codigo;

        Swal.fire({
            title: 'Link do Afiliado',
            html:  '<div class="form-group d-flex">' +
                   '<input type="text" class="form-control w-75" id="linkInput" value="' + link + '" readonly>' +
                   '<button id="abrirLink" class="btn btn-primary w-25">Abrir</button>' +
                   '</div>',
            showCancelButton: false,
            showCloseButton: false,
            showConfirmButton : false,
        });

        $("#linkDiv").show();

        $("#abrirLink").click(function() {
            var linkUrl = $("#linkInput").val();
            window.open(linkUrl, '_blank');
        });
    });
});
