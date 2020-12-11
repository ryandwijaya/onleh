$(document).ready(function () {
	var root = window.location.origin + '/kp-astri/';
	var getUrl = root + 'ajax/provinsi';
	var provinsi = $('#slc-provinsi');
	var kota = $('#slc-kota');
	var kode_pos = $('#kode-pos');
	var opt_provinsi = '';
	$.ajax({
		url: getUrl,
		type: 'ajax',
		dataType: 'json',
		success: function (response) {
			var hasil = response.rajaongkir.results;
			for (var i = 0; i < hasil.length; i++) {
				opt_provinsi += '<option value="' + hasil[i].province_id + '">' + hasil[i].province + '</option>';
			}
			provinsi.html(opt_provinsi);

		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	})

	provinsi.change(function () {
		var id_provinsi = $(this).val();
		var getUrl = root + 'ajax/kota/' + id_provinsi;
		var opt_kota = '';
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function (response) {
				var hasil = response.rajaongkir.results;
				for (var i = 0; i < hasil.length; i++) {
					opt_kota += '<option value="' + hasil[i].city_id + '">' + hasil[i].city_name + '</option>';
				}
				kota.html(opt_kota);

			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		});
	});
	kota.change(function () {
		var kota_tujuan = $(this).val();
		var berat = $('#berat').val();
		var sub_total = $('#sub-total').attr('class');
		var total_bayar = $('#total-bayar');

		var getUrl = root + 'ajax/ongkir/' + kota_tujuan+'/'+berat;
		var opt_kota = '';
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function (response) {
				var hasil = response.rajaongkir.results;
				var total_ongkir = hasil[0].costs[0].cost[0].value;
				var total = parseInt(sub_total) + total_ongkir;

				console.log(sub_total);
				$('#total-ongkir').html(total_ongkir);
				$('#in-ongkir').val(total_ongkir);
				total_bayar.html(total);
				$('#in-total-bayar').val(total);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		});
	});
});
