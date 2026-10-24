<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function fullname()
        {
            var x=new XMLHttpRequest()
            x.open('GET','test2.php?nom=khalil&prenom=bilal',true)
            x.onreadystatechange=function()
            {
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById('test').innerHTML=this.responseText
                }
            }
            x.send()
            }
       
    </script> 

    <div id="test">
        <p>test</p>
    </div>
    <button type="submit"  onclick="fullname()">test</button>
</body>
</html>