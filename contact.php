<?php
class Contact
{
    private $server;
    private $username;
    private $password;
    private $databaseName;
    
    private $dbConnection;
    
    public function __construct()
    {
        $this->databaseName = "localhost";
        $this->password = "root";
        $this->server = "localhost";
        $this->username = "root";
        
        $this->dbConnection = new mysqli($this->server,
            $this->username,
            $this->password,
            $this->localhost);
        
        if ($this->dbConnection->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->dbConnection->connect_error;
           }
    }
    
    public function add()
    {
$fName = $_POST['FirstName'];
$lName = $_POST['LastName'];
$Email = $_POST['Email'];
$comments = $_POST['Comments'];

$sql = "INSERT into `contact` (`FirstName`, `LastName`, `Email`, `Comment`) VALUES (?, ?, ?, ?)";

$preparedStatement = null;
if(!$preparedStatement = $this->dbConnection->prepare($sql)) {
    print($preparedStatement->error);
}


if(!$preparedStatement->bind_param("ssis", $fName, $lName, $Email, $comments)) {
    print($preparedStatement->error);
}

// Execute the bound and prepared statement
if(!$preparedStatement->execute()) {
    print($preparedStatement->error);
}

    }
}

$student = new Contact();
$student->add();



?>

<!doctype html>
<html>
<head>
<title>Advanced Development</title>
<link href='style.css'  rel='stylesheet' />

</head>
<body class='home'>


<header>
<nav>

<a href='index.html' id='logo'>
The Best Sushi in Town<br />
Amarillo Tx</a>



<ul>
<li class='design-link'><a href='index.html'>Home</a>
	
</li>
<li class='navigation-link'><a href='menu.html'>Menu</a>

	

</li>
<li class='layout-link'><a href='drinks.html'>Drinks</a>
	
</li>
<li class='tables-link'><a href='contact.html'>Contact</a>
	
</li>

</ul>

<br class='clear' />


</nav>

<div class='inner'>

<section id='design' class="bottom">
<h3 id="3">Contact</h3>

<div class='section-overview'>



<div class="container">
  <form action="action_page.php" method="post">

    <label for="fname">First Name</label>
    <input type="text" id="fName" name="FirstName" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lName" name="LastName" placeholder="Your last name..">
    
    <label for="email">Last Name</label>
    <input type="text" id="email" name="Email" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="comment">Subject</label>
    <textarea id="comment" name="Comment" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
<br class='clear' />


    </div>
    </section>
    </div>
    </header>

</body>
</html>
