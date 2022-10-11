$(document).on('submit', '#saveStudent', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('save_student',true)


    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData, ther 
        processData:false,
        contentType:false,
        success: function (response) {

            var res = $.parseJSON(response)

            if(res.status == 200){
                // alert('data Saved ')
                $('#saveStudentModal').modal('hide');
                $('#saveStudent')[0].reset();
                $('.table').load(location.href+" .table");
                $('#myAlert').html(`<strong>Success</strong> ${res.message}`);
                $('#myAlert').removeClass('d-none');
                $('#myAlert').addClass('alert-success');

                setTimeout(()=>{
                    $('#myAlert').addClass('d-none');
                },3000);



            }
            
        }
    });

});
// ==========================Info Student ===========================
$(document).on('click','.infoStudentBtn', function () {
    var student_id = $(this).val();
    // alert('info btn Clicked'+ student_id)

    $.ajax({ 
        type: "GET",
        url: "code.php?student_id=" + student_id,
        success: function (response) {

            var res = $.parseJSON(response)

            if(res.status == 200){

                $('#infoStuddentModal').modal('show');
                $('#stName').html(res.data.name);
                $('#stEmail').html(res.data.email);
                $('#stPhone').html(res.data.phone);
                $('#stCourse').html(res.data.course);
            }
            
        }
    });
    
});


// ============================Delete Student=========================================
$(document).on('click', '.deleteStudentBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var student_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'delete_student': true,
                'student_id': student_id
            },
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                   
                    $('.table').load(location.href+" .table");
                    $('#myAlert').html(`<strong>Success</strong> ${res.message}`);
                    $('#myAlert').removeClass('d-none');
                    $('#myAlert').addClass('alert-danger');

                    setTimeout(()=>{
                        $('#myAlert').addClass('d-none');
                    },3000);
    
                }
                
            }
        });
    }
});

// =============================Edit Student =================================================

$(document).on('click','.editStudentBtn', function () {
    var edit_student_id = $(this).val();
    // alert('info btn Clicked'+ student_id)

    $.ajax({ 
        type: "GET",
        url: "code.php?edit_student_id=" + edit_student_id,
        success: function (response) {

            var res = $.parseJSON(response)

            if(res.status == 200){
                $('#the_name').val(res.data.name);
                $('#student_id').val(res.data.id);
                $('#the_email').val(res.data.email);
                $('#the_phone').val(res.data.phone);
                $('#the_course').val(res.data.course);
                $('#studentEditModal').modal('show');
            }
            
        }
    });
    
});

// ============================Update Student=========================================
$(document).on('submit', '#updateStudent', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_student", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response); 
            if(res.status == 200){

                $('#errorMessageUpdate').addClass('d-none');

                $('#studentEditModal').modal('hide');
                $('#updateStudent')[0].reset();

                $('.table').load(location.href+" .table");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});
