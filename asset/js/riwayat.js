// const dataKeluhan = JSON.parse(sessionStorage.getItem('dataKeluhan'));
function riwayat(){
    let dataKeluhan = JSON.parse(sessionStorage.getItem('dataKeluhan'));
    // Ambil index terakhir
    let lastIndex = dataKeluhan.length - 1;
    // Ambil data pada index terakhir
    let dataTerakhir = dataKeluhan[lastIndex];

    document.getElementById('name').textContent = dataTerakhir.nama;
    document.getElementById('hari').textContent = dataTerakhir.hari;
    document.getElementById('isiemail').textContent = dataTerakhir.email;
    document.getElementById('keluhan').textContent = dataTerakhir.keluhan;
    document.getElementById('nomor').textContent = dataTerakhir.nomor;
    document.getElementById('kayu').textContent = dataTerakhir.kayu.join(', ');
    document.getElementById('gender').textContent = dataTerakhir.gender;
};

riwayat();