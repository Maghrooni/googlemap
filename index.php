<html>
    <head>
        <title>
            Enter Root Coordinate
        </title>
        <script>
    function validate()
    {
      
        retval=true;
        obj1=document.getElementById("x");
        obj2=document.getElementById("y");
        
        va1=obj1.value;
        va2=obj2.value;
        
       

       
        if(va1==""||va2=="")
            {
                alert("please enter the coordinates");
                retval=false;
             
            }
            
                return retval;
    }
   function characterFilter()
			{
				try
				{
					ob1=document.getElementById("x");
					ob2=document.getElementById("x_msg");
					v1=ob1.value;
					foundnum=false;
					i=0;
					for(i=0;i<v1.length;i++)
					{
						if(v1.charAt(i)>='A' && v1.charAt(i)<='Z'||v1.charAt(i)>='a' && v1.charAt(i)<='z')
						{
							foundnum=true;
							break;
						}

					}
					if(foundnum==true)
					{
						ob2.innerHTML="Character Value Not Allowed";
						newval="";
						for(j=0;j<i;j++)
						{
							newval+=v1.charAt(j);
						}
						ob1.value=newval;
					}
					else
					{
						ob2.innerHTML="";
						
					}
				}catch(ex)
				{
 					ob1.innerHTML="<br/>Error "+ex;
				}		
				return true;
			}
  function characterFilter2()
			{
				try
				{
					ob1=document.getElementById("y");
					ob2=document.getElementById("y_msg");
					v1=ob1.value;
					foundnum=false;
					i=0;
					for(i=0;i<v1.length;i++)
					{
						if(v1.charAt(i)>='A' && v1.charAt(i)<='Z'||v1.charAt(i)>='a' && v1.charAt(i)<='z')
						{
							foundnum=true;
							break;
						}

					}
					if(foundnum==true)
					{
						ob2.innerHTML="Character Value Not Allowed";
						newval="";
						for(j=0;j<i;j++)
						{
							newval+=v1.charAt(j);
						}
						ob1.value=newval;
					}
					else
					{
						ob2.innerHTML="";
						
					}
				}catch(ex)
				{
 					ob1.innerHTML="<br/>Error "+ex;
				}		
				return true;
			}
    </script>
    </head>
    <body>
        <form method="post" action="calculate_three_nearest_coordinates.php" onsubmit="return(validate());">
            <h3>Enter x-coordinate : </h3>
            <input type="text" name="x" id="x" onKeyUp="characterFilter();" /><span id="x_msg" style="color:red"></span><br>
            <br/>
            <h3>Enter y-coordinate : </h3>
            <input type="text" name="y" id="y" onKeyUp="characterFilter2();" /><span id="y_msg" style="color:red"></span><br>
            <br/>
            <input type="submit" value="submit"/>
            
        </form>
   </body>
</html>
