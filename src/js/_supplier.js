function simpan() {
  const ajax = new XMLHttpRequest();
  ajax.onload = function () {
    document.getElementById("data").innerHTML = this.responseText;
  };

  var kodesup = document.getElementById("kodesup").value;
  var nama = document.getElementById("nama").value;
  var alamat = document.getElementById("alamat").value;
  var telp = document.getElementById("telp").value;
  var unique = document.getElementById("unique").value;
  var button = document.getElementById("button").value;

  var url =
    "../../src/components/supplier/_supplier.php?kodesup=" +
    kodesup +
    "&nama=" +
    nama +
    "&alamat=" +
    alamat +
    "&telp=" +
    unique +
    telp +
    "&button=" +
    button;

  //   alert(url);

  if (button == "edit") {
    // When User click Ubah Data
    let kode = document.getElementById("kodesup");
    kode.removeAttribute("readonly");

    // document.getElementById("kodebarang").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("alamat").value = "";
    document.getElementById("telp").value = "";

    document.getElementById("button").value = "simpan";
    document.getElementById("button").innerHTML = "Insert Data";
  }

  ajax.open("GET", url);
  ajax.send();

  console.log("Simpan Running");
}

function del(kodesup) {
  const ajax = new XMLHttpRequest();
  ajax.onload = function () {
    document.getElementById("data").innerHTML = this.responseText;
  };

  var url =
    "../../src/components/supplier/_supplier.php?kodesup=" +
    kodesup +
    "&button=delete";

  ajax.open("GET", url);
  ajax.send();

  console.log("Delete Button Running");
}

function edit(kodesup, nama, alamat, telp) {
  // When User click Edit
  let kode = document.getElementById("kodesup");
  kode.setAttribute("readonly", true);

  document.getElementById("kodesup").value = kodesup;
  document.getElementById("nama").value = nama;
  document.getElementById("alamat").value = alamat;
  document.getElementById("telp").value = telp;

  document.getElementById("button").value = "edit";
  document.getElementById("button").innerHTML = "Ubah Data";

  console.log("Edit Button Running");
}
