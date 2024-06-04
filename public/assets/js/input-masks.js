$(document).ready(function(){
    $('#birth_date').mask('00/00/0000');
    $('#price').mask('R$ 000.000.000.000.000,00', {reverse: true});

    $('#order-create').on('submit', function(e) {
        e.preventDefault();

        let priceField = $('#price');
        let priceValue = priceField.val();

        let numericValue = priceValue.replace(/[^0-9,]/g, '').replace(',', '.');

        priceField.val(numericValue);

        this.submit();
    });
});