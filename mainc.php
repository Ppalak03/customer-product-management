<html>
<head>
<style>
.styled-select {
  color: white;
  background-color:#602040;
  border: 1px solid #000;
  padding: 5px;
  font-size: 16px;
  border-radius: 4px; /* optional: rounded corners */
}
.styled-select option {
  color: white;
  background-color: #4d1933;
}
</style>
</head>
<body>
<select id="actionDropdown" onchange="submitForm(this.value)" class="styled-select">
  <option value="">-- Edit --</option>
  <option value="insertc">Insert into customer table</option>
  <option value="insertp">Insert into product table</option>
  <option value="updatec">Update customer table</option>
  <option value="updatep">Update product table</option>
  <option value="selectc">Display customer and product tables</option>
  <option value="wherec">Display a specific record</option>
  <option value="deletec">Delete from customer and product tables</option>
  <option value="transction">Generate Bill</option>
</select>


<form id="insertc" action="insertc.php" method="post">
  <input type="submit" name="customer" value="Insert records into customer table" hidden>
</form>

<form id="insertp" action="insertp.php" method="post">
  <input type="submit" name="product" value="Insert records into product table" hidden>
</form>

<form id="updatec" action="updatec.php" method="post">
  <input type="submit" name="submit" value="Update records of customer table" hidden>
</form>

<form id="updatep" action="updatep.php" method="post">
  <input type="submit" name="submit" value="Update records of product table" hidden>
</form>

<form id="selectc" action="selectc.php" method="post">
  <input type="submit" name="display" value="Display records customer and product table" hidden>
</form>

<form id="wherec" action="wherec.php" method="post">
  <input type="submit" name="cid" value="Display a specific record" hidden>
</form>

<form id="deletec" action="deletec.php" method="post">
  <input type="submit" name="delete" value="Delete records from customer and product table" hidden>
</form>

<form id="transction" action="transction.php" method="post">
  <input type="submit" name="submit" value="Generate Bill" hidden>
</form>


<script>
function submitForm(formId) 
{
  if (formId) 
{
    const form = document.getElementById(formId);
    const submitButton = form.querySelector('input[type="submit"]');
    if (submitButton) 
{
      submitButton.click(); 
    } 
else 
{
      form.submit();
    }
  }
}
</script>

</body>
</html>
