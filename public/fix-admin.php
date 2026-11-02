<?php
/**
 * Script chẩn đoán và tự động sửa lỗi 500 Admin / Upload cho Bếp Inox Bảo Linh
 * Đặt file này vào thư mục public_html trên cPanel và truy cập: https://bepinoxbaolinh.vn/fix-admin.php
 */

header('Content-Type: text/html; charset=utf-8');

// Xác định đường dẫn app Laravel
$possiblePaths = [
    dirname(__DIR__) . '/bepinoxbaolinh',
    dirname(__DIR__),
    __DIR__ . '/../bepinoxbaolinh',
    '/home/bepimzky/bepinoxbaolinh',
];

$appDir = null;
foreach ($possiblePaths as $p) {
    if (is_dir($p) && file_exists($p . '/artisan')) {
        $appDir = realpath($p);
        break;
    }
}

if (!$appDir) {
    die("<h3>[Lỗi] Không tìm thấy thư mục gốc Laravel. Vui lòng kiểm tra lại đường dẫn!</h3>");
}

$results = [];

// 1. Tạo các thư mục lưu trữ bắt buộc cho Livewire & Filament FileUpload
$dirsToCreate = [
    $appDir . '/storage/app',
    $appDir . '/storage/app/livewire-tmp',
    $appDir . '/storage/app/private',
    $appDir . '/storage/app/private/livewire-tmp',
    $appDir . '/storage/app/public',
    $appDir . '/storage/app/public/products',
    $appDir . '/storage/app/public/products/gallery',
    $appDir . '/storage/app/public/categories',
    $appDir . '/storage/app/public/posts',
    $appDir . '/storage/framework',
    $appDir . '/storage/framework/cache',
    $appDir . '/storage/framework/cache/data',
    $appDir . '/storage/framework/sessions',
    $appDir . '/storage/framework/views',
    $appDir . '/storage/logs',
    $appDir . '/bootstrap/cache',
];

foreach ($dirsToCreate as $dir) {
    if (!is_dir($dir)) {
        if (@mkdir($dir, 0775, true)) {
            $results[] = ["status" => "success", "msg" => "Đã tạo thư mục: $dir"];
        } else {
            $results[] = ["status" => "warning", "msg" => "Không thể tạo tự động thư mục (có thể cần chmod): $dir"];
        }
    } else {
        @chmod($dir, 0775);
        $results[] = ["status" => "success", "msg" => "Thư mục đã tồn tại & cấp quyền 775: " . basename(dirname($dir)) . '/' . basename($dir)];
    }
}

// 2. Xóa cache Blade Views & Bootstrap cache (nguyên nhân hàng đầu gây lỗi 500 khi update file)
$viewFiles = glob($appDir . '/storage/framework/views/*.php');
$viewsCleared = 0;
if ($viewFiles) {
    foreach ($viewFiles as $f) {
        if (@unlink($f)) $viewsCleared++;
    }
}
$results[] = ["status" => "success", "msg" => "Đã dọn dẹp $viewsCleared file cache giao diện cũ (views cache)."];

$bootstrapCacheFiles = [
    $appDir . '/bootstrap/cache/config.php',
    $appDir . '/bootstrap/cache/packages.php',
    $appDir . '/bootstrap/cache/routes-v7.php',
    $appDir . '/bootstrap/cache/services.php',
];
foreach ($bootstrapCacheFiles as $f) {
    if (file_exists($f)) {
        @unlink($f);
        $results[] = ["status" => "success", "msg" => "Đã xóa cache: " . basename($f)];
    }
}

// 3. Kiểm tra hoặc tạo Symlink public_html/storage -> storage/app/public
$targetStorage = $appDir . '/storage/app/public';
$linkStorage = __DIR__ . '/storage';

if (is_link($linkStorage)) {
    $results[] = ["status" => "success", "msg" => "Symlink public_html/storage đã tồn tại chuẩn xác."];
} elseif (is_dir($linkStorage)) {
    $results[] = ["status" => "info", "msg" => "Thư mục public_html/storage là thư mục thường."];
} else {
    if (@symlink($targetStorage, $linkStorage)) {
        $results[] = ["status" => "success", "msg" => "Đã tạo thành công Symlink public_html/storage -> $targetStorage"];
    } else {
        $results[] = ["status" => "warning", "msg" => "Chưa tạo được Symlink (hosting có thể tắt hàm symlink). Hãy kiểm tra file manager."];
    }
}

