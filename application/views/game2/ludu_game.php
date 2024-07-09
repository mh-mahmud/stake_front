<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
 <title>Betscore24: Ludu</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="<?php echo base_url('assets/game2'); ?>/css/ludu/bootstrap.css">
 <script src="<?php echo base_url('assets/game2'); ?>/js/ludu/jquery.js" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/game2'); ?>/js/ludu/bootstrap.js" type="text/javascript"></script>
 <link href="<?php echo base_url('assets/game2'); ?>/css/ludu/css.css" rel="stylesheet">
 <link href="<?php echo base_url('assets/game2'); ?>/css/ludu/custom.css" rel="stylesheet">

 <style>
   .topDiv {
    background: #252f5a;
    background-image: url("assets/game2/images/Live_Casino.jpg");
   }
 </style>

</head>
<body>
 <header>
  <nav class="navbar navbar-default heading-color" style="background: linear-gradient(#000650,#000650,#5A5D84,#000650,#000650) !important; margin: 0;">
    <div class="navbar-header ">
      <a href="<?php echo base_url(); ?>" class="btn btn-primary back-btn">Back</a>
      <div style="float:left;width:200px;">
        <a class="" href="">
          <img style="width: 100%;height: 50px;margin-left: 10px;" src="<?php echo base_url(); ?>/assets/img/logo.png">
        </a>
      </div>
    </div>
  </nav>
</header>

<div class="topDiv" style="margin:0 auto;min-height: 700px; overflow: hidden;">
  <div id="coin">
    <div class="side-a tail">
      <img style="width: 100%;height: 100%;" src="<?php echo base_url('assets/game2'); ?>/images/ludu.png">
    </div>
  </div>
  <div id="error">
  </div>
  <div style="width:100%;display: block;overflow: hidden;">
    <div class="btn-top" style="">
      <p>Select a number please <span>Rate: <?php echo $stake; ?></span></p>
    </div>

    <div style="padding: 5px;background: #0a7b7b;position: relative;bottom: 0;overflow: hidden;">
      <button class="btn d3" id="btn-1"><div class="d31">1</div></button>
      <button class="btn d3" id="btn-2"><div class="d31">2</div></button>
      <button class="btn d3" id="btn-3"><div class="d31">3</div></button>
      <button class="btn d3" id="btn-4"><div class="d31">4</div></button>
      <button class="btn d3" id="btn-5"><div class="d31">5</div></button>
      <button class="btn d3" id="btn-6"><div class="d31">6</div></button>
    </div>
    <div style="width:100%;float:left;">
      <div style="width:40%;float:left;">
        <input type="number" class="form-control form-custom" name="ludu_amount" id="ludu_amount" placeholder=" Enter Amount">
      </div>
      <div style="width:60%;float:right;">
        <div class="posiblewin" id="posiblewin">
          <span>Possible Winning</span><span class="bg" id="pwin">0.00</span>
        </div>
      </div>
    </div>
    <div class="play-btn">
      <img id="play" class="" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
      <img id="play1" class="hidden" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
    </div>
  </div>
</div>


<script type="text/javascript">
  setTimeout(function(){
    document.getElementById('aap').className = 'waa';
  }, 5000);
  jQuery(document).ready(function($){
    var addedclass="";
    var flipResult="";
    var result="";
    var amount="";
    var stake="";
    var run=0;
    $('#btn-1').click(function(event) {
      if(run==0)
      {

       stake="1";
       $('#btn-1').addClass('active');
       $('#btn-2').removeClass('active');
       $('#btn-3').removeClass('active');
       $('#btn-4').removeClass('active');
       $('#btn-5').removeClass('active');
       $('#btn-6').removeClass('active');
     }
   });

    $('#btn-2').click(function(event) {
      if(run==0)
      {

       stake="2";
       $('#btn-1').removeClass('active');
       $('#btn-2').addClass('active');
       $('#btn-3').removeClass('active');
       $('#btn-4').removeClass('active');
       $('#btn-5').removeClass('active');
       $('#btn-6').removeClass('active');
     }
     else
     {

     }
   });

    $('#btn-3').click(function(event) {
      if(run==0)
      {

       stake="3";
       $('#btn-1').removeClass('active');
       $('#btn-2').removeClass('active');
       $('#btn-3').addClass('active');
       $('#btn-4').removeClass('active');
       $('#btn-5').removeClass('active');
       $('#btn-6').removeClass('active');
     }
     else
     {

     }
   });
    $('#btn-4').click(function(event) {
      if(run==0)
      {

       stake="4";
       $('#btn-1').removeClass('active');
       $('#btn-2').removeClass('active');
       $('#btn-3').removeClass('active');
       $('#btn-4').addClass('active');
       $('#btn-5').removeClass('active');
       $('#btn-6').removeClass('active');
     }
     else
     {

     }
   });
    $('#btn-5').click(function(event) {
      if(run==0)
      {

       stake="5";
       $('#btn-1').removeClass('active');
       $('#btn-2').removeClass('active');
       $('#btn-3').removeClass('active');
       $('#btn-4').removeClass('active');
       $('#btn-5').addClass('active');
       $('#btn-6').removeClass('active');
     }
     else
     {

     }
   });
    $('#btn-6').click(function(event) {
      if(run==0)
      {

       stake="6";
       $('#btn-1').removeClass('active');
       $('#btn-2').removeClass('active');
       $('#btn-3').removeClass('active');
       $('#btn-4').removeClass('active');
       $('#btn-5').removeClass('active');
       $('#btn-6').addClass('active');
     }
     else
     {

     }
   });
    $('#play1').on('click', function(){
      alert('Refresh your browser');
      location.reload();
    });
    $('#play').on('click', function(){
      run=0;

      $('#btn-tail').css('background', '#123');
      $('#btn-head').css('background', '#123');
      var action_url = "<?php echo base_url(); ?>action_ludu";
      var amount=$('#ludu_amount').val();
      var ludu_rate = "<?php echo $stake ?>";
      if(stake=="" )
      {
        alert('choose your point (1-6)');
        run=0;
      }
      else
      {
        if(amount<=0)
        {
          alert('Enter Stake amount');
          run=0;
        }
        else {
 
          $.ajax({
            method: "POST",
            url: action_url,
            data : {
             stake: stake,
             amount: amount,
             ludu_rate: ludu_rate
           },
           success : function (a) {
              var respData = JSON.parse(a);
              $('#coin').html(respData.wstatues);
              $('#result').html(respData.b);
              $('#notice').html(respData.c);
              $('#posiblewin').html(respData.posiblewin);
              $('#error').html(respData.error);

              // refresh up
              $("#ludu_amount").val(0);
              $('#btn-1').removeClass('active');
              $('#btn-2').removeClass('active');
              $('#btn-3').removeClass('active');
              $('#btn-4').removeClass('active');
              $('#btn-5').removeClass('active');
              $('#btn-6').removeClass('active');
           }
          });

        }
      }
    });
        $('#ludu_amount').keyup(function(event) {
      var rate=3.20;
      var amount=$('#ludu_amount').val();
      var returna=amount*rate;
      var returna=returna.toFixed(1); 
      $('#pwin').html(returna);
    });
  });


</script>

</body></html>