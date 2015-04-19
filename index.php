<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("header.php");


?>
    <div class="row-fluid text-center" >
        <br />
        <h4> Lets Play!</h4>
        <form action="index.php" method="post" name="facultyLogin">
            <table align=center >
                <tr>
                    <td>
                        <select class="select" name=cat >
                            <option value=-1 >--Select Category--</option>

                            <?php
                                $select = mysqli_query($con, "select * from categories");
                                while($row=mysqli_fetch_array($select))
                                    {
                                        echo '<option value='.$row[category].'>'.$row[category].'</option>';
                                    }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit"  class="btn btn-primary" name="submit" value="Go" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php
    if(isset($_POST[refresh]))
        {
            $query="update ".$_SESSION[cat]. " set done='1' where value='".$_SESSION[random]."'";
            mysqli_query($con, $query);
            unset($_SESSION[cat]);
            unset($_SESSION[random]);
        }


    if(isset($_POST['submit']) || isset($_SESSION['cat']))
        {
            if($_POST[cat]!=-1)
                {
                    if(!isset($_SESSION['cat']))
                        $_SESSION['cat']=$_POST['cat'];
 
 
                        $query = "select * from ".$_SESSION[cat]." where done='0' ";
                        $select = mysqli_query($con, $query);

                        while($row=mysqli_fetch_array($select))
                            {
                                $random[] = $row[value];
                            }

                        $rand_word=array_rand($random,2);

                        echo '<h2>'.$_SESSION[cat].'</h2>';

                        $rand_word=$random[$rand_word[0]];
                        $_SESSION[random]=$rand_word;

                        echo '<div style="display:none;" id=word name=wrd >'.$_SESSION[random].'</div>';
?>

                        <div class="span8" >
                            <div id="keypad" >
                                <div onclick="keystroke(this);" class="alpha" >A</div>
                                <div onclick="keystroke(this);" class="alpha" >B</div>
                                <div onclick="keystroke(this);" class="alpha" >C</div>
                                <div onclick="keystroke(this);" class="alpha" >E</div>
                                <div onclick="keystroke(this);" class="alpha" >E</div>
                                <div onclick="keystroke(this);" class="alpha" >F</div>
                                <div onclick="keystroke(this);" class="alpha" >G</div>
                                <div onclick="keystroke(this);" class="alpha" >H</div>
                                <div onclick="keystroke(this);" class="alpha" >I</div>


                                <div onclick="keystroke(this);" class="alpha" >J</div>
                                <div onclick="keystroke(this);" class="alpha" >K</div>
                                <div onclick="keystroke(this);" class="alpha" >L</div>
                                <div onclick="keystroke(this);" class="alpha" >M</div>
                                <div onclick="keystroke(this);" class="alpha" >N</div>
                                <div onclick="keystroke(this);" class="alpha" >O</div>
                                <div onclick="keystroke(this);" class="alpha" >P</div>
                                <div onclick="keystroke(this);" class="alpha" >Q</div>
                                <div onclick="keystroke(this);" class="alpha" >R</div>


                                <div onclick="keystroke(this);" class="alpha" >S</div>
                                <div onclick="keystroke(this);" class="alpha" >T</div>
                                <div onclick="keystroke(this);" class="alpha" >U</div>
                                <div onclick="keystroke(this);" class="alpha" >V</div>
                                <div onclick="keystroke(this);" class="alpha" >W</div>
                                <div onclick="keystroke(this);" class="alpha" >X</div>
                                <div onclick="keystroke(this);" class="alpha" >Y</div>
                                <div onclick="keystroke(this);" class="alpha" >Z</div>
                            </div>

                        </div>

                        <div class="span4">
                            <form action="index.php" method="get" name="outword" >
                               <div id="inword" >

<?php
                        $len=strlen($rand_word);

                        for($i=0;$i<$len;$i++)
                            {
                                echo '_&nbsp;';
                            }
?>

                                </div>
                            </form>
                            <br />

                            <div class="progress progress-striped active">
                                <div class="bar bar-danger" style="width: 0%;" id="barr" >
                                </div>
                            </div>

                            <font size=5>
                                # chances left: 
                                <span id="chances" >
                                    <?php echo strlen($rand_word)+10; ?>
                                </span>
                            </font>

                            <br /><br />

                            <center>
                                <form action="index.php" method="post" >
                                    <input type="submit" class="btn btn-primary btn-large" value="Refresh" name="refresh" />
                                </form>
                            </center>
                        </div>

<?php
                }
            else
                {
                    echo '<div class=text-center ><h3 class=text-error>Please select a category!</h3></div>';
                }
        }
    
    require_once("footer.php");
?>
