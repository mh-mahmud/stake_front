<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
 <title>Coin</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="<?php echo base_url('assets/game2'); ?>/css/ludu/bootstrap.css">
 <script src="<?php echo base_url('assets/game2'); ?>/js/ludu/jquery.js" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/game2'); ?>/js/ludu/bootstrap.js" type="text/javascript"></script>
 <link href="<?php echo base_url('assets/game2'); ?>/css/ludu/css.css" rel="stylesheet">
 <link href="<?php echo base_url('assets/game2'); ?>/css/ludu/custom.css" rel="stylesheet">
 
 <style>
   .topDiv {
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

<div class="topDiv" style="margin:0 auto;min-height: 700px;" images="" live_casino.jpg");="" overflow:="" hidden;padding-right:="" 5px;padding-left:="" 5px;border:="" 10px="" solid="" #ff0080;"="">
    <br>
  <div id="coin">
    <div class="side-a tail">
      <img style="width: 100%;height: 100%;" src="<?php echo base_url('assets/game2'); ?>/images/head-till.png">
    </div>
  </div>

  <div id="error">
    <!-- <div role="alert" class="alert alert-danger">
      <strong>Please login frist !!</strong>
    </div> -->
  </div>

  <div style="width:100%;display: block;overflow: hidden;">
    <div class="btn-top" style="">
      <p>Select a number please <span>Rate: <?php echo $stake; ?></span></p>
    </div>

    <div style="padding: 5px 10px;background: #0a7b7b;">
      <button class="btn d3" id="btn-head" style="width: 49%;"><div class="d31">HEAD</div></button>
      <button class="btn d3" id="btn-till" style="width: 49%;"><div class="d31">TILL</div></button>
      <input type="hidden" id="headTileStatus">
    </div>
    <div style="width:100%;float:left;">
      <div style="width:40%;float:left;">
        <input type="number" class="form-control form-custom" name="coin_amount" id="coin_amount" placeholder=" Enter Amount">
      </div>
      <div style="width:60%;float:right;">
        <div class="posiblewin" id="posiblewin">
          <span>Possible Winning</span><span class="bg" id="coin_pwin">0.00</span>
        </div>
      </div>
    </div>
    <div class="play-btn">
      <img id="cplay" class="" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
      <img id="cplay1" class="hidden" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
    </div>
  </div>
</div>
<script type="text/javascript">
  // setTimeout(function(){
  //   document.getElementById('aap').className = 'waa';
  // }, 5000);
  jQuery(document).ready(function($){
    var addedclass="";
    var flipResult="";
    var result="";
    var coin_amount="";
    var coin_stake="";
    var run=0;
    $('#btn-head').click(function(event) {
      if(run==0)
      {

       coin_stake="1";
       $('#btn-head').addClass('active');
       $('#btn-till').removeClass('active');
     }
   });

    $('#btn-till').click(function(event) {
      if(run==0)
      {

       coin_stake="2";
       $('#btn-head').removeClass('active');
       $('#btn-till').addClass('active');
     }
     else
     {

     }
   });

    $('#cplay').on('click', function(){
      run=0;
      var action_url = "<?php echo base_url(); ?>action_coin";
      var coin_amount=$('#coin_amount').val();
      if(coin_stake=="" )
      {
        alert('choose your point ( Head or Till )');
        run=0;
      }
      else
      {
        if(coin_amount<=0)
        {
          alert('Enter Stake amount');
          run=0;
        }
        else
        {
          $.ajax({
            method: "POST",
            url: action_url,
            data : {
             coin_stake: "<?php echo $stake; ?>",
             coin_amount: coin_amount,
             head_tile_status: coin_stake
           },
           success : function (a) {
              var respData = JSON.parse(a);
              $('#coin').html(respData.wstatues);
              $('#result').html(respData.b);
              $('#notice').html(respData.c);
              $('#posiblewin').html(respData.posiblewin);
              $('#error').html(respData.error);

              // refresh up
              $("#coin_amount").val(0);
              $('#btn-head').removeClass('active');
              $('#btn-till').removeClass('active');
           }
          }); 
        }
      }
    });

        $('#coin_amount').keyup(function(event) {
      // var rate=2.2;
      var rate="<?php echo $stake; ?>";
      var amount=$('#coin_amount').val();
      var returna=amount*rate;
      var returna=returna.toFixed(1); 
      $('#coin_pwin').html(returna);
    });
  });


</script>

<script type="text/javascript">
  // setTimeout(function(){
  //   document.getElementById('aap').className = 'waa';
  // }, 5000);
  jQuery(document).ready(function($){
    var addedclass="";
    var flipResult="";
    var result="";
    var amount="";
    var stake="";
    var run=0;
    $('#btn-odd').click(function(event) {
      if(run==0)
      {
       stake="odd";
       $('#btn-odd').addClass('active');
       $('#btn-even').removeClass('active');
     }
   });

    $('#btn-even').click(function(event) {
      if(run==0)
      {
       stake="even";
       $('#btn-odd').removeClass('active');
       $('#btn-even').addClass('active');
     }
     else
     {

     }
   });
    $('#play1').on('click', function(){
      alert('Refresh your browser');
      location.reload();
    });
    $('#playodd').on('click', function(){
      run=0;

      // $('#btn-tail').css('background', '#123');
      // $('#btn-head').css('background', '#123');
      var amount=$('#ludu_amount').val();
      if(stake=="" )
      {
        alert('choose your point (odd-even)');
        run=0;
      }
      else
      {
        if(amount<=0)
        {
          alert('Enter Stake amount');
          run=0;
        }
        else
        {
          $.ajax({
            method: "POST",
            url:'ludu-oepost.php',
            data : {
             stake: stake,
             amount: amount
           },
           success : function (a){
            var respData = JSON.parse(a);
            $('#coin').html(respData.wstatues);
            $('#result').html(respData.b);
            $('#notice').html(respData.c);
            $('#posiblewin').html(respData.d);
            $('#error').html(respData.error);
          }
        }); 
        }
      }
    });
        $('.amountBtn').click(function () {
      $('.amountBtn').removeClass('btn-active');
      $(this).addClass('btn-active');
      var amount = $(this).text();
      $('#ludu_amount').val(amount).trigger('change')
    })
    $("#ludu_amount").on("change keypress input", function() {
      var rate=1.86;
      var amount=$('#ludu_amount').val();
      var returna=amount*rate;
      var returna=returna.toFixed(1); 
      $('#pwin').html(returna);
    });

  });


</script>
</body>
</html>