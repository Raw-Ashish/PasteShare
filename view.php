<?php
$code = $_GET['code'] ?? '';
$file = "pastes/$code.json";

// Validate code format
if (!preg_match('/^[a-zA-Z0-9]{1,12}$/', $code) || !file_exists($file)) {
    http_response_code(404);
    include 'error.php';
    exit;
}

// Load paste data
$pasteData = json_decode(file_get_contents($file), true);

// Check if paste has expired
if ($pasteData['expires_at'] && time() > $pasteData['expires_at']) {
    unlink($file); // Delete expired paste
    // Delete associated images
    foreach ($pasteData['images'] as $image) {
        $imagePath = "uploads/" . $image['filename'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    http_response_code(410);
    include 'error.php';
    exit;
}

// Increment view count
$pasteData['views']++;
file_put_contents($file, json_encode($pasteData, JSON_PRETTY_PRINT));

$content = $pasteData['content'];
$images = $pasteData['images'];
$createdAt = $pasteData['created_at'];
$expiresAt = $pasteData['expires_at'];
$views = $pasteData['views'];

// Get the current URL for copy link
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$currentUrl = "$protocol://$host/" . $code;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://fpyf8.com/88/tag.min.js" data-zone="174392"  data-cfasync="false"></script>
  

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paste <?php echo htmlspecialchars($code); ?> - PasteShare</title>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    

</head>
<body>
<div id="waitNotice">
  <div class="notice-box">
    <h2>Verifying – Please wait</h2>

    <!-- Timer Circle -->
    <div id="timerCircle">5</div>

    <!-- ✅ Verify Button (hidden until timer ends) -->
    <button id="verifyBtn" onclick="verified()">✅ Verify Now</button>

    <!-- Banner -->
    <div class="ad-container">
      <a href="https://t.me/supplywalah" target="_blank" rel="nofollow">
        <img src="/assets/fixed.gif" alt="Custom Banner">
      </a>
      <p>For your banner / ads contact <a href="https://t.me/hf_owner" ><strong>@hf_owner</strong></a> on Telegram</p>
    </div>
  </div>
</div>





    <div class="container">
        <header class="header">
            <div class="logo">
                <i class="fas fa-paste"></i>
                <span>SwPaste</span>
            </div>
            <nav class="nav">
                <a href="/" class="nav-link">Create New</a>
                <button class="nav-link copy-btn" onclick="copyToClipboard('<?php echo $currentUrl; ?>')">
                    <i class="fas fa-copy"></i> Copy Link
                </button>
            </nav>
        </header>

        <main class="main view-main">
            <div class="paste-header">
                <div class="paste-info">
                    <h1>Paste <code><?php echo htmlspecialchars($code); ?></code></h1>
                    <div class="paste-meta">
                        <span class="meta-item">
                            <i class="fas fa-calendar"></i>
                            Created <?php echo date('M j, Y \a\t g:i A', $createdAt); ?>
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-eye"></i>
                            <?php echo number_format($views); ?> views
                        </span>
                        <?php if ($expiresAt): ?>
                        <span class="meta-item">
                            <i class="fas fa-clock"></i>
                            Expires <?php echo date('M j, Y \a\t g:i A', $expiresAt); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="paste-actions">
                    <button class="action-btn" onclick="copyContent()">
                        <i class="fas fa-copy"></i>
                        Copy Content
                    </button>
                    <button class="action-btn" onclick="downloadContent()">
                        <i class="fas fa-download"></i>
                        Download
                    </button>
                </div>
            </div>

            <div class="content-display" id="pasteContent">
                <pre><code><?php 
                $escaped = htmlspecialchars(trim($content));
                $linked = preg_replace('/(https?:\/\/[^\s]+)/i', '<a href="$1" target="_blank">$1</a>', $escaped);
                echo $linked; 
            ?></code></pre>
            </div>

            <?php if (!empty($images)): ?>
            <div class="images-section">
                <h3 class="section-title">
                    <i class="fas fa-images"></i>
                    Attached Images (<?php echo count($images); ?>)
                </h3>
                <div class="image-gallery">
                    <?php foreach ($images as $index => $image): ?>
                        <?php if (file_exists("uploads/" . $image['filename'])): ?>
                        <div class="image-item" onclick="openImageModal(<?php echo $index; ?>)">
                            <img 
                                src="uploads/<?php echo htmlspecialchars($image['filename']); ?>" 
                                alt="<?php echo htmlspecialchars($image['original_name']); ?>"
                                class="gallery-image"
                                loading="lazy"
                            >
                            <div class="image-overlay">
                                <div class="image-info">
                                    <span class="image-name"><?php echo htmlspecialchars($image['original_name']); ?></span>
                                    <span class="image-size"><?php echo formatBytes($image['size']); ?></span>
                                    <span class="image-dimensions"><?php echo $image['width']; ?>×<?php echo $image['height']; ?></span>
                                </div>
                                <div class="image-actions">
                                    <button class="image-action" onclick="event.stopPropagation(); downloadImage('<?php echo $image['filename']; ?>', '<?php echo $image['original_name']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Image Modal -->
            <div id="imageModal" class="modal">
                <div class="modal-content">
                    <span class="modal-close" onclick="closeImageModal()">&times;</span>
                    <img id="modalImage" src="" alt="">
                    <div class="modal-nav">
                        <button class="modal-nav-btn" id="prevBtn" onclick="navigateImage(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="modal-nav-btn" id="nextBtn" onclick="navigateImage(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="modal-info">
                        <span id="modalImageName"></span>
                        <span id="modalImageSize"></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="paste-footer">
                <a href="/" class="create-new-btn">
                    <i class="fas fa-plus"></i>
                    Create New Paste
                </a>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2025 SwPaste. Simple, secure, and fast.</p>
        </footer>
    </div>

    <!-- Click on any visible link → open content in new tab → original tab opens ad. -->
    <script>
  const adLinks = [
    "https://otieu.com/4/9580029",
    "https://otieu.com/4/9267972",
    "https://otieu.com/4/9689377",
    "https://otieu.com/4/9689378"
    // Add more ad URLs here
  ];

  document.querySelectorAll('a[href]').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // Stop default link behavior
      const targetUrl = this.href;

      // Pick a random ad link
      const randomAd = adLinks[Math.floor(Math.random() * adLinks.length)];

      // Open the real content in new tab
      window.open(targetUrl, '_blank');

      // Redirect current tab to random ad link
      window.location.href = randomAd;
    });
  });
