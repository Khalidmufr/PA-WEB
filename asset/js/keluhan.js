let dataKeluhan = JSON.parse(sessionStorage.getItem('dataKeluhan')) || [];

function submitForm() {
    let nama = document.getElementById('name').value;
    let hari = document.getElementById('hari').value;
    let email = document.getElementById('inputemail').value;
    let nomor = document.getElementById('nomor').value;
    let keluhan = document.getElementById('ikeluhan').value;
    let radios = document.getElementsByName("gender");
    let gender = "";

    for (let i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
        gender = radios[i].value;
        break;
    }
    }

    let kayu = [];
    let checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

    for (let i = 0; i < checkboxes.length; i++) {
    kayu.push(checkboxes[i].value);
    }

    dataKeluhan.push({
    nama: nama,
    hari: hari,
    email: email,
    nomor: nomor,
    keluhan: keluhan,
    kayu : kayu,
    gender: gender
    });
    alert("Keluhan anda berhasil terkirim");
    sessionStorage.setItem('dataKeluhan', JSON.stringify(dataKeluhan));
    window.location.href = "riwayat.html"
}

  document.getElementById('keluhanform').addEventListener('submit', function(event) {
    event.preventDefault(); // mencegah pengiriman form
    submitForm();
  });
