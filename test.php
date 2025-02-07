<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Width Background Video</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header ko fullscreen aur relative position dena */
        .header {
            position: relative;
            width: 100%;
            height: 100vh; /* Full screen height */
            overflow: hidden;
        }

        /* Video ko full width aur height dena */
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

    <header class="header">
        <!-- Background Video -->
        <video id="bgVideo" autoplay loop muted playsinline>
            <source src="images/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </header>

    <script>
        let video = document.getElementById('bgVideo');

        // Function jo sound enable karega
        function enableSound() {
            video.muted = false;
            video.play();
            
            // Event listener hatana takay ek hi dafa chale
            document.removeEventListener('click', enableSound);
            document.removeEventListener('scroll', enableSound);
            document.removeEventListener('touchstart', enableSound);
        }

        // User jaise hi interact kare, sound on ho jayega
        document.addEventListener('click', enableSound);
        document.addEventListener('scroll', enableSound);
        document.addEventListener('touchstart', enableSound);
    </script>

</body>
</html>
