<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



{!! Html::script('dist/js/jquery.spinner.js') !!}
{!! Html::script('js/addrow.js') !!}
{!! Html::script('js/pacadd.js') !!}
{!! Html::script('js/addrowback.js') !!}
{!! Html::script('js/main.js') !!}
{{ Html::script('fancybox/lib/jquery.mousewheel-3.0.6.pack.js') }}
{{ Html::script('fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

<script type="text/javascript">

$(document).ready(function(){
	$('.submit').click(function(){
		var formdate = $('#dateform').val();
		var todate = $('#dateto').val();

		$.ajax({
			url: '{{URL::to('purchasereportcall')}}',
			type: 'get',
			data: {'formdate':formdate,'todate':todate,},
			success: function(data){
				$('#showdata').html(data);
			}
		});
	});


	$('.ssubmit').click(function(){
		var dform = $('#dform').val();
		var dto = $('#dto').val();

		$.ajax({
			url: '{{URL::to('salereportcall')}}',
			type: 'get',
			data: {'dform':dform,'dto':dto,},
			success: function(data){
				$('#datashow').html(data);
			}
		});
	});

	$('.exsubmit').click(function(){
		var datform = $('#datform').val();
		var datdto = $('#datdto').val();

		$.ajax({
			url: '{{URL::to('expensereportcall')}}',
			type: 'get',
			data: {'datform':datform,'datdto':datdto,},
			success: function(data){
				$('#exdatashow').html(data);
			}
		});
	});

	$( ".spinner" ).spinner(); 
});


$(document).ready(function(){
	loadProduct();
	addToCart();
	loadPackage();
	//addPacakgeCart();
	
});
	// product js start

	function loadProduct(){
		$('.productCat').click(function(){
			var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('loadProduct')}}',
				type: 'get',
				data: {'id':id,},
				success: function(data){
					$('.showProduct').html(data);
					addToCart();
				}
			});
		});
	}

	function addToCart(){
		$('.productinfo').click(function(){
			var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('checkQuantity')}}',
				type: 'get',
				data: {'id':id,},
				success: function(data){
					if(data>0){
							var taskArray = new Array();
				            $(".p_id").each(function() {
				            	var p_id = $(this).val();
				            	taskArray.push(p_id);
				            });
				            if(taskArray.length >0){
				            	if(checkValue(id,taskArray) == 1){
					            	taskArray.push(id);

					            }
				            }
				            var quantity = new Array();
				            $('.qnt').each(function(){
				            	var qnt = $(this).val();
				            	var qid = $(this).attr('id');
				            	if(parseInt(qid) == id){

				            		quantity.push(parseInt(qnt)+1);
				            	}else{

				            		quantity.push(parseInt(qnt));
				            	}
				            	
				            });
							$.ajax({
								url: '{{URL::to('addToCart')}}',
								type: 'get',
								data: {'id':id,'taskArray':taskArray,'quantity':quantity,},
								success: function(data){
									if(data == ''){

										alert('this product is exist in cart');
										
									}else{
										//console.log(data);

										$('.cahange').html(data);
										var spin = $( ".spinner" ).spinner({ 
										});

										total();
										ntotal();						
										due();
										
									}
								}
							});
					}else{
						
						swal("Unavailable Stock" , "Please Product Stock !");
						console.log(data);
					}
				}
			});
			
		});
	}

	function checkValue(value,arr){
	  var status = 1;
	 
	  for(var i=0; i<arr.length; i++){
	   var name = arr[i];
	   if(name == value){
	    status = 0;
	    break;
	   }
	  }

	  return status;
	}

	function checkQuantity(id){
		var id = id;
		//alert(id);
		$.ajax({
			url: '{{URL::to('checkQuantity')}}',
			type: 'get',
			data: {'id':id,},
			success: function(data){
				return data;
			}
		});
	}

	// product js end 

	// package js start

	function loadPackage(){
		$('.packageCat').click(function(){
			//var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('loadPackage')}}',
				type: 'get',
				data: {},
				success: function(data){
					$('.showProduct').html(data);
				    addToCart();
				}
			});
		});
	}

	// function addPacakgeCart(){
	// 	$('.packageinfo').click(function(){					
	// 		var id = $(this).find('.id').val();
	// 		 //alert(id);
	// 		$.ajax({
	// 			url: '{{URL::to('checkPackageQuantity')}}',
	// 			type: 'get',
	// 			data: {'id':id,},
	// 			success: function(data){
	// 			//console.log(data);
	// 				if(data>0){
	// 						var taskArray = new Array();
	// 			            $(".p_id").each(function() {
	// 			            	var p_id = $(this).val();
	// 			            	taskArray.push(p_id);

	// 			            });
	// 			            if(taskArray.length >0){
	// 			            	if(checkValue(id,taskArray) == 1){
	// 				            	taskArray.push(id);
	// 				            }
	// 			            }
	// 			            var quantity = new Array();
	// 			            $('.qnt').each(function(){
	// 			            	var qnt = $(this).val();
	// 			            	var qid = $(this).attr('id');
	// 			            	if(parseInt(qid) == id){

	// 			            		quantity.push(parseInt(qnt)+1);
	// 			            	}else{

	// 			            		quantity.push(parseInt(qnt));
	// 			            	}
				            	
	// 			            });
	// 						$.ajax({
	// 							url: '{{URL::to('addPacakge')}}',
	// 							type: 'get',
	// 							data: {'id':id,'taskArray':taskArray,'quantity':quantity,},
	// 							success: function(data){
	// 								//console.log(data);
									
	// 								if(data == ''){
	// 									alert('this product is exist in cart');
										
	// 								}else{

	// 									$('.cahange').html(data);
	// 									var spin = $( ".spinner" ).spinner({ 
	// 									});

	// 									total();
	// 									ntotal();						
	// 									due();
										
	// 								}
	// 							}
	// 						});
	// 				}else{
	// 					swal("Unavailable Stock" , "Please Product Stock !");
	// 				}
	// 			}
	// 		});
	// 	});
	// }

	// function checkPackageQuantity(id){
	// 	var id = id;
	// 	alert(id);
	// 	$.ajax({
	// 		url: '{{URL::to('checkPackageQuantity')}}',
	// 		type: 'get',
	// 		data: {'id':id,},
	// 		success: function(data){
	// 			return data;
	// 		}
	// 	});
	// }

	// package js end

</script>
