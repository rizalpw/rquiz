<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilnilai();
		tampilsoal();
		tampilkuis();
		tampiluser();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilnilai() {
		$.get('<?php echo base_url('nilai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-nilai').html(data);
			refresh();
		});
	}

	var id_nilai;
	$(document).on("click", ".konfirmasiHapus-nilai", function() {
		id_nilai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datanilai", function() {
		var id = id_nilai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('nilai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilnilai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-datanilai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('nilai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-nilai').modal('show');
		})
	})

	$('#form-tambah-nilai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('nilai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilnilai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-nilai").reset();
				$('#tambah-nilai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-nilai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('nilai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilnilai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-nilai").reset();
				$('#update-nilai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-nilai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-nilai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//kuis
	function tampilkuis() {
		$.get('<?php echo base_url('kuis/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kuis').html(data);
			refresh();
		});
	}

	var kuis_id;
	$(document).on("click", ".konfirmasiHapus-kuis", function() {
		kuis_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datakuis", function() {
		var id = kuis_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kuis/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilkuis();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-datakuis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kuis/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kuis').modal('show');
		})
	})

	$(document).on("click", ".detail-datakuis", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('kuis/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kuis').modal('show');
		})
	})

	$('#form-tambah-kuis').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('kuis/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilkuis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kuis").reset();
				$('#tambah-kuis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kuis', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('kuis/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilkuis();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kuis").reset();
				$('#update-kuis').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kuis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kuis').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//user
	function tampiluser() {
		$.get('<?php echo base_url('user/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-user').html(data);
			refresh();
		});
	}

	var user_id;
	$(document).on("click", ".konfirmasiHapus-user", function() {
		user_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datauser", function() {
		var id = user_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('user/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampiluser();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-datauser", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('user/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-user').modal('show');
		})
	})

	$(document).on("click", ".detail-datauser", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('user/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-user').modal('show');
		})
	})

	$('#form-tambah-user').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('user/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampiluser();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-user").reset();
				$('#tambah-user').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-user', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('user/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampiluser();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-user").reset();
				$('#update-user').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-user').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-user').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//soal
	function tampilsoal() {
		$.get('<?php echo base_url('soal/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-soal').html(data);
			refresh();
		});
	}

	var id_soal;
	$(document).on("click", ".konfirmasiHapus-soal", function() {
		id_soal = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datasoal", function() {
		var id = id_soal;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('soal/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilsoal();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-datasoal", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('soal/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-soal').modal('show');
		})
	})

	$(document).on("click", ".detail-datasoal", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('soal/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-soal').modal('show');
		})
	})

	$('#form-tambah-soal').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('soal/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilsoal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-soal").reset();
				$('#tambah-soal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-soal', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('soal/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilsoal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-soal").reset();
				$('#update-soal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-soal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-soal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>