</script>


    <script>
        const images = <?php echo json_encode($images); ?>;
        let currentImageIndex = 0;

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification('Link copied to clipboard!');
            });
        }

        function copyContent() {
            const content = document.getElementById('pasteContent')?.textContent || '';
            navigator.clipboard.writeText(content).then(() => {
                showNotification('Content copied to clipboard!');
            });
        }

        function downloadContent() {
            const content = document.getElementById('pasteContent')?.textContent || '';
            const blob = new Blob([content], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'paste-<?php echo $code; ?>.txt';
            a.click();
            URL.revokeObjectURL(url);
        }

        function downloadImage(filename, originalName) {
            const a = document.createElement('a');
            a.href = 'uploads/' + filename;
            a.download = originalName;
            a.click();
        }

        function openImageModal(index) {
            currentImageIndex = index;
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalImageName = document.getElementById('modalImageName');
            const modalImageSize = document.getElementById('modalImageSize');
            
            modalImage.src = 'uploads/' + images[index].filename;
            modalImage.alt = images[index].original_name;
            modalImageName.textContent = images[index].original_name;
            modalImageSize.textContent = formatBytes(images[index].size) + ' • ' + 
                                       images[index].width + '×' + images[index].height;
            
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function navigateImage(direction) {
            currentImageIndex += direction;
            if (currentImageIndex < 0) currentImageIndex = images.length - 1;
            if (currentImageIndex >= images.length) currentImageIndex = 0;
            
            const modalImage = document.getElementById('modalImage');
            const modalImageName = document.getElementById('modalImageName');
            const modalImageSize = document.getElementById('modalImageSize');
            
            modalImage.src = 'uploads/' + images[currentImageIndex].filename;
            modalImage.alt = images[currentImageIndex].original_name;
            modalImageName.textContent = images[currentImageIndex].original_name;
            modalImageSize.textContent = formatBytes(images[currentImageIndex].size) + ' • ' + 
                                       images[currentImageIndex].width + '×' + images[currentImageIndex].height;
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Keyboard navigation for modal
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('imageModal');
            if (modal.style.display === 'flex') {
                if (e.key === 'Escape') closeImageModal();
                if (e.key === 'ArrowLeft') navigateImage(-1);
                if (e.key === 'ArrowRight') navigateImage(1);
            }
        });

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', (e) => {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });
    </script>
<script>
let timeLeft = 5; // countdown seconds
let timer = setInterval(() => {
  document.getElementById("timerCircle").innerText = timeLeft;
  if (timeLeft <= 0) {
    clearInterval(timer);
    document.getElementById("timerCircle").style.display = "none";
    document.getElementById("verifyBtn").style.display = "inline-block";
  }
  timeLeft--;
}, 1000);

function verified() {
  // ✅ Remove overlay so user can access content
  document.getElementById("waitNotice").style.display = "none";

  // ✅ Dynamically load Monetag after Verify button click
  let s = document.createElement("script");
  s.src = "https://fpyf8.com/88/tag.min.js";
  s.dataset.zone = "174392"; // your zone ID
  s.setAttribute("data-cfasync", "false");
  document.body.appendChild(s);
}
</script>


</body>
</html>



<?php
function formatBytes($size, $precision = 2) {
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}
?>