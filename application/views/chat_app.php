			<!-- chat design start -->

			<!-- for mobile user -->
			<button class="chatbox-open">
			    <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
			</button>

			<!-- for desktio user -->
			<div class="DialogWindowWrap-o67epl-4 cOSjlu">
			    <!-- <div class="ConsultantBtn-o67epl-2 hqGxvC"></div> -->
			    <div class="Content-o67epl-3 wYXLx chat-wrapper">
			        <div class="DialogHeaderSC-sc-1k3i65y-0 bbLWZs chat-head">
			            <div class="Leaf-sc-1k3i65y-1 caVkMp"></div>
			            <div class="DialogTitleV1-sc-1k3i65y-4 jgeGTZ">
			            	<!-- <span id="new-text" style="color:red">[1]</span> -->
			                <div class="DialogTitle-sc-1k3i65y-2 fYPTXl" style="color:#555;font-weight:bold;">Live Chat</div>

			                <div class="<?php echo (get_chat_settings_status()==1) ? 'chat-online' : 'chat-offline'; ?> dzmiYl">
			                	<?php echo (get_chat_settings_status()==1) ? 'on-line' : 'off-line'; ?>
			            	</div>
			                <!-- <div class="chat-offline dzmiYl">off-line</div> -->
			                
			            </div>
			            <div class="DialogTitleV2-sc-1k3i65y-5 gIPfcf">
			                <div class="DialogTitle-sc-1k3i65y-2 fYPTXl">Online consultant</div>
			            </div>
			        </div>

			        <div class="DialogWindowSC-p679n5-0 llZDlT chat-content">
			            <div class="ConsultantSC-b7fei0-2 irtDWL">
			                <div class="Avatar-b7fei0-0 JGqNs">
			                    <figure>
			                        <img id="avatar" src="<?php echo base_url(); ?>assets/chat/chat-admin.png">
			                    </figure>
			                    <!--<div class="Status-b7fei0-1 zRBzz"></div>-->
			                </div>
			                <div class="ConsultantInfo-b7fei0-3 idbHi">
			                    <div class="ConsultantInfoName-b7fei0-4 cnkTdL">Jenny</div>
			                    <div class="ConsultantInfoTxt-b7fei0-5 hWslWB">Consultant</div>
			                </div>
			                <span class="EvalLink-b7fei0-6 lhxiNq" style="background-color:#333;padding: 7px 20px 0px 7px">
			                    <img width="80" src="<?php echo base_url(); ?>assets/chat/site-logo.png">
			                </span>
			            </div>
			            <div class="DialogWrap-p679n5-1 gAsctz">

				            <div id="chatdiv" class="nhlzr" style="height:300px">
				                <div id="textdiv" class="AyiEv">  
											

				                </div>
				            </div>

			                <div class="TextareaWrap-p679n5-5 ioHuut">
			                    <div tabindex="0" class="dropzone Dropzone-sc-1k7dlkk-2 dLCMcG">
			                      <input accept="image/*" multiple="" type="file" autocomplete="off" tabindex="-1" style="display: none;">
			                        <form id="chat-form" novalidate="">
			                        	<input type="hidden" id="chat_cookie_id" name="cookie_id" value="<?php echo isset($_COOKIE['user_chat_cookie']) ? $_COOKIE['user_chat_cookie'] : ''; ?>">
			                        	<input type="hidden" id="chat_user_id" name="chat_user_id" value="<?php echo !empty($this->session->userdata['cus_data']) ? $chat_login_id : ''; ?>">

			                            <div class="StyledUniversalField-m37057-1 VNfGq">

			                              <textarea style="border-top:1px solid #333 !important" name="message" type="textarea" id="sendMessageArea" autocomplete="off" autocapitalize="on" autocorrect="on" placeholder="Type a message..."></textarea>

			                            </div>

			                            <input type="submit" class="DialogBtnInner-sc-1kz6gus-0 kpRdHj" value="">
			                        </form>
			                    </div>
			                    <button class="Attach-sc-1k7dlkk-0 fWgGlt"></button>
			                </div>

			            </div>
			            <div class="EvalPopUpSC-sc-4bld78-2 hBkFCQ">
			                <button class="EvalPopUpClose-sc-4bld78-0 eENasB"></button>
			                <div class="EvalPopUpWrap-sc-4bld78-3 ljKgOr"></div>
			            </div>
			            <div class="EvalPopUpBg-sc-4bld78-1 jvpMwK"></div>
			        </div>

				</div>
			</div>