// message auto delete<<<<<<<<<<<<<<<<<<<<<<

window.setTimeout(function() {
	 $(".alert").fadeTo(500, 0).slideUp(500, function(){
	 $(this).remove(); 
			 });
}, 4000);

//message auto delete end <<<<<<<<<<<<<<<<<<<<<<

// product delete alert 
$('button.delete-btn').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    swal({
        title             : "Are you sure?",
        text              : "You will not be able to recover this!",
        type              : "warning",
        showCancelButton  : true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText : "Yes, Delete it!",
        cancelButtonText  : "No, Cancel delete!",
        closeOnConfirm    : false,
        closeOnCancel     : false
    },
    function(isConfirm){
        if(isConfirm){
            swal("Deleted!","It has been deleted", "success");
            setTimeout(function() {
                self.parents(".delete_form").submit();
            }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
        }
        else{
              swal("Cancelled","It is safe", "error");
        }
    });
});
// product delete alert end

// select dropdown search

// $(".livesearch").chosen();

// select dropdown search end

// product add dependent dropdown >>>>>>>>>>>>>>>>>>


// $(document).ready(function() {
//     //this is onchange for parent category
//         $('select[name="pcat_name"]').on('change', function() {
//             var choneID = $(this).val();
//             if(choneID) {
//                 $.ajax({
//                     url: '/getDropOne/'+choneID,
//                     type: "GET",
//                     dataType: "json",
//                     success:function(data) {

                        
//                         $('select[name="chcatone_name"]').empty();
//                         $.each(data, function(key, value) {
//                             $('select[name="chcatone_name"]').append('<option value="'+ key +'">'+ value +'</option>');
//                         });

//                     }
//                 });
//             }else{
//                 $('select[name="chcatone_name"]').empty();
//             }

//         });
//         $('select[name="chcatone_name"]').on('change', function() {
//             var ctwoID = $(this).val();
//             if(ctwoID) {
//                 $.ajax({
//                     url: '/getDropTwo/'+ctwoID,
//                     type: "GET",
//                     dataType: "json",
//                     success:function(data) {

                        
//                         $('select[name="chcattwo_name"]').empty();
//                         $.each(data, function(key, value) {
//                             $('select[name="chcattwo_name"]').append('<option value="'+ key +'">'+ value +'</option>');
//                         });

//                     }
//                 });
//             }else{
//                 $('select[name="chcattwo_name"]').empty();
//             }
//         });

// });

// <<<<<<<<<<<<<<<<<<<

// categorytwo add dependent dropdown >>>>>>>>>>>>>>>>>>


// $(document).ready(function() {
//     //this is onchange for parent category
//         $('select[name="parent_category_id"]').on('change', function() {
//             var choneID = $(this).val();
//             if(choneID) {
//                 $.ajax({
//                     url: '/getDrop/'+choneID,
//                     type: "GET",
//                     dataType: "json",
//                     success:function(data) {

                        
//                         $('select[name="child_categoryone_id"]').empty();
//                         $.each(data, function(key, value) {
//                             $('select[name="child_categoryone_id"]').append('<option value="'+ key +'">'+ value +'</option>');
//                         });

//                     }
//                 });
//             }else{
//                 $('select[name="child_categoryone_id"]').empty();
//             }

//         });
     
// });

// <<<<<<<<<<<<<<<<<

// $(document).ready(function() {
//      $('#Carousel').carousel({
//         interval: 5000
//     })
// });