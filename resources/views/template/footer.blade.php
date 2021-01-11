            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <script>
        $("#pegawaiForm").submit(function(e) {
            e.preventDefault();
            
            let nama = $("#nama").val();
            let bonus = $("#bonus").val();
            let _token = $("input[name=_token]").val();
  
            $.ajax({
                url: "{{ route('pegawai.add') }}",
                type: "POST",
                data: {
                    nama:nama,
                    bonus:bonus,
                    _token:_token,
                },
                success: function(response)
                {
                    if(response)
                    {
                        $("#dataTable tbody").prepend('<tr><td>'+ response.id +'</td><td>'+ response.nama +'</td><td>'+ response.bonus +'</td>  <td><a href="#" class="btn btn-warning btn-edit">Edit</a><a href="#" class="btn btn-danger btn-del">Delete</a></td></tr>')
                        $('#pegawaiForm')[0].reset();
                        $("#pegawaiModal").modal('hide');
                    }
                }
            });
        });
    </script>

    <script>
        function deletePegawai(id)
        {
            if(confirm("Yakin datanya mau dihapus?"))
            {
                $.ajax({
                    url:'/pegawai/'+id
                    type:'DELETE',
                    data:{
                        _token : $("input[name=_token]").val()
                    },
                    success:function(response)
                    {
                        $("#sid"+id).remove();
                    }
                })
            }
        }
    </script>

</body>

</html>