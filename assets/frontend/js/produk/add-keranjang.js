$(document).ready(function () {
	var root = window.location.origin + '/kp-astri/';
	$('#btn-keranjang').click(function () {
		var id_user = $('#id-user').val();
		var id_produk = $('#id-produk').val();
		var jumlah_beli = $('#jumlah-beli').val();
		var getUrl = root + 'ajax/add-keranjang/' + id_user+'/'+id_produk+'/'+jumlah_beli;
		if (id_user == null || id_user == ''){
			window.location.href = root+'login';
		}else{
			$.ajax({
				url : getUrl,
				type : 'ajax',
				dataType : 'json',
				success: function (response) {
					console.log(response);
				},
				error: function (response) {
					console.log(response.status + 'error');
				}
			})
		}

	});

});
