<?php
// Get the current directory
$currentDir = isset($_GET['dir']) ? $_GET['dir'] : '.';
$currentDir = realpath($currentDir);
$baseDir = realpath(__DIR__);

// Security check: prevent directory traversal attacks
if (strpos($currentDir, $baseDir) !== 0) {
    $currentDir = $baseDir;
}

// Recursive search function
function searchFiles($dir, $searchTerm, $baseDir) {
    $results = [];
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != 'index.php' && !str_starts_with($file, '.')) {
                $filePath = $dir . DIRECTORY_SEPARATOR . $file;
                $relativePath = str_replace($baseDir . DIRECTORY_SEPARATOR, '', $filePath);
                
                // Check if filename matches search term
                if (stripos($file, $searchTerm) !== false) {
                    $results[] = [
                        'name' => $file,
                        'path' => $filePath,
                        'relativePath' => $relativePath,
                        'parentDir' => dirname($relativePath),
                        'isDir' => is_dir($filePath),
                        'size' => is_file($filePath) ? filesize($filePath) : 0,
                        'modified' => filemtime($filePath),
                        'extension' => is_file($filePath) ? pathinfo($file, PATHINFO_EXTENSION) : ''
                    ];
                }
                
                // Recursively search subdirectories
                if (is_dir($filePath)) {
                    $results = array_merge($results, searchFiles($filePath, $searchTerm, $baseDir));
                }
            }
        }
    }
    return $results;
}

// Get directory contents
function getDirectoryContents($dir) {
    $items = [];
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != 'index.php' && !str_starts_with($file, '.')) {
                $filePath = $dir . DIRECTORY_SEPARATOR . $file;
                $items[] = [
                    'name' => $file,
                    'path' => $filePath,
                    'isDir' => is_dir($filePath),
                    'size' => is_file($filePath) ? filesize($filePath) : 0,
                    'modified' => filemtime($filePath),
                    'extension' => is_file($filePath) ? pathinfo($file, PATHINFO_EXTENSION) : ''
                ];
            }
        }
    }
    
    usort($items, function($a, $b) {
        if ($a['isDir'] && !$b['isDir']) return -1;
        if (!$a['isDir'] && $b['isDir']) return 1;
        return strcasecmp($a['name'], $b['name']);
    });
    
    return $items;
}

function formatSize($bytes) {
    if ($bytes == 0) return '-';
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
}

function getFileIcon($extension, $isDir) {
    if ($isDir) return 'fa-folder';
    
    $iconMap = [
        'php' => 'fa-file-code',
        'html' => 'fa-file-code',
        'css' => 'fa-file-code',
        'js' => 'fa-file-code',
        'json' => 'fa-file-code',
        'txt' => 'fa-file-alt',
        'md' => 'fa-file-alt',
        'pdf' => 'fa-file-pdf',
        'doc' => 'fa-file-word',
        'docx' => 'fa-file-word',
        'jpg' => 'fa-file-image',
        'jpeg' => 'fa-file-image',
        'png' => 'fa-file-image',
        'gif' => 'fa-file-image',
        'zip' => 'fa-file-archive',
        'mp3' => 'fa-file-audio',
        'mp4' => 'fa-file-video',
    ];
    
    return isset($iconMap[strtolower($extension)]) ? $iconMap[strtolower($extension)] : 'fa-file';
}

function getBreadcrumb($currentDir, $baseDir) {
    $relativePath = str_replace($baseDir, '', $currentDir);
    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $relativePath));
    $breadcrumb = [['name' => 'Beranda', 'path' => $baseDir]];
    
    $accumulated = $baseDir;
    foreach ($parts as $part) {
        $accumulated .= DIRECTORY_SEPARATOR . $part;
        $breadcrumb[] = ['name' => $part, 'path' => $accumulated];
    }
    
    return $breadcrumb;
}

// Check if search is active
$searchTerm = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : null;
$isSearchMode = $searchTerm !== null;

if ($isSearchMode) {
    // Search mode: search recursively from base directory
    $items = searchFiles($baseDir, $searchTerm, $baseDir);
} else {
    // Normal mode: show current directory contents
    $items = getDirectoryContents($currentDir);
}

