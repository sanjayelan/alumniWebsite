<section>
  <footer class="footer">
    <div class="container-fluid ">
      <div class="row row1 ">
        <div class="col-lg-12 footer-col d-flex justify-content-center">
          <a href=#><img src="./images/logo/logo3.png" class="footerlogo" /></a>
        </div>
      </div>
    </div>
  </footer>
</section>

<!-- CHAT BAR BLOCK -->
<div class="chat-bar-collapsible">
  <button id="chat-button" type="button" class="collapsible">
    Chat with us!
    <i id="chat-icon" style="color: #fff" class="fa fa-fw fa-comments-o"></i>
  </button>

  <div class="content">
    <div class="full-chat-block">
      <!-- Message Container -->
      <div class="outer-container">
        <div class="chat-container">
          <!-- Messages -->
          <div id="chatbox">
            <h5 id="chat-timestamp"></h5>
            <p id="botStarterMessage" class="botText">
              <span>Loading...</span>
            </p>
          </div>

          <!-- User input box -->
          <div class="chat-bar-input-block">
            <div id="userInput">
              <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message" />
              <p></p>
            </div>

            <div class="chat-bar-icons">
              <!-- <i
                  id="chat-icon"
                  style="color: crimson"
                  class="fa fa-fw fa-heart"
                  onclick="heartButton()"
                ></i> -->
              <i id="chat-icon" style="color: #333" class="fa fa-fw fa-send" onclick="sendButton()"></i>
            </div>
          </div>

          <div id="chat-bar-bottom">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<script src="./js/app.js"></script>
<script src="./js/chatCommend.js"></script>

</body>

</html>