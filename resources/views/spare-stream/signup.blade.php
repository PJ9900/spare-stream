@include('spare-stream.include.header')
<!-- Header End -->

<div class="container">
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-md-12">
            <div class="user-login signup-login mt-2">
                <div class="mb-3">
                    <small class="pb-4 fw-bold">Create Account</small>
                </div>

                <div class="user-input d-flex justify-content-center align-items-center gap-2">
                    <div class="signup-label">
                        <small class="position-relative">Entered Phone Number</small>
                    </div>
                    <input type="text" name="" id="" class="text">
                </div>
                <div class="mt-2">
                    <small>
                        (number not correct? <a href="#">change number</a> )
                    </small>
                </div>

                <div class="signup-input-container my-4">
                    <div
                        class="signup-input d-flex my-4 align-items-center justify-content-center text-center flex-column">
                        <label for="">Youre name</label>
                        <input type="text" name="" placeholder="Full name" id="" class="text">

                    </div>

                    <div
                        class="signup-input d-flex my-4 align-items-center justify-content-center text-center flex-column">
                        <label for="">Youre email</label>
                        <input type="email" name="" placeholder="Email address" id="" class="text">

                    </div>

                    <div
                        class="signup-input d-flex my-4 align-items-center justify-content-center text-center flex-column">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <label for="">Create password</label>
                            <i data-bs-toggle="tooltip" data-bs-html="true"
                                data-bs-title="<em>You can create a new password for your account to login again with the same in the future</em>"
                                class="fa-solid fa-circle-question"></i>

                        </div>
                        <input type="text" name="" placeholder="Enter password" id="" class="text">

                    </div>

                    <div
                        class="signup-input d-flex my-4 align-items-center justify-content-center text-center flex-column">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <label for="">Your area pincode</label>
                            <i data-bs-toggle="tooltip" data-bs-html="true"
                                data-bs-title="<em>Your 6 digit delivery area pincode</em>"
                                class="fa-solid fa-circle-question"></i>

                        </div>
                        <input style="width:150px" type="text" name="" placeholder="Pincode" id="" class=" text">

                    </div>
                </div>

                <div class="user-btn my-5">
                    <button>Register</button>
                </div>

               
            </div>
        </div>
    </div>

</div>

<?php 
// include_once('include/footer.php');
?>
<!-- Header End -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

</html>