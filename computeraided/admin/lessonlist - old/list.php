<?php
if (!defined('WEB_ROOT')) {
	exit;
}
// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_name, c_classid
        FROM tbl_lesson where c_teacher ='$session' and c_classid='$classname'
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


?> 
<div class="table">
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th>Lesson Title</td>
   <th width="70">Modify</td>
   <th width="70">Delete</td>
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
   <td><a href="<?php echo WEB_ROOT;?>admin/lessonlist/index.php?view=detail&classname=<?php echo $c_id; ?>"><?php echo $c_name; ?></a></td>
   
   <td><a href="<?php echo WEB_ROOT;?>admin/lessonlist/index.php?view=modify&class=<?php echo $c_id; ?>&classname=<?php echo $classname; ?>">Modify</a></td>
   <td width="70" align="center"><a href="javascript:deleteClass(<?php echo $c_id; ?>,<?php echo $classname; ?>);" class="ico del">Delete</a></td>
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
   <td colspan="5" align="center">No Lessons Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" class="add-button" onClick="addClass(<?php echo $classname;?>)"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
