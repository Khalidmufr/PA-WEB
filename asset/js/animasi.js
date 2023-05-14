const notifikasi = $('.info-data').data('infodata');

if(notifikasi == "Login User"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Berhasil '+notifikasi,
	}).then(function() {
		window.location.href = 'user/beranda.php';
	  });
	
} else if(notifikasi == "Login Staff"){
	Swal.fire({
		icon: 'success',
		title: 'Sukses',
		text: 'Berhasil '+notifikasi,
	  }).then(function() {
		  window.location.href = 'staff/index.php';
		});
} else if(notifikasi == "Login Admin"){
	Swal.fire({
		icon: 'success',
		title: 'Sukses',
		text: 'Berhasil '+notifikasi,
	  }).then(function() {
		  window.location.href = 'admin/index.php';
		});
}else if(notifikasi == "Mendaftar"){
	Swal.fire({
		icon: 'success',
		title: 'Sukses',
		text: 'Berhasil '+notifikasi,
	  }).then(function() {
		  window.location.href = 'login.php';
		});

}else if(notifikasi == "Menambahkan Keranjang"){
	Swal.fire({
		icon: 'success',
		title: 'Sukses',
		text: 'Berhasil '+notifikasi,		
		}).then(function() {
		  window.location.href = 'produk.php';
		});
	
} else if(notifikasi == "Keranjang"|| notifikasi=="Pesanan"){
	Swal.fire({
		icon: 'warning',
		title: 'Perhatian',
		text: notifikasi +' Anda Kosong',
	  }).then(function() {
		  window.location.href = 'produk.php';
		});
}
else if(notifikasi == "Stok"){
	Swal.fire({
		icon: 'error',
		title: 'Gagal',
		text: notifikasi +' Tidak Tersedia',
	  }).then(function() {
		  window.location.href = 'produk.php';
		});
}
else if(notifikasi == "keluar"){
	Swal.fire({
		title: 'Apakah anda yakin ?',
		text: "Keluar",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Batal',
		confirmButtonText: 'Ya'
		}).then(function() {			
			window.location.href = '../login.php';
	  })
}
else if(notifikasi == "Username tidak terdaftar" || notifikasi=="Username atau password anda tidak sesuai"  || notifikasi=="Nama Sudah Digunakan"  || notifikasi=="Username Sudah Digunakan"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal',
	  text: notifikasi,
	})
}else if(notifikasi == "Kosong"){
 
}


$('.delete-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Hapus Data?',
	  text: "Data akan dihapus permanen",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});