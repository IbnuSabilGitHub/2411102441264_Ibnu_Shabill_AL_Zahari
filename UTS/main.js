// Daftar file dalam workspace
const workspaceFiles = [
  // Praktikum 1
  { path: 'Praktikum 1/1_struktur_dasar.html', name: '1. Struktur Dasar HTML', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/2_heading.html', name: '2. Heading', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/3_paragraf.html', name: '3. Paragraf', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/4_link.html', name: '4. Link', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/5_img.html', name: '5. Image', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/6_list.html', name: '6. List', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/7_div_container.html', name: '7. Div Container', folder: 'Praktikum 1' },
  { path: 'Praktikum 1/index.html', name: 'Index', folder: 'Praktikum 1' },
  
  // Praktikum 2
  { path: 'Praktikum 2/html/01-css-eksternal.html', name: '01. CSS Eksternal', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/html/02-selector.html', name: '02. Selector', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/html/03-properti-text.html', name: '03. Properti Text', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/html/04-warna-background.html', name: '04. Warna Background', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/html/05-box-model.html', name: '05. Box Model', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/html/06-layout-dasar.html', name: '06. Layout Dasar', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/css/01-css-eksternal.css', name: '01. CSS Eksternal (CSS)', folder: 'Praktikum 2' },
  { path: 'Praktikum 2/css/02-selector.css', name: '02. Selector (CSS)', folder: 'Praktikum 2' },
  
  // Praktikum 3
  { path: 'Praktikum_3/bootstrap/index.html', name: 'Bootstrap Index', folder: 'Praktikum 3' },
  { path: 'Praktikum_3/tailwind/index.html', name: 'Tailwind Index', folder: 'Praktikum 3' },
  
  // Praktikum 4
  { path: 'Praktikum_4/index.html', name: 'Index', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/about.html', name: 'About', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_1/latihan-01.html', name: 'Latihan 01', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_2/latihan-02.html', name: 'Latihan 02', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_3/latihan-03.html', name: 'Latihan 03', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_4/latihan-04.html', name: 'Latihan 04', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_5/latihan-05.html', name: 'Latihan 05', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_6/latihan-06.html', name: 'Latihan 06', folder: 'Praktikum 4' },
  { path: 'Praktikum_4/latihan_7/latihan-07.html', name: 'Latihan 07', folder: 'Praktikum 4' },
  
  // Praktikum 5
  { path: 'Praktikum_5/latihan01.html', name: 'Latihan 01', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan02.html', name: 'Latihan 02', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan03.html', name: 'Latihan 03', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan04.html', name: 'Latihan 04', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan05.html', name: 'Latihan 05', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan06.html', name: 'Latihan 06', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan07.html', name: 'Latihan 07', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan08.html', name: 'Latihan 08', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan09.html', name: 'Latihan 09', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan10.html', name: 'Latihan 10', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan11.html', name: 'Latihan 11', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan12.html', name: 'Latihan 12', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan13.html', name: 'Latihan 13', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan14.html', name: 'Latihan 14', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/latihan15.html', name: 'Latihan 15', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/soal/saol_1/index.html', name: 'Soal 1 - Index', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/soal/soal_2/index.html', name: 'Soal 2 - Index', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/hello.js', name: 'Hello.js (JS File)', folder: 'Praktikum 5' },
  { path: 'Praktikum_5/soal/saol_1/main.js', name: 'Soal 1 - Main.js (JS File)', folder: 'Praktikum 5' },
  
  // Praktikum 6
  { path: 'Praktikum_6/01_struktur_dasar/helloworld.php', name: 'Hello World', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/color.php', name: 'Color', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/komentar.php', name: 'Komentar', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/test1.php', name: 'Test 1', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/test2.php', name: 'Test 2', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/test3.php', name: 'Test 3', folder: 'Praktikum 6' },
  { path: 'Praktikum_6/01_struktur_dasar/test4.php', name: 'Test 4', folder: 'Praktikum 6' },
  
  // Praktikum 7
  { path: 'Praktikum_7/02_assignment_aritmatik/1-byvalue.php', name: '1. By Value', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/2-byarray1.php', name: '2. By Array 1', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/2-byarray2.php', name: '2. By Array 2', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/3-byreference1.php', name: '3. By Reference 1', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/3-byreference2.php', name: '3. By Reference 2', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/4-aritmatika.php', name: '4. Aritmatika', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/5-presedensi.php', name: '5. Presedensi', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/6-increment.php', name: '6. Increment', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/script5-1.php', name: 'Script 5-1', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/script5-2.php', name: 'Script 5-2', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/script5-3.php', name: 'Script 5-3', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/script5-4.php', name: 'Script 5-4', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/02_assignment_aritmatik/script5-5.php', name: 'Script 5-5', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/soal/soal_1.php', name: 'Soal 1', folder: 'Praktikum 7' },
  { path: 'Praktikum_7/soal/soal_2.php', name: 'Soal 2', folder: 'Praktikum 7' },
];

// Fungsi untuk cek apakah file bisa dirender
function isRenderable(filePath) {
  const renderableExtensions = ['.html', '.htm', '.php'];
  const extension = filePath.substring(filePath.lastIndexOf('.')).toLowerCase();
  return renderableExtensions.includes(extension);
}

// Fungsi untuk group files berdasarkan folder
function groupFilesByFolder(files) {
  const grouped = {};
  files.forEach(file => {
    if (!grouped[file.folder]) {
      grouped[file.folder] = [];
    }
    grouped[file.folder].push(file);
  });
  return grouped;
}

// Fungsi untuk render file list
function renderFileList() {
  const groupedFiles = groupFilesByFolder(workspaceFiles);
  const container = document.getElementById('file-list-container');
  
  if (!container) {
    console.error('Container dengan id "file-list-container" tidak ditemukan');
    return;
  }
  
  let html = '';
  
  Object.keys(groupedFiles).sort().forEach(folderName => {
    html += `
      <div class="mb-6">
        <h3 class="text-xl font-bold text-gray-800 mb-3 border-b-2 border-gray-300 pb-2">
          📁 ${folderName}
        </h3>
        <ul class="space-y-2 ml-4">
    `;
    
    groupedFiles[folderName].forEach((file, index) => {
      const renderable = isRenderable(file.path);
      
      if (renderable) {
        // File bisa dirender - buat link aktif
        html += `
          <li class="flex items-center">
            <span class="text-gray-500 mr-2">${index + 1}.</span>
            <a href="../${file.path}" 
               class="text-blue-600 hover:text-blue-800 hover:underline"
               target="_blank">
              ${file.name}
            </a>
            <span class="ml-2 text-xs text-green-600">✓ Bisa dirender</span>
          </li>
        `;
      } else {
        // File tidak bisa dirender - tampilkan teks biasa tanpa link
        html += `
          <li class="flex items-center">
            <span class="text-gray-500 mr-2">${index + 1}.</span>
            <span class="text-gray-500">
              ${file.name}
            </span>
            <span class="ml-2 text-xs text-red-600">✗ Tidak bisa dirender</span>
          </li>
        `;
      }
    });
    
    html += `
        </ul>
      </div>
    `;
  });
  
  container.innerHTML = html;
}

// Fungsi untuk filter files
function filterFiles(searchTerm) {
  const filtered = workspaceFiles.filter(file => 
    file.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
    file.path.toLowerCase().includes(searchTerm.toLowerCase()) ||
    file.folder.toLowerCase().includes(searchTerm.toLowerCase())
  );
  
  const groupedFiles = groupFilesByFolder(filtered);
  const container = document.getElementById('file-list-container');
  
  let html = '';
  
  if (filtered.length === 0) {
    html = '<p class="text-gray-500 text-center py-8">Tidak ada file yang ditemukan</p>';
  } else {
    Object.keys(groupedFiles).sort().forEach(folderName => {
      html += `
        <div class="mb-6">
          <h3 class="text-xl font-bold text-gray-800 mb-3 border-b-2 border-gray-300 pb-2">
            📁 ${folderName}
          </h3>
          <ul class="space-y-2 ml-4">
      `;
      
      groupedFiles[folderName].forEach((file, index) => {
        const renderable = isRenderable(file.path);
        
        if (renderable) {
          html += `
            <li class="flex items-center">
              <span class="text-gray-500 mr-2">${index + 1}.</span>
              <a href="../${file.path}" 
                 class="text-blue-600 hover:text-blue-800 hover:underline"
                 target="_blank">
                ${file.name}
              </a>
              <span class="ml-2 text-xs text-green-600">✓ Bisa dirender</span>
            </li>
          `;
        } else {
          html += `
            <li class="flex items-center">
              <span class="text-gray-500 mr-2">${index + 1}.</span>
              <span class="text-gray-500">
                ${file.name}
              </span>
              <span class="ml-2 text-xs text-red-600">✗ Tidak bisa dirender</span>
            </li>
          `;
        }
      });
      
      html += `
          </ul>
        </div>
      `;
    });
  }
  
  container.innerHTML = html;
}

// Initialize saat DOM ready
document.addEventListener('DOMContentLoaded', function() {
  renderFileList();
  
  // Setup search functionality
  const searchInput = document.getElementById('search-input');
  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      const searchTerm = e.target.value;
      if (searchTerm.trim() === '') {
        renderFileList();
      } else {
        filterFiles(searchTerm);
      }
    });
  }
  
  // Display statistics
  const totalFiles = workspaceFiles.length;
  const renderableFiles = workspaceFiles.filter(f => isRenderable(f.path)).length;
  const nonRenderableFiles = totalFiles - renderableFiles;
  
  const statsElement = document.getElementById('file-stats');
  if (statsElement) {
    statsElement.innerHTML = `
      <div class="bg-blue-50 p-4 rounded-lg">
        <p class="text-sm text-gray-700">
          <strong>Total Files:</strong> ${totalFiles} | 
          <strong class="text-green-600">Bisa Dirender:</strong> ${renderableFiles} | 
          <strong class="text-red-600">Tidak Bisa Dirender:</strong> ${nonRenderableFiles}
        </p>
      </div>
    `;
  }
});
