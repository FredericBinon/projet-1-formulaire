<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Technical Support</title>
    <link rel="stylesheet" href="./style.css" type="text/css" />
  </head>
  <body>
    <?php

    $lastnameError = $nameError = $genderError = $emailError = $messageError = "";
    $lastname = $name = $gender = $email = $message = $country = $subject = "";

    $lastname=$_POST['lastname'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    $to = "binon.fredo@gmail.com";
    $subject = $_POST["subject"];
    $message = "Nom: ".$_POST["name"]."\r\n";
    $message .= "Prénom: ".$_POST["lastname"]."\r\n";
    $message .= "Pays: ".$_POST["country"]."\r\n";
    $message .= 'E-mail: '.$_POST['email']."\r\n";
    $message .= "Sexe: ".$_POST["gender"]."\r\n";
    $message .= "Message: \r\n\r\n\r\n\r\n" .$_POST["message"]."\r\n\r\n--\r\n\r\n";
    $headers = 'From: client@example.com' . "\r\n" .
    'Reply-To: client@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    $options=array(
      'lastname' => FILTER_SANITIZE_STRING,
      'name' => FILTER_SANITIZE_STRING,
      'email' => FILTER_VALIDATE_EMAIL,
      'message' => FILTER_SANITIZE_STRING);

    $result = filter_input_array(INPUT_POST, $options);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["lastname"])) {
        $lastnameError = "Lastname input requiered. ";
      }
      else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
          $lastnameError = "Only letters on Lastname please. ";
        }
      }

      if (empty($_POST["name"])) {
        $nameError = "Name input requiered. ";
      }
      else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameError = "Only letters on Name please. ";
        }
      }

      if (empty($_POST["email"])) {
        $emailError = "Email input reaquiered. ";
      }
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailError = "Invalid email format. ";
        }
      }

      if (empty($_POST["message"])) {
        $messageError = "Message input requiered. ";
      }
      else {
        $message = $_POST["message"];
      }

    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>

    <h4><u>< Go back to the main website</u></h4>
  <div class="principal">
    <header>
      <img src="logo.png" alt="Logo Hackers Poulette" width="170px" height="140px"/>
      <p class="support">Hackers Poulette - Technical Support</p>
    </header>
    <main>
      <p class="help">How can we help you?</p>
      <div class="nom">
        <p>Name *</p>
        <p>Last Name *</p>
      </div>
      <form action="index.php" method="post">
        <input type="text" name="name">
        <input type="text" name="lastname"><br/>
        <div class="nominput">
          <p>Gender *</p>
          <p>Country *</p>
        </div>
        <input type="radio" name="gender" value="M" checked/> Men
        <input type="radio" name="gender" value="W"/> Women
        <select name="country">
          <option value="be" selected="selected">Belgium </option>
          <option value="af">Afghanistan </option>
          <option value="al">Albania </option>
          <option value="dz">Algeria </option>
          <option value="as">American Samoa </option>
          <option value="ad">Andorra </option>
          <option value="ao">Angola </option>
          <option value="ai">Anguilla </option>
          <option value="aq">Antarctica </option>
          <option value="ag">Antigua and Barbuda </option>
          <option value="ar">Argentina </option>
          <option value="am">Armenia </option>
          <option value="aw">Aruba </option>
          <option value="au">Australia </option>
          <option value="at">Austria </option>
          <option value="az">Azerbaijan </option>
          <option value="bs">Bahamas </option>
          <option value="bh">Bahrain </option>
          <option value="bd">Bangladesh </option>
          <option value="bb">Barbados </option>
          <option value="by">Belarus </option>
          <option value="bz">Belize </option>
          <option value="bj">Benin </option>
          <option value="bm">Bermuda </option>
          <option value="bt">Bhutan </option>
          <option value="bo">Bolivia </option>
          <option value="ba">Bosnia and Herzegovina </option>
          <option value="bw">Botswana </option>
          <option value="bv">Bouvet Island </option>
          <option value="br">Brazil </option>
          <option value="io">British Indian Ocean Territory </option>
          <option value="vg">British Virgin Islands </option>
          <option value="bn">Brunei </option>
          <option value="bg">Bulgaria </option>
          <option value="bf">Burkina Faso </option>
          <option value="bi">Burundi </option>
          <option value="kh">Cambodia </option>
          <option value="cm">Cameroon </option>
          <option value="ca">Canada </option>
          <option value="cv">Cape Verde </option>
          <option value="ky">Cayman Islands </option>
          <option value="cf">Central African Republic </option>
          <option value="td">Chad </option>
          <option value="cl">Chile </option>
          <option value="cn">China </option>
          <option value="cx">Christmas Island </option>
          <option value="cc">Cocos Islands </option>
          <option value="co">Colombia </option>
          <option value="km">Comoros </option>
          <option value="cg">Congo </option>
          <option value="ck">Cook Islands </option>
          <option value="cr">Costa Rica </option>
          <option value="hr">Croatia </option>
          <option value="cu">Cuba </option>
          <option value="cy">Cyprus </option>
          <option value="cz">Czech Republic </option>
          <option value="dk">Denmark </option>
          <option value="dj">Djibouti </option>
          <option value="dm">Dominica </option>
          <option value="do">Dominican Republic </option>
          <option value="tp">East Timor </option>
          <option value="ec">Ecuador </option>
          <option value="eg">Egypt </option>
          <option value="sv">El Salvador </option>
          <option value="gq">Equatorial Guinea </option>
          <option value="er">Eritrea </option>
          <option value="ee">Estonia </option>
          <option value="et">Ethiopia </option>
          <option value="fk">Falkland Islands </option>
          <option value="fo">Faroe Islands </option>
          <option value="fj">Fiji </option>
          <option value="fi">Finland </option>
          <option value="fr">France </option>
          <option value="gf">French Guiana </option>
          <option value="pf">French Polynesia </option>
          <option value="tf">French Southern Territories </option>
          <option value="ga">Gabon </option>
          <option value="gm">Gambia </option>
          <option value="ge">Georgia </option>
          <option value="de">Germany </option>
          <option value="gh">Ghana </option>
          <option value="gi">Gibraltar </option>
          <option value="gr">Greece </option>
          <option value="gl">Greenland </option>
          <option value="gd">Grenada </option>
          <option value="gp">Guadeloupe </option>
          <option value="gu">Guam </option>
          <option value="gt">Guatemala </option>
          <option value="gn">Guinea </option>
          <option value="gw">Guinea-Bissau </option>
          <option value="gy">Guyana </option>
          <option value="ht">Haiti </option>
          <option value="hm">Heard and McDonald Islands </option>
          <option value="hn">Honduras </option>
          <option value="hk">Hong Kong </option>
          <option value="hu">Hungary </option>
          <option value="is">Iceland </option>
          <option value="in">India </option>
          <option value="id">Indonesia </option>
          <option value="ir">Iran </option>
          <option value="iq">Iraq </option>
          <option value="ie">Ireland </option>
          <option value="il">Israel </option>
          <option value="it">Italy </option>
          <option value="ci">Ivory Coast </option>
          <option value="jm">Jamaica </option>
          <option value="jp">Japan </option>
          <option value="jo">Jordan </option>
          <option value="kz">Kazakhstan </option>
          <option value="ke">Kenya </option>
          <option value="ki">Kiribati </option>
          <option value="kp">Korea, North </option>
          <option value="kr">Korea, South </option>
          <option value="kw">Kuwait </option>
          <option value="kg">Kyrgyzstan </option>
          <option value="la">Laos </option>
          <option value="lv">Latvia </option>
          <option value="lb">Lebanon </option>
          <option value="ls">Lesotho </option>
          <option value="lr">Liberia </option>
          <option value="ly">Libya </option>
          <option value="li">Liechtenstein </option>
          <option value="lt">Lithuania </option>
          <option value="lu">Luxembourg </option>
          <option value="mo">Macau </option>
          <option value="mk">Macedonia, Yugoslav Republic of </option>
          <option value="mg">Madagascar </option>
          <option value="mw">Malawi </option>
          <option value="my">Malaysia </option>
          <option value="mv">Maldives </option>
          <option value="ml">Mali </option>
          <option value="mt">Malta </option>
          <option value="mh">Marshall Islands </option>
          <option value="mq">Martinique </option>
          <option value="mr">Mauritania </option>
          <option value="mu">Mauritius </option>
          <option value="yt">Mayotte </option>
          <option value="mx">Mexico </option>
          <option value="fm">Micronesia, Federated States of </option>
          <option value="md">Moldova </option>
          <option value="mc">Monaco </option>
          <option value="mn">Mongolia </option>
          <option value="ms">Montserrat </option>
          <option value="ma">Morocco </option>
          <option value="mz">Mozambique </option>
          <option value="mm">Myanmar </option>
          <option value="na">Namibia </option>
          <option value="nr">Nauru </option>
          <option value="np">Nepal </option>
          <option value="nl">Netherlands </option>
          <option value="an">Netherlands Antilles </option>
          <option value="nc">New Caledonia </option>
          <option value="nz">New Zealand </option>
          <option value="ni">Nicaragua </option>
          <option value="ne">Niger </option>
          <option value="ng">Nigeria </option>
          <option value="nu">Niue </option>
          <option value="nf">Norfolk Island </option>
          <option value="mp">Northern Mariana Islands </option>
          <option value="no">Norway </option>
          <option value="om">Oman </option>
          <option value="pk">Pakistan </option>
          <option value="pw">Palau </option>
          <option value="pa">Panama </option>
          <option value="pg">Papua New Guinea </option>
          <option value="py">Paraguay </option>
          <option value="pe">Peru </option>
          <option value="ph">Philippines </option>
          <option value="pn">Pitcairn Island </option>
          <option value="pl">Poland </option>
          <option value="pt">Portugal </option>
          <option value="pr">Puerto Rico </option>
          <option value="qa">Qatar </option>
          <option value="re">Reunion </option>
          <option value="ro">Romania </option>
          <option value="ru">Russia </option>
          <option value="rw">Rwanda </option>
          <option value="gs">S. Georgia and S. Sandwich Isls. </option>
          <option value="kn">Saint Kitts &amp; Nevis </option>
          <option value="lc">Saint Lucia </option>
          <option value="vc">Saint Vincent and The Grenadines </option>
          <option value="ws">Samoa </option>
          <option value="sm">San Marino </option>
          <option value="st">Sao Tome and Principe </option>
          <option value="sa">Saudi Arabia </option>
          <option value="sn">Senegal </option>
          <option value="sc">Seychelles </option>
          <option value="sl">Sierra Leone </option>
          <option value="sg">Singapore </option>
          <option value="sk">Slovakia </option>
          <option value="si">Slovenia </option>
          <option value="so">Somalia </option>
          <option value="za">South Africa </option>
          <option value="es">Spain </option>
          <option value="lk">Sri Lanka </option>
          <option value="sh">St. Helena </option>
          <option value="pm">St. Pierre and Miquelon </option>
          <option value="sd">Sudan </option>
          <option value="sr">Suriname </option>
          <option value="sj">Svalbard and Jan Mayen Islands </option>
          <option value="sz">Swaziland </option>
          <option value="se">Sweden </option>
          <option value="ch">Switzerland </option>
          <option value="sy">Syria </option>
          <option value="tw">Taiwan </option>
          <option value="tj">Tajikistan </option>
          <option value="tz">Tanzania </option>
          <option value="th">Thailand </option>
          <option value="tg">Togo </option>
          <option value="tk">Tokelau </option>
          <option value="to">Tonga </option>
          <option value="tt">Trinidad and Tobago </option>
          <option value="tn">Tunisia </option>
          <option value="tr">Turkey </option>
          <option value="tm">Turkmenistan </option>
          <option value="tc">Turks and Caicos Islands </option>
          <option value="tv">Tuvalu </option>
          <option value="um">U.S. Minor Outlying Islands </option>
          <option value="ug">Uganda </option>
          <option value="ua">Ukraine </option>
          <option value="ae">United Arab Emirates </option>
          <option value="uk">United Kingdom </option>
          <option value="us">United States of America</option>
          <option value="uy">Uruguay </option>
          <option value="uz">Uzbekistan </option>
          <option value="vu">Vanuatu </option>
          <option value="va">Vatican City </option>
          <option value="ve">Venezuela </option>
          <option value="vn">Vietnam </option>
          <option value="vi">Virgin Islands </option>
          <option value="wf">Wallis and Futuna Islands </option>
          <option value="eh">Western Sahara </option>
          <option value="ye">Yemen </option>
          <option value="yu">Yugoslavia (Former) </option>
          <option value="zr">Zaire </option>
          <option value="zm">Zambia </option>
          <option value="zw">Zimbabwe </option>
        </select>
        <div class="nominput">
          <p>E-mail *</p>
          <p>Subject</p>
        </div>
        <input type="email" name="email">
        <select name="subject">
          <option value="command">Your command </option>
          <option value="payment">Payments </option>
          <option value="garanty">Garanty/Return & Refund </option>
          <option value="other" selected="selected">Others </option>
        </select>
        <div class="textarea">
          <div class="nominput">
            <p>Message *</p>
          </div>
          <textarea rows="10" cols="45" name="message"></textarea>
          <input type = "submit" name = "submit" value = "Send"/>
        </div>
      </form>
      <div class="end">
      <p class="field">Fields with an * are mandatory</p>
      </div>
      <?php
        echo $lastnameError;
        echo $nameError;
        echo $genderError;
        echo $emailError;
        echo $messageError;
      ?>
    </main>
    <footer>
      <p>Hackers Poulette © -- <u>hackerspoulette.com</u></p>
      <p>Contacts</p>
    </footer>
  </div>
  </body>
</html>
