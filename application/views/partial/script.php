<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>
	<script>
        $('.btn-ubah-adm').on('click', function (e) {
			e.preventDefault();
			let id_adminstaff_query = $(this).data('id');
			$('#ubahModal').modal('show');
			$.getJSON(`admin/getAjax/${id_adminstaff_query}`, function(data, status, xhr) {
                const {email_adminstaff,role,nama_adminstaff,id_adminstaff} = data;
                $('#ubahModal #id_adminstaff').val(id_adminstaff);
                $('#ubahModal #email_adminstaff').val(email_adminstaff);
                $('#ubahModal #role').val(role);
                $('#ubahModal #nama_adminstaff').val(nama_adminstaff);
            })
		})
        $('.btn-ubah-nas').on('click', function (e) {
			e.preventDefault();
			let id_user_query = $(this).data('id');
			$('#ubahModal').modal('show');
			$.getJSON(`nasabah/getAjax/${id_user_query}`, function(data, status, xhr) {
                const {email,nik,nama_lengkap,id_user} = data;
                $('#ubahModal #id_user').val(id_user);
                $('#ubahModal #email').val(email);
                $('#ubahModal #nik').val(nik);
                $('#ubahModal #nama_lengkap').val(nama_lengkap);
            })
		})
        $('.btn-detail-nasabah').on('click', function (e) {
			e.preventDefault();
			let id_user_query = $(this).data('id');
			$('#detailModal').modal('show');
			$.getJSON(`nasabah/getAjax/${id_user_query}`, function(data, status, xhr) {
                const {email,nik,nama_lengkap,id_user} = data;
                $('#ubahModal #id_user').val(id_user);
                $('#ubahModal #email').val(email);
                $('#ubahModal #nik').val(nik);
                $('#ubahModal #nama_lengkap').val(nama_lengkap);
            })
		})
    
        let arraynasabah = [];
        $('.form-tb_data_nasabah table .btn-remove-item').on('click', function() {
            if (arraynasabah.length == 0) return alert('Belum ada item nasabah dipilih!');
            arraynasabah = [];
            $('.form-tb_data_nasabah table tbody').html('');
            $('.form-tb_data_nasabah #data_nasabah').val('');
            countGrandTotal();
        })
        let arrayajuan = [];
        $('.form-tb_pengajuan_kredit table .btn-remove-item').on('click', function() {
            if (arrayajuan.length == 0) return alert('Belum ada item ajuan dipilih!');
            arrayajuan = [];
            $('.form-tb_pengajuan_kredit table tbody').html('');
            $('.form-tb_pengajuan_kredit #data_ajuan').val('');
            countGrandTotal();
        })
        $('.form-tb_data_nasabah .add-item-tb_data_nasabah').on('click', function(e) {
            let id_user = $('.form-tb_data_nasabah #nasabah').val();
            if (! id_user) return alert('Kode nasabah tidak valid');
            if (arraynasabah.filter(item => item.kode == kode).length > 0) return alert('Data nasabah Sudah Dipilih');
            if (arraynasabah.length == 0) $('.form-nasabah table tbody .item-kosong').hide();
            $.getJSON(`../nasabah/getAjax/${kode}`, function(data, status, xhr) {
                let html = `
                <tr id="${data.kode}">
                    <td><button data-kode="${data.kode}" type="button" class="btn-remove-nasabah btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    <td>${data.kode}</td>
                    <td>${data.nama_nasabah}</td>
                    <td><img src="${data.foto}" width="50"/></td>
                    <td>Rp.${data.harga}</td>
                    <td width="100"><input data-harga="${data.harga}" data-kode="${data.kode}" type="number" class="form-control jumlah" value="1" min="1" /></td>
                    <td>Rp.${data.harga}</td>
                </tr>
                `;
                arraynasabah.push({
                    kode: data.kode,
                    jumlah: 1,
                    total: data.harga
                });
                let grand_total = 0;
                arraynasabah.forEach(val => grand_total = grand_total + parseInt(val.total));
                $('.form-nasabah table tbody').append(html)
                $('.form-nasabah table tfoot').show();
                $('.form-nasabah .grand-total').html(`<h4>Rp.${grand_total}</h4>`)
                $('.form-nasabah #data_nasabah').val(JSON.stringify(arraynasabah));
            })
        })
        $('.form-nasabah table').on('click', '.btn-remove-nasabah', function() {
            $(this).parent().parent().remove();
            let id = $(this).data('id');
            arraynasabah = arraynasabah.filter(e => e.id != id);
            $('.form-nasabah #data_nasabah').val(JSON.stringify(arraynasabah));
            countGrandTotal();
        })
        $('.form-ajuan table').on('click', '.btn-remove-ajuan', function() {
            $(this).parent().parent().remove();
            let id = $(this).data('id');
            arrayajuan = arrayajuan.filter(e => e.id != id);
            $('.form-ajuan #data_ajuan').val(JSON.stringify(arrayajuan));
            countGrandTotal();
        })
        $('.form-nasabah table').on('change', '.jumlah', function() {
            let kode = $(this).data('kode');
            let jumlah = $(this).val();
            let harga = $(this).data('harga');
            let total = harga * jumlah;
            $(`.form-nasabah #${kode} td:last`).html(`Rp.${total}`)
            objIndex = arraynasabah.findIndex((obj => obj.kode == kode));
            arraynasabah[objIndex].jumlah = jumlah;
            arraynasabah[objIndex].total = total;
            countGrandTotal();
            $('.form-nasabah #data_nasabah').val(JSON.stringify(arraynasabah));
        })
        function countGrandTotal() {
            let grand_total = 0;
            arraynasabah.forEach(val => grand_total = grand_total + parseInt(val.total));
            if (grand_total <= 0) {
                $('.form-nasabah table tfoot').hide();
                $('.form-nasabah table tbody .item-kosong').show();
            }
            $('.form-nasabah .grand-total').html(`<h4>Rp.${grand_total}</h4>`)
        }
        $('.form-nasabah').on('submit', function(e) {
            e.preventDefault();
            $.post('store', $(this).serialize(), function(data, status, xhr) {
                if (! data.status) {
                    $('.error-form').html(data.error);
                    let cardOffset = $('#card-transaksi').offset();
                    let bodyOffset = $(document).scrollTop();
                    if (cardOffset.top <= bodyOffset) {
                        $('html, body').animate({
                            scrollTop: cardOffset.top,
                        }, 1000)
                    }
                    return;
                }
                document.location.href = '../transaksi';
            }, 'json');
        })
    </script>
    <script src="<?php echo base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>