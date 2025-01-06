@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="" style="color: #000;">&nbsp; Customer Support </a>
                    </li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title mb-4" style="font-size: 20px; text-transform: none; padding-top: 0px;">Customer Support
                </h2>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <form>
                        <label>Your Query:*</label>
                        <textarea class="form-control mb-3" rows="4" cols="7" style="height: 100% !important;"></textarea>
                        <label>Query Type:*</label><br>
                        <select class="mb-4"
                            style="padding: 4px 3px 3px;
    min-width: 150px;
    max-width: 100%;
    height: 2.2em;
    line-height: 2.2em;">
                            <option>Sales</option>
                        </select><br>

                        <input type="submit" class="btn btn-primary" value="Submit">

                    </form>

                    <hr>

                    <h6 style="font-size: 20px;"><b>Previous Communication</b></h6>
                </div>
            </div>
        </div>

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
