<?php
include  'include/config.php';
if(!empty($_POST["id"])) 
{
$category=$_POST["train_id"];
$sql=$dbh->prepare("SELECT * FROM tbladdtrainer WHERE train_id=:id");
$sql->execute(array(':train_id' => $category));   
?>
<option value="">Select trainer</option>
<?php
while($row =$sql->fetch())
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["tran_name"]; ?></option>
<?php
}
}
?>