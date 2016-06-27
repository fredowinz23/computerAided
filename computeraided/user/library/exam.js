// JavaScript Document
function viewProduct()
{
	with (window.document.frmListProduct) {
		if (cboCategory.selectedIndex == 0) {
			window.location.href = 'index.php';
		} else {
			window.location.href = 'index.php?catId=' + cboCategory.options[cboCategory.selectedIndex].value;
		}
	}
}

function checkAddClassForm()
{
	with (window.document.frmAddClass) {
		if (isEmpty(txtName, 'Enter Item name')) {
			return;
		} else if (isEmpty(txtSubject, 'Enter Subject')) {
			return;
		} else  if (isEmpty(txtSchedule, 'Enter Schedule')) {
			return;
		} else  if (isEmpty(txtTime, 'Enter Time')) {
			return;
		} else {
			submit();
		}
	}
}

function addClass()
{
	window.location.href = 'index.php?view=add';
}

function modifyProduct(productId)
{
	window.location.href = 'index.php?view=modify&productId=' + productId;
}

function deleteClass(productId)
{
	if (confirm('Delete this Class?')) {
		window.location.href = 'processClass.php?action=deleteClass&productId=' + productId;
	}
}

function deleteImage(productId)
{
	if (confirm('Delete this image')) {
		window.location.href = 'processEquipment.php?action=deleteImage&productId=' + productId;
	}
}