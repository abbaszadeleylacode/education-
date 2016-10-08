<?php

$id = $_GET['value'];
include 'db_config.php';
$sql = "CALL `ders_cedveli`($id)";
$query=mysqli_query($db_connection,$sql);


while ($row = mysqli_fetch_assoc($query)) {?>
<label class="">
<input type="checkbox" name="ders[]" value="<?=$row['id']?>" class="checkbox-inline">
<?=$row['name']." ".$row['ders_qiymeti']."Azn".' ';?>
</label>

<?php };

?>