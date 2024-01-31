<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Чат");
// <div ..-bg  /div>
// <div container
// <div section
?>

<h1 class="pagetitle"><?$APPLICATION->ShowTitle();?></h1>

<div class="row">
<div class="col s12 l6 offset-l3">
	

  <div class="section ui-dropdowns">

<ul class="chat-area">

  
  <li class="user-avatar leftside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-36.jpg" alt="Sue Goldby" title="Sue Goldby"
        class="circle userpic">
            <p class="msg">Check back tomorrow; I will see if the book has arrived.</p>
      
            <div class="spacer"></div>
      <div class="row ui-mediabox">
                <div class="col s6">
          <a class="img-wrap" href="assets/images/chat-1.jpg" data-fancybox="images" data-caption="Fashion at its best">
            <img alt="image" class="z-depth-1" style="width: 100%;" src="assets/images/chat-1.jpg">
          </a>
        </div>
                <div class="col s6">
          <a class="img-wrap" href="assets/images/chat-2.jpg" data-fancybox="images" data-caption="Latest style trends">
            <img alt="image" class="z-depth-1" style="width: 100%;" src="assets/images/chat-2.jpg">
          </a>
        </div>
              </div>
      
    </div>
    <span class="time">18th Apr</span>
  </li>


  
  <li class="user-avatar rightside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-24.jpg" alt="Kelci Willars" title="Kelci Willars"
        class="circle userpic">
            <p class="msg">My Mum tries to be cool by saying that she likes all the same things that I do.</p>
      
      
    </div>
    <span class="time">17th Apr</span>
  </li>


  
  <li class="user-avatar leftside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-36.jpg" alt="Sue Goldby" title="Sue Goldby"
        class="circle userpic">
            <p class="msg">She works two jobs to make ends meet; at least, that was her reason for not having time to join us.</p>
      
      
    </div>
    <span class="time">16th Apr</span>
  </li>


  
  <li class="user-avatar rightside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-24.jpg" alt="Kelci Willars" title="Kelci Willars"
        class="circle userpic">
            <p class="msg">What was the person thinking when they discovered cow’s milk was fine for human consumption</p>
      
      
    </div>
    <span class="time">14th Apr</span>
  </li>


  
  <li class="user-avatar leftside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-36.jpg" alt="Sue Goldby" title="Sue Goldby"
        class="circle userpic">
            <p class="msg">When something is incomprehensible due to complexity; unintelligble.</p>
      
      
    </div>
    <span class="time">12th Apr</span>
  </li>


  
  <li class="user-avatar rightside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-24.jpg" alt="Kelci Willars" title="Kelci Willars"
        class="circle userpic">
            <p class="msg">Typically said to indicate that any further investigation into a situation may lead to harm.</p>
      
      
    </div>
    <span class="time">10th Apr</span>
  </li>


  
  <li class="user-avatar leftside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-36.jpg" alt="Sue Goldby" title="Sue Goldby"
        class="circle userpic">
            <p class="msg">To risk it all, even if it means losing everything. To go all out.</p>
      
      
    </div>
    <span class="time">09th Apr</span>
  </li>


  
  <li class="user-avatar rightside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-24.jpg" alt="Kelci Willars" title="Kelci Willars"
        class="circle userpic">
            <p class="msg">Malls are great places to shop; I can find everything I need under one roof.</p>
      
      
    </div>
    <span class="time">09th Apr</span>
  </li>


  
  <li class="user-avatar leftside">
    <div class="msg-area status available z-depth-1">
      <img src="assets/images/user-36.jpg" alt="Sue Goldby" title="Sue Goldby"
        class="circle userpic">
            <p class="msg">The body may perhaps compensates for the loss of a true metaphysics.</p>
      
      
    </div>
    <span class="time">08th Apr</span>
  </li>


  
</ul>



	<div class="chat-message-area">
	<div class="input-field col s12">
	<i class="mdi mdi-send prefix"></i>
	<textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
	<label for="textarea2">Message</label>
	</div>
	</div>  
	
</div>	 <!--/section ui-dropdowns-->
	
	
</div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
// </div container
// </div section
?>