<div class="modal  modal-sm " tabindex="-1" id="delete">
    <div class="modal-dialog ">
      <div class="modal-content m-0 p-0">
        <div class="modal-header border-0">
       
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <p class="text-danger text-center">Are Sure to Delete User?</p>
        </div>
        <div class="modal-footer  border-0">
          <input type="hidden" name="id" id="delete_id" value=""/>
          <button class="btn btn-danger btn-sm" data-bs-dismiss="modal"  onclick="deleteUser()">Yes</button>
          <button class="btn btn-secondary  btn-sm"  data-bs-dismiss="modal" aria-label="Close">No</button>
        </div>
      </div>
    </div>
  </div>