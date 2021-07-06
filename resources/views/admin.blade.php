  @section('title')
  Admins
  @endsection
  @section('css')
  <style>
th {
  text-transform: initial !important;
}

.change_avatar {
  cursor: pointer;
}
  </style>
  @endsection
  <x-app-layout>
    <div class="card">
      <div class="card-body">
        <div>
          <div class="filter-custom mb-2">
            <div class="row">
              <div class="col-12 text-right">
                <!-- <button type="button" class="btn btn-sm btn-dark ajax_delete_all">
                  <i class="fa fa-trash"></i> Delete
                </button> -->
                <button type="button" class="btn btn-sm btn-primary add_new_user">
                  <i class="fa fa-plus"></i> New User
                </button>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap w-100 dataTable no-footer data_Table"
              id="data_Table">
              <thead>
                <th>Picture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Moblie #</th>
                <th>Active</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Edit Modal -->
    <div class="modal fade" id="add_edit_modal" tabindex="-1" role="dialog" aria-labelledby="add_edit_modal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Create New User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group text-center">
              <img src="{{ asset('images/logo.png') }}" alt="User Avatar" width="100" height="100"
                class="rounded-circle border change_avatar preview-avatar" />
              <br>
              <button class="btn btn-primary btn-sm mt-1 change_avatar">Change</button>
              <input type="file" id="avatar_image" class="d-none">
            </div>
            <!-- <div class="form-group">
              <label for="emailInput">Email address</label>
              <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp"
                placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="passwordInput">Password address</label>
              <input type="password" class="form-control" id="passwordInput" aria-describedby="passwordHelp"
                placeholder="Enter password">
            </div> -->
            <div class="form-group">
              <label for="nameInput">Name</label>
              <input type="text" class="form-control" id="nameInput" placeholder="Name...">
            </div>
            <div class="form-group">
              <label for="emailInput">Email</label>
              <input type="email" class="form-control" id="emailInput" placeholder="Please enter your email...">
            </div>
            <div class="form-group">
              <label for="passwordInput">Password #</label>
              <input type="text" class="form-control" id="passwordInput" placeholder="Plese set your password...">
            </div>
            <div class="form-group">
              <label for="moblieInput">Moblie #</label>
              <input type="number" class="form-control" id="moblieInput" placeholder="Moblie number...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="upsert_user">Add User</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>


    @section('js')
    <script>
    $(document).ready(function() {

      let datatable;
      "use strict";

      //Code here.

      datatable = $('#data_Table').DataTable({
        columnDefs: [{
          targets: [0],
          orderable: false
        }],
        processing: true,
        serverSide: true,
        bStateSave: true,
        searching: false,
        fnCreatedRow: function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', 'item_' + aData['id']);
        },
        ajax: {
          url: "{{ route('admin.get_users') }}",
          dataType: "json",
          type: "POST",
          data: {
            _token: "{{ csrf_token() }}"
          },
          // success: function(res) {
          //   console.log(res)
          // }
          error: function(res) {
            location.reload();
          }
        },
        "columns": [{
            data: "profile_photo_path",
            render: (value) => {
              return `<img src="{{ asset('') }}${value ? value : 'images/logo.png'}" alt="avatar" width="30" height="30" class="rounded-circle"/>`;
            }
          },
          {
            data: "name"
          },
          {
            data: "email"
          },
          {
            data: "show_password"
          },
          {
            data: "moblie"
          },
          {
            data: "active",
            render: (value, row, data) => {
              return `<div class="material-switch">
                            <input data-id="${data.id}" id="active_${data.id}" class="btn_active" type="checkbox" ${value == "1" ? "checked" : ""}/>
                            <label for="active_${data.id}" class="label-success"></label>
                        </div>`;
            }
          },
          {
            data: "id",
            render: (value, row, data) => {
              return `<button class="btn btn-sm btn-primary btn_edit_user" data-id="${value}" data-value='${JSON.stringify(data)}'>
                        <i class="fa fa-edit"></i> edit
                      </button>
                      <button class="btn btn-sm btn-danger btn_delete_user" data-id="${value}">
                        <i class="fa fa-trash"></i> delete
                      </button>`;
            }
          }
        ]
      });

      /*$('#data_Table tbody').sortable({
          axis: 'y',
          update: function (event, ui) {
              let data = $(this).sortable('serialize');
              console.log(data);
          }
      });*/

      $(document).on('click', '.change_avatar', function() {
        $('#avatar_image').trigger('click');
      });

      // $(document).on('click', '.ajax_delete_all', function() {
      //   $.ajax({
      //     url: "{{''}}",
      //     method: "get",
      //     data: {
      //       "array": array,
      //     },
      //     dataType: "json",
      //     success: function(result) {
      //       if (result.error != null) {
      //         toastr.error(result.error);
      //         $("input:checkbox").prop('checked', false);
      //         $('#data_Table').DataTable().ajax.reload();
      //       } else {
      //         toastr.success(result.success);
      //         $("input:checkbox").prop('checked', false);
      //         $('#data_Table').DataTable().ajax.reload();
      //       }
      //     }
      //   });
      // });

      // $(document).on('click', '.btn_select_all', function() {
      //   array = [];
      //   $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
      //   $('.btn_select_btn_deleted').each(function(index, value) {
      //     let id = $(value).data("id");
      //     let status = $(value).prop("checked");
      //     if (status == true) {
      //       array.push(id);
      //     } else {
      //       let index2 = array.indexOf(id);
      //       if (index2 > -1) {
      //         array.splice(index2, 1);
      //       }
      //     }
      //   });
      // });

      // $(document).on('click', '.btn_select_btn_deleted', function() {
      //   let id = $(this).data("id");
      //   let status = $(this).prop("checked");
      //   let numberOfChecked = $('input:checkbox:checked').length;
      //   let numberOftext = $('.btn_select_btn_deleted').length;
      //   if (status == true) {
      //     array.push(id);
      //   } else {
      //     let index = array.indexOf(id);
      //     if (index > -1) {
      //       array.splice(index, 1);
      //     }
      //   }
      //   if (numberOftext != array.length) {
      //     $(".btn_select_all").prop('checked', false);
      //   }
      //   if (numberOftext == array.length) {
      //     $(".btn_select_all").prop('checked', $(this).prop('checked'));
      //   }
      // });

      // $(document).on("click", ".PopUp", function() {
      //   $('#PopUp .modal-title').html($(this).attr("title"));
      //   $('.modal .title').html('انشاء مستخدم جديد');
      //   $("#PopUp").modal({
      //     show: true,
      //     backdrop: "static"
      //   });
      // });

      $(document).on("click", ".add_new_user", function(e) {
        $('#add_edit_modal .modal-title').html("Add New User");
        $('#upsert_user').data("url", "{{ route('admin.add_new_user') }}").html('Add User');
        $(".preview-avatar").attr('src', "{{ asset('/images/logo.png') }}");
        $('#emailInput').val('');
        $('#nameInput').val('');
        $('#moblieInput').val('');
        $('#passwordInput').val();
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on("click", ".btn_edit_user", function(e) {
        $('#add_edit_modal .modal-title').html("Edit User");
        let data = $(this).data('value');
        let id = $(this).data('id');
        $('#upsert_user').data("url", "{{ route('admin.add_new_user') }}/" + id).html('Update User');
        $('#emailInput').val(data.email);
        if (data.profile_photo_path) {
          $(".preview-avatar").attr('src', "{{ asset('') }}" + data.profile_photo_path);
        } else {
          $(".preview-avatar").attr('src', "{{ asset('/images/logo.png') }}");
        }
        $('#nameInput').val(data.name);
        $('#emailInput').val(data.email);
        $('#passwordInput').val(data.show_password);
        $('#moblieInput').val(data.moblie);
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on('click', '.btn_delete_user', function() {
        let id = $(this).data("id");
        $.ajax({
          url: "{{ route('admin.add_new_user') }}/" + id,
          method: "DELETE",
          data: {
            _token: "{{csrf_token()}}",
          },
          success: ({
            success,
            message
          }) => {
            if (!success) {
              return toastr.warning(message, 'Warning');
            }
            datatable.ajax.reload();
            toastr.info('Successfully deleted.', 'Success');
          },
          error: () => {
            toastr.error("Error occurred", "Error");
          }
        })
      });

      $(document).on('click', '.btn_active', function() {
        let id = $(this).data("id");
        $.ajax({
          url: "{{ route('admin.add_new_user') }}/" + id,
          method: "put",
          dataType: "json",
          data: {
            _token: "{{csrf_token()}}",
          },
          success: function({
            success,
            message
          }) {
            if (success)
              return toastr.success("Successfully updated", "Success");
            datatable.ajax.reload();
            toastr.warning(message, "Warning");
          },
          error: () => {
            datatable.ajax.reload();
            toastr.error("Error occurred", "Error");
          }
        });
      });

      $("#upsert_user").click(function() {
        // let email = $('#emailInput').val();
        // let password = $('#passwordInput').val();
        let name = $('#nameInput').val();
        let email = $('#emailInput').val();
        let password = $('#passwordInput').val();
        let moblie = $('#moblieInput').val();
        let url = $(this).data('url');
        let formData = new FormData();
        // formData.append("email", email);
        formData.append("name", name);
        formData.append("email", email);
        // formData.append("passport", passport);
        formData.append("moblie", moblie);
        formData.append("password", password);
        var files = $("#avatar_image").prop("files");
        if (files.length)
          formData.append("avatar", files[0]);
        $.ajax({
          url: url,
          method: "POST",
          dataType: "json",
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: (res) => {
            datatable.ajax.reload();
            toastr.success('Successfully saved.', 'Success');
            $("#add_edit_modal").modal('hide');
          },
          error: function(res) {
            if (res.responseJSON && res.responseJSON.message) {
              return toastr.error(res.responseJSON.message, 'Error');
            }
            return toastr.error('Error occurred.<br> Please input data correctly.', 'Error');
          }
        });
      });

      $("#avatar_image").change(function() {
        var files = $(this).prop("files");
        if (!files.length) return;

        $('.preview-avatar').attr('src', URL.createObjectURL(files[0]));
      });
    });
    </script>
    @endsection
  </x-app-layout>