<?php include 'includes/header.php'; ?>
<?php
	//Create DB Object
	$db = new Database();
	
	if(isset($_POST['submit'])){
		//Assign Vars
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
		//Simple Validation
		if($title == '' || $body == '' || $category == '' || $author == ''){
			//Set Error
			$error = 'Please fill out all required fields';
		} else {
			$query = "INSERT INTO posts
					  (title, body, category, author, tags) 
				VALUES('$title', '$body', $category, '$author', '$tags')";
			
			$insert_row = $db->insert($query);
		}
	}
?>
<?php
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>
<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter your current hostel and room no.">
  </div>
  <div class="form-group">
    <label>Describe a little</label>
    <textarea name="body" class="form-control" placeholder="Describe where you want hostel e.g I want exchange room in wing 5 on first floor"></textarea>
  </div>
  <div class="form-group">
      <label>Your current Hostel's (click <a href="http://localhost:63342/blog%20with%20fun/admin/add_category.php">here</a> to add hostel name in case its not listed below)</label>
    <select name="category" class="form-control">
		<?php while($row = $categories->fetch_assoc()) : ?>
			<?php if($row['id'] == $post['category']){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			?>	
			<option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		<?php endwhile; ?>
	</select>
  </div>
  <div class="form-group">
    <label>Your Contact info (email, contact no. etc)</label>
    <input name="author" type="text" class="form-control" placeholder="Enter contact details">
  </div>
  <div class="form-group">
    <label>Tags (not mandatory)</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" id="submit-successfully" />

	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>