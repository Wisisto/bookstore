<?php session_start() ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<p>Once you place your order, we'll definitely contact you.</p>
		<form id="manage-order">
			<div class="form-group">
				<label for="" class="control-label">Full Name</label>
				<input type="text" name="name" id="" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Contact</label>
				<input type="text" name="contact" id="" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Delivery Address</label>
				<textarea name="address" id="" cols="30" rows="4" class="form-control" required=""></textarea>
			</div>
		</form>
	</div>
</div>
<script>
	$('#manage-order').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_order',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Order successfully submitted.',"success");
					setTimeout(function(){
						location.reload()
					},750)
				}else{
					alert_toast('Something went wrong. Please try again.',"error");
				}
			}
		})
	})
</script>