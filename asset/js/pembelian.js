let harga = 40000; // Inisialisasi harga awal
let stok = document.getElementById('stok').value;
function changeStock() {
  let newStok = parseInt(document.getElementById('stok').value); // Ambil nilai input stok
  if (newStok >= 0) { // Cek apakah nilai input valid
    stok = newStok; // Ubah stok
    total = harga * newStok; // Hitung total harga baru
    const rupiah = total.toLocaleString("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0, maximumFractionDigits: 0 });
    document.getElementById("isistok").textContent = newStok; // Update tampilan stok
    document.getElementById("harga").textContent = rupiah; // Update tampilan harga
  }
}


var minusBtns = document.querySelectorAll('.minus-btn');
var plusBtns = document.querySelectorAll('.plus-btn');
var quantityInputs = document.querySelectorAll('input[name="jumlah"]');

for (var i = 0; i < minusBtns.length; i++) {
  var minusBtn = minusBtns[i];
  var plusBtn = plusBtns[i];
  var quantityInput = quantityInputs[i];

  minusBtn.addEventListener('click', function() {
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 0) {
      quantityInput.value = currentValue - 1;
      changeStock()        
    }
  });

  plusBtn.addEventListener('click', function() {
    var currentValue = parseInt(quantityInput.value);
    if (currentValue < parseInt(quantityInput.getAttribute('max'))) {
      quantityInput.value = currentValue + 1;
      changeStock()
    }
  });
}

function cekout() {
  alert("Pesanan anda terkirim");
  var noti = document.querySelector('h1');
  var button = document.getElementsByTagName('button');
	for(var but of button){
		but.addEventListener('click', (e)=>{
			var add = Number(noti.getAttribute('data-count') || 0);
			noti.classList.add('zero')
			noti.setAttribute('data-count', add +1);
		})
	} 
}
// document.getElementById('beli').addEventListener('submit', function(event) {
//   event.preventDefault(); // mencegah pengiriman form
//   cekout();
// });