<div id="loadingModal" class="modal">
<div class="overlay"></div>
    <div class="modal-content">

                <div class="container-loading">

                    <div class="follow-the-leader-line">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>


                </div>
    </div>
</div>


<style>
   .overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    z-index: 1;
    }
  .container-loading {
    position: fixed; /* This makes the container-loading positioned relative to the viewport */
    top: 48%; /* Centering vertically */
    left: 49%; /* Centering horizontally */
    transform: translate(-50%, -50%); /* Adjusting the position to perfectly center the container-loading */
  }

  @-webkit-keyframes follow-the-leader {
  0% {
    -webkit-transform: rotate(0deg) translateY(-200%);
    transform: rotate(0deg) translateY(-200%);
  }

  60%,
  100% {
    -webkit-transform: rotate(360deg) translateY(-200%);
    transform: rotate(360deg) translateY(-200%);
  }
}

@keyframes follow-the-leader {
  0% {
    -webkit-transform: rotate(0deg) translateY(-200%);
    transform: rotate(0deg) translateY(-200%);
  }

  60%,
  100% {
    -webkit-transform: rotate(360deg) translateY(-200%);
    transform: rotate(360deg) translateY(-200%);
  }
}

.follow-the-leader-line {
  height: 14px;
  position: relative;
  width: 14px;
}

.follow-the-leader-line div {
  -webkit-animation: follow-the-leader 1.25s infinite backwards;
  animation: follow-the-leader 1.25s infinite backwards;
  background-color: #ffffff;
  border-radius: 100%;
  height: 100%;
  width: 100%;
}

.follow-the-leader-line div:nth-child(1) {
  -webkit-animation-delay: 0.15s;
  animation-delay: 0.15s;
  background-color: rgba(0, 0, 0, 0.9);
}

.follow-the-leader-line div:nth-child(2) {
  -webkit-animation-delay: 0.3s;
  animation-delay: 0.3s;
  background-color: rgba(0, 0, 0, 0.8);
}

.follow-the-leader-line div:nth-child(3) {
  -webkit-animation-delay: 0.45s;
  animation-delay: 0.45s;
  background-color: rgba(0, 0, 0, 0.7);
}

.follow-the-leader-line div:nth-child(4) {
  -webkit-animation-delay: 0.6s;
  animation-delay: 0.6s;
  background-color: rgba(0, 0, 0, 0.6);
}

.follow-the-leader-line div:nth-child(5) {
  -webkit-animation-delay: 0.75s;
  animation-delay: 0.75s;
  background-color: rgba(0, 0, 0, 0.5);
}

</style>



