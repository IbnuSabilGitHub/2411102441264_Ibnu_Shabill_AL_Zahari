function validateInput(nilai) {
  // jika input bukan angka atau di luar rentang 0-100, kembalikan false
  if (isNaN(nilai)) {
    return false;
  }
  if (nilai < 0 || nilai > 100) {
    return false;
  }
  return true;
}

function setClasification(nilai) {
  const classification = { 
    nilai: parseInt(nilai), 
    huruf: "", 
    keterangan: "" 
  };

  // Menentukan grade berdasarkan rentang nilai
  if (nilai >= 80) {
    classification.huruf = "A";
    classification.keterangan = "Lulus";
  } else if (nilai >= 75) {
    classification.huruf = "AB";
    classification.keterangan = "Lulus";
  } else if (nilai >= 70) {
    classification.huruf = "B";
    classification.keterangan = "Lulus";
  } else if (nilai >= 65) {
    classification.huruf = "BC";
    classification.keterangan = "Lulus";
  } else if (nilai >= 60) {
    classification.huruf = "C";
    classification.keterangan = "Lulus";
  } else if (nilai >= 50) {
    classification.huruf = "D";
    classification.keterangan = "Tidak Lulus";
  } else {
    classification.huruf = "E";
    classification.keterangan = "Tidak Lulus";
  }

  return classification;
}

function displayResult(classification) {
  const statusClass = classification.keterangan === "Lulus" ? "lulus" : "tidak-lulus";
  
  const resultHTML = `
    <div class="result-container ${statusClass}">
      <div class="result-item">
        <span class="label">Nilai Anda:</span>
        <span class="value">${classification.nilai}</span>
      </div>
      <div class="result-item">
        <span class="label">Grade:</span>
        <span class="value grade">${classification.huruf}</span>
      </div>
      <div class="result-item">
        <span class="label">Status:</span>
        <span class="value status">${classification.keterangan}</span>
      </div>
    </div>
  `;
  
  document.body.innerHTML = resultHTML;
}

do {
  var nilai = prompt("Nilai (0-100): ", 0);
} while (!validateInput(nilai));
var classification = setClasification(nilai);
displayResult(classification);
