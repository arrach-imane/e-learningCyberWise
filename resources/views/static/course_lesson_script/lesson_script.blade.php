<script>
    function getYouTubeId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    window.addEventListener('DOMContentLoaded', function() {
        var courseVideos = document.querySelectorAll('.course-video');
        courseVideos.forEach(function(videoContainer) {
            var videoUrl = videoContainer.getAttribute('data-video');
            var videoId = getYouTubeId(videoUrl);
            if (videoId) {
                var embedCode =
                    '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">' +
                    '<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"' +
                    ' src="https://www.youtube.com/embed/' + videoId +
                    '" frameborder="0" allowfullscreen></iframe></div>';
                videoContainer.innerHTML = embedCode;
            }
        });
    });


    document.addEventListener('DOMContentLoaded', (event) => {
        var totalLessons = document.querySelectorAll('.lesson-checkbox').length;
        var completedLessons = 0;
        document.querySelectorAll('.lesson-checkbox').forEach(function(checkbox) {
            var lessonId = checkbox.dataset.lessonId;
            var completed = sessionStorage.getItem('lesson_completed_' + lessonId) === 'true';
            checkbox.checked = completed;
            if (completed) {
                completedLessons++;
            }
        });
        updateProgressBar(completedLessons, totalLessons);

        // Add event listeners to checkboxes
        document.querySelectorAll('.lesson-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var lessonId = this.dataset.lessonId;
                sessionStorage.setItem('lesson_completed_' + lessonId, this.checked);
                // Update the count of completed lessons
                completedLessons = this.checked ? completedLessons + 1 : completedLessons - 1;
                updateProgressBar(completedLessons, totalLessons);
            });
        });
    });

    function updateProgressBar(completed, total) {
        var competitionPercentage = (completed / total) * 100;
        var progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = competitionPercentage + '%';
        progressBar.setAttribute('aria-valuenow', competitionPercentage);
    }
</script>
