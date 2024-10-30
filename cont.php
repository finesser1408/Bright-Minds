
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="contact.css">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

  </head>
  <body>
  <?php  include("header.php")  ?>
    <div class="container">
      <div class="form">
        <div class="contact-info">
          <h3 class="title"><i>Whispers in the Wind</i></h3>
          <p class="text">
              If you'd like to share your thoughts, feedback, or just say hello, we'd love to hear from you. Your words are precious to us, and we'll treasure them like a rare poem.
    <br>  <br>
Feel free to share your own poetry or writing with us! We'd be delighted to read your work and offer feedback or simply enjoy the beauty of your words.
          </p>

          <div class="info">
            <div class="information">

              <p>3533 Tynwald North</p>
            </div>
            <div class="information">

              <p>tavongaurayayi070@gmail.com</p>
            </div>
            <div class="information">
            
              <p>+263 71 550 3026</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle span>
          <span class="circle "></span>

          <form action="contact.php" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input"  required  />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input"  required  />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"  required ></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" class="btn" />
              <br>
              <br>
              <span style="color: #fff;"> Remember, your words matter, and we're here to listen.</span>
          </form>
        </div>
      </div>
    </div>

    <script>
     const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

</script>
<?php  include("footer.php")  ?>
  </body>
</html>
