<?php
$title = "Blogger - Contact Us";
include "app/database.php";
include "app/helper.php";
include "layout/header.php";
?>
<!-- Header section -->
<!-- Featured Blogs -->
<section class="container my-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
    <div class="row shadow p-3">
        <form class="row g-3 needs-validation" id="contact-form" novalidate="novalidate">
            <div class="col-md-6 required">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 required">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12 required">
                <label for="validationSuject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="validationSuject" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12 ">
                <label for="validationMessage" class="form-label">Message</label>
                <!-- <input type="text" class="form-control" id="validationSuject" required> -->
                <textarea class="form-control" name="message" id="validationMessage" cols="30" rows="10" required></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>


            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" id="submit-btn" type="submit" disabled>Submit form</button>
            </div>
        </form>
    </div>
</section>
<section class="container my-4">
    <div class="row">
        <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3577.9864095991093!2d72.95495251486858!3d26.262104483412067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418ee607fd8f33%3A0xa14e9f7866569084!2sShri%20Shiv%20Head%20%26%20Block%20Repairing%20Works!5e0!3m2!1sen!2sin!4v1641354995465!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-lg-6">
            <div class="shadow h-100">
                <ul class="list-unstyled mt-3 ps-3">
                    <li>
                        <b> Contact Number: </b>
                    </li>
                    <li>
                        <b> Contact Number: </b>
                    </li>
                    <li>
                        <b> Contact Number: </b>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
include "layout/footer.php";
?>
<script>
    $("#invalidCheck").change(
        function() {
            var flag = $(this).prop("checked")
            $("#submit-btn").attr("disabled", !flag)
        }
    )
</script>
<script>
    //   Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script>
    $("#contact-form").submit(
        function() {
            var formData = $(this).serialize()
            $.ajax({
                url: "contact-ajax.php",
                type: "post",
                data: formData,
                beforeSend: function() {

                },
                success: function(response) {
                    var response = JSON.parse(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Congo...',
                        text: response.message
                    })
                },
                error: function(error) {
                    var response = JSON.parse(error.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    })

                }
            })
            return false;
        }
    )
</script>