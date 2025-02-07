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

        /* Hide main content initially */
        .header {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: none;
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

        /* Mute/Unmute Button */
        .sound-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            display: none; /* Initially hidden */
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
        <video id="bgVideo" autoplay loop playsinline>
            <source src="images/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Sound Toggle Button -->
        <button id="soundToggle" class="sound-toggle">Unmute</button>
    </header>

    <script>
        let loaderVideo = document.getElementById('loaderVideo');
        let bgVideo = document.getElementById('bgVideo');
        let loaderContainer = document.querySelector('.loader-container');
        let mainHeader = document.querySelector('.header');
        let soundToggle = document.getElementById('soundToggle');

        // Jab loader video khatam ho, tabhi website dikhao
        loaderVideo.onended = function() {
            console.log("Loader video ended, showing website...");
            loaderContainer.style.display = "none"; // Hide loader
            mainHeader.style.display = "block"; // Show website
            bgVideo.muted = true; // Default muted
            bgVideo.play(); // Ensure video starts playing
            soundToggle.style.display = "block"; // Show unmute button
        };

        // Function to enable sound with one click
        function enableSound() {
            if (bgVideo.muted) {
                bgVideo.muted = false; // Unmute video
                bgVideo.play(); // Play video with sound
                soundToggle.innerText = "Mute";
            } else {
                bgVideo.muted = true; // Mute video
                soundToggle.innerText = "Unmute";
            }
        }

        // Button to manually mute/unmute (Fix for double click issue)
        soundToggle.addEventListener("click", function(event) {
            event.stopPropagation(); // Prevent double execution
            enableSound();
        });

    </script>

</body>
</html>
