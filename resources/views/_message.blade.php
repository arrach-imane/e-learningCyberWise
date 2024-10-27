@if (!empty(session('success')))
    <div id="idAlert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (!empty(session('payment-error')))
    <div id="idAlert" class="alert alert-danger" role="alert">
        {{ session('payment-error') }}
    </div>
@endif

@if (!empty(session('warning')))
    <div id="idAlert" class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (!empty(session('info')))
    <div id="idAlert" class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (!empty(session('secondary')))
    <div id="idAlert" class="alert alert-secondary" role="alert">
        {{ session('secondary') }}
    </div>
@endif

@if (!empty(session('primary')))
    <div id="idAlert" class="alert alert-primary" role="alert">
        {{ session('primary') }}
    </div>
@endif
<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
    <script>
        // Display error messages with SweetAlert2
        var errorMessages = '<ul>';
        @foreach ($errors->all() as $error)
            errorMessages += '<li>{{ $error }}</li>';
        @endforeach
        errorMessages += '</ul>';

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: errorMessages
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}'
        });
    </script>
@endif

<style>
    /* Your existing styles for .alert can be kept */
    .alert {
        margin: 10px;
        padding: 15px;
        font-size: 20px;
        text-align: center;
        border: 1px solid transparent;
        border-radius: 4px;
        position: fixed;
        top: 10px;
        right: 10px;
        width: 400px;
        height: auto;
        z-index: 1000;
        opacity: 1;
        transform: scale(1);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
</style>

<script>
    // Example script for hiding alerts after 7 seconds
    setTimeout(function() {
        var idAlert = document.getElementById('idAlert'); 
        if (idAlert) {
            idAlert.style.transform = 'scale(0)';
            idAlert.style.opacity = 0;
            setTimeout(function() {
                idAlert.style.display = 'none';
            }, 300);
        }
    }, 7000);
</script>
