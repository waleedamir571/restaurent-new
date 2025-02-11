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

        /* Fullscreen Loader */
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
        }

        .loader-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Main content */
        .header {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
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
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100vw;
                height: 100vh;
                object-fit: contain;
                background: black;
            }

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
                object-fit: contain;
            }

            .loader-container video {
                width: 100%;
                height: 100%;
                object-fit: contain;
                background-color: black;
            }

        }
    </style>
</head>

<body>

    <!-- Loader Section -->
    <div class="loader-container">
        <video id="loaderVideo" autoplay muted playsinline>
            <source src="images/loader.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Main Website Content -->
    <header class="header">
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
        const loaderContainer = document.querySelector('.loader-container');
        const soundToggle = document.getElementById('soundToggle');
        let userInteracted = false;

        // Start main video immediately (muted)
        bgVideo.play().catch(error => console.log('Autoplay initialization:', error.message));

        // Handle user interaction
        const handleInteraction = () => {
            if (!userInteracted) {
                userInteracted = true;
                bgVideo.muted = false;
                document.removeEventListener('click', handleInteraction);
                document.removeEventListener('touchstart', handleInteraction);
            }
        };

        document.addEventListener('click', handleInteraction);
        document.addEventListener('touchstart', handleInteraction);

        // When loader finishes
        loaderVideo.onended = () => {
            console.log("Loader video ended");
            loaderContainer.style.display = "none";
            if (userInteracted) {
                bgVideo.muted = false;
            }
            bgVideo.play().catch(error => console.log('Main video play:', error.message));
        };

        // Fallback: If loader takes too long, hide it after 5 seconds
        setTimeout(() => {
            if (!loaderVideo.ended) {
                loaderContainer.style.display = "none";
                bgVideo.play().catch(error => console.log('Fallback video play:', error.message));
            }
        }, 5000);

        // Toggle Sound On/Off
        soundToggle.addEventListener('click', () => {
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