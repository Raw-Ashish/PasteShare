<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwPaste - Share Text & Images Instantly</title>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <i class="fas fa-paste"></i>
                <span>SwPaste</span>
            </div>
            <nav class="nav">
                <a href="#" class="nav-link active">Create</a>
                <a href="https://hackingfreakss.blogspot.com" class="nav-link" target="_blank">Blogs</a>
                <a href="about.php" class="nav-link">About</a>
            </nav>
        </header>

        <main class="main">
            <div class="hero">
                <h1>Share Text & Images Instantly</h1>
                <p>Create secure, shareable pastes with optional image attachments. No registration required.</p>
            </div>

            <form id="pasteForm" action="paste.php" method="post" enctype="multipart/form-data" class="paste-form">
                <div class="form-group">
                    <div class="form-header">
                        <label for="content" class="form-label">
                            <i class="fas fa-edit"></i>
                            Your Content
                        </label>
                        <div class="expiry-group">
                            <label for="expiry" class="expiry-label">Expires in:</label>
                            <select name="expiry" id="expiry" class="form-select">
                                <option value="never">Never</option>
                                <option value="1hour">1 Hour</option>
                                <option value="1day" >1 Day</option>
                                <option value="1week" >1 Week</option>
                                <option value="1month" selected >1 Month</option>
                            </select>
                        </div>
                    </div>
                    <textarea 
                        id="content" 
                        name="content" 
                        placeholder="Paste your text here... (supports markdown, code, links, etc.)" 
                        required 
                        rows="12"
                        class="form-textarea"
                    ></textarea>
                    <div class="textarea-footer">
                        <span class="char-count">0 characters</span>
                        <div class="format-buttons">
                            <button type="button" class="format-btn" data-format="bold" title="Bold">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" class="format-btn" data-format="italic" title="Italic">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" class="format-btn" data-format="code" title="Code">
                                <i class="fas fa-code"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="images" class="form-label">
                        <i class="fas fa-images"></i>
                        Images (Optional)
                    </label>
                    <div class="file-upload-area" id="fileUploadArea">
                        <input type="file" id="images" name="images[]" accept="image/*" multiple class="file-input">
                        <div class="upload-placeholder">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Drag & drop images here or <span class="upload-link">browse files</span></p>
                            <small>Supports JPG, PNG, GIF up to 10MB each</small>
                        </div>
                    </div>
                    <div id="imagePreview" class="image-preview"></div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-share"></i>
                    <span>Create Paste</span>
                    <div class="btn-loader"></div>
                </button>
            </form>
        </main>
        




        <footer class="footer">
            <p>&copy; 2025 SwPaste. Simple, secure, and fast.</p>
        </footer>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>