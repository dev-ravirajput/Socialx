@extends('layouts.app')

@section('content')

<style>
    /* Card Styles */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
    padding: 20px;
}

.card-body {
    padding: 20px;
}

/* Form Styles */
.form-control {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px;
}

.form-control:focus {
    border-color: #f5ba41;
    box-shadow: 0 0 5px rgba(245, 186, 65, 0.5);
}

/* File Input */
.form-control[type="file"] {
    padding: 8px;
}

/* Submit Button */
.btn-primary {
    background-color: #f5ba41;
    border: none;
    border-radius: 5px;
    padding: 10px;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #e0a53a;
}
/* Image Preview */
#imagePreview {
    margin-top: 10px;
    border: 2px dashed #ddd;
    padding: 10px;
    border-radius: 10px;
}
</style>
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Create a New Post</h4>
                    </div>
                    <div class="card-body">
                        <!-- Post Creation Form -->
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                                <small class="text-muted">Supported formats: JPEG, PNG, GIF</small>
                            </div>
                            <!-- Image Preview -->
                            <div class="mb-3 text-center">
                                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid rounded" style="display: none; max-height: 300px;">
                            </div>
                            <!-- Caption -->
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <textarea class="form-control" id="caption" name="caption" rows="3" placeholder="Write a caption..."></textarea>
                            </div>
                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Add location">
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Share Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&libraries=places&callback=initAutocomplete" async defer></script>
    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
    <script>
  function initAutocomplete() {
    var input = document.getElementById('location');  // Get the input element
    var options = {
      types: ['geocode'],  // Restrict to geocoding (addresses)
    };
    var autocomplete = new google.maps.places.Autocomplete(input, options);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        console.log("No details available for input: " + place.name);
        return;
      }
    });
  }
</script>

@endsection