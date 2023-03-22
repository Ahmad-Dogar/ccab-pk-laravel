$('#probation_type-table').DataTable().clear().destroy();


var table_table = $('#probation_type-table').DataTable({
initComplete: function () {
    this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            });

        column.data().unique().sort().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
            $('select').selectpicker('refresh');
        });
    });
},
responsive: true,
fixedHeader: {
header: true,
footer: true
},
processing: true,
serverSide: true,
ajax: {
url: "{{ route('probation.index') }}",

},


columns: [
{
data: 'name',
name: 'name',
},
{
data: 'duration',
name: 'duration',
},
{
data: 'action',
name: 'action',
orderable: false
}
],


"order": [],
'language': {
'lengthMenu': '_MENU_ {{__("records per page")}}',
"info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
"search": '{{trans("file.Search")}}',
'paginate': {
'previous': '{{trans("file.Previous")}}',
'next': '{{trans("file.Next")}}'
}
},
'columnDefs': [
{
"orderable": false,
'targets': [0, 1],
},

],


'select': {style: 'multi', selector: 'td:first-child'},
'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],

});
new $.fn.dataTable.FixedHeader(table_table);

$('#probation_type_submit').on('click', function(event) {
event.preventDefault();
let probation_title     = $('input[name="name"]').val(),
    probation_duration  = $('select[name="duration"]').val();

$.ajax({
url: "{{ route('probation.store') }}",
method: "POST",
data: { name:probation_title, duration:probation_duration},
success: function (data) {
var html = '';
if (data.errors) {
html = '<div class="alert alert-danger">';
    for (var count = 0; count < data.errors.length; count++) {
    html += '<p>' + data.errors[count] + '</p>';
    }
    html += '</div>';
}
if (data.success) {
html = '<div class="alert alert-success">' + data.success + '</div>';
$('#probation_type_form')[0].reset();
$('#probation_type-table').DataTable().ajax.reload();
}
$('.probation_result').html(html).slideDown(300).delay(5000).slideUp(300);
}
});

});

$(document).on('click', '.probation_edit', function(){
var id = $(this).attr('id');
$('.probation_result').html('');

var target = "{{ route('probation.index') }}/"+id+'/edit';
$.ajax({
url:target,
dataType:"json",
success:function(html){

$('#probation_title_edit').val(html.data.probation_title);

$('#hidden_probation_id').val(html.data.id);
$('#ProbationEditModal').modal('show');
}
})

});

$('#probation_type_edit_submit').on('click', function(event) {
event.preventDefault();
let probation_title_edit = $('input[name="name_edit"]').val(),
    probation_duration_edit  = $('select[name="duration_edit"]').val();
let hidden_probation_id= $('#hidden_probation_id').val();

$.ajax({
url: "{{ route('probation.update') }}",
method: "POST",
data: { name_edit:probation_title_edit,hidden_probation_id:hidden_probation_id,duration_edit:probation_duration_edit},
success: function (data) {
var html = '';
if (data.errors) {
html = '<div class="alert alert-danger">';
    for (var count = 0; count < data.errors.length; count++) {
    html += '<p>' + data.errors[count] + '</p>';
    }
    html += '</div>';
}
if (data.success) {
html = '<div class="alert alert-success">' + data.success + '</div>';
$('#probation_type_form_edit')[0].reset();
$('#probation_type-table').DataTable().ajax.reload();
}
$('.probation_result_edit').html(html).slideDown(300).delay(3000).slideUp(300);
setTimeout(function(){
$('#ProbationEditModal').modal('hide')
}, 5000);

}
});

});



$(document).on('click', '.probation_delete', function() {

let delete_id = $(this).attr('id');
let target = "{{ route('probation.index') }}/" + delete_id + '/delete';
if (confirm('{{__('Are You Sure you want to delete this data')}}')) {
$.ajax({
url: target,
success: function (data) {
var html = '';
html = '<div class="alert alert-success">' + data.success + '</div>';
setTimeout(function () {
$('#probation_type-table').DataTable().ajax.reload();
}, 2000);
$('.probation_result').html(html).slideDown(300).delay(3000).slideUp(300);
}
})
}

});

$('#probation_close').on('click', function() {
$('#probation_type_form')[0].reset();
$('#probation_type-table').DataTable().ajax.reload();
});