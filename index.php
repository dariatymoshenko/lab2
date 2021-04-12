<header>
<style>
.block
{
    border: 4px double black;
    width: 300px;
    height: 120px;
    padding: 15px;
    margin:5px;
    text-align:center ;
    
     float: left;
}

.infoblock{
  display: inline-block;
  border: 4px  double black;
}

</style>
</header>

<div class="block">
<form action = "get.php" method="POST">
<b>полученный доход с проката по состоянию на выбранную дату </b><p>


<input type="date" name=specifieddate value=2019-11-07 ><br>
<input type="Submit" name=button1 value=" Sumbit "><p>
</form>
</div>

<div class="block">

<form action = "get.php" method="POST">
<b>автомобили с пробегом меньше указанного</b><p>
<input type="number" name="distance" min="0" >
<input type="Submit" name=button2 value=" Sumbit "><p>
</form>
</div>


<div class="block">
<form action = "get.php" method="POST">
<b>имеющиеся в данном пункте марки автомобиля </b></p>

<br>
<input type="Submit" name=button3 value=" Sumbit "><p>

</form>
</div>



<div class="infoblock" >
<script>

document.write(localStorage.getItem("savedText"));

</script>
<div>

