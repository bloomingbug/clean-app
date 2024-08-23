const lainnyaCheck = document.querySelector("#lainnya");
const isiLainnya = document.querySelector("#isiLainnya");
const kirim = document.querySelector("#kirim");

lainnyaCheck.addEventListener("click", function () {
  if (this.checked) {
    isiLainnya.classList.toggle("d-none");
  } else {
    isiLainnya.classList.toggle("d-none");
  }
});
