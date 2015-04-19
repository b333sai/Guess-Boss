<?php
  error_reporting(E_ALL ^ E_NOTICE);
  require_once("header.php");
?>

<?php

/*$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,5);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];
echo $a[$random_keys[3]];
echo $a[$random_keys[4]];
echo $a[$random_keys[5]];*/

//echo(mt_rand(10,100));
//echo(rand(10,100));

echo '<div class="row-fluid text-center" >
<br />
<h4> Lets Play!</h4>
<form action="index.php" method="post" name="facultyLogin">
<table align=center >
<tr>
<td><select class="select" name=cat ><option value=-1 >--select stream--</option>';
$select = mysqli_query($con, "select * from categories");
while($row=mysqli_fetch_array($select))
 {
  echo '<option value='.$row[category].'>'.$row[category].'</option>';
 }
echo '</select></td>
</tr>


<tr><td><input type="submit"  class="btn btn-primary" name="submit" value="Go" /></td></tr>
</table>

</form>



</div>';

if(isset($_POST[refresh]))
 {
  //echo $_SESSION[cat];
  //echo $_SESSION[random];
  $query="update ".$_SESSION[cat]. " set done='1' where value='".$_SESSION[random]."'";
  //echo $query;
  mysqli_query($con, $query);
  unset($_SESSION[cat]);
  unset($_SESSION[random]);
  //echo '<meta http-equiv="refresh" content="0;index.php" >';
 }


if(isset($_POST['submit']) || isset($_SESSION['cat']))
{
 if($_POST[cat]!=-1)
 {
 if(!isset($_SESSION['cat']))
  $_SESSION['cat']=$_POST['cat'];
 
 
 $query="select * from ".$_SESSION[cat]." where done='0' ";
 $select=mysqli_query($con, $query);
 while($row=mysqli_fetch_array($select))
  {
   $random[]=$row[value];
   //echo '<br />'.$row[value];
  }
 $rand_word=array_rand($random,2);
 foreach($random as $key => $value)
  {
   //echo "<br />".$value;
  }
// echo "<br />Random word:".$random[$rand_word[0]];
echo '<h2>'.$_SESSION[cat].'</h2>';
 $rand_word=$random[$rand_word[0]];
 $_SESSION[random]=$rand_word;
 echo '<div style="display:none;" id=word name=wrd >'.$_SESSION[random].'</div>';
 echo '<div class="span6" >
        <table class=keys border=0 ><tr><td  onclick="keystroke(this);" class=alpha >A</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >B</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >C</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >D</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >E</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >F</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >G</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >H</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >I</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >J</td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td  onclick="keystroke(this);" class=alpha >K</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >L</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >M</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >N</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >O</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >P</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >Q</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >R</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >S</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >T</td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td colspan=55 ></td></tr>
		<tr><td class=alpha onclick="keystroke(this);" >U</td><td></td><td></td><td></td><td></td><td></td>
		<td class=alpha  onclick="keystroke(this);">V</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >W</td><td></td><td></td><td></td><td></td><td></td><td onclick="keystroke(this);"  class=alpha >X</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >Y</td><td></td><td></td><td></td><td></td><td></td><td  onclick="keystroke(this);" class=alpha >Z</td></tr>
		
		</table></div>';
 echo '<div class="span4 offset2"><form action=index.php method=get name=outword >
 <div id=inword >';
 $len=strlen($rand_word);
 for($i=0;$i<$len;$i++)
  {
   echo '_&nbsp;';
  }
 echo '</div></form>';
 echo '<br /><div class="progress progress-striped active">
  <div class="bar bar-danger" style="width: 0%;" id=barr ></div>
</div>';
 echo '<font size=5> # chances left: <span id=chances >'.(strlen($rand_word)+10).'</span></font>';
 echo '<br /><br /><center><form action=index.php method=post ><input type=submit class="btn btn-primary btn-large" value=Refresh name=refresh /></form></center></div>';
 }
 else
  {
   echo '<div class=text-center ><h3 class=text-error>Please select a category!</h3></div>';
  }
}






?>
<?php
  require("footer.php");
?>
