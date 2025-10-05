<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - PasteShare</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Colors */
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --primary-light: #dbeafe;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
            
            /* Backgrounds */
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --bg-dark: #0f172a;
            --bg-card: #ffffff;
            
            /* Text Colors */
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --text-inverse: #ffffff;
            
            /* Borders */
            --border-color: #e2e8f0;
            --border-hover: #cbd5e1;
            --border-focus: #3b82f6;
            
            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            
            /* Spacing */
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-2xl: 3rem;
            
            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            
            /* Transitions */
            --transition-fast: 150ms ease-in-out;
            --transition-normal: 250ms ease-in-out;
            --transition-slow: 350ms ease-in-out;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-display: swap;
            line-height: 1.6;
            color: var(--text-primary);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--spacing-md);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-lg) 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
            margin: var(--spacing-md) 0;
            padding-left: var(--spacing-xl);
            padding-right: var(--spacing-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-inverse);
        }

        .logo i {
            font-size: 1.75rem;
            color: #fbbf24;
        }

        .nav {
            display: flex;
            gap: var(--spacing-lg);
            align-items: center;
        }

        .nav-link {
            color: var(--text-inverse);
            text-decoration: none;
            font-weight: 500;
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--radius-md);
            transition: var(--transition-fast);
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        /* Main Content */
        .main {
            flex: 1;
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: var(--spacing-2xl);
            margin-bottom: var(--spacing-lg);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .about-main {
            max-width: 1000px;
            margin: 0 auto;
        }

        .about-hero {
            text-align: center;
            margin-bottom: var(--spacing-2xl);
            padding: var(--spacing-2xl) 0;
        }

        .about-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: var(--spacing-lg);
        }

        .about-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: var(--spacing-md);
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .about-content {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-2xl);
        }

        .about-section {
            background: var(--bg-secondary);
            padding: var(--spacing-2xl);
            border-radius: var(--radius-xl);
            border: 1px solid var(--border-color);
        }

        .section-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            border-radius: 50%;
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: var(--spacing-lg);
        }

        .about-section h2 {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: var(--spacing-md);
            color: var(--text-primary);
        }

        .about-section p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: var(--spacing-lg);
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-xl);
            margin-top: var(--spacing-xl);
        }

        .feature-card {
            background: var(--bg-primary);
            padding: var(--spacing-xl);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            text-align: center;
            transition: var(--transition-normal);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-color);
        }

        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 50%;
            color: var(--primary-color);
            font-size: 1.25rem;
            margin-bottom: var(--spacing-md);
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: var(--spacing-sm);
            color: var(--text-primary);
        }

        .feature-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Network Links */
        .network-links {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-md);
        }

        .network-link {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-lg);
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            text-decoration: none;
            color: var(--text-primary);
            transition: var(--transition-normal);
        }

        .network-link:hover {
            transform: translateX(8px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-color);
        }

        .network-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: var(--radius-md);
            color: var(--primary-color);
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .network-info {
            flex: 1;
        }

        .network-info h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: var(--spacing-xs);
            color: var(--text-primary);
        }

        .network-info p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin: 0;
        }

        .network-link > .fas {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* Social Links */
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: var(--spacing-md);
            justify-content: center;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-md) var(--spacing-lg);
            border-radius: var(--radius-lg);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-normal);
            color: white;
        }

        .social-link:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .social-link.twitter {
            background: #1da1f2;
        }

        .social-link.github {
            background: #333;
        }

        .social-link.discord {
            background: #5865f2;
        }

        .social-link.telegram {
            background: #0088cc;
        }

        .social-link.reddit {
            background: #ff4500;
        }

        /* FAQ */
        .faq-list {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-lg);
        }

        .faq-item {
            background: var(--bg-primary);
            padding: var(--spacing-lg);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
        }

        .faq-item h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: var(--spacing-sm);
            color: var(--text-primary);
        }

        .faq-item p {
            color: var(--text-secondary);
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            color: white;
        }

        .stats-section .section-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .stats-section h2 {
            color: white;
        }

        .stats-section p {
            color: rgba(255, 255, 255, 0.9);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: var(--spacing-lg);
            margin-top: var(--spacing-xl);
        }

        .stat-card {
            text-align: center;
            padding: var(--spacing-lg);
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: var(--spacing-xs);
        }

        .stat-label {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            background: var(--bg-primary);
            padding: var(--spacing-2xl);
            border-radius: var(--radius-xl);
            border: 1px solid var(--border-color);
        }

        .cta-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: var(--spacing-md);
            color: var(--text-primary);
        }

        .cta-section p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: var(--spacing-xl);
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-md) var(--spacing-2xl);
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            color: white;
            text-decoration: none;
            border-radius: var(--radius-lg);
            font-size: 1.125rem;
            font-weight: 600;
            transition: var(--transition-normal);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .footer {
            text-align: center;
            padding: var(--spacing-lg) 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 var(--spacing-sm);
            }
            
            .header {
                flex-direction: column;
                gap: var(--spacing-md);
                text-align: center;
            }
            
            .nav {
                justify-content: center;
            }
            
            .main {
                padding: var(--spacing-lg);
            }
            
            .about-hero h1 {
                font-size: 2.5rem;
            }
            
            .about-section {
                padding: var(--spacing-xl);
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .social-links {
                justify-content: stretch;
            }
            
            .social-link {
                justify-content: center;
                flex: 1;
                min-width: 120px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .network-link {
                flex-direction: column;
                text-align: center;
                gap: var(--spacing-sm);
            }
            
            .network-link:hover {
                transform: translateY(-4px);
            }
        }

        @media (max-width: 480px) {
            .about-hero h1 {
                font-size: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .social-links {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <i class="fas fa-paste"></i>
                <span>PasteShare</span>
            </div>
            <nav class="nav">
                <a href="index.php" class="nav-link">Create</a>
                <a href="about.php" class="nav-link active">About</a>
            </nav>
        </header>

        <main class="main about-main">
            <div class="about-hero">
                <div class="about-icon">
                    <i class="fas fa-paste"></i>
                </div>
                <h1>About PasteShare</h1>
                <p class="about-subtitle">Simple, secure, and fast text & image sharing</p>
            </div>

            <div class="about-content">
                <div class="about-section">
                    <div class="section-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h2>What is PasteShare?</h2>
                    <p>PasteShare is a modern, user-friendly platform for sharing text content and images instantly. Whether you need to share code snippets, notes, or documents with images, we make it simple and secure.</p>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Secure & Private</h3>
                        <p>Your pastes are stored securely with optional expiration dates. No registration required.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3>Image Support</h3>
                        <p>Upload multiple images alongside your text content. Supports JPG, PNG, GIF, and WebP formats.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Fully responsive design that works perfectly on all devices - desktop, tablet, and mobile.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Auto Expiry</h3>
                        <p>Set custom expiration times from 1 hour to 1 month, or keep your pastes forever.</p>
                    </div>
                </div>

                <div class="about-section">
                    <div class="section-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h2>Our Network</h2>
                    <p>Explore our other paste sharing platforms for different needs:</p>
                    
                    <div class="network-links">
                        <a href="#" class="network-link" target="_blank">
                            <div class="network-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="network-info">
                                <h4>CodePaste</h4>
                                <p>Specialized for code sharing with syntax highlighting</p>
                            </div>
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        
                        <a href="#" class="network-link" target="_blank">
                            <div class="network-icon">
                                <i class="fas fa-file-text"></i>
                            </div>
                            <div class="network-info">
                                <h4>TextShare</h4>
                                <p>Simple text sharing with markdown support</p>
                            </div>
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        
                        <a href="#" class="network-link" target="_blank">
                            <div class="network-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="network-info">
                                <h4>ImageDrop</h4>
                                <p>Fast image hosting and sharing platform</p>
                            </div>
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        
                        <a href="#" class="network-link" target="_blank">
                            <div class="network-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="network-info">
                                <h4>SecurePaste</h4>
                                <p>Encrypted paste sharing with password protection</p>
                            </div>
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>

                <div class="about-section">
                    <div class="section-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2>Connect With Us</h2>
                    <p>Follow us on social media for updates and support:</p>
                    
                    <div class="social-links">
                        <a href="#" class="social-link twitter" target="_blank">
                            <i class="fab fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                        
                        <a href="#" class="social-link github" target="_blank">
                            <i class="fab fa-github"></i>
                            <span>GitHub</span>
                        </a>
                        
                        <a href="#" class="social-link discord" target="_blank">
                            <i class="fab fa-discord"></i>
                            <span>Discord</span>
                        </a>
                        
                        <a href="#" class="social-link telegram" target="_blank">
                            <i class="fab fa-telegram"></i>
                            <span>Telegram</span>
                        </a>
                        
                        <a href="#" class="social-link reddit" target="_blank">
                            <i class="fab fa-reddit"></i>
                            <span>Reddit</span>
                        </a>
                    </div>
                </div>

                <div class="about-section">
                    <div class="section-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h2>Frequently Asked Questions</h2>
                    
                    <div class="faq-list">
                        <div class="faq-item">
                            <h4>Is PasteShare free to use?</h4>
                            <p>Yes! PasteShare is completely free to use with no registration required.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h4>How long are pastes stored?</h4>
                            <p>You can set expiration times from 1 hour to 1 month, or choose to keep them forever.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h4>What file types are supported for images?</h4>
                            <p>We support JPG, PNG, GIF, and WebP formats up to 10MB per image.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h4>Can I edit a paste after creating it?</h4>
                            <p>Currently, pastes cannot be edited after creation. You'll need to create a new paste.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h4>Is there a character limit?</h4>
                            <p>There's no strict character limit, but very large pastes may take longer to load.</p>
                        </div>
                    </div>
                </div>

                <div class="about-section stats-section">
                    <div class="section-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h2>Platform Statistics</h2>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Pastes Created</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">50K+</div>
                            <div class="stat-label">Images Shared</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">99.9%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Available</div>
                        </div>
                    </div>
                </div>

                <div class="cta-section">
                    <h2>Ready to Share?</h2>
                    <p>Start sharing your content instantly with PasteShare</p>
                    <a href="index.php" class="cta-button">
                        <i class="fas fa-plus"></i>
                        Create Your First Paste
                    </a>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2025 PasteShare. Simple, secure, and fast.</p>
        </footer>
    </div>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections for animation
        document.querySelectorAll('.about-section, .feature-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                
                if (target >= 1000) {
                    element.textContent = Math.floor(current / 1000) + 'K+';
                } else if (target === 99.9) {
                    element.textContent = current.toFixed(1) + '%';
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 20);
        }

        // Animate stats when they come into view
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const text = stat.textContent;
                        if (text.includes('10K+')) animateCounter(stat, 10000);
                        else if (text.includes('50K+')) animateCounter(stat, 50000);
                        else if (text.includes('99.9%')) animateCounter(stat, 99.9);
                        else if (text.includes('24/7')) stat.textContent = '24/7';
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>
</html>