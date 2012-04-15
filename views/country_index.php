<?php include('header.php'); ?>
<script>
function deletechecked(id)
{
    var answer = confirm("Do you really want to delete this?")
    if (answer){
        window.location.href="country/delete/"+id;
    }
    return false;  
} 

</script>
<h2><span><a href=<?php echo '"'.base_url().'"'?>>index</a> &gt; </span>Countries</h2>
<?php
if($this->session->flashdata('message') !=''){
	echo "<p class='msg'>". $this->session->flashdata('message')."</p>";
}
?>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
	<th>Country name</th>
	<th>Country code</th>
	<th>Currency</th>
	<th>Currency code</th>
	<th>Actions</th>
</tr>
<tr>
<?php
foreach ($country_list as $iter_country){
	echo '<tr>';
	echo '<td>'.$iter_country->name."</td>";
	echo '<td>'.$iter_country->country_code."</td>";
	echo '<td>'.$iter_country->currency."</td>";
	echo '<td>'.$iter_country->currency_code."</td>";
	echo "<td><a href='".base_url()."index.php/country/edit/".$iter_country->id."'>Edit</a> | <a href='' onclick='return deletechecked(".$iter_country->id.");'>Delete</a>";
	echo '</tr>';
}

?>
</table>

<p><a href=<?php echo '"'.base_url().'index.php/country/add_form"' ?>>Add a new country </a></p>

<?php include("footer.php"); ?>