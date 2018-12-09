$(document).ready(function () {
    $('.btn-edit').click(function() {
        var productId = $(this).parent().parent().attr('product-id');
        var url = window.location.pathname + '/edit/' + productId;
        window.open(url, "_self");
    });

    $('.btn-delete').click(function() {
        var productId = $(this).parent().parent().attr('product-id');
        var url = window.location.pathname + '/delete/' + productId;
        window.open(url, "_self");
    });
});