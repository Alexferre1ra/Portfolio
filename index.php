<?php
require 'Libs/debug/ref.php';
// fixer le choix de la langue
// $lang = 'en';
// vérifier si l'internaute impose un choix de langue
// si c'est le cas, on vient le prendre en compte
// sinon on fixe le francais par défaut.
//TODO Changement de langue avec le <select>
$lang = isset($_POST['lang']) ? $_POST['lang'] : 'fr';

if (isset($POST['submit'])) {
  if (!empty($POST['lang'])) {
    $lang = $POST['lang'];
    echo 'You have chosen: ' . $lang;
  } else {
    echo 'Please select the value.';
  }
}

// ATTENTION : pour assurer une bonne cohérence, on va
// vérifier que la langue correspond à l'une des langues existante
// si ce n'est pas le cas, on impose le francais par défaut
if (!in_array($lang, ['fr', 'en', 'pt'])) {
  $lang = 'fr';
}

// ouvrir le fichier de langue
$traduction = file_get_contents('assets/lang/' . $lang . '.json');
// passer du format JSON en tableau associatif
$trans = json_decode($traduction, true);
// afficher le tableau pour le debug (donc optionnel)
// r($trans);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google-site-verification" content="YtC6NNj65SSrape1jAnSCDtWb8Eyjd3Iil_2CFMitqo" />

  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/phone.css" />

  <title><?php echo $trans['head_title'] ?></title>
</head>

