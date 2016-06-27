<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_name, c_schedule, c_subject
        FROM tbl_quiz where c_teacher ='$session' and c_status =1
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


?> 
<div class="table">
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th>Exam Name</td>
   <th>Exam Subject</td>
   <th>Exam Schedule</td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><a href="<?php echo WEB_ROOT;?>user/quizitem/index.php?view=intro&class=<?php echo $c_id; ?>&name=<?php echo $c_name; ?>"><?php echo $c_name; ?></a></td>
   <td><a href="<?php echo WEB_ROOT;?>user/quizitem/index.php?view=intro&class=<?php echo $c_id; ?>&name=<?php echo $c_name; ?>"><?php echo $c_subject; ?></a></td>
   <td><a href="<?php echo WEB_ROOT;?>user/quizitem/index.php?view=intro&class=<?php echo $c_id; ?>&name=<?php echo $c_name; ?>"><?php echo $c_schedule; ?></a></td>
  </tr>
  <?php
	} // end while
?>
  <tr> 
   <td colspan="5" align="center">
 

   <?php 
echo $pagingLink;
   ?>
   
   </td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Exams Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>

