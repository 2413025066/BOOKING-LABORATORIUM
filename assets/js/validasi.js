function validasiForm() {

    let tanggal = document.forms["formBooking"]["tanggal"].value;
    let jam = document.forms["formBooking"]["jam"].value;

    if (tanggal == "" || jam == "") {

        alert("Data tidak boleh kosong!");

        return false;
    }

    return true;
}