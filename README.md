# PasteShare

# 📝 PasteShare Project

**Main Domain:** [pasteshare.infy.uk](https://pasteshare.infy.uk)  
**Used by Others:**  
- [swpaste.free.nf](https://swpaste.free.nf)  
- [swpaste.infy.uk](https://swpaste.infy.uk)

---

## 📘 Overview

**PasteShare** is a lightweight, self-hosted web paste system that allows users to create, view, and share text, code, or notes through unique URLs.  
It is optimized for **free hosting platforms like InfinityFree**, with **no database** dependency — all data is saved securely as individual `.json` files.

This project is designed for **speed**, **simplicity**, and **compatibility**, and can easily be mirrored or customized by others (like *swpaste*) while maintaining a shared structure.

---

## ⚙️ Features

- 🗂️ Save and view pastes with unique links (e.g. `/pastes/abc123.json`)
- ⏳ Built-in 3-second verification overlay with custom banner and ad support
- 💰 Supports **Monetag** and **Adsterra** ad codes
- 📢 Custom banner text (e.g. “For ad inquiries, contact @hf_owner on Telegram”)
- 💡 Lightweight HTML/CSS/JS — no frameworks, no dependencies
- 🚀 Optimized for InfinityFree & other limited hosting services
- 🔒 Input validation (only alphanumeric paste codes allowed)
- ⚡ Fast loading with deferred scripts and lazy CSS
- 🌐 Fully responsive & mobile-friendly layout

---

## 📁 Folder Structure


---

## 🧩 Technical Details

### 🔹 Paste Handling
Each paste is saved as a JSON file in `/pastes/` folder with a unique code:
```php
$file = "pastes/$code.json";
if (!preg_match('/^[a-zA-Z0-9]{1,12}$/', $code)) { die("Invalid Code"); }

🔹 Ad Integration

Monetag and Adsterra ads are deferred for faster load:

<script defer src="//pairturnnumerous.com/6f4ca94babeddfb7669e670b8b570c3d/invoke.js"></script>


A custom overlay with a 3-second timer displays ads or a banner message before redirecting.

🔹 Performance Optimization

All scripts are loaded with defer to reduce render-blocking

CSS is preloaded with:

<link rel="preload" href="/css/main.css" as="style" onload="this.rel='stylesheet'">


Domains preconnected:

<link rel="preconnect" href="https://pairturnnumerous.com" crossorigin>

💬 Custom Banner Message

Located inside the overlay:

<div class="custom-banner">
  <b>For your banner / ads contact @hf_owner on Telegram</b>
</div>


Style Example (in CSS):

.custom-banner {
  font-weight: 700;
  font-size: 20px;
  text-align: center;
  color: #fff;
  margin-top: 15px;
}

📈 Performance Summary (from Lighthouse)
Metric	Score
Performance	74
Accessibility	92
Best Practices	96
SEO	91

Key Fixes Applied:

Deferred ad scripts

Preloaded critical CSS

Added meta description

Compressed and lazy-loaded images

🧠 How Others Use It
1. swpaste.free.nf

A lightweight mirror of the same system, mainly for testing or alternate hosting.

2. swpaste.infy.uk

A modified version used by third-party partners or users, sharing the same base code structure.

All mirrors can customize:

Banner message

Timer duration

Ad network codes

Paste storage directory

🔧 How to Deploy on InfinityFree

Upload all files via File Manager or FTP.

Ensure a folder named pastes/ exists with write permissions (755).

Edit your Monetag or Adsterra keys in the script.

Access your page at:

https://yourdomain.infy.uk/?code=example123

👨‍💻 Maintainer

Author: Auriga (@hf_owner
)
Project Type: Free & Educational (Non-commercial)
Host: InfinityFree (Free Hosting)

🪪 License

This project is released under the MIT License.
You are free to copy, modify, and redistribute this code, provided that:

Credit remains to the original creator

No illegal, malicious, or deceptive use occurs

© 2025 PasteShare.infy.uk – Lightweight Paste System for Everyone