// 4. Kiểm tra các PHP Extensions cần thiết cho Livewire Upload
$extensions = [
    'fileinfo' => 'Bắt buộc cho Livewire / Filament kiểm tra định dạng ảnh khi upload',
    'gd' => 'Bắt buộc để xử lý và hiển thị ảnh thumbnail',
    'exif' => 'Cần thiết để xoay ảnh đúng chiều khi upload từ điện thoại / máy tính',
    'pdo_sqlite' => 'Kết nối cơ sở dữ liệu SQLite',
    'mbstring' => 'Xử lý chuỗi tiếng Việt Unicode',
    'curl' => 'Kết nối mạng API',
];

$extStatus = [];
foreach ($extensions as $ext => $desc) {
    $loaded = extension_loaded($ext);
    $extStatus[] = [
        'name' => $ext,
        'desc' => $desc,
        'loaded' => $loaded
    ];
}

// 5. Đọc 60 dòng log lỗi gần nhất từ storage/logs/laravel.log
$logFile = $appDir . '/storage/logs/laravel.log';
$recentLogs = "Chưa có file log hoặc file log rỗng.";
if (file_exists($logFile)) {
    $lines = file($logFile);
    if ($lines) {
        $lastLines = array_slice($lines, -60);
        $recentLogs = htmlspecialchars(implode("", $lastLines));
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa lỗi Admin & Upload Bếp Inox Bảo Linh</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #f1f5f9; padding: 30px; color: #1e293b; }
        .card { max-width: 900px; margin: 0 auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); padding: 25px; }
        h1 { color: #0f172a; font-size: 22px; border-bottom: 2px solid #e2e8f0; padding-bottom: 12px; margin-top: 0; }
        h2 { font-size: 16px; margin-top: 25px; color: #334155; }
        .item { padding: 8px 12px; border-radius: 6px; margin-bottom: 6px; font-size: 14px; }
        .item.success { background: #dcfce7; color: #166534; }
        .item.warning { background: #fef9c3; color: #854d0e; }
        .item.danger { background: #fee2e2; color: #991b1b; }
        .item.info { background: #e0f2fe; color: #075985; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
        th, td { border: 1px solid #cbd5e1; padding: 8px 12px; text-align: left; }
        th { background: #f8fafc; }
        pre { background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-size: 12px; overflow-x: auto; max-height: 400px; line-height: 1.5; }
        .btn { display: inline-block; background: #2563eb; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; margin-top: 15px; }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🛠️ Kết quả Sửa lỗi & Khởi tạo môi trường Upload</h1>
        
        <p><strong>Thư mục ứng dụng:</strong> <code><?= htmlspecialchars($appDir) ?></code></p>
        <p><strong>PHP Version:</strong> <code><?= phpversion() ?></code></p>

        <h2>1. Thư mục lưu trữ & Quyền ghi:</h2>
        <?php foreach ($results as $r): ?>
            <div class="item <?= $r['status'] ?>"><?= htmlspecialchars($r['msg']) ?></div>
        <?php endforeach; ?>

        <h2>2. Kiểm tra PHP Extensions:</h2>
        <table>
            <thead>
                <tr>
                    <th>Extension</th>
                    <th>Trạng thái</th>
                    <th>Ý nghĩa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extStatus as $es): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($es['name']) ?></strong></td>
                        <td>
                            <?php if ($es['loaded']): ?>
                                <span style="color: #16a34a; font-weight: bold;">✔ ĐÃ BẬT</span>
                            <?php else: ?>
                                <span style="color: #dc2626; font-weight: bold;">✖ CHƯA BẬT (Vào cPanel > Select PHP Version để tích bật)</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($es['desc']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>3. 60 Dòng nhật ký lỗi gần nhất (storage/logs/laravel.log):</h2>
        <pre><?= $recentLogs ?></pre>

        <p style="margin-top: 25px;">
            <a href="/admin/products/create" class="btn">👉 Bấm vào đây để thử lại trang Tạo Sản Phẩm Admin</a>
        </p>
    </div>
</body>
</html>
