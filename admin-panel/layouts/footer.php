</div>
</div>
<footer class="container-fluid bg-dark text-white text-center">
    <div class="row">
        <div class="col-12">
            &copy; <?php echo date('Y'), ' - ', date('y') + 1 ?>
        </div>
    </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bf520e6492.js" crossorigin="anonymous"></script>
<script>
    $("#sideMenu li").click(
        function() {
            $(this).toggleClass("bg-dark")
            var childElem = $(this).children(".child");
            childElem.slideToggle();
        }
    )
</script>
</body>

</html>