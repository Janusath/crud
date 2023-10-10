<div class="modal" tabindex="-1" id="view">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">View User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="spinner">
                <div class="d-flex justify-content-center" >
                  <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                  </div>
                </div>   
                </div>
          <table class="table table-borderless" id="table">
            <tr>
              <td>
                <strong>Profile</strong>
              </td>
              <td>
                <img src="" id="profile" class="img img-thumbnail" width="200" />
              </td>
            </tr>
            <tr>
              <td>
                <strong>Username</strong>
              </td>
              <td id="user"></td>
            </tr>
            <tr>
              <td>
                <strong >Email</strong>
              </td>
              <td id="email"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>