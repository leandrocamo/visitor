<!--FOOTER-->
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Visitor - EC <?php echo date('Y'); ?></div>
            <div>
                <a href="https://facebook.com/jaritakiec" target="_blank">FACE Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="<?php echo base_url(); ?>/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js"></script>
<script>
    $('#modal-confirma').on('show.bs.modal',
        function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
</script>
<!--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
-->

</body>

</html>