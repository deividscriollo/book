<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>selected demo</title>
  <style>
  div {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('#paises > option[value="3"]').attr('selected', 'selected');
});
</script>
</head>
<body>
 
<form method="post">
    <label>Paises: </label>
    <select name="paises" id="paises">
        <option value="1">Alemania</option>
        <option value="2">Francia</option>
        <option value="3">España</option>
        <option value="4">Inglaterra</option>
        <option value="5">Portugal</option>
        <option value="6">Italia</option>
    </select>
</form>
 
 
</body>
</html>