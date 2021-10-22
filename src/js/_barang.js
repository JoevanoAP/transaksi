function simpan() {
  const ajax = new XMLHttpRequest();
  ajax.onload = function () {
    document.getElementById("data").innerHTML = this.responseText;
  };

  var kodebarang = document.getElementById("kodebarang").value;
  var nama = document.getElementById("nama").value;
  var jenis = document.getElementById("jenis").value;
  var merk = document.getElementById("merk").value;
  var satuan = document.getElementById("satuan").value;
  var jumlahstok = document.getElementById("jumlahstok").value;
  var hargajual = document.getElementById("hargajual").value;
  var hargabeli = document.getElementById("hargabeli").value;
  var ket = document.getElementById("ket").value;
  var button = document.getElementById("button").value;

  var url =
    "../../src/components/barang/_barang.php?kodebarang=" +
    kodebarang +
    "&nama=" +
    nama +
    "&jenis=" +
    jenis +
    "&merk=" +
    merk +
    "&satuan=" +
    satuan +
    "&jumlahstok=" +
    jumlahstok +
    "&hargajual=" +
    hargajual +
    "&hargabeli=" +
    hargabeli +
    "&ket=" +
    ket +
    "&button=" +
    button;

  ajax.open("GET", url);
  ajax.send();

  // Edit Statment
  if (button == "edit") {
    // When User click Ubah Data
    let kode = document.getElementById("kodebarang");
    kode.removeAttribute("readonly");

    // document.getElementById("kodebarang").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("jenis").value = "";
    document.getElementById("merk").value = "";
    document.getElementById("satuan").value = "";
    document.getElementById("jumlahstok").value = "";
    document.getElementById("hargajual").value = "";
    document.getElementById("hargabeli").value = "";
    document.getElementById("ket").value = "";

    document.getElementById("button").value = "simpan";
    document.getElementById("button").innerHTML = "Insert Data";
  }
}

function del(kodebarang) {
  const ajax = new XMLHttpRequest();
  ajax.onload = function () {
    document.getElementById("data").innerHTML = this.responseText;
  };

  // document.getElementById("button").innerHTML = "Submit Data";

  var url =
    "../../src/components/barang/_barang.php?kodebarang=" +
    kodebarang +
    "&button=delete";

  ajax.open("GET", url);
  ajax.send();

  console.log("Delete Button Running");
}

function edit(
  kodebarang,
  nama,
  jenis,
  merk,
  satuan,
  jumlahstok,
  hargajual,
  hargabeli,
  ket
) {
  // When User click Edit
  let kode = document.getElementById("kodebarang");
  kode.setAttribute("readonly", true);

  document.getElementById("kodebarang").value = kodebarang;
  document.getElementById("nama").value = nama;
  document.getElementById("jenis").value = jenis;
  document.getElementById("merk").value = merk;
  document.getElementById("satuan").value = satuan;
  document.getElementById("jumlahstok").value = jumlahstok;
  document.getElementById("hargajual").value = hargajual;
  document.getElementById("hargabeli").value = hargabeli;
  document.getElementById("ket").value = ket;
  document.getElementById("button").value = "edit";
  document.getElementById("button").innerHTML = "Ubah Data";

  console.log("Edit Button Running-");
}