<body>
  <div class="wrap">
    <input type="checkbox" id="checking" style="display:none;" />
    <button class="blob"><img src="assets/img/sun.svg" alt="Name " id="darkMode" onclick="darkMode()"></button>
    <button class="blob"><img src="assets/img/globe.svg" alt="Name " id="langage" onclick="langSelect()"></button>
    <button class="blob"><img src="assets/img/type.svg" alt="Name " id="dyslexie" onclick="dyslexieMode()"></button>
    <label class="blob" for="checking">
      <img src="assets/img/settings.svg" alt="Name ">
    </label>
  </div>
  <svg>
    <defs>
      <filter id="filt">
        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
        <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="filt" />
        <feBlend in2="filt" in="SourceGraphic" result="mix" />
      </filter>
    </defs>
  </svg>
  <div class="box">
    <div class="btn not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <form id="langMenu" method="POST">
    <div class="langues">
      <label for="langSelect" id="langLabel"><?php echo $trans['lang_label'] ?> :</label>
      <select name="lang" id="langSelect">
        <option value="fr"> &#127467;&#127479; Français </option>
        <option value="en"> &#127468;&#127463; English </option>
        <option value="pt"> &#127477;&#127481; Portugûes </option>
      </select>
    </div>

    <div>
      <button type="submit" id="submitLang"><?php echo $trans['submit_button'] ?></button>
    </div>

  </form>

  <main dir="ltr">
    <nav id="menu">
      <ul>
        <li>
          <a href="#accueil"><?php echo $trans['menu_a'] ?></a>
        </li>
        <li>
          <a href="#apropos"><?php echo $trans['apropos_a'] ?></a>
        </li>
        <li>
          <a href="#parcours"><?php echo $trans['parcours_a'] ?></a>
        </li>
        <li>
          <a href="#portfolio"><?php echo $trans['portfolio_a'] ?></a>
        </li>
        <li>
          <a href="#contact"><?php echo $trans['contact_a'] ?></a>
        </li>
      </ul>
    </nav>

    <!-- Header Start -->
    <section class="container header" id="accueil" style="min-height: 100vh;">
      <div class="column photoProfile">
        <img src="assets/img/Alex_F.png" alt="" class="img" />
      </div>
      <div class="column presentation">
        <h1>Alexandre Ferreira</h1>
        <h2 id="msgAccueil" style="color: white">F</h2>
        <div>
          <a href="assets/doc/Alexandre Ferreira.pdf" class="download"><?php echo $trans['cv_a'] ?></a>
        </div>
        <div class="mouse_scroll">
          <div class="mouse">
            <div class="wheel"></div>
          </div>
          <div>
            <span class="m_scroll_arrows one"></span>
            <span class="m_scroll_arrows two"></span>
            <span class="m_scroll_arrows three"></span>
          </div>
        </div>
      </div>
    </section>
    <!-- Header End -->

    <!-- About me Start -->
    <section class="container about" id="apropos" style="min-height: 100vh;">
      <div class="title">
        <h2 class="titleBehind"><?php echo $trans['apropos_h2'] ?></h2>
        <h2><?php echo $trans['apropos_h2'] ?></h2>
      </div>
      <div class="recap">
        <h3>Front-end Developer</h3>
        <div class="pres">
          <p>
            <?php echo $trans['prensentation_p'] ?>
          </p>
        </div>
        <div class="infos">
          <div class="column column__about">
            <ul>
              <li><?php echo $trans['prensentation_li-1'] ?> :<span> Ferreira Alexandre</span></li>
              <li><?php echo $trans['prensentation_li-2'] ?> :<span> D.U.T</span></li>
              <li><?php echo $trans['prensentation_li-3'] ?> :<span> +33 07 68 69 96 66</span></li>
              <li><?php echo $trans['prensentation_li-4'] ?> :<span> Angoulême, France</span></li>
            </ul>
          </div>
          <div class="column column__about">
            <ul>
              <li><?php echo $trans['prensentation_li-5'] ?> :<span><?php echo $trans['prensentation_span-5'] ?></span></li>
              <li><?php echo $trans['prensentation_li-6'] ?> :<span><?php echo $trans['prensentation_span-6'] ?></span></li>
              <li>Email :<span> alexandreferreira540@gmail.com</span></li>
              <li>Freelance :<span> <?php echo $trans['prensentation_span-7'] ?></span></li>
            </ul>
          </div>
        </div>
        <a href="#contact" class="hire"><?php echo $trans['prensentation_a'] ?></a>
      </div>
    </section>
    <!-- About me END -->

    <!-- Cursus START-->
    <section class="container parcours" id="parcours" style="min-height: 100vh;">
      <div class="title">
        <h2 class="titleBehind"><?php echo $trans['parcours_h2'] ?></h2>
        <h2><?php echo $trans['parcours_h2-2'] ?></h2>
      </div>

      <div class="column column__cursus">
        <div>
          <h3><?php echo $trans['parcours_h3-1'] ?></h3>
          <div class="rightbox">
            <div class="rb-container">
              <ul class="rb">
                <li class="rb-item" ng-repeat="itembx">
                  <div class="timestamp">2020 - 2022</div>
                  <div class="item-title">
                  <?php echo $trans['parcours_item-1'] ?>
                  </div>
                </li>
                <li class="rb-item" ng-repeat="itembx">
                  <div class="timestamp">2018 - 2020</div>
                  <div class="item-title">
                  <?php echo $trans['parcours_item-2'] ?> 
                    
                  </div>
                </li>
                <li class="rb-item" ng-repeat="itembx">
                  <div class="timestamp">2016</div>
                  <div class="item-title"> <?php echo $trans['parcours_item-3'] ?> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="column column__exp">
          <div>
            <h3><?php echo $trans['parcours_h3-2'] ?></h3>
            <div class="rightbox">
              <div class="rb-container">
                <ul class="rb">
                  <li class="rb-item" ng-repeat="itembx">
                    <div class="timestamp">
                    <?php echo $trans['parcours_timestamp-4'] ?><br />
                    <?php echo $trans['parcours_timestamp-4-2'] ?></div>
                    <div class="item-title">
                    <?php echo $trans['parcours_item-4'] ?></div>
                  </li>
                  <li class="rb-item" ng-repeat="itembx">
                    <div class="timestamp">
                    <?php echo $trans['parcours_timestamp-5'] ?><br />
                      <?php echo $trans['parcours_timestamp-5-2'] ?></div>
                    <div class="item-title">
                    <?php echo $trans['parcours_item-5'] ?></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Cursus END-->

    <!-- Portfolio START-->
    <section class="container portfolio" id="portfolio" >
      <div class="title">
        <h2 class="titleBehind"><?php echo $trans['portfolio_h2'] ?></h2>
        <h2><?php echo $trans['portfolio_h2-2'] ?></h2>
      </div>

      <div class="row">
        <div class="filter-buttons">
          <ul id="filter-btns">
            <li class="active" data-target="all">Tout</li>
            <li data-target="Web">Web</li>
            <li data-target="Graphics">Graphisme</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="portfolio-gallery">
          <div class="item" data-id="Web">
            <div class="inner">
              <img src="assets/img/portfolio/NintendoSwitch.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-1'] ?></h3>
                <p><?php echo $trans['portfolio_h3-1_p'] ?></p>
                <a href="https://projetnintendoswitch.netlify.app"> <?php echo $trans['portfolios_a'] ?> </a>
              </figcaption>
            </div>
          </div>

          <div class="item" data-id="Web">
            <div class="inner">
              <img src="assets/img/portfolio/MemoryGame.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-2'] ?></h3>
                <p><?php echo $trans['portfolio_h3-2_p'] ?></p>
                <a href="https://ferreira-memorygame.netlify.app"> <?php echo $trans['portfolios_a'] ?> </a>
              </figcaption>
            </div>
          </div>
          <div class="item" data-id="Web">
            <div class="inner">
              <img src="assets/img/portfolio/site_livre_dor_Palma.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-3'] ?></h3>
                <p><?php echo $trans['portfolio_h3-3_p'] ?></p>
                <a href="https://ferreira-alexandre.alwaysdata.net/LivroDeOro/"> <?php echo $trans['portfolios_a'] ?> </a>
              </figcaption>
            </div>
          </div>
          <div class="item" data-id="Graphics">
            <div class="inner">
              <img src="assets/img/portfolio/Affiche-benedetti.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-4'] ?></h3>
                <p><?php echo $trans['portfolio_h3-4_p'] ?></p>
                <a href="assets/img/portfolio/Affiche-benedetti.webp"><?php echo $trans['portfolios_a'] ?></a>
              </figcaption>
            </div>
          </div>
          <div class="item" data-id="Graphics">
            <div class="inner">
              <img src="assets/img/portfolio/vectorisation_Samourai.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-5'] ?> </h3>
                <p><?php echo $trans['portfolio_h3-5_p'] ?></p>
                <a href="assets/img/portfolio/vectorisation_Samourai.webp"> Voir </a>
              </figcaption>
            </div>
          </div>
          <div class="item" data-id="Web">
            <div class="inner">
              <img src="assets/img/portfolio/lesCarmes.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-6'] ?></h3>
                <p><?php echo $trans['portfolio_h3-6_p'] ?></p>
                <a href="https://www.lescarmes.org"> Voir </a>
              </figcaption>
            </div>
          </div>
          <div class="item" data-id="Web">
            <div class="inner">
              <img src="assets/img/portfolio/Mastermind.webp" alt="portfolio" />
              <figcaption>
                <h3><?php echo $trans['portfolio_h3-7'] ?></h3>
                <p><?php echo $trans['portfolio_h3-7_p'] ?></p>
                <a href="https://ferreira-mastermind.netlify.app/"> Voir </a>
              </figcaption>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!-- Portfolio END-->



    <!-- Contact START-->
    <?php
    $to = 'alexandreferreira540@gmail.com';
    $subject = 'nouveau contact';
    $message = "<p>from : <b>{$_POST['email']}</p>{$_POST['message']}";
    $headers = 'From: ' . $_POST['email'] . "\r\n" .
      'Reply-To: ' . $_POST['email'] . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

    ?>
    <section class="container contact" id="contact" style="min-height: 100vh;">
      <div class="title" style="margin: 0 5rem">
        <h2 class="titleBehind"><?php echo $trans['contact_h2'] ?></h2>
        <h2><?php echo $trans['contact_h2-2'] ?></h2>
      </div>

      <div class="form">
        <form method="POST" action="index.php">
          <div>
            <div>
              <div>
                <div>
                  <span><img src="assets/img/user.svg" alt="Name "></span>
                </div>
                <input type="text" name="name" id="basic-url" placeholder="<?php echo $trans['nom_placeholder'] ?>" required />
              </div>

              <div>
                <span><img src="assets/img/at-sign.svg" alt="Email"></span>
              </div>
              <input type="text" name="mail" placeholder="<?php echo $trans['email_placeholder'] ?>" aria-label="Username" required />
            </div>

            <div>
              <div>
                <span><img src="assets/img/help-circle.svg" alt="subject"></span>
              </div>
              <input type="text" name="sujet" placeholder="<?php echo $trans['sujet_placeholder'] ?>" required />
            </div>
            <div>
              <div>
                <span><img src="assets/img/message-circle.svg" alt="Message square"></span>
              </div>
              <textarea name="message" aria-label="With textarea" placeholder="<?php echo $trans['message_placeholder'] ?>" required></textarea>
            </div>
            <button id="submit"><img src="assets/img/send.svg" alt="Send"><?php echo $trans['contact_button'] ?></button>
          </div>
        </form>
      </div>
    </section>
    <!-- Contact END-->
    <!-- Footer START-->
    <footer class="footer">
      <div class="footer__addr">

        <h3 class="nav__title"><?php echo $trans['footer_h3-1'] ?></h3>

        <address>
          Angoulême, France
          <br>
          <a class="footer__btn" href="mailto:alexandreferreira540@gmail.com"><img src="assets/img/mail.svg" alt="Email"></a>
          <a class="footer__btn" href="tel:+33 7 68 69 96 66"><img src="assets/img/phone.svg" alt="Phone"></a>
        </address>
      </div>

      <ul class="footer__nav">
        <li class="nav__item">
          <h3 class="nav__title"><?php echo $trans['footer_h3-2'] ?></h3>

          <ul class="nav__ul">
            <li>
              <a href="https://github.com/Alexferre1ra"> <img src="assets/img/github.svg" alt="GitHub"></a>
            </li>

            <li>
              <a href="https://www.linkedin.com/in/alexandre-ferreira-a540871a8/"><img src="assets/img/linkedin.svg" alt="LinkedIn"></a>
            </li>

            <li>
              <a href="https://www.instagram.com/alexandreferreira540/"><img src="assets/img/instagram.svg" alt="Intagram"></a>
            </li>
          </ul>
        </li>

        <li class="nav__item">
          <h3 class="nav__title"><?php echo $trans['footer_h3-3'] ?></h3>

          <ul class="nav__ul">
            <li>
              <a href="assets/doc/VosMentionsLégales.pdf"><?php echo $trans['mentionsLegales_a'] ?></a>
            </li>

            <li>
              <a href="https://ferreira-alexandre.alwaysdata.net/portfolio/sitemap.xml">Sitemap</a>
            </li>
          </ul>
        </li>
      </ul>

      <div class="legal">
        <p>&copy; 2022 Alexandre Ferreira. All rights reserved.</p>
      </div>
    </footer>
    <!-- Footer END-->
  </main>

  <!-- Script JS-->
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
  <script src="assets/js/index.js"></script>

</body>

</html>