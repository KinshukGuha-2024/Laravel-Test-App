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

<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailModalLabel">Received From - </h5>
        <label id="timeAgoLabel" style="font-size: 12px; padding-top:10px; padding-left:5px; font-weight:bold; color:#49b34c;"></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Recipient Email:</label>
            <label id="recipient-email" style="font-weight: bold; color:#4976b3;"></label>
          </div>
          <div class="form-group">
            <label for="recipient-subject" class="col-form-label">Subject:</label>
            <input type="text" class="form-control" readonly id="recipient-subject">
          </div>
          <div class="form-group">
            <label for="message-text"  class="col-form-label">Message:</label>
            <textarea class="form-control" style="height: 250px;" readonly id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.location.reload();" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="userInfoModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Visited</h4>
        <label id="timeAgoLabel" style="font-size: 12px; padding-top:13px; padding-left:5px; font-weight:bold; color:#49b34c;"> 12m ago</label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="user-system" class="col-form-label">User System:</label>
            <label id="user-system" style="font-weight: bold; color:#4976b3;"> WebKit, Chrome(Windows)</label>
          </div>
          <div class="form-group">
            <label for="user-address" class="col-form-label">User Address:</label>
            <label id="user-address" style="font-weight: bold; color:#4976b3;"> Kolkata, West Bengal - 700072 (India)</label>
          </div>
          <div id="map"></div>
          <div class="form-group">
            <label for="recipient-subject" class="col-form-label">Subject:</label>
            <input type="text" class="form-control" readonly id="recipient-subject">
          </div>
          <div class="form-group">
            <label for="message-text"  class="col-form-label">Message:</label>
            <textarea class="form-control" style="height: 250px;" readonly id="message-text"></textarea>
          </div>
        </form>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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