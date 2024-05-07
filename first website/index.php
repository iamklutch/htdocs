<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Hello world! This was written with PHP";
    ?>
    <?php if (true) { ?>
        <p> HTML text and stuff insisde PHP </p>
    <?php } ?>
    <?php 
        // above is the recommended way to do html inside php
        /*
            and thid is the way to do multi-line comments
            in PHP
        */
        $name = "James Higgy";
        echo $name;
        // scalar type variables (one type)
        // var types: string, float, int, boolean

        // Array type
        $var = array("John", "robert", "Ted"); // old style
        $var2 = ["Daniel", "Jimmy", "higgs"] ; // v5.4 or higher

        //object type
        // $obvar = new Car();

        /* . is the concatinate symbol
            $a = "hello"
            $b = "world"
            $c = $a . " " . $b

            prints 'hello world'

            == is the comparison
            === compares var type too (bool, string, int, float, etc)
        */
    ?>
    <p> Hello, my name is <?php echo $name; ?> and I am learning PHP </p>

    <p> Super global (predefined) variables:<br>
        They start with an underscore and followed by all caps like: $_SERVER.
    </p>
    <p> example with $_SERVER["DOCUMENT_ROOT"]:</p>
    <?php echo $_SERVER["DOCUMENT_ROOT"]; ?>
    <p> example with $_SERVER["PHP_SELF"]:</p>
    <?php echo $_SERVER["PHP_SELF"]; ?>
    <p> $_FILES["name"] superglobal:<br>
        Gets meta data about an uploaded file, name, size, type etc.<br>
        $_COOKIE["name"]<br>
        $_SESSION["name"]<br>
        Gets session and cookie info.  can be set $_SESSION["username"] = "Buddy Holly"
        <br>
        <br>
        If you have a php doc that is pulled from an HTML page like form action="includes/formhandler.php" method="post"<br>
        Then you should check it initially in the php doc by using an if statement<br>
        "if ($_SERVER["REQUEST_METHOD"] == "POST") <br>
        and include your php code in the if statement<br>
        <br>
        <br>
        set variables from html page by:<br>
        $<i>phpvarname</i> = htmlspecialchars($_POST["<i>variablename</i>"])
        <br>
        htmlspecialchars() is for security, it helps stop code injection
        <br>
        to return the user back to the page they came from or another page:<br>
        header("Location: <i>directory</i>") i.e. <i> ../index.php </i>


    
    </p>
</body>
</html>