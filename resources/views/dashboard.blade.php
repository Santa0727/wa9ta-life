  @section('title')
  Users
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
                <th>Arabic Name</th>
                <th>ID #</th>
                <th>Passport #</th>
                <th>Moblie #</th>
                <th>PCR</th>
                <th>DPI</th>
                <th>Test Type</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Start Time</th>
                <th>Valid Hours</th>
                <th>Active</th>
                <th>Setting</th>
                <th>Status</th>
                <th>Add Report</th>
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
              <input type="text" class="form-control" id="nameInput" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="arabicNameInput">Arabic Name</label>
              <input type="text" class="form-control" id="arabicNameInput" placeholder="الاسم العربي"
                style="direction: rtl">
            </div>
            <div class="form-group">
              <label for="eidInput">ID #</label>
              <input type="text" class="form-control" id="eidInput" placeholder="000-0000-0000000-0">
            </div>
            <div class="form-group">
              <label for="passportInput">Passport #</label>
              <input type="text" class="form-control" id="passportInput" placeholder="Passport #">
            </div>
            <div class="form-group">
              <label for="moblieInput">Moblie #</label>
              <input type="number" class="form-control" id="moblieInput" placeholder="Moblie number">
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

      $('#eidInput').mask('000-0000-0000000-0');

      datatable = $('#data_Table').DataTable({
        columnDefs: [{
          targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
          orderable: false
        }],
        order: [
          [0, 'desc']
        ],
        processing: true,
        serverSide: true,
        bStateSave: true,
        searching: false,
        fnCreatedRow: function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', 'item_' + aData['id']);
        },
        ajax: {
          url: "{{ route('dashboard.get_users') }}",
          dataType: "json",
          type: "POST",
          data: {
            _token: "{{ csrf_token() }}"
          },
          error: (err) => {
            switch (err.status) {
              case 401:
                // Take action, referencing xhr.responseText as needed.
                location.reload();
            }
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
            data: "arabic_name",
            render: (value) => `<div style="text-align: right">${value ?? ""}</div>`
          },
          {
            data: "email"
          },
          {
            data: "passport"
          },
          {
            data: "moblie"
          },
          {
            data: "pcr_test"
          },
          {
            data: "dpi_test"
          },
          {
            data: "type",
            render: (value) => {
              if (value == 2) {
                return `<span class="badge badge-primary">DPI</span>`;
              } else if (value == 1) {
                return `<span class="badge badge-success">PCR</span>`;
              } else {
                return "";
              }
            }
          },
          {
            data: "start_date"
          },
          {
            data: "end_date"
          },
          {
            data: "start_time"
          },
          {
            data: "valid_hours"
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
          },
          {
            data: "start_date",
            // render: (value) => {
            //   if (!value) return "";
            //   if (value == 1) {
            //     return `<span class="badge badge-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Valid</span>`;
            //   }
            //   return `<span class="badge badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Expired</span>`;
            // },
            render: (value, row, data) => {
              if (!value) return "";
              const {
                start_date,
                start_time,
                valid_hours
              } = data;
              let date = new Date(start_date + ' ' + start_time);
              date = date.setHours(date.getHours() + Number(valid_hours));
              if ((Date.now() - date) < 0) {
                return `<span class="badge badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Valid</span>`;
              }
              return `<span class="badge badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Expired</span>`;
            },
          },
          {
            data: "id",
            render: (value) => {
              return `<a href="/history/${value}" class="btn btn-sm btn-success btn_add_report" data-id="${value}"><i class="fa fa-plus"></i></a>`
            },
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
        $('#upsert_user').data("url", "{{ route('dashboard.add_new_user') }}").html('Add User');
        $(".preview-avatar").attr('src', "{{ asset('/images/logo.png') }}");
        // $('#emailInput').val('');
        $('#nameInput').val('');
        $('#arabicNameInput').val('');
        $('#eidInput').val('');
        $('#passportInput').val('');
        $('#moblieInput').val('');
        // $('#passwordInput').val();
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on("click", ".btn_edit_user", function(e) {
        $('#add_edit_modal .modal-title').html("Edit User");
        let data = $(this).data('value');
        let id = $(this).data('id');
        $('#upsert_user').data("url", "{{ route('dashboard.add_new_user') }}/" + id).html('Update User');
        // $('#emailInput').val(data.email);
        if (data.profile_photo_path) {
          $(".preview-avatar").attr('src', "{{ asset('') }}" + data.profile_photo_path);
        } else {
          $(".preview-avatar").attr('src', "{{ asset('/images/logo.png') }}");
        }
        $('#nameInput').val(data.name);
        $('#arabicNameInput').val(data.arabic_name);
        $('#eidInput').val(data.email);
        $('#passportInput').val(data.passport);
        $('#moblieInput').val(data.moblie);
        // $('#passwordInput').val();
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on('click', '.btn_delete_user', function() {
        let id = $(this).data("id");
        $.ajax({
          url: "{{ route('dashboard.add_new_user') }}/" + id,
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
          }
        })
      });

      $(document).on('click', '.btn_active', function() {
        let id = $(this).data("id");
        $.ajax({
          url: "{{ route('dashboard.add_new_user') }}/" + id,
          method: "put",
          dataType: "json",
          data: {
            _token: "{{csrf_token()}}",
          },
          success: function() {
            toastr.success('Success', "Successfully updated");
            // data.ajax.reload();
          }
        });
      });

      $("#upsert_user").click(function() {
        // let email = $('#emailInput').val();
        // let password = $('#passwordInput').val();
        let name = $('#nameInput').val();
        let arabic_name = $('#arabicNameInput').val();
        let eid = $('#eidInput').val();
        let passport = $('#passportInput').val();
        let moblie = $('#moblieInput').val();
        let url = $(this).data('url');
        let formData = new FormData();
        // formData.append("email", email);
        formData.append("name", name);
        formData.append("arabic_name", arabic_name);
        formData.append("eid", eid);
        formData.append("passport", passport);
        formData.append("moblie", moblie);
        // formData.append("password", password);
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
          error: (res) => {
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