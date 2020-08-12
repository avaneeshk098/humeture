<html>
<head>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>  
<title>WIFI Controlled LED</title>
</head>
<style>
	.form-control{
			margin-top: 20px;
			font-color: rgba(0,0,0,0.6);
		}
</style>
       <body>
       <center><b><font size = '20'>Control LED:</b></center></font>  
         <form method="get">                 
                 <input type="submit" class="form-control" value="OFF" name="off">
                 <input type="submit" class="form-control" value="ON" name="on">
                 <input type="submit" class="form-control" value="BLINK" name="blink">
         </form>
         <center><b><font size = '20'><?php
			shell_exec("/usr/local/bin/gpio -g mode 27 out");
			if(isset($_GET['off']))
			{
				echo "LED is off";
				shell_exec("/usr/local/bin/gpio -g write 27 0");
			}
			else if(isset($_GET['on']))
			{
				echo "LED is on";
				shell_exec("/usr/local/bin/gpio -g write 27 1");
			}
			else if(isset($_GET['blink']))
			{
				echo "LED is blinking";
				for($x = 0;$x<=4;$x++)
				{
					shell_exec("/usr/local/bin/gpio -g write 17 1");
					sleep(1);
					shell_exec("/usr/local/bin/gpio -g write 17 0");
					sleep(1);
				}
			}
        ?></b></center></font>
   </body>
 </html>
