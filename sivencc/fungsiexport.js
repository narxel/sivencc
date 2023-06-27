function exportToExcel() {
   $.ajax({
      url: 'export_excel.php',
      method: 'POST',
      data: { exportType: 'excel' },
      success: function(response) {
         // Mengarahkan pengguna untuk mengunduh file Excel
      }
   });
}

function exportToPDF() {
   $.ajax({
      url: 'export_pdf.php',
      method: 'POST',
      data: { exportType: 'pdf' },
      success: function(response) {
         // Mengarahkan pengguna untuk mengunduh file PDF
      }
   });
}