@include('spare-stream.include.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Header End -->

<div class="container bg-light">
    <div class="row py-5 px-3 justify-content-around">
        <div class="col-lg-3 contact-side-bar">
            <div>
                <nav aria-label="breadcrumb mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><small>Career</small></li>
                    </ol>
                </nav>

                <h6><i class="fa-solid fa-user"></i> MY ACCOUNT</h6>
                <hr class="my-2 mb-3">
                <ul class="side-li">
                    <li>Orders</li>
                    <li>Replacement Requests</li>
                    <li>SpareTeam Support</li>
                </ul>

                <div class="track-order">
                    <p class="mb-1">Track my order(s)</p>
                    <div class="track-input">
                        <input type="text" name="" id="" class="text" placeholder="Enter ID/Email">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                </div>

                <div class="row track-btn mt-3 align-items-center ">
                    <div class="col-md-5 mb-2 mb-md-0">
                        <button>Sign In</button>
                    </div>
                    <div class="col-md-5 track-btn-outline">
                        <button>Resgister</button>
                    </div>


                </div>

            </div>
        </div>
        <!-- -------- -->
        <div class="col-lg-8 mt-3 mt-lg-0">
            <h6 class="fw-bold">Career with SpareStream
            </h6>
            <div class="contact-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa reprehenderit quibusdam maiores in
                    ipsa, labore alias quae veritatis aut est.</p>
            </div>

            <div>
                <h5 class="fw-bold">Fill the form below
                </h5>
                <div class="c-form">
                    <form class="px-4 py-4 mt-3 px-md-4 py-md-3">
                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Name</label>
                            <input type="text" class="form-control" id="" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Email</label>
                            <input type="text" class="form-control" id="" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Apply for post
                            </label>
                            <input type="text" class="form-control" id="" aria-describedby="">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Expected Salary
                            </label>
                            <input type="text" class="form-control" id="" aria-describedby="">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Desired working location

                            </label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Resume
                            </label>
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label text-dark">Recent picture

                            </label>
                            <div class="input-group">
                                <select class="form-select" id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>
                        </div>

                        <button type="submit" class="">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>



@include('spare-stream.include.footer')
<!-- Header End -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>