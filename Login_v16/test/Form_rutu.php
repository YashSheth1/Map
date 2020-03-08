<h2>Form</h2>

<form action="Rutu.php" method="post"  target="_blank">

<style>
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
 background-color: cyan;
  min-width: 160px;
  /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
/*.line-in-middle {
    width:400px;
    height:;
    background: linear-gradient(to right, 
                                transparent 0%, 
                                transparent calc(50% - 0.81px), 
                                black calc(50% - 0.8px), 
                                black calc(50% + 0.8px), 
                                transparent calc(50% + 0.81px), 
                                transparent 100%); 
  }*/

</style>
<form >
  <br><strong><em>Project name:</em></strong><br>
  <input type="text"  name="Pname" placeholder=>
  <br>

 	<br><strong><em>Project Type:</em></strong><br>
  <input type="text"  name="PTname" value="'<?php echo "Hi" ?>'">
  <br>
 <!-- <select name="cars" size="1">
    <option value="\'transmission\'" name="PTname">Transmission</option>
    <option value="mining" name="PTname">Mining</option>
    <option value="dam" name="PTname">Dam</option>
    <option value="other" name="PTname">Other</option>
  </select>
  <br><br>
 <br> -->
 
    
  <br><strong><em>Village name:</em></strong><br>
  <input type="text"  name="Vname">

  <br>
  
    <br><strong><em>Tehsil name:</em></strong><br>
  <input type="text"  name="Tname">
  <br>
   <br> <strong><em>District name:</em></strong><br>
  <input type="text"  name="Dname">
  <br>
   <br><strong><em> State name:</em></strong><br>
  <input type="text"  name="Sname">
  <br>
   <br><br>
  <input type="submit" value="Ok">
 
</form> 

<a href="http://localhost/test/ALLMap.php"  >
    <button>Final MAP</button>
</a> 
