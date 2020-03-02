
//Increment
<li><input type="button" value="Clear" onclick="clear_customer_data()" /></li>
<li><input type="button" value="Clr" onclick="customer_data(event)" /></li>

<input type="text" id="te" name="">  

<script  type="text/javascript">
	var v=1;
    function customer_data(event){
    	v=v+1;
    document.getElementById('te').value = v+"\n";//document.getElementById('te').value += v+"\n"; 2,3,4,5... sob dekabe
  }
     function clear_customer_data(){
    document.getElementById('te').value="";
  };
</script>


//clear
<li><input type="button" value="Clear" onclick="clear_customer_data()" /></li>
<li><input type="button" value="Clr" onclick="customer_data(event)" /></li>

<div type="text" id="te" name="">dsd</div>  

<script  type="text/javascript">
	var v=1;
    function customer_data(event){
    	v=v+1;
    document.getElementById('te').innerHTML = v+"\n";
  }
     function clear_customer_data(){
    document.getElementById('te').innerHTML="";
  };
</script>