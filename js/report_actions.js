
// handle button 'btn-preview-pie'
$('#btn-preview-pie').click(function() {
    $('.imagepreview').attr('src', "./image/pie.png");
	$('#imagemodal').modal('show');
});
$('#btn-preview-pos').click(function() {
    $('.imagepreview').attr('src', "./image/pos_sentiment.png");
	$('#imagemodal').modal('show');
});
$('#btn-preview-neg').click(function() {
    $('.imagepreview').attr('src', "./image/neg_sentiment.png");
	$('#imagemodal').modal('show');
});

// handle feature search
$('#btn-search-table').click(function() {
    var value = $('#txt-input-search').val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});