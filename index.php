<?php include 'includes/header.php'; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Quick Description <br></strong> 1. purpose: not getting room of choice has been always issue in hostel booking so here I came with a solution.<br>
    2. Enter your current hostel detail and details of hostel you want to exchange.<br>
    3. Someone who is interested would contact you soon!<br>
    4. Yes!! its that simple.
</div>
</body>
</html>
<?php
	//Create DB Object
	$db = new Database();
	
	//Create Query
	$query = "SELECT * FROM posts ORDER BY id DESC";
	//Run Query
	$posts = $db->select($query);
	
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>
<?php if($posts) : ?>
	<?php while($row = $posts->fetch_assoc()) : ?>
		<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
				<?php echo shortenText($row['body']); ?>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
	<?php endwhile; ?>	  
       
<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>		  
<?php include 'includes/footer.php'; ?>
