<?php

@include 'config.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php
   
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.stytle.display = `none`;"></i> </div>';

      };
   };
   
   ?>

   <?php include 'header.php'; ?>


   <div class=" container col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_message" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered table-compact" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="35%">
					<col width="35%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Date/Time</th>
						<th>From</th>
						<th>Message</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = mysqli_query($conn,"SELECT * FROM `messages` order by unix_timestamp(`date_created`) desc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class='text-center'><?php echo date("M d, Y h:i A",strtotime($row['date_created'])) ?></td>
						<td><b class=""><?php echo ucwords($row['full_name']) ?></b></td>
						<td>
							<small class=""><b>Subject:</b> <?php echo $row['subject'] ?></small><br>
							<small class="truncate"><b>Message:</b><?php echo $row['message'] ?></small>
						</td>
						<td class="text-center">
							<?php if($row['status'] == 0): ?>
								<span class="badge badge-primary badge-status">New</span>
							<?php else: ?>
								<span class="badge badge-success badge-status">Read</span>
							<?php endif; ?>
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm view_message">
		                          <i class="fas fa-eye"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_message" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('.view_message').click(function(){
			$(this).closest('tr').find('.badge-status').parent().html('<span class="badge badge-success badge-status">Read</span>')
			uni_modal("Inquiry Content","view.php?&id="+$(this).attr('data-id'))
		})
		$('.delete_message').click(function(){
		_conf("Are you sure to delete this Testimony?","delete_message",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_message($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=message_delete',
			method:'POST',
			data:{id:$id},
			dataType:'json',
			success:function(resp){
				if(resp.status == 'success'){
					location.reload()
				}else{
					alert_toast(resp.err_msg,'error')
				}
				end_loader();
			}
		})
	}
</script>

    <!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>