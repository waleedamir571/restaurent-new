<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Width Background Video with Sound</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: black; /* Ensure background is always black */
        }

        /* Fullscreen Loader with Fade-in Right Effect */
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: black;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeInRight 1s ease-in-out;
        }

        .loader-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Fade-in Right Animation for Loader */
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Fade-out Animation for Loader */
        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        /* Main content */
        .header {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            opacity: 0;
            /* Initially hidden */
            transition: opacity 1s ease-in-out;
            background: black; /* Ensure background is black */
        }

        /* Background video styles */
        .header video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }

        /* Fade-in Left Animation for Main Video */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Sound Toggle Button */
        .sound-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            z-index: 10000;
        }

        .sound-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .header video {
                object-fit: contain;
                background: black;
                position: fixed;
            }

            .loader-container video {
                object-fit: contain;
                background-color: black;
            }
        }
    </style>
</head>

<body>

    <!-- Loader Section -->
    <div class="loader-container" id="loader">
        <video id="loaderVideo" autoplay muted playsinline>
            <source src="images/loader.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Main Website Content -->
    <header class="header" id="mainContent">
        <video id="bgVideo" muted loop playsinline>
            <source src="images/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </header>

    <!-- Sound Toggle Button -->
    <button id="soundToggle" class="sound-toggle">Sound On</button>

    <script>
        const loaderVideo = document.getElementById('loaderVideo');
        const bgVideo = document.getElementById('bgVideo');
        const loaderContainer = document.getElementById('loader');
        const mainContent = document.getElementById('mainContent');
        const soundToggle = document.getElementById('soundToggle');
        let userInteracted = false;
    
        // **Ensure Background Video Does NOT Play Initially**
        bgVideo.pause(); 
        bgVideo.muted = true;
    
        // Function to Start Video Only After Loader Ends
        function startMainVideo() {
            console.log("Starting main video...");
            mainContent.style.opacity = "1"; // Fade-in background video
            mainContent.style.animation = "fadeInLeft 1s ease-in-out"; // Apply fade-in left effect
            bgVideo.play().catch(error => console.log('Main video play error:', error.message));
        }
    
        // **When Loader Ends, Hide it and Start Video**
        loaderVideo.onended = () => {
            console.log("Loader video ended");
    
            // **Fade out loader**
            loaderContainer.style.animation = "fadeOut 1s forwards";
    
            setTimeout(() => {
                loaderContainer.style.display = "none"; // Hide loader
                startMainVideo(); // Now start main video
            }, 1000); // Wait for fadeOut animation to complete
        };
    
        // **Fallback: Hide Loader after 7 seconds if it doesn’t end**
        setTimeout(() => {
            if (!loaderVideo.ended) {
                loaderContainer.style.animation = "fadeOut 1s forwards";
                setTimeout(() => {
                    loaderContainer.style.display = "none";
                    startMainVideo(); // Now start main video
                }, 1000);
            }
        }, 7000);
    
        // ✅ **Fixed Sound Toggle Button (Works on Mobile & Desktop)**
        soundToggle.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent button click from affecting video playback
    
            if (bgVideo.muted) {
                bgVideo.muted = false;
                soundToggle.textContent = "Sound Off";
            } else {
                bgVideo.muted = true;
                soundToggle.textContent = "Sound On";
            }
        });
    
    </script>
    


</body>

</html>