$breadcrumb = getBreadcrumb($currentDir, $baseDir);
$stats = [
    'folders' => count(array_filter($items, fn($item) => $item['isDir'])),
    'files' => count(array_filter($items, fn($item) => !$item['isDir'])),
    'total' => count($items)
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager - <?php echo basename($currentDir); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
        }
        
        body {
            background-color: #f8f8f8;
        }
        
        .file-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .file-item:hover {
            background-color: #f0f0f0 !important;
            border-color: #000 !important;
        }
        
        .btn-primary {
            background-color: #000;
            color: #fff;
            transition: all 0.2s;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #222;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .search-input {
            border: 1px solid #ddd;
            transition: all 0.2s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #000;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
        }
        
        .header-section {
            border-bottom: 1px solid #e5e5e5;
        }
        
        .breadcrumb-item {
            color: #666;
            transition: color 0.2s;
        }
        
        .breadcrumb-item:hover {
            color: #000;
        }
        
        .breadcrumb-item.active {
            color: #000;
            font-weight: 600;
        }
        
        .table-header {
            background-color: #fff;
            border-bottom: 2px solid #000;
        }
        
        .table-row {
            border-bottom: 1px solid #e5e5e5;
        }
        
        .table-row:last-child {
            border-bottom: none;
        }
        
        .icon-small {
            font-size: 18px;
            color: #333;
        }
        
        .stat-box {
            background: #fff;
            border: 1px solid #ddd;
            transition: all 0.2s;
        }
        
        .stat-box:hover {
            border-color: #000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }
        
        .empty-icon {
            font-size: 48px;
            color: #ccc;
            margin-bottom: 16px;
        }
        
        @media (max-width: 768px) {
            .table-view {
                display: none;
            }
            
            .mobile-view {
                display: block;
            }
        }
        
        @media (min-width: 769px) {
            .mobile-view {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <div class="header-section bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-black rounded-lg flex items-center justify-center">
                            <i class="fas fa-folder text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-black">File Manager</h1>
                            <p class="text-sm text-gray-500 mt-1">Kelola file dan folder</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="stat-box px-4 py-3 rounded-lg">
                            <div class="text-xs text-gray-500 uppercase tracking-wide">Folder</div>
                            <div class="text-2xl font-bold text-black"><?php echo $stats['folders']; ?></div>
                        </div>
                        <div class="stat-box px-4 py-3 rounded-lg">
                            <div class="text-xs text-gray-500 uppercase tracking-wide">File</div>
                            <div class="text-2xl font-bold text-black"><?php echo $stats['files']; ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- Search -->
                <form method="GET" class="relative" id="searchForm">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" id="searchInput" placeholder="Cari file atau folder di semua direktori... (tekan Enter)" 
                        value="<?php echo htmlspecialchars($searchTerm ?? ''); ?>"
                        class="w-full pl-12 pr-24 py-3 search-input rounded-lg bg-white text-sm">
                    <?php if ($isSearchMode): ?>
                        <a href="index.php?dir=<?php echo urlencode($currentDir); ?>" 
                           class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 px-3 py-1.5 rounded text-xs font-medium transition-colors">
                            <i class="fas fa-times mr-1"></i>Clear
                        </a>
                    <?php endif; ?>
                </form>
                
                <?php if ($isSearchMode): ?>
                    <div class="mt-3 bg-blue-50 border border-blue-200 rounded-lg px-4 py-2 text-sm">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        <span class="text-blue-800">Hasil pencarian untuk: <strong>"<?php echo htmlspecialchars($searchTerm); ?>"</strong> - Ditemukan <?php echo $stats['total']; ?> item</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Breadcrumb -->
        <?php if (!$isSearchMode): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center gap-2 overflow-x-auto text-sm">
                <i class="fas fa-home text-black"></i>
                <?php foreach ($breadcrumb as $index => $crumb): ?>
                    <?php if ($index > 0): ?>
                        <span class="text-gray-400">/</span>
                    <?php endif; ?>
                    <a href="?dir=<?php echo urlencode($crumb['path']); ?>" 
                       class="breadcrumb-item <?php echo $index === count($breadcrumb) - 1 ? 'active' : ''; ?> hover:text-black transition-colors whitespace-nowrap">
                        <?php echo htmlspecialchars($crumb['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <?php if (empty($items)): ?>
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas <?php echo $isSearchMode ? 'fa-search' : 'fa-inbox'; ?>"></i>
                        </div>
                        <p class="text-gray-500 text-lg">
                            <?php if ($isSearchMode): ?>
                                Tidak ada hasil untuk "<?php echo htmlspecialchars($searchTerm); ?>"
                            <?php else: ?>
                                Folder ini kosong
                            <?php endif; ?>
                        </p>
                        <?php if ($isSearchMode): ?>
                            <a href="index.php" class="inline-block mt-4 btn-primary px-6 py-2 rounded-lg text-sm">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <!-- Desktop Table -->
                    <div class="table-view overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wide">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wide">Tipe</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wide">Ukuran</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-black uppercase tracking-wide">Diubah</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-black uppercase tracking-wide">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="fileList">
                                <?php foreach ($items as $item): ?>
                                    <tr class="file-item table-row border-gray-200" data-name="<?php echo strtolower($item['name']); ?>">
                                        <td class="px-6 py-4">
                                            <div class="flex items-start gap-3">
                                                <i class="fas <?php echo getFileIcon($item['extension'], $item['isDir']); ?> icon-small mt-1"></i>
                                                <div>
                                                    <div class="font-medium text-gray-900 file-name"><?php echo htmlspecialchars($item['name']); ?></div>
                                                    <?php if ($isSearchMode && isset($item['parentDir'])): ?>
                                                        <div class="text-xs text-gray-500 mt-1">
                                                            <i class="fas fa-folder-open mr-1"></i><?php echo htmlspecialchars($item['parentDir']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-sm <?php echo $item['isDir'] ? 'text-blue-600' : 'text-gray-500'; ?>">
                                                <?php echo $item['isDir'] ? 'Folder' : strtoupper($item['extension'] ?: 'File'); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            <?php echo formatSize($item['size']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            <?php echo date('d/m/Y H:i', $item['modified']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <?php if ($item['isDir']): ?>
                                                <a href="?dir=<?php echo urlencode($item['path']); ?>" 
                                                   class="btn-primary px-4 py-2 rounded-lg text-sm inline-flex items-center gap-2">
                                                    <i class="fas fa-arrow-right text-sm"></i>Buka
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo str_replace($baseDir, '', $item['path']); ?>" 
                                                   target="_blank"
                                                   class="btn-primary px-4 py-2 rounded-lg text-sm inline-flex items-center gap-2">
                                                    <i class="fas fa-external-link-alt text-sm"></i>Lihat
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile View -->
                    <div class="mobile-view divide-y divide-gray-200" id="mobileFileList">
                        <?php foreach ($items as $item): ?>
                            <div class="file-item p-4 border-gray-100" data-name="<?php echo strtolower($item['name']); ?>">
                                <div class="flex items-start gap-3 mb-3">
                                    <i class="fas <?php echo getFileIcon($item['extension'], $item['isDir']); ?> icon-small mt-1"></i>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-gray-900 file-name truncate"><?php echo htmlspecialchars($item['name']); ?></h3>
                                        <?php if ($isSearchMode && isset($item['parentDir'])): ?>
                                            <p class="text-xs text-gray-500 mt-1">
                                                <i class="fas fa-folder-open mr-1"></i><?php echo htmlspecialchars($item['parentDir']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <p class="text-xs text-gray-500 mt-1">
                                            <?php echo $item['isDir'] ? 'Folder' : strtoupper($item['extension'] ?: 'File'); ?>
                                            <?php if (!$item['isDir']): ?> • <?php echo formatSize($item['size']); ?><?php endif; ?>
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1"><?php echo date('d/m/Y H:i', $item['modified']); ?></p>
                                    </div>
                                </div>
                                <?php if ($item['isDir']): ?>
                                    <a href="?dir=<?php echo urlencode($item['path']); ?>" 
                                       class="btn-primary w-full py-2 rounded-lg text-sm text-center block">
                                        Buka Folder
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo str_replace($baseDir, '', $item['path']); ?>" 
                                       target="_blank"
                                       class="btn-primary w-full py-2 rounded-lg text-sm text-center block">
                                        Lihat File
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            <p>File Manager v2.0 • PHP <?php echo PHP_VERSION; ?> • <?php echo date('Y'); ?></p>
        </div>
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        
        // Keyboard shortcut to focus search
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                searchInput.focus();
            }
            
            // Press Escape to clear search
            if (e.key === 'Escape' && searchInput.value) {
                window.location.href = 'index.php';
            }
        });
        
        // Auto-submit on input after delay (optional - untuk search real-time)
        let searchTimeout;
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            if (e.target.value.length >= 2) {
                searchTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 800); // Submit after 800ms of no typing
            }
        });
        
        // Show loading state on form submit
        searchForm.addEventListener('submit', function() {
            searchInput.disabled = true;
            searchInput.placeholder = 'Mencari...';
        });
        
        console.log('File Manager v2.0 - Search aktif');
    </script>
</body>
</html>