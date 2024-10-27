@extends('static.components.header')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 bg-light-green">
                            <div class="card-body text-center text-white">
                                <div class="mb-3">
                                    @if ($user->user_photo)
                                        <img id="profileImage" src="{{ asset('upload/' . basename($user->user_photo)) }}"
                                            class="img-fluid rounded-circle rounded-circle-border" alt="User-Profile-Image">
                                    @else
                                        <img id="profileImage" src="https://img.icons8.com/bubbles/100/000000/user.png"
                                            class="img-fluid rounded-circle rounded-circle-border" alt="User-Profile-Image">
                                    @endif
                                </div>
                                <h6 class="fw-bold text-success">{{ $user->full_name }}</h6>
                                <p>{{ $user->role }}</p>
                                <div class="icon-container">
                                    <a href="" type="button" class="btn btn-flat" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/Edit.png"
                                            alt="Edit">
                                        <span>Edit</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="mb-4 pb-2 border-bottom fw-bold">Information</h6>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Email:</div>
                                    <div class="col-sm-8">{{ $user->email }}</div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Your Balance:</div>
                                    <div class="col-sm-8 text-info font-weight-bold">
                                        <h3>{{ $userBankCost }}$</h3>
                                        <hr>
                                        <a href="{{ url('profile/withdraw/' . $user->id) }}">
                                            <img class="img-fluid px-2" style="width: 50px;"
                                                src="/assets/Icons/Withdraw.png" alt="Withdraw Icon">
                                            <span>Withdraw / Deposit</span>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Enroll Now:</div>
                                    <div class="col-sm-8">
                                        <a href="{{ route('profile.enrolls', ['id' => auth()->id()]) }}"
                                            class="text-decoration-none">
                                            <img class="img-fluid px-2" style="width: 50px;"
                                                src="/assets/Icons/Enrollment.png" alt="Enrollment">
                                            <span>x{{ $enrollments }}</span>
                                        </a>
                                    </div>

                                </div>


                                <ul class="list-unstyled d-flex mb-0">
                                    <li class="me-3">
                                        <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip"
                                            title="Facebook"><i class="feather icon-facebook"></i></a>
                                    </li>
                                    <li class="me-3">
                                        <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip"
                                            title="Twitter"><i class="feather icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip"
                                            title="Instagram"><i class="feather icon-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', $user->user_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-step" id="step-1">
                            <div class="login-form-head">
                                <h4>Step 1: Personal Information</h4>
                                <p>Please enter your full name and email address:</p>
                            </div>
                            <div class="login-form-body px-5 p-2">
                                <hr>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#"><img id="profileImageStep1"
                                            src="{{ $user->user_photo ? asset('upload/' . basename($user->user_photo)) : 'https://img.icons8.com/bubbles/100/000000/user.png' }}"
                                            class="img-fluid rounded-circle rounded-circle-border" alt="User-Profile-Image"
                                            width="100px"></a>
                                    <input type="file" id="fileInputStep1" name="user_photo" accept="image/*"
                                        style="display: none;">
                                </div>
                                <hr>
                                <div class="form-gp">
                                    <label for="exampleInputName1">Full Name</label>
                                    <br>
                                    <input type="text" id="exampleInputName1" name="full_name"
                                        value="{{ $user->full_name }}" required>
                                    <i class="ti-user"></i>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <br>
                                    <input type="email" id="exampleInputEmail1" name="email"
                                        value="{{ $user->email }}" required>
                                    <i class="ti-email"></i>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="submit-btn-area">
                                    <button class="text-info" type="button" onclick="showStep(2)">Next<i
                                            class="ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step" id="step-2">
                            <div class="login-form-head">
                                <h4>Step 2: Security Information</h4>
                                <p>Please enter your new password:</p>
                            </div>
                            <div class="login-form-body px-5 p-4">
                                <div class="form-gp">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <br>
                                    <input type="password" id="exampleInputPassword1" name="password">
                                    <i class="ti-lock"></i>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputPassword2">Confirm Password</label>
                                    <br>
                                    <input type="password" id="exampleInputPassword2" name="password_confirmation">
                                    <i class="ti-lock"></i>
                                    <div class="text-danger"></div>
                                </div>
                                <!-- Navigation Buttons -->
                                <div class="submit-btn-area">
                                    <button class="text-danger" type="button" onclick="showStep(1)">Back<i
                                            class="ti-arrow-left"></i></button>
                                    <hr>
                                    <button class="text-info" type="button" onclick="showStep(3)">Skip<i
                                            class="ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step" id="step-3">
                            <div class="login-form-head">
                                <h4>Step 3: Review Information</h4>
                                <p>Please review your information:</p>
                            </div>
                            <div class="login-form-body px-5 p-2">
                                <hr>
                                <div class="d-flex justify-content-center align-items-center">
                                    <img id="profileImageStep3"
                                        src="{{ $user->user_photo ? asset('upload/' . basename($user->user_photo)) : 'https://img.icons8.com/bubbles/100/000000/user.png' }}"
                                        class="img-fluid rounded-circle rounded-circle-border" alt="User-Profile-Image"
                                        width="100px">
                                </div>
                                <hr>
                                <div class="form-gp">
                                    <label for="exampleInputName1">Update Full Name : </label>
                                    <br>
                                    <p id="displayFullName"></p>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputName1">Update Email : </label>
                                    <br>
                                    <p id="displayEmail"></p>
                                </div>
                                <div class="submit-btn-area">
                                    <button class="text-danger" type="button" onclick="showStep(2)">Back<i
                                            class="ti-arrow-left"></i></button>
                                    <hr>
                                    <button class="text-success" id="form_submit" type="submit">Update Now<i
                                            class="ti-check"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(function(stepDiv) {
                stepDiv.style.display = 'none';
            });
            // Show the requested step
            document.getElementById('step-' + step).style.display = 'block';

            // If moving to the review step, display the entered information
            if (step === 3) {
                document.getElementById('displayFullName').textContent = document.getElementById('exampleInputName1').value;
                document.getElementById('displayEmail').textContent = document.getElementById('exampleInputEmail1').value;

                // Display the selected profile photo in Step 3
                var profileImageStep1Src = document.getElementById('profileImageStep1').src;
                document.getElementById('profileImageStep3').src = profileImageStep1Src;
            }
        }

        function setupProfileImageUpload(stepNumber) {
            var profileImage = document.getElementById('profileImageStep' + stepNumber);
            var fileInput = document.getElementById('fileInputStep' + stepNumber);

            profileImage.addEventListener('click', function() {
                fileInput.click();
            });

            // Add mouse hover effect
            profileImage.addEventListener('mouseenter', function() {
                profileImage.style.opacity = '0.6'; // Change opacity to 0
            });

            profileImage.addEventListener('mouseleave', function() {
                profileImage.style.opacity = '1'; // Restore opacity on mouse leave
            });

            fileInput.addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                        // Update Step 3 profile image if in Step 1
                        if (stepNumber === 1) {
                            document.getElementById('profileImageStep3').src = e.target.result;
                        }
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        }

        // Initialize the form with the first step visible
        document.addEventListener('DOMContentLoaded', function() {
            showStep(1);
            setupProfileImageUpload(1); // Setup for Step 1

            // Form submission
            document.getElementById('form_submit').addEventListener('click', function() {
                document.querySelector('form').submit();
            });
        });
    </script>
    <style>
        .rounded-circle-border {
            border: 2px solid #000000;
        }
    </style>
@endsection
