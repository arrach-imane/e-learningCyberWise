<script>
    function loadVideo() {
        var videoUrl = document.getElementById("videoUrlInput").value;
        var videoId = getYouTubeId(videoUrl);

        if (videoId) {
            var embedCode = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + videoId +
                '" allowfullscreen></iframe>';
            document.getElementById("videoPlayer").innerHTML = '<div class="mt-3 embed-responsive embed-responsive-16by9">' +
                embedCode + '</div>';
        } else {
            alert("Invalid YouTube URL. Please enter a valid YouTube video URL.");
        }
    }

    function getYouTubeId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return null;
        }
    }

    function loadThumbnailImage() {
        alert("Thumbnail image loading functionality will be implemented here.");
    }

    function previewOrClearThumbnailImage() {
        var input = document.getElementById('thumbnailImageInput');
        var preview = document.getElementById('thumbnailPreview');

        // If no file is selected, clear the preview
        if (!input || !input.files || input.files.length === 0) {
            preview.innerHTML = '';
            return;
        }

        // Otherwise, preview the selected image
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var img = new Image();
            img.src = e.target.result;

            img.onload = function() {
                if (img.width <= 1920 && img.height <= 1080) {
                    // Create an image element
                    var imgElement = document.createElement('img');
                    imgElement.setAttribute('class', 'img-thumbnail');
                    imgElement.style.maxWidth = '100%';
                    imgElement.src = e.target.result;

                    // Append the image element to the preview container
                    preview.innerHTML = ''; // Clear previous preview
                    preview.appendChild(imgElement);
                } else {
                    alert('Image dimensions must be less than or equal to 1920x1080 pixels.');
                    input.value = ''; // Clear the file input if image dimensions are invalid
                    preview.innerHTML = ''; // Clear the preview
                }
            };
        };

        reader.readAsDataURL(file);
    }


    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('before_crop').addEventListener('change', (event) => {

            $('#cropImageModal').modal('show');
        });
    });
</script>
