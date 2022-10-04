<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">
</head>
<?php
$name = "Gervacio";
$about = "basic-info";
$links = "social-links";
$do = "what-i-do";
$projects = "projects";

$do_title = "do";
$do_desc = "desc";

$project_title = 'title';
$project_image = 'image';
$project_stack = 'stack';
// Get json file
$json_file = file_get_contents('info.json');
// decode json file and set as array
$info = json_decode($json_file, JSON_OBJECT_AS_ARRAY);

// foreach ($info[$name]['what-i-do'] as $x) {
//   echo "$x[$do_title]</br>";
//   echo "$x[$do_desc]<br>";
// }
?>

<body>
  <div class="container">
    <div class="side">
      <div class="side__header">
        <img src="<?php echo $info[$name]["basic-info"]["profile"]; ?>" alt="images/alt.png">
        <label><?php echo $info[$name]["basic-info"]["name"]; ?></label>
        <label class="designation"><?php echo $info[$name]["basic-info"]["designation"]; ?></label>
      </div>
      <diva class="side__contact">
        <div>
          <div class="icon">
            <i class="fa-regular fa-envelope"></i>
          </div>
          <div class="info">
            <label for="">email</label>
            <label for="" class="name"><?php echo $info[$name]["basic-info"]['email'] ?></label>
          </div>
        </div>
        <div>
          <div class="icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div class="info">
            <label for="">phone</label>
            <label for=""><?php echo $info[$name]["basic-info"]["phone-number"] ?></label>
          </div>
        </div>
        <div class="socials">
          <?php
          /**
           * A loop to create items for what the user can do inside the info.json file.
           * 
           * @var string $name that contains the surname of the selected user.
           * @var string $project_image contains the string of 'image'.
           * @var array $info contains the info.json object as array.
           * @var array $info[$names] contains the available objects of a selected user.
           * @var string $icon_text contains the string code for font awesome icons.
           * @return creating a icon div for each available social links given by the selected user.
           */
          foreach ($info[$name][$links] as $z => $i) {
            if ($z == 'linked-in') {
              $icon_text = 'linkedin-in';
            } else {
              $icon_text = strtolower($z);
            }
            echo "<div>";
            echo "<a href='$i' target='_blank'>";
            echo "<i class='fa-brands fa-$icon_text'></i>";
            echo "</a>";
            echo "</div>";
          }
          ?>
        </div>
        <div class="side__switch">
          <div class="switch active">
            <a href="ken.php">Ken</a>
          </div>
          <div class="switch">
            <a href="aralar.php">Aralar</a>
          </div>
          <div class="switch">
            <a href="audrey.php">Valdez</a>
          </div>
        </div>
    </div>
    <div class=" main">
      <div class="main__about">
        <div class="about-me">
          <div class="header">
            <h1>About me</h1>
            <hr>
          </div>
          <p><?php echo $info[$name]["basic-info"]["about-me"]; ?></p>
        </div>
      </div>
      <div class="what-i-do">
        <div class="header">
          <h1>What I Do</h1>
          <hr>
        </div>
        <div class="what-i-do__items">
          <?php
          /**
           * A loop to create items for what the user can do inside the info.json file.
           * 
           * @var string $name that contains the surname of the selected user.
           * @var string $project_image contains the string of 'image'.
           * @var array $info contains the info.json object as array.
           * @var array $info[$names] contains the available objects of a selected user.
           * @var string $icon_text contains the string code for font awesome icons.
           * @return creating a item div that contains the icon of the title and description of the action.
           */
          foreach ($info[$name]['what-i-do'] as $x) {
            if ($x[$do_title] == 'NodeJS and Express') {
              $icon_text = "fa-brands fa-node";
            } else if ($x[$do_title] == 'Web UI') {
              $icon_text = "fa-brands fa-uikit";
            } else if ($x[$do_title] == 'API') {
              $icon_text = "fa-sharp fa-solid fa-gears";
            } else if ($x[$do_title] == 'Mongo DB') {
              $icon_text = "fa-solid fa-server";
            }

            // $icon_text = strtolower($x[$do_title]);
            echo "<div class='item'>";
            echo "<div class='section-1'>";
            echo "<i class='$icon_text'></i>";
            echo "</div>";
            echo "<div class='section-2'>";
            echo "<label for=''>$x[$do_title]</label>";
            echo "<p>$x[$do_desc]</p>";
            echo "</div>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
      <div class="main__portfolio">
        <div class="portfolio">
          <div class="header">
            <h1>Projects</h1>
            <hr>
          </div>
          <div class="portfolio__items">
            <?php
            /**
             *  A loop to create item div for each user's projects available in the info.json
             * 
             * 
             * @var string $name that contains the surname of the selected user.
             * @var string $project_image contains the string of 'image'.
             * @var array $info contains the info.json object as array.
             * @var array $info[$names] contains the available objects of a selected user.
             * @var string $image if the project has no image.
             * @return creating a div item that contains images, title of the project and the stacks used for the project.
             * */
            foreach ($info[$name]['projects'] as $y) {
              if ($y[$project_image] == "" or null) {
                $image = "images/empty_project.jpg";
              } else {
                $image = $y[$project_image];
              }
              echo "<div class='item'>";
              echo "<div class='image'>";
              echo "<img src='$image'>";
              echo "</div>";
              echo "<div class='header'>";
              echo "<label for='title'>$y[$project_title]</label>";
              echo "<label for='stack'>$y[$project_stack]</label>";
              echo "</div>";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="./script.js"></script>
</body>

</html>