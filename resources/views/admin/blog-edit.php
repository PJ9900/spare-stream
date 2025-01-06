<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['title'])) {
        $valid = 0;
        $error_message .= "Title cannot be empty.<br>";
    }
        $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'blogs'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

        $bpath = $_FILES['banner']['name']; 
        $bpath_tmp = $_FILES['banner']['tmp_name'];
        if($bpath!='') {
            $bext = pathinfo( $bpath, PATHINFO_EXTENSION );
            $bfile_name = basename( $bpath, '.' . $bext );
            if( $bext!='jpg' && $bext!='png' && $bext!='jpeg' && $bext!='gif' && $bext!='webp' ) {
                $valid = 0;
                $error_message .= 'You must have to upload jpg, jpeg, gif, webp or png file<br>';
            }
    } else {
    // 	$valid = 0;
    //     $error_message .= 'You must have to select a Category photo<br>';
    }
        $bfinal_name = 'cat-banner-'.$ai_id.'.'.$bext;
        move_uploaded_file( $bpath_tmp,'assets/images/blog-image/'.$bfinal_name ); 
     if($_POST['banner']==''){
       $bfinal_name=$_POST['obanner'];
    }   
    
    if($valid == 1) {
       
		$statement = $pdo->prepare("Update  blogs set name=?,short_description=?,description=?,status=?,slug=?,banner=?,meta_title=?,keywords=?,meta_description=? where id=?");
		$statement->execute(array($_POST['title'],$_POST['sdesc'],$_POST['desc'],$_POST['status'],$_POST['slug'],$bfinal_name,$_POST['mtitle'],$_POST['mkey'],$_POST['mdesc'],$_REQUEST['id']));	
    	$success_message = 'Blog Updated successfully.';
    }
}
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM blogs WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}

							
foreach ($result as $row) {
	$name = $row['name'];
    $sdesc = $row['short_description'];
    $desc=$row['description'];
    $slug=$row['slug'];
    $status=$row['status'];
    $mtitle=$row['meta_title'];
    $mkey=$row['keywords'];
    $mdesc=$row['meta_description'];
    $banner=$row['banner'];
}

?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Blog</h1>
	</div>
	<div class="content-header-right">
		<a href="blog.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Status<span>*</span></label>
							<div class="col-sm-4">
								<select name="status" class="form-control select2">
									    <option value="1">Active</option>
										<option value="0">Deactive</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Image</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="assets/images/blog-image/<?php echo $row['banner'];; ?>" alt="Blog Image" style="width:400px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Image<span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="banner">
							<input type="hidden" class="form-control" value="<?php echo $banner; ?>" name="obanner">
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $name;?>"  name="title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" cols="30" name="sdesc"><?php echo $sdesc;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description <span>*</span></label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" id="editor1" cols="30" rows="10"  name="desc"><?php echo $desc;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Slug<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $slug;?>" required name="slug">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $mtitle;?>" name="mtitle">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="mkey"><?php echo $mkey;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="mdesc"><?php echo $mdesc;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>