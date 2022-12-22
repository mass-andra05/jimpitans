   <!-- Bootstrap core JavaScript-->
   <script src="{{ url('bt') }}/vendor/jquery/jquery.min.js"></script>
   <script src="{{ url('bt') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ url('bt') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ url('bt') }}/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="{{ url('bt') }}/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="{{ url('bt') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="{{ url('bt') }}/js/demo/datatables-demo.js"></script>

   <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
   
   <script>
      var loader = document.getElementById('loading-wrapper')

      $(window).on('load', function() {
         $('#loading-wrapper').fadeOut('slow')
      })
   </script>