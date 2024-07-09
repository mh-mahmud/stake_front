<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
 <title>Gta22-Coin | Online Gamble Platform.</title>
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
<body cz-shortcut-listen="true">
 <header>
  <nav class="navbar navbar-default heading-color" style="background: linear-gradient(#000650,#000650,#5A5D84,#000650,#000650) !important; margin: 0;">

    <div class="navbar-header ">
      <a href="home.php" class="btn btn-primary back-btn">Back</a>

      <div style="float:left;width:200px;">
        <a class="" href="">
          <img style="width: 100%;height: 50px;margin-left: 20px;" src="<?php echo base_url(); ?>/assets/img/logo.png">
        </a>
      </div>
    </div>
  </nav>
</header>

<div class="topDiv" style="margin:0 auto;min-height: 609px;" images="" live_casino.jpg");="" overflow:="" hidden;padding-right:="" 5px;padding-left:="" 5px;border:="" 10px="" solid="" #ff0080;"="">
    <br>
  <div id="coin">
    <div class="side-a tail">
      <img style="width: 100%;height: 100%;" src="<?php echo base_url('assets/game2'); ?>/images/head-till.png">
    </div>
  </div>
  <div id="error">
  </div>
  <br>
  <div style="width:100%;display: block;overflow: hidden;">
    <div class="btn-top" style="background: linear-gradient(#000650,#000650,#5A5D84,#000650,#000650) !important;border-radius: 5px;">
      <p>Select A Option<span>Rate: 1.80</span></p>
    </div>

    <div style="padding: 5px 10px;background: linear-gradient(#e080ff,#40E0D0,#6495ED,#CCF,#eE3163) !important;border-radius: 5px;">
      <button class="btn d3" id="btn-head" style="width: 49%;background: linear-gradient(#000650,#000650,#5A5D84,#000650,#000650) !important;"><div class="d31">HEAD</div></button>
      <button class="btn d3" id="btn-till" style="width: 49%;background: linear-gradient(#000650,#000650,#5A5D84,#000650,#000650) !important;"><div class="d31">TILL</div></button>
    </div>
    <div style="width:100%;float:left;">
      <div style="width:40%;float:left;">
        <input type="number" class="form-control form-custom" name="coin_amount" id="coin_amount" placeholder=" Enter Amount">
      </div>
      <div style="width:60%;float:right;">
        <div class="posiblewin" id="posiblewin">
          <span>Winning Rate</span><span class="bg" id="coin_pwin">0.00</span>
        </div>
      </div>
    </div>
    <div class="play-btn">
      <img id="cplay" class="" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
      <img id="cplay1" class="hidden" src="<?php echo base_url('assets/game2'); ?>/images/play-btn1.png" alt="">
    </div>
  </div>
</div>


<script src="<?php echo base_url('assets/game2'); ?>/js/jquery.min_1.js"></script>
<script src="<?php echo base_url('assets/game2'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/game2'); ?>/js/jquery.datatable.min.js"></script>
<script src="<?php echo base_url('assets/game2'); ?>/js/datatable.bootstrap.min.js"></script>

<script src="<?php echo base_url('assets/game2'); ?>/js/pusher.js"></script>


    <script>
      $(document).ready(function(){
        setInterval(function(){
          $("#liveContent").load('inc/live.php');
      // $("#upcommingcontent").load('inc/upcomming.php');
    }, 5000);
      });
    </script>



<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
<script>
  $(document).ready( function () {
    var table = $('#example1').DataTable( {
      destroy: true,
      pageLength : 10
    } )
  } );
  $(document).ready( function () {
    var table = $('#example2').DataTable( {
      destroy: true,
      pageLength : 10
    } )
  } );
  $(document).ready( function () {
    var table = $('#example3').DataTable( {
      destroy: true,
      pageLength : 10
    } )
  } );
  $(document).ready( function () {
    var table = $('#example4').DataTable( {
      destroy: true,
      pageLength : 10
    } )
  } );
  $(document).ready( function () {
    var table = $('#example').DataTable( {
      destroy: true,
      pageLength : 10
    } )
  } );
</script>




<script>

  $('#allgame').on('click',function () {
    $('.Football').show();
    $('.Cricket').show();
    $('.Basketball').show();
    $('.Badminton').show();
    $('.Tennis').show();
    $('.vball').show();
    $('.Handball').show();
    $('.Hockey').show();
    $('.Virtual Game').show();
    $('.TableTennis').show();
  });
  $('#football').on('click',function () {
    $('.Football').show();
    $('.Cricket').hide();
    $('.Basketball').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#cricket').on('click',function () {
    $('.Football').hide();
    $('.Cricket').show();
    $('.Basketball').hide();
    $('.TableTennis').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.Virtual Game').hide();
  });
  $('#basketball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Basketball').show();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#badminton').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').show();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#tennis').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').show();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#vball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').show();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#handball').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').show();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').hide();
  });
  $('#hockey').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').show();
    $('.TableTennis').show();
    $('.Virtual Game').hide();
  });
  $('#virtual').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').hide();
    $('.Virtual Game').show();
  });
  $('#TableTennis').on('click',function () {
    $('.Football').hide();
    $('.Cricket').hide();
    $('.Badminton').hide();
    $('.Tennis').hide();
    $('.vball').hide();
    $('.Basketball').hide();
    $('.Handball').hide();
    $('.Hockey').hide();
    $('.TableTennis').show();
    $('.Virtual Game').hide();
  });
