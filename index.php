<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="./images/detach.svg" />
    <title>Detach</title>
  </head>
  <body>
    <div class="container">
      <nav class="primary-nav flex">
        <div class="primary-nav__logo-container flex xsm-gap">
          <img src="./images/detach.svg" alt="detach" />
          <p>detach</p>
        </div>
        <div class="flex bg-gap">
          <a href="#">How to use</a>
          <a href="#">Tools & API</a>
          <a href="#">Pricing</a>
          <a href="#">Contact</a>
        </div>
        <div class="flex bg-gap">
          <?php
            if(isset($_SESSION["logged_in"])) {
              echo "<a href='account.php'>Account</a>";
              echo "<a href='logout.php'>Log out</a>";
            }else {
              echo "<a href='login.php'>Log in</a>";
              echo "<a href='register.php'>Sign up</a>";
            }
          ?>
        </div>
      </nav>
      <header class="header flex">
        <img src="./images/primary.png" alt="red-hoodie-guy" />
        <div class="grid md-gap">
          <h1>
            Remove the background from images for
            <span class="highlight-border"
              ><span class="highlight">free.</span>
            </span>
          </h1>
          <p>
            Remove background from images of humans, animals or objects and
            download high-resolution images for free.
          </p>
          <a href="#" class="btn flex xsm-gap">
            <img src="./images/plus.svg" alt="plus" />
            <p>Upload image</p>
          </a>
        </div>
      </header>
    </div>

    <main>
      <div class="container">
        <section class="steps-section grid">
          <div class="grid bg-gap steps-section__header">
            <h2>
              <span class="highlight-border"
                ><span class="highlight">Easy steps </span> </span
              >to remove a image background
            </h2>
            <p>
              Remove background from images of humans, animals or objects and
              download high-resolution images for free.
            </p>
          </div>
          <div class="flex md-gap">
            <div class="flex steps-section__card xsm-gap">
              <img src="./images/upload-image-step.png" alt="upload" />
              <div class="grid xxsm-gap">
                <h3>Upload image</h3>
                <p>
                  For best results, choose an image where the subject has clear
                  edges with nothing overlapping.
                </p>
              </div>
            </div>
            <div class="flex steps-section__card xsm-gap">
              <img
                src="./images/remove-background-step.png"
                alt="remove background"
                alt=""
              />
              <div class="grid xxsm-gap">
                <h3>Remove background</h3>
                <p>
                  Upload your image to automatically remove the background in an
                  instant.
                </p>
              </div>
            </div>
            <div class="flex steps-section__card xsm-gap">
              <img src="./images/download-image-step.png" />
              <div class="grid xxsm-gap">
                <h3>Download image</h3>
                <p>
                  Download your new image as a PNG file with a transparent
                  background to save, share, or keep editing.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section class="options-section grid bg-gap">
          <h2 class="options-section__title">
            More Than Just A Background <span>Remover</span>
          </h2>

          <div class="flex md-gap">
            <div>
              <img src="./images/more-than-1.png" alt="guy-in-a-hoodie" />
              <p>Original</p>
            </div>

            <img src="./images/arrow.svg" alt="arrow" />

            <div>
              <img src="./images/more-than-2.png" alt="guy-in-a-hoodie" />
              <p>Removed background</p>
            </div>

            <img src="./images/arrow.svg" alt="arrow" />

            <div>
              <img src="./images/more-than-3.png" alt="guy-in-a-hoodie" />
              <p>New background</p>
            </div>

            <img src="./images/arrow.svg" alt="arrow" />

            <div>
              <img src="./images/more-than-4.png" alt="guys-in-a-hoodie" />
              <p>Design as you want</p>
            </div>
          </div>
        </section>
      </div>
      <section class="comparison-section">
        <div class="flex container">
          <img src="./images/secondary.png" alt="" />
          <div class="comparison-section__content grid md-gap">
            <h2>Free <span>online tool</span> to backgrounds remove easily</h2>
            <p>
              Our AI background remover can automatically detect the subject at
              once from any photo, remove bg in smooth cutout way without any
              manul work.
            </p>
            <p>
              With artificial intelligence tool, it's easy to handling hair,
              animal fur or any complext edges in a few seconds. Save your time
              and energy to make high quality transparent PNG or add the white
              background to photo.
            </p>
            <a href="" class="btn">Get Started</a>
          </div>
        </div>
      </section>
      <section class="integrations-section grid bg-gap">
        <div class="integrations-section__title text-ac grid md-gap">
          <h2>Speed up Your Workflow With Our <span>Integrations</span></h2>
          <p>
            Remove background from images of humans, animals or objects and
            download high-resolution images for free.
          </p>
        </div>
        <div class="flex integrations-section__cards md-gap container">
          <div class="integrations-section__card grid sm-gap">
            <img src="./images/figma.png" alt="figma" />
            <p>Figma</p>
          </div>
          <div class="integrations-section__card grid sm-gap">
            <img src="./images/xd.png" alt="xd" />
            <p>Adobe XD</p>
          </div>
          <div class="integrations-section__card grid sm-gap">
            <img src="./images/sketch.png" alt="sketch" />
            <p>Sketch</p>
          </div>
          <div class="integrations-section__card grid sm-gap">
            <img src="./images/woocomarce.png" alt="woo" />
            <p>Woocommerce</p>
          </div>
        </div>
        <button class="btn">See All Plugins</button>
      </section>

      <div class="container">
        <section class="about-us-section grid bg-gap">
          <div class="flex about-us-section__header">
            <h2 class="about-us-section__title">
              What our loving users are saying <span>about us</span>
            </h2>
            <div class="flex xsm-gap">
              <button class="about-us-section__nav-btn--dark">
                <img src="./images/arrow-left.svg" alt="arrow-left" />
              </button>
              <button class="about-us-section__nav-btn--ligth">
                <img src="./images/arrow-right.svg" alt="arrow-right" />
              </button>
            </div>
          </div>
          <div class="flex bg-gap">
            <div class="grid md-gap about-us-section__card">
              <div class="flex xsm-gap about-us-section__profile">
                <img src="./images/mark.png" alt="mark" />
                <div>
                  <p class="about-us-section__profile-name">Mark Wood</p>
                  <p class="about-us-section__profile-position">Web Designer</p>
                </div>
              </div>
              <p>
                We are very impressed with the values and removing method. In
                particular, we don’t use any other tools for removing image and
                make transparent it .
              </p>
              <div class="flex xxsm-gap">
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
              </div>
            </div>
            <div class="grid md-gap about-us-section__card">
              <div class="flex xsm-gap about-us-section__profile">
                <img src="./images/rose.png" alt="rose" />
                <div>
                  <p class="about-us-section__profile-name">Mark Wood</p>
                  <p class="about-us-section__profile-position">Web Designer</p>
                </div>
              </div>
              <p>
                We are very impressed with the values and removing method. In
                particular, we don’t use any other tools for removing image and
                make transparent it .
              </p>
              <div class="flex xxsm-gap">
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
                <img src="./images/star.svg" alt="star" />
              </div>
            </div>
          </div>
          <div class="about-us-section__slide-btns flex xxsm-gap">
            <button></button>
            <button></button>
            <button></button>
          </div>
        </section>
        <section class="ready-to-section">
          <div class="ready-to-section__content grid bg-gap">
            <h2>Ready to <span>remove</span> the background of your image?</h2>
            <p>
              Remove background from images of humans, animals or objects and
              download high-resolution images for free.
            </p>
            <a href="" class="btn ready-to-section__btn">Get Started Now</a>
          </div>
        </section>
      </div>
    </main>
    <footer class="container footer">
      <div class="flex footer__content">
        <div class="footer__description">
          <div class="flex xsm-gap footer__description__header">
            <img src="./images/detach.svg" alt="detach" />
            <p>detach</p>
          </div>
          <p>
            Remove background from images of humans, animals or objects and
            download high-resolution images for free.
          </p>
        </div>
        <div class="flex bg-gap">
          <div class="grid xsm-gap">
            <p>Tools & API</p>
            <a href="#">API Documentation</a>
            <a href="#">Integrations, tools & apps</a>
            <a href="#">Photoshop Extension</a>
            <a href="#">Windows / Mac / Linux</a>
            <a href="#">Android App</a>
            <a href="#">Design Templates</a>
          </div>
          <div class="grid xsm-gap">
            <p>Tools & API</p>
            <a href="#">API Documentation</a>
            <a href="#">Integrations, tools & apps</a>
            <a href="#">Photoshop Extension</a>
            <a href="#">Windows / Mac / Linux</a>
            <a href="#">Android App</a>
            <a href="#">Design Templates</a>
          </div>
          <div class="grid xsm-gap">
            <p>Tools & API</p>
            <a href="#">API Documentation</a>
            <a href="#">Integrations, tools & apps</a>
            <a href="#">Photoshop Extension</a>
            <a href="#">Windows / Mac / Linux</a>
            <a href="#">Android App</a>
            <a href="#">Design Templates</a>
          </div>
        </div>
      </div>
      <div class="flex footer__additional">
        <button class="footer__language-btn">
          <img src="./images/us.svg" alt="us" />
          <p>English</p>
          <img src="./images/arrow-down.svg" alt="arrow-down" />
        </button>
        <div class="flex sm-gap">
          <a href=""><img src="./images/fb.svg" alt="fb" /></a>
          <a href=""><img src="./images/in.svg" alt="in" /></a>
          <a href=""><img src="./images/tw.svg" alt="tw" /></a>
        </div>
      </div>
      <p class="footer__copy">Copyright @UIHUT 2022</p>
    </footer>
  </body>
</html>
