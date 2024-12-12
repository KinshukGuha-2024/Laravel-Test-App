<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>Copyright &copy; {{ config('app.name') }} <span id="currentYear"></span></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button onclick="removeLocalStorageData();" class="btn btn-primary" >Logout</button>
            </div>
        </div>
    </div>
</div>

<script>
    function removeLocalStorageData() {
        localStorage.removeItem('user_valid');
        window.location.href = "{{ route('auth.logout') }}";
    }
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>