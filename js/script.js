

/*$(document).ready(function(){
  $(".alpha").click(function(){
    //$(".alpha").show();
    //$(this).hide();
	var word=$("#word").text();
	var character=$(this).text();
	var inword=$("#inword").text();
	var index;
	document.write(word.length);
	for(var i=0;i<word.length;i++)
	 {
	  document.write(word[i]);
	  document.write(toLowerCase(character));
	  if(word[i]==character)
	   {
	    index=i;
		document.write(index);
	   }
	 }
	if(index>=0)
	 {
	  inword[index]=character;
	  $("#inword").text(inword);
	 }
	//$("#inword").text(word);
  });
});*/
var count=0;
var increment_value=(100/((document.getElementById("word").textContent.length)+10));

function keystroke(itself)
 {
  count=count+1;
  var inword=document.getElementById("word");
  //alert(itself.textContent);
  var inword_value=inword.textContent;
  var itself_value=itself.textContent;
  
  var outword=document.getElementById("inword");
  var outword_value=outword.textContent;
  
  var image=document.getElementById("image");
  
  //alert(outword_value);

  //alert(inword_value);
  //alert(itself_value);

  //var index=inword_value.indexOf(itself_value.toLowerCase());
  //var index;
  var character=itself_value.toLowerCase();
  var str1;
  var str3;
  //alert(index);
  var flag=0;
  var success;
  for(var index=0;index<inword_value.length;index++)
   {
    if(inword_value[index]==itself_value.toLowerCase() && outword_value[index*2]!=character)
	 {
	  index=index*2;
	//alert(index);
	//alert(outword_value[index]);
	str1=outword_value.substring(0,index);
	str3=outword_value.substring(index+1,outword_value.length);
	
	character=itself_value.toLowerCase();
	//outword_value[index]=character[0];
	//alert(outword_value);
    outword.textContent=str1.concat(character);
	outword.textContent=outword.textContent.concat(str3);
	if(outword.textContent.indexOf("_")==-1)
	  {
		success=1;
	  }
	 flag=1;
	 }
   }
   
    if(flag==0)
	 {
     if(count==inword_value.length+9)
	  {
	   document.getElementById("barr").style.width="100%";
	  }
	 else
      document.getElementById("barr").style.width=parseInt(document.getElementById("barr").style.width) + increment_value  + '%' ;
	 }
	  
   if(success==1)
    {
	    alert("Congratulations you won!");
	   	document.getElementById("chances").textContent=0;
	    document.getElementById("barr").style.width="0%";
		return 0;
	}
	
  if(count==inword_value.length+10)
   {
    alert("Sorry! You are done with your chances");
	document.getElementById("chances").textContent=0;
	document.getElementById("barr").style.width="0%"
   }
  else
   document.getElementById("chances").textContent=inword_value.length-count+10;
 
  //alert("hello");

 }