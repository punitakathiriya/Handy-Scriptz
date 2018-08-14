<br><br>
<form action="patient_chooser.php" method = "POST">
<input type="text" name="search" class="question" id="search" required autocomplete="new-password" placeholder="Search"/>
<label for="search"></label>
<input type="submit" value="Search">
</form>
<br><br>

<script>
$(document).ready(function(){
 
 $('#search').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"searcher.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>