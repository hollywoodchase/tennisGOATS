<?php
$message = "";

if (isset($_POST['submitbtn'])) {
  $DBConnect = mysqli_connect("127.0.0.1", "hollywoodchase", "bigNsmall517!", "dcalise3");

  if ($DBConnect == false) {
    print("Unable to connect tp the database: " . mysqli_errno());
  } else {
    $TableName = "Users";
    $message = "Success! Your profile has been saved.<br>You entered: ";

    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $age = stripslashes($_POST['age']);
    $favoriteplayer = stripslashes($_POST['favoriteplayer']);
    $favoritetournament = stripslashes($_POST['favoritetournament']);
    $favoritetennisbrand = stripslashes($_POST['favoritetennisbrand']);

    $SQLString = "insert into $TableName(firstname, lastname, age, favoriteplayer, favoritetournament, favoritetennisbrand) 
    values('$firstname', '$lastname', '$age', '$favoriteplayer', '$favoritetournament', '$favoritetennisbrand')";

    mysqli_query($DBConnect, $SQLString);

    mysqli_close($DBConnect);
  }

}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Tennis GOATs</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    let winnerNationalityArr = [];

    function btn1Click(id) {
      document.getElementById("serve-row").style.display = "flex";

      var dataFeedback = $("#feedback_popup_message_body").val();
      var jsonObj = JSON.stringify({ dataFeedback: dataFeedback });
      $.ajax({
        url: "getGoat.php",
        type: 'POST',
        data: { dataFeedback: dataFeedback },
        success: function (data) {
          let d1 = data.split(",");
          console.log(d1);
          const counts = {};

          for (const num of d1) {
            counts[num] = counts[num] ? counts[num] + 1 : 1;
          }
          let highestFrequency = "";
          let highestCount = 0;
          let goatPlural = false;
          for (const property in counts) {
            if (counts[property] > highestCount) {
              highestFrequency = property
              highestCount = counts[property]
            } else if (counts[property] === highestCount) {
              highestFrequency += " & " + property;
              goatPlural = true;
            }
          }
          document.getElementById("ball-text").innerHTML = goatPlural ? highestFrequency + " are the nationalities with the most Grand Slam titles!": " is the nationality with the most Grand Slam titles!";
        }

      });

    }
    function btn2Click() {

    }
    function btn3Click() {

    }
    function btn4Click() {

    }
    function btn5Click() {

    }
    function btn6Click() {

    }
    function btn7Click() {

    }
    function btn8Click() {

    }
    function btn9Click() {

    }
    function btn10Click() {

    }
    function btn11Click() {

    }
    function btn12Click() {

    }
  </script>
</head>

<body>
  <!-- Navigation -->

  <div id="nav">
    <img onclick="window.location.href=''" src="images/tennisgoatslogo.png" alt="tennis-goats-logo" />
    <a  onclick="window.location.href='#form-card'">Create Profile</a>
  </div>
  <div class="body-cards">
    <div class="intro-card">
      <h2>Find out who is the GOAT!</h2>
      <h4>Click on a button below to activate a statistic</h4>
      <button onclick="window.location.href='#buttons-card'">VIEW ALL BUTTONS</button>
    </div>
    <div class="server-card">
      <h1>The GOATs</h1>
      <h3>Click a button to serve your query to the database <br> and smash the result to the service box!</h3>
      <div id="serve-row">
        <img class="server-img" src="images/serve.gif" alt="server" />
        <div class="court-and-ball">
          <img class="court-img" src="images/court.png" alt="court" />
          <img class="ball-img" src="images/ball.png" alt="ball" />
          <div id="ball-text"></div>

        </div>
      </div>
    </div>
    <div id="buttons-card">
      <div class="btn-row btn-row1">
        <button class="goat-btn" name="btn1" onclick="btn1Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Country GOAT</h2>
            <p>Which is the greatest country of all time?</p>
          </div>
        </button>
          <button class="goat-btn" onclick="btn2Click()">
            <div class="btn-text">
              <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
              <h2>Handed GOAT</h2>
              <p>Right handed vs left handed for Greatest of All Time</p>
            </div>
          </button>
          <button class="goat-btn" onclick="btn3Click()">
            <div class="btn-text">
              <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
              <h2>Ranking GOAT</h2>
              <p>Which ranking is the Greatest of all Time</p>
            </div>
          </button>
          <button class="goat-btn" onclick="btn4Click()">
            <div class="btn-text">
              <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
              <h2>Runner Up GOAT</h2>
              <p>Which is the GOATS of the runners up?</p>
            </div>
          </button>
      </div>
      <div class="btn-row btn-row2">
        <button class="goat-btn" onclick="btn5Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Surface GOAT</h2>
            <p>Which players are Greatest of All Time on each of the surfaces?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn6Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Winnings GOAT</h2>
            <p>Which players have the Greatest winnings of All Time?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn7Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Grand Slam GOATs</h2>
            <p>Which players are the Greatest of all Time at each of the Grand Slams?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn8Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Decade GOATs</h2>
            <p>Which players are the Greatest of all Time for each decade?</p>
          </div>
        </button>
      </div>
      <div class="btn-row btn-row3">
        <button class="goat-btn" onclick="btn9Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Rivalry GOATs</h2>
            <p>Which players have the Greatest rivalries of All Time?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn10Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Top 10 GOAT</h2>
            <p>Which player is the Greatest of All Time against Top 10 players?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn11Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Country GOAT</h2>
            <p>Which is the greatest country of all time?</p>
          </div>
        </button>
        <button class="goat-btn" onclick="btn12Click()">
          <div class="btn-text">
            <img class="ball-btn-img" src="images/ball-btn.jpeg" alt="ball-btn" />
            <h2>Overall GOAT</h2>
            <p>Which player is the overall Greatest of all Time?</p>
          </div>
        </button>
      </div>
    </div>
    <div id="form-card">
      <div class="form-header">
        <h2>Create a Profile</h2>
      </div>
      <div class="form-inputs">
        <form action="" method="post">
          <?php
          if (isset($_POST['submitbtn'])) {
            echo $message;
            echo "<br>$firstname";
            echo "<br>$lastname";
            echo "<br>$age";
            echo "<br>$favoriteplayer";
            echo "<br>$favoritetournament";
            echo "<br>$favoritetennisbrand";
          }
          ?>
          <div class="form-columns">
            <div class="left-column col-md-5">
              <fieldset class="field">
                <label class="field-label">First Name:</label>
                <input id="firstname" name="firstname" placeholder="First" />
              </fieldset>
              <fieldset class="field">
                <label class="field-label">Age:</label>
                <input id="age" name="age" placeholder="Age" />
              </fieldset>
              <fieldset class="field">
                <label class="field-label">Favorite Tournament:</label>
                <input id="favoritetournament" name="favoritetournament" placeholder="Favorite Tournament" />
              </fieldset>
            </div>
            <div class="right-column col-md-5">
              <fieldset class="field">
                <label class="field-label">Last Name:</label>
                <input id="lastname" name="lastname" placeholder="last" />
              </fieldset>
              <fieldset class="field">
                <label class="field-label">Favorite Player:</label>
                <input id="favoriteplayer" name="favoriteplayer" placeholder="Favorite Player" />
              </fieldset>
              <fieldset class="field">
                <label class="field-label">Favorite Tennis Brand:</label>
                <input id="favoritetennisbrand" name="favoritetennisbrand" placeholder="Favorte Tennis Brand" />
              </fieldset>
            </div>
          </div>
          <div class="btn-wrapper">
            <input class="submit" type="submit" value="Submit" name="submitbtn">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>


</html>