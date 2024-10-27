<script>
    function getYouTubeId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    window.addEventListener('DOMContentLoaded', function() {
        var courseVideos = document.querySelectorAll('.course-video');
        if (courseVideos.length > 0) {
            var firstVideoUrl = courseVideos[0].getAttribute('data-video');
            var firstVideoId = getYouTubeId(firstVideoUrl);
            if (firstVideoId) {
                var embedCode =
                    '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">' +
                    '<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"' +
                    ' src="https://www.youtube.com/embed/' + firstVideoId +
                    '" frameborder="0" allowfullscreen></iframe></div>';
                document.getElementById("videoPlayer").innerHTML = embedCode;
            }
        }
    });

     document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.member-box').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                var url = element.getAttribute('data-url');
                if (url) {
                    window.open(url, '_blank');
                }
            });
        });
    });
</script>
