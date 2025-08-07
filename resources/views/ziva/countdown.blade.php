<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIVA Centre - Launching Soon</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Nunito:wght@300;400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-font: "Playfair Display", serif;
            --text-font: "Nunito", sans-serif;
            --secondary-font: "Open Sans", sans-serif;
            --primary-green: #556c4c;
            --deep-green: #2a3b2c;
            --highlight-green: #9fbe57;
            --darker-green: #253d2b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--text-font);
            background: linear-gradient(135deg, var(--deep-green) 0%, var(--darker-green) 100%);
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Early Access Ribbon */
        .early-access-ribbon {
            position: relative;
            width: 100%;
            background: linear-gradient(90deg, #75bb04, #085215, #0ac044);
            color: #fff;
            padding: 14px 0;
            z-index: 100;
            overflow: hidden;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .static-content {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .main-text {
            font-size: 16px;
            font-weight: 700;
            white-space: nowrap;
        }

        .scrolling-details {
            width: 100%;
            overflow: hidden;
        }

        .details-content {
            display: inline-block;
            padding-left: 100%;
            white-space: nowrap;
            animation: scroll 20s linear infinite;
            font-weight: 600;
        }

        .cta {
            font-weight: 800;
            background: var(--deep-green);
            color: #ffd700 !important;
            padding: 4px 12px;
            border-radius: 20px;
            text-decoration: none;
            text-shadow: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .cta:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        /* Main Container */
        .countdown-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 60px);
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        /* Floating particles background */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: var(--highlight-green);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            opacity: 0.1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Logo */
        .ziva-logo-text {
            background: linear-gradient(135deg, var(--primary-green), var(--deep-green));
            color: white;
            font-family: "Georgia", serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 30px;
            border-radius: 16px;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 10;
        }

        .ziva-logo-text .the {
            font-size: 1rem;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .ziva-logo-text .ziva {
            font-size: 3.5rem;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 5px 0;
        }

        .ziva-logo-text .centre {
            font-size: 1.4rem;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        /* Heading */
        .launch-heading {
            font-family: var(--primary-font);
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ffffff, var(--highlight-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 10;
        }

        .launch-subtitle {
            font-size: 1.3rem;
            color: #e0e0e0;
            margin-bottom: 3rem;
            max-width: 600px;
            position: relative;
            z-index: 10;
        }

        /* Countdown Timer */
        .countdown-timer {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin: 1rem 0;
            position: relative;
            z-index: 10;
        }

        .countdown-item {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 1.5rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .countdown-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.08));
        }

        .countdown-number {
            font-family: var(--primary-font);
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--highlight-green);
            display: block;
            margin-bottom: 0.5rem;
        }

        .countdown-label {
            font-size: 1.1rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* CTA Section */
        .cta-section {
            margin-top: 3rem;
            position: relative;
            z-index: 10;
        }

        .main-cta {
            display: inline-block;
            background: linear-gradient(135deg, var(--highlight-green), #7dc142);
            color: #ffffff;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            border-radius: 50px;
            box-shadow: 0 8px 25px rgba(159, 190, 87, 0.3);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .main-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(159, 190, 87, 0.4);
            background: linear-gradient(135deg, #7dc142, var(--highlight-green));
        }

        .features-preview {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #e0e0e0;
            font-size: 1rem;
        }

        .feature-icon {
            color: var(--highlight-green);
            font-size: 1.2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .countdown-timer {
                gap: 1rem;
            }
            
            .countdown-item {
                padding: 1.5rem 0.8rem;
            }
            
            .countdown-number {
                font-size: 2.2rem;
            }
            
            .countdown-label {
                font-size: 0.9rem;
            }
            
            .launch-heading {
                font-size: 2.5rem;
            }
            
            .ziva-logo-text .ziva {
                font-size: 2.5rem;
            }
            
            .features-preview {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            
            .main-text {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .countdown-timer {
                gap: 0.5rem;
            }
            
            .countdown-item {
                padding: 1rem 0.5rem;
            }
            
            .countdown-number {
                font-size: 1.8rem;
            }
            
            .countdown-label {
                font-size: 0.8rem;
            }
            
            .launch-heading {
                font-size: 2rem;
            }
            .d-lg {
                display: none;
            }
        }

        @media (max-width: 360px) {
            .countdown-timer {
                gap: 0.3rem;
            }
            
            .countdown-item {
                padding: 0.8rem 0.3rem;
            }
            
            .countdown-number {
                font-size: 1.5rem;
            }
            
            .countdown-label {
                font-size: 0.7rem;
                letter-spacing: 0.5px;
            }
        }
    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="countdown-container">
        <!-- Floating Particles Background -->
        <div class="particles" id="particles"></div>
        <img src="/images/logo/ziva-logo.png" alt="ZIVA Logo" class="ziva-logo" width="200"/>
        <br/>
        <!-- Logo -->

        <!-- Heading -->
        <h1 class="launch-heading">Launching Soon</h1>
        <p class="launch-subtitle">
            Get ready to experience a sacred space where culinary artistry and soul care beautifully come together.
            <span class="d-lg">From inspired cookery classes to business mentorship and more, your journey to growth, healing and joyful living begins here.</span>
        </p>

        <!-- Countdown Timer -->
        <div class="countdown-timer">
            <div class="countdown-item">
                <span class="countdown-number" id="days">00</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="hours">00</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="minutes">00</span>
                <span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="seconds">00</span>
                <span class="countdown-label">Seconds</span>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf_LxpxxLx1bs9Fe5G7V4FvocVgCDKJWrKBQ97TUnilAxkB5g/viewform?usp=dialog" target="_blank" class="main-cta">
                Join the Waitlist
            </a>
            
            <div class="features-preview">
                <div class="feature-item">
                    <i class="zmdi zmdi-graduation-cap feature-icon"></i>
                    <span>Cookery Classes</span>
                </div>
                <div class="feature-item">
                    <i class="zmdi zmdi-case-check feature-icon"></i>
                    <span>Business Advisory</span>
                </div>
                <div class="feature-item">
                    <i class="zmdi zmdi-time feature-icon"></i>
                    <span>Therapy</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Countdown Timer
        function startCountdown() {
            const launchDate = new Date('September 1, 2025 00:00:00').getTime();
            
            const timer = setInterval(function() {
                const now = new Date().getTime();
                const distance = launchDate - now;
                
                if (distance < 0) {
                    clearInterval(timer);
                    document.querySelector('.countdown-container').innerHTML = `
                        <div class="ziva-logo-text">
                            <span class="the">THE</span>
                            <span class="ziva">ZIVA</span>
                            <span class="centre">CENTRE</span>
                        </div>
                        <h1 class="launch-heading">We're Live!</h1>
                        <p class="launch-subtitle">Welcome to ZIVA Centre - Your learning journey starts now!</p>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf_LxpxxLx1bs9Fe5G7V4FvocVgCDKJWrKBQ97TUnilAxkB5g/viewform?usp=dialog" target="_blank" class="main-cta">
                            Get Started
                        </a>
                    `;
                    return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            }, 1000);
        }

        // Create floating particles
        function createParticles() {
            const particleContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random size between 2-8px
                const size = Math.random() * 6 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                
                // Random position
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                
                // Random animation delay and duration
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
                
                particleContainer.appendChild(particle);
            }
        }

        // Add smooth hover effects
        function addHoverEffects() {
            const countdownItems = document.querySelectorAll('.countdown-item');
            
            countdownItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        }

        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function() {
            startCountdown();
            createParticles();
            addHoverEffects();
        });

        // Add sparkle effect on ribbon hover
        document.querySelector('.early-access-ribbon').addEventListener('mouseenter', function() {
            this.style.background = 'linear-gradient(90deg, #85cb14, #0a6225, #1ad054)';
        });
        
        document.querySelector('.early-access-ribbon').addEventListener('mouseleave', function() {
            this.style.background = 'linear-gradient(90deg, #75bb04, #085215, #0ac044)';
        });
    </script>
</body>
</html>