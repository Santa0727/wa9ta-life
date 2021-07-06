  @section('title')
  History
  @endsection
  @section('css')
  <style>
th {
  text-transform: initial !important;
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
                <button type="button" class="btn btn-sm btn-primary add_report">
                  <i class="fa fa-plus"></i> Add Report
                </button>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap w-100 dataTable no-footer data_Table"
              id="data_Table">
              <thead>
                <!-- <th>#</th> -->
                <th>Name</th>
                <th>Arabic Name</th>
                <th>ID #</th>
                <th>Passport #</th>
                <th>Moblie #</th>
                <th>Test Type</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Start Time</th>
                <th>Valid Hours</th>
                <th>Status</th>
                <th>Settings</th>
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
            <h4 class="modal-title">Add Report</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="test_type">Test Type</label>
              <select class="form-control" id="test_type">
                <option value="1">PCR</option>
                <option value="2">DPI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <div class="datepicker date input-group p-0 shadow-sm" id="start_datepicker">
                <input type="text" placeholder="Start date" class="form-control" id="start_date">
                <div class="input-group-append"><span class="input-group-text px-4"><i
                      class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="start_time">Start Time</label>
              <div class="input-group p-0 shadow-sm" id="end_timepicker">
                <input type="text" placeholder="End date" class="form-control" id="start_time">
                <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="validHoursInput">Valid Hours</label>
              <input type="number" min="0" class="form-control" id="validHoursInput" placeholder="Valid hours">
            </div>
            <div class="form-group">
              <label for="end_date">End Date</label>
              <div class="datepicker date input-group p-0 shadow-sm" id="end_datepicker">
                <input type="text" placeholder="End date" class="form-control" readonly id="end_date">
                <div class="input-group-append"><span class="input-group-text px-4"><i
                      class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="upsert_report">Add Report</button>
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

      $('#start_date').datepicker({
        clearBtn: true,
        autoclose: true,
        format: "yyyy-mm-dd"
      });

      $('#start_time').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 15,
        dynamic: false,
        dropdown: true,
        scrollbar: true,
      });

      datatable = $('#data_Table').DataTable({
        columnDefs: [{
          targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
          orderable: false
        }],
        order: [
          [0, 'desc']
        ],
        processing: true,
        serverSide: true,
        bStateSave: false,
        searching: false,
        fnCreatedRow: function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', 'item_' + aData['id']);
        },
        ajax: {
          url: "",
          dataType: "json",
          type: "POST",
          data: {
            _token: "{{ csrf_token() }}"
          },
          error: () => {
            toastr.error('Error occurred.', 'Error');
            setTimeout(function() {
              location.href = "{{ route('dashboard') }}";
            }, 1500);
          }
        },
        "columns": [
          // {
          //   data: "",
          //   render: () => {
          //     return `1`;
          //   }
          // },
          {
            data: "name"
          },
          {
            data: "arabic_name",
            render: (value) => `<div style="text-align: right">${value ?? ""}</div>`
          },
          {
            data: "eid"
          },
          {
            data: "passport"
          },
          {
            data: "moblie"
          },
          {
            data: "type",
            render: (value) => {
              if (value == 2) {
                return `<span class="badge badge-primary">DPI</span>`;
              } else if (value == 1) {
                return `<span class="badge badge-success">PCR</span>`;
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
              // console.log(start_date + ' ' + start_time, '---', date, Date.now(), Date)
              if ((Date.now() - date) < 0) {
                return `<span class="badge badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Valid</span>`;
              }
              return `<span class="badge badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Expired</span>`;
            },
          },
          {
            data: "id",
            render: (value, row, data) => {
              return `<button class="btn btn-sm btn-primary btn_edit_history" data-id="${value}" data-value='${JSON.stringify(data)}'>
                        <i class="fa fa-edit"></i> edit
                      </button>
                      <button class="btn btn-sm btn-danger btn_delete_history" data-id="${value}">
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

      // $(document).on("click", ".btn_edit_current", function() {
      //   $('#PopUp .modal-title').html($(this).attr("title"));
      //   $("#PopUp").modal({
      //     show: true,
      //     backdrop: "static"
      //   });
      // });

      $(document).on("click", ".add_report", function(e) {
        $('#add_edit_modal .modal-title').html("Add Report");
        $('#upsert_report').data("url", "{{ url()->current() }}/upsert").html('Add Report');
        $('#start_date').datepicker("update", moment(new Date()).format('YYYY-MM-DD'));
        // $('#end_date').val("");
        $('#test_type').val(1);
        $('#start_time').val(moment(new Date()).format('HH:mm:ss'));
        $('#validHoursInput').val(0);
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on("click", ".btn_edit_history", function(e) {
        $('#add_edit_modal .modal-title').html("Edit Report");
        let data = $(this).data('value');
        let id = $(this).data('id');
        $('#upsert_report').data("url", "{{ url()->current() }}/upsert/" + id).html('Update');
        $('#start_date').datepicker('update', data.start_date);
        $('#end_date').val(data.end_date);
        $('#test_type').val(data.type);
        $('#start_time').val(data.start_time);
        $('#validHoursInput').val(data.valid_hours);
        $("#add_edit_modal").modal({
          show: true,
          backdrop: "static"
        });
      });

      $(document).on('click', '.btn_delete_history', function() {
        let id = $(this).data("id");
        $.ajax({
          url: id,
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

      $(document).on('click', '.btn_confirm_email_current', function() {
        let id = $(this).data("id");
        if (id) {
          $('#data_Table tbody #item_' + id).css('background', 'hsla(64, 100%, 50%, 0.36)');
        }

        $.ajax({
          url: "{{''}}",
          method: "get",
          data: {
            "id": id,
          },
          dataType: "json",
          success: function(result) {
            if (result.error != null) {
              toastr.error(result.error, "@lang('table.confirm_email')");
            } else {
              toastr.success(result.success, "@lang('table.confirm_email')");
            }
            $('#data_Table').DataTable().ajax.reload();
          }
        });
      });

      $("#upsert_report").click(function() {
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        let start_time = $('#start_time').val();
        let valid_hours = $('#validHoursInput').val();
        let type = $('#test_type').val();
        let url = $(this).data('url');

        $.ajax({
          url: url,
          method: "POST",
          dataType: "json",
          data: {
            start_date,
            end_date,
            start_time,
            valid_hours,
            type
          },
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: (res) => {
            datatable.ajax.reload();
            toastr.success('Successfully saved.', 'Success');
            $("#add_edit_modal").modal('hide');
          },
          error: () => {
            toastr.error('Error occurred.', 'Error');
          }
        });
      });

      $('#start_date, #start_time, #validHoursInput').change(function() {
        let start_date = $('#start_date').val();
        let start_time = $('#start_time').val();
        let valid_hours = $('#validHoursInput').val();
        let date = new Date(start_date + ' ' + start_time);
        if (!valid_hours) {
          valid_hours = 0;
        }
        date = date.setHours(date.getHours() + Number(valid_hours));
        $('#end_date').val(moment(date).format('YYYY-MM-DD'));
      });
    });
    </script>
    @endsection
  </x-app-layout>