</script>
<script>

  $(document).ready(function(){ $('.itemSlider').owlCarousel({ margin: 0, loop: true, autoplay: true, autoplayTimeout: 4000,  smartSpeed: 800, dots:false, navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'], responsive: { 0: { items: 4 }, 450: { items: 4 }, 768: { items: 5 }, 1000: { items: 6 } } }); });
</script>

<script>
  $(document).ready(function(){ $('.game-slider').owlCarousel({ margin: 0, loop: true, autoplay: true, autoplayTimeout: 3000,  dots:false, responsive: { 0: { items: 1 }, 450: { items: 2 }, 768: { items: 3 },1000: { items: 4 } } }); });
</script>
<script>
  function showTime(){
    var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if(h == 0){
          h = 12;
        }

        if(h % 12 == 0){
            // h = h - 12;
            session = "PM";
          }else if (h > 12) {
            h = h - 12;
            session = "PM";
          }

          h = (h < 10) ? "0" + h : h;
          m = (m < 10) ? "0" + m : m;
          s = (s < 10) ? "0" + s : s;

          var time = h + ":" + m + ":" + s + " " + session;
          document.getElementById("siteClock").innerText = time;
          document.getElementById("siteClock").textContent = time;

          setTimeout(showTime, 1000);

        }
        showTime();
        $('input,textarea').attr('autocomplete', 'off');
      </script>

      <script>
        $('.number').on('keypress', function(e) {
          if (e.which == 32)
            return false;
        });
        function valueChange(el) {
          $('#betLabel').text(visual_number_format($(el).val()));
          $('#modalPossibleAmountLabel').text(visual_number_format($('#modalBetRate').val()* $(el).val()));
        }

        $('.amountBtn').click(function () {
          $('.amountBtn').removeClass('btn-active');
          $(this).addClass('btn-active');
          var amount = $(this).text();
          $('#bet').val(amount).trigger('change')
        })
      </script>
      <script>

        $("#bet").on("change keypress input", function() {
          var rate=$("#asshole").text();
          $('#stake').text(this.value);
          var as=document.getElementById("stake").value;
          document.getElementById("possible").style.display="none";
          document.getElementById("poss").style.visibility="visible";
          var as=($('#stake').text()*rate).toFixed(2);
          $('#poss').text(as);
        })
        ;

      </script>
      <script>
        function bet(bet_id) {
          $.ajax({
            url : "bet.php",
            type : "post",
            dataType:"text",
            data : {
             stake_id: bet_id
           },
           success : function (a){
            var respData1 = JSON.parse(a);


            if(respData1.fucker === 'Active'){

              $('#error_data').html(respData1.error);
              $('#first_data').html(respData1.first);
              $('#second_data').html(respData1.second);
              $('#possible').html(respData1.possible);
              $('#asshole').html(respData1.possible1);
              $('#button_data').html(respData1.button);
              $('#betRequestModal').modal('show');
              $('#possible').trigger('change');
              $('#rate').trigger('change');
              $('#betRequestModal').modal('show');
            }
            else{
              location.reload();
            }
          }
        });
        } 
      </script>
      <script>

        function betPost(bet_id) {

          var amount=$("#stake").text();
          $.ajax({
            url : "bet-post.php",
            type : "post",
            dataType:"text",
            data : {
             stake_id: bet_id,
             amount: amount
           },
           success : function (a){
            var respData = JSON.parse(a);

            if(respData.fucker === 'Active'){
              $('#error_data').html(respData.error);
              $('#first_data').html(respData.first);
              $('#second_data').html(respData.second);
              $('#possible').html(respData.possible);
              $('#asshole').html(respData.possible1);
              $('#button_data').html(respData.button);
              $('#betRequestModal').modal('show');
              $('#possible').trigger('change');
              $('#rate').trigger('change');
              $('#betRequestModal').modal('show');
            }
            else{
              location.reload();
            }
          }
        });

        } 

        $('#button_data').click(function(event) {
        $('#button_data').addClass('hidden');
        $('#button_data_loading').removeClass('hidden');
      });
     </script>
     <script>
      function check() {
        document.getElementById("req-deposit-to").value=document.getElementById("sel1").value;
      } 
      function depositPost() {
        var amount=document.getElementById("req-deposit-amount").value;
        var sellist1=document.getElementById("sel1").value;
        var from=document.getElementById("req-deposit-from").value;
        var to=document.getElementById("req-deposit-to").value;
        var transection_number=document.getElementById("req-deposit-transaction_number").value;
        $.ajax({
          url : "deposit.php",
          type : "post",
          dataType:"text",
          data : {
           transection_number: transection_number,
           sellist1: sellist1,
           from: from,
           to: to,
           amount: amount
         },
         success : function (a){
          var respData2 = JSON.parse(a);
          $('#status_data').html(respData2.statues);
          $('#requestDepositModal').modal('show');
        }
      });
      } 
    </script>
    <script>

      function withdrawPost() {

        var withdraw_amount=document.getElementById("req-withdraw-amount").value;
        var withdraw_method=document.getElementById("withdraw_method").value;
        var withdraw_to=document.getElementById("req-withdraw-to").value;
        var account_type=document.getElementById("withdraw_account_type").value;
        $.ajax({
          url : "withdraw.php",
          type : "post",
          dataType:"text",
          data : {
           withdraw_method: withdraw_method,
           account_type: account_type,
           withdraw_to: withdraw_to,
           withdraw_amount: withdraw_amount
         },
         success : function (a){
          var respData3 = JSON.parse(a);
          $('#status_data1').html(respData3.wstatues);
          $('#buttondata').html(respData3.buttondata);
          $('#requestWithdrawModal').modal('show');
        }
      });
      } 
      $('#buttondata').click(function(event) {
        $('#buttondata').addClass('hidden');
        $('#button_data_loading').removeClass('hidden');
      });
    </script>
    <script>
      $('#bet-sel').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
      $('#cancel-withrow').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>

    <script>
      $('.list-item').click(function () {
        $('.list-item').removeClass('active');
        $(this).addClass('active');
        $('.bhoechie-tab').addClass('hide');
        $($(this).attr('href')).removeClass('hide');
      });

      $('#bet-sel').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>

<script>
	function u2ubtPost() {

        var password=document.getElementById("password1c").value;
        var amount=document.getElementById("amount1c").value;
        var username=document.getElementById("username1c").value;
        $.ajax({
          url : "u2ubtpost.php",
          type : "post",
          dataType:"text",
          data : {
           password: password,
           amount: amount,
           username: username
         },
         success : function (a){
          var respData3 = JSON.parse(a);
          $('#ctubtnp').html(respData3.wstatues);
          $('#wstatues1').html(respData3.wstatues1);
          $('#balancetrnsfr').modal('show');
        }
      });
    } 
	function u2ubtPost1() {

        var password=document.getElementById("password11u").value;
        var amount=document.getElementById("amount11u").value;
        var username=document.getElementById("username11u").value;
        $.ajax({
          url : "u2ubtpost.php",
          type : "post",
          dataType:"text",
          data : {
           password: password,
           amount: amount,
           username: username
         },
         success : function (a){
          var respData3 = JSON.parse(a);
          $('#utcbtp').html(respData3.wstatues);
          $('#wstatues1a').html(respData3.wstatues1);
          $('#balancetrnsfruser').modal('show');
        }
      });
    }
</script>    
    <script>
      $('.list-item').click(function () {
        $('.list-item').removeClass('active');
        $(this).addClass('active');
        $('.bhoechie-tab').addClass('hide');
        $($(this).attr('href')).removeClass('hide');
      });
    </script>



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
          var amount=$('#ludu_amount').val();
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
            else
            {
              $.ajax({
                method: "POST",
                url:'ludupost.php',
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
                $('#ludu_amount').keyup(function(event) {
          var rate=3.20;
          var amount=$('#ludu_amount').val();
          var returna=amount*rate;
          var returna=returna.toFixed(1); 
          $('#pwin').html(returna);
        });
      });


    </script>

    <script type="text/javascript">
      setTimeout(function(){
        document.getElementById('aap').className = 'waa';
      }, 5000);
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
                url:'coinpost.php',
                data : {
                 coin_stake: coin_stake,
                 coin_amount: coin_amount
               },
               success : function (a){
                var respData = JSON.parse(a);
                $('#coin').html(respData.wstatues);
                $('#result').html(respData.b);
                $('#notice').html(respData.c);
                $('#posiblewin').html(respData.posiblewin);
                $('#error').html(respData.error);
              }
            }); 
            }
          }
        });

                $('#coin_amount').keyup(function(event) {
      // var rate=2.2;
      var rate=1.80;
      var amount=$('#coin_amount').val();
      var returna=amount*rate;
      var returna=returna.toFixed(1); 
      $('#coin_pwin').html(returna);
    });
      });


    </script>
    <script type="text/javascript">
      setTimeout(function(){
        document.getElementById('aap').className = 'waa';
      }, 5000);
      jQuery(document).ready(function($){
        var coin_amount="";
        $('#playludutouch').on('click', function(){
          $.ajax({
            method: "POST",
            url:'ludutouchpost.php',
            success : function (a){
              var respData = JSON.parse(a);
              $('#coin').html(respData.wstatues);
              $('#result').html(respData.b);
              $('#notice').html(respData.c);
              $('#posiblewin').html(respData.posiblewin);
              $('#error').html(respData.error);
            }
          }); 
        });

      });


    </script>
</body>
</html>