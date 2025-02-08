<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullscreen Video Background with Sound</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: black;
        }

        /* Fullscreen Video */
        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Video -->
    <video id="bg-video" autoplay loop playsinline>
        <source src="images/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let video = document.getElementById("bg-video");

            // Force autoplay with sound
            video.muted = false;
            video.play().then(() => {
                console.log("Video is playing with sound.");
            }).catch(error => {
                console.error("Autoplay with sound blocked, trying again...");
                setTimeout(() => {
                    video.muted = false;
                    video.play();
                }, 500);
            });
        });
    </script>

</body>
</html>
