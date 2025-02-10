<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Video with Sound</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="header">
        <video id="bgVideo" loop playsinline>
            <source src="images/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- 🔊 Sound On/Off Button -->
        <button id="soundToggle">🔊 Sound</button>
    </header>

    <script src="script.js"></script>

</body>
</html>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.header {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

#bgVideo {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* 🔊 Button Styling */
#soundToggle {
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

#soundToggle:hover {
    background: rgba(255, 255, 255, 0.3);
}

@media (min-width: 320px) and (max-width: 480px) {
    #bgVideo {
        width: 100%;
        height: 100vh; /* Ensure full height */
        object-fit: fill; /* Fit within the screen without cropping */
    }
}


</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let video = document.getElementById("bgVideo");
    let soundToggle = document.getElementById("soundToggle");

    // Force video to autoplay without sound first
    video.muted = true;
    video.autoplay = true;
    video.play();

    // On button click, unmute and play sound
    soundToggle.addEventListener("click", function () {
        if (video.muted) {
            video.muted = false;
            soundToggle.textContent = "🔇 Sound off";
        } else {
            video.muted = true;
            soundToggle.textContent = "🔊 Sound on";
        }
    });
});

</script>