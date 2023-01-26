<html>
<head>
    <title>SRSPDF - Convert Your PDF Files</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link href="https://fonts.googleapis.com/css?
        family=Dosis&display=swap" rel="stylesheet">
</head>
<body>
<div class="hero">
    <div class="navbar">
        <a href="index.html"> <img src="img/logo.png"></a>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="convert.php">Convert</a></li>
            <li><a href="about.html">About</a></li>
        </ul>
    </div>
        <form action = "" method = "POST" enctype = "multipart/form-data">
            <div class="drop-zone">
            <input type = "file" name = "pdfFile" value="SELECT PDF FILE" />
            </div>
            <input type = "submit" value="CONVERT" />
        </form>
        <?php
        if(isset($_FILES['pdfFile'])){
            //$errors= array();
            $file_name = $_FILES['pdfFile']['name'];
            $file_size = $_FILES['pdfFile']['size'];
            $file_tmp = $_FILES['pdfFile']['tmp_name'];
            $file_type = $_FILES['pdfFile']['type'];
            $result = explode('.',$_FILES['pdfFile']['name']);
            $file_ext=strtolower(end($result));
            $numOfError=0;

            $extensions= array("pdf");

            if(in_array($file_ext,$extensions)=== false){
                $errors[]= "Sorry, file extension is not allowed, please choose a PDF file.";
                $numOfError++;
            }

            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"uploadedFile/".$file_name);
                echo "<p class='echo-css'>Convert Sucessfully</p>";

                //take uploaded file from where
                $jarCommand = 'java -jar ReadTextV1.jar '.$_FILES['pdfFile']['name'];
                echo shell_exec($jarCommand);
                //Download file path
                $file_downloaded_name = basename($file_name,".pdf");
                $file_destination_path = "convertedFile/".$file_downloaded_name."_Converted.txt";
                }else{
                for($x=0; $x<$numOfError; $x++){
                    echo "<p class='error-css'>$errors[$x]</p>";
                    echo "<br>";
                }
            }
        }
        ?>

    <div>
        <a href="<?php echo $file_destination_path;?>" download>
            <input class = button id = download type ="button" value="         DOWNLOAD         ">
        </a>
    </div>

    <section class="advantage">
        <h1>Advantages of using SRS PDF</h1>
        <div class="row">

            <div class="advantage-col">
                <h3>Fast & Easy Conversions</h3>
                <p>You may convert PDF to Text in seconds with a simple drag-and-drop.<br>
                    To utilise our service, there is no file size limit or requirement to register.<br>
                </p>
            </div>

            <div class="advantage-col">
                <h3>Your Files Will Be Safe</h3>
                <p>We value your privacy above all<br>
                    You don't have to worry as all files will be deleted once you've done your conversion<br>
                </p>
            </div>

            <div class="advantage-col">
                <h3>We welcome all platforms</h3>
                <p>Our converter works on every computer<br>
                    It doesn't matter if you use windows or linux nor max everything works<br>
                </p>
            </div>

        </div>

        <div class="row">

            <div class="advantage-col">
                <h3>PDF To Text In The Best Quality</h3>
                <p>In all honesty converting PDF to text is hard<br>
                    But that doesn't stop us from making it become the best quality product for your usage<br>
                </p>
            </div>

            <div class="advantage-col">
                <h3>Convert PDF to Text within seconds</h3>
                <p>Its ridiculously on how fast our tool is<br>
                    Just use it once and you'll fall in love with it in seconds, it keeps you wanting to use it even more<br>
                </p>
            </div>

            <div class="advantage-col">
                <h3>Magical conversion in the cloud</h3>
                <p>We have a lot of servers whose job is nothing else besides conberting PDF to Text<br>
                    So lean back and relax as you have to do nothing but let them do all the work<br>
                </p>
            </div>

        </div>

    </section>

</body>
</html>
