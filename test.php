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

    <script>
        const loaderVideo = document.getElementById('loaderVideo');
        const bgVideo = document.getElementById('bgVideo');
        const loaderContainer = document.querySelector('.loader-container');
        let userInteracted = false;

        // Start main video immediately (muted)
        bgVideo.play().catch(error => console.log('Autoplay initialization:', error.message));

        // Handle user interaction
        const handleInteraction = () => {
            if (!userInteracted) {
                userInteracted = true;
                // Try to unmute immediately on first interaction
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
            
            // Final attempt to enable sound if not already unmuted
            if (userInteracted) {
                bgVideo.muted = false;
            }
            
            // Ensure video is playing
            bgVideo.play().catch(error => console.log('Main video play:', error.message));
        };

        // Fallback: If loader takes too long, hide it after 5 seconds
        setTimeout(() => {
            if (!loaderVideo.ended) {
                loaderContainer.style.display = "none";
                bgVideo.play().catch(error => console.log('Fallback video play:', error.message));
            }
        }, 5000);
    </script>

</body>
</html>