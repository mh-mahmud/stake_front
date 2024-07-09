<?php include(APPPATH . "views/customer/index_header.php"); ?>

<app-game-content-area>
	<section class="game-content-area" style="margin-top: 0px">
		<div class="row">
			<?php include(APPPATH . "views/left_sidebar.php"); ?>
			<perfect-scrollbar class="col-lg-7 game-area custom-scrollbar-2">
				<div style="position: static;" class="ps">
					<div class="ps-content">


						<div class="live-in-play">

							<div class="nav nav-tabs live-in-play-carousel">
								<div style="width: 50%">
									<a
										style="background:#00C851;color:#fff;padding:20px;font-weight:bold"
										href="<?php echo base_url(''); ?>"
										class="single-match-result-box">
										Live In Play<span class="icon">&nbsp;&nbsp;&nbsp;&nbsp;<img width="25px"
																									src="<?php echo base_url() ?>assets/img/inplay.gif"
																									alt=""></span>
									</a>
								</div>
								<div style="width: 50%">
									<a
										style="background:#f4e849;color:#000;padding:20px;font-weight:bold"
										href="<?php echo base_url('upcoming'); ?>"
										class="single-match-result-box">
										Advance Bet
									</a>
								</div>
							</div>
							<div class="game-other-info-registration-area registration-fullpage-area mt-100"
								 style="background-image: url('<?php echo base_url(); ?>/assets/img/register-full-bg.jpg');margin-top: 0px;">
								<div class="registration-fullpage-tab-box club-user-admin">

									<?php if ($this->session->flashdata('msg')) { ?>
										<div class="col-md-12 alert-success" style="padding: 15px;">
											<?php echo $this->session->flashdata('msg'); ?>
										</div>
									<?php } ?>
									<?php if ($this->session->flashdata('error')) { ?>
										<div class="col-md-12 alert-danger" style="padding: 15px;">
											<?php echo $this->session->flashdata('error'); ?>
										</div>
									<?php } ?>

									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a aria-controls="f-registration">Customer Registration</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade show active" id="fe-registration" role="tabpanel">
											<div class="registration-form">
												<form id="signupForm" class="rs-form" method="POST">
													<div class="row form-inputs-wrapper">
														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<select class="form-control" name="club_id">
																	<option value=""> Select Club</option>
																	<?php foreach ($club_names as $val) : ?>
																		<option
																			value="<?php echo $val->id; ?>"><?php echo $val->club_name; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<input class="form-control" name="full_name"
																	   placeholder="Full Name" required="" type="text">
															</div>
														</div>

														<!-- 2nd part -->
														<div class="col-lg-6">
															<div style="margin-top:5px">

																<span>Verified By:</span>
																<label class="radio-inline">
																	<input class="radionBtn" type="radio"
																		   name="verified_by" value="email" checked>Email
																</label>
																<label class="radio-inline">
																	<input class="radionBtn" type="radio"
																		   name="verified_by" value="phone">Phone
																</label>

															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group-input-wrapper">

																<select name="country" class="form-control">
																	<option value="">Select country</option>
																	<option value="Afghanistan(+93)">
																		Afghanistan(+93)
																	</option>
																	<option value="Albania(+355)">Albania(+355)</option>
																	<option value="Algeria(+213)">Algeria(+213)</option>
																	<option value="American Samoa(+1684)">American
																		Samoa(+1684)
																	</option>
																	<option value="Andorra(+376)">Andorra(+376)</option>
																	<option value="Angola(+244)">Angola(+244)</option>
																	<option value="Anguilla(+1264)">
																		Anguilla(+1264)
																	</option>
																	<option value="Antarctica(+0)">Antarctica(+0)
																	</option>
																	<option value="Antigua and Barbuda(+1268)">
																		Antigua and Barbuda(+1268)
																	</option>
																	<option value="Argentina(+54)">Argentina(+54)
																	</option>
																	<option value="Armenia(+374)">Armenia(+374)</option>
																	<option value="Aruba(+297)">Aruba(+297)</option>
																	<option value="Australia(+61)">Australia(+61)
																	</option>
																	<option value="Austria(+43)">Austria(+43)</option>
																	<option value="Azerbaijan(+994)">
																		Azerbaijan(+994)
																	</option>
																	<option value="Bahamas(+1242)">Bahamas(+1242)
																	</option>
																	<option value="Bahrain(+973)">Bahrain(+973)</option>
																	<option value="Bangladesh(+880)">
																		Bangladesh(+880)
																	</option>
																	<option value="Barbados(+1246)">
																		Barbados(+1246)
																	</option>
																	<option value="Belarus(+375)">Belarus(+375)</option>
																	<option value="Belgium(+32)">Belgium(+32)</option>
																	<option value="Belize(+501)">Belize(+501)</option>
																	<option value="Benin(+229)">Benin(+229)</option>
																	<option value="Bermuda(+1441)">Bermuda(+1441)
																	</option>
																	<option value="Bhutan(+975)">Bhutan(+975)</option>
																	<option value="Bolivia(+591)">Bolivia(+591)</option>
																	<option value="Bosnia and Herzegovina(+387)">
																		Bosnia and Herzegovina(+387)
																	</option>
																	<option value="Botswana(+267)">Botswana(+267)
																	</option>
																	<option value="Bouvet Island(+0)">Bouvet
																		Island(+0)
																	</option>
																	<option value="Brazil(+55)">Brazil(+55)</option>
																	<option
																		value="British Indian Ocean Territory(+246)">
																		British Indian Ocean Territory(+246)
																	</option>
																	<option value="Brunei Darussalam(+673)">Brunei
																		Darussalam(+673)
																	</option>
																	<option value="Bulgaria(+359)">Bulgaria(+359)
																	</option>
																	<option value="Burkina Faso(+226)">Burkina
																		Faso(+226)
																	</option>
																	<option value="Burundi(+257)">Burundi(+257)</option>
																	<option value="Cambodia(+855)">Cambodia(+855)
																	</option>
																	<option value="Cameroon(+237)">Cameroon(+237)
																	</option>
																	<option value="Canada(+1)">Canada(+1)</option>
																	<option value="Cape Verde(+238)">Cape
																		Verde(+238)
																	</option>
																	<option value="Cayman Islands(+1345)">Cayman
																		Islands(+1345)
																	</option>
																	<option value="Central African Republic(+236)">
																		Central African Republic(+236)
																	</option>
																	<option value="Chad(+235)">Chad(+235)</option>
																	<option value="Chile(+56)">Chile(+56)</option>
																	<option value="China(+86)">China(+86)</option>
																	<option value="Christmas Island(+61)">Christmas
																		Island(+61)
																	</option>
																	<option value="Cocos (Keeling) Islands(+672)">Cocos
																		(Keeling) Islands(+672)
																	</option>
																	<option value="Colombia(+57)">Colombia(+57)</option>
																	<option value="Comoros(+269)">Comoros(+269)</option>
																	<option value="Congo(+242)">Congo(+242)</option>
																	<option value="Cook Islands(+682)">Cook
																		Islands(+682)
																	</option>
																	<option value="Costa Rica(+506)">Costa
																		Rica(+506)
																	</option>
																	<option value="Cote D&#039;Ivoire(+225)">Cote
																		D'Ivoire(+225)
																	</option>
																	<option value="Croatia(+385)">Croatia(+385)</option>
																	<option value="Cuba(+53)">Cuba(+53)</option>
																	<option value="Cyprus(+357)">Cyprus(+357)</option>
																	<option value="Czech Republic(+420)">Czech
																		Republic(+420)
																	</option>
																	<option value="Denmark(+45)">Denmark(+45)</option>
																	<option value="Djibouti(+253)">Djibouti(+253)
																	</option>
																	<option value="Dominica(+1767)">Dominica(+1767)
																	</option>
																	<option value="Ecuador(+593)">Ecuador(+593)</option>
																	<option value="Egypt(+20)">Egypt(+20)</option>
																	<option value="El Salvador(+503)">El
																		Salvador(+503)
																	</option>
																	<option value="Equatorial Guinea(+240)">Equatorial
																		Guinea(+240)
																	</option>
																	<option value="Eritrea(+291)">Eritrea(+291)</option>
																	<option value="Estonia(+372)">Estonia(+372)</option>
																	<option value="Ethiopia(+251)">Ethiopia(+251)
																	</option>
																	<option value="Fiji(+679)">Fiji(+679)</option>
																	<option value="Finland(+358)">Finland(+358)</option>
																	<option value="France(+33)">France(+33)</option>
																	<option value="Gabon(+241)">Gabon(+241)</option>
																	<option value="Gambia(+220)">Gambia(+220)</option>
																	<option value="Georgia(+995)">Georgia(+995)</option>
																	<option value="Germany(+49)">Germany(+49)</option>
																	<option value="Ghana(+233)">Ghana(+233)</option>
																	<option value="Gibraltar(+350)">
																		Gibraltar(+350)
																	</option>
																	<option value="Greece(+30)">Greece(+30)</option>
																	<option value="Greenland(+299)">
																		Greenland(+299)
																	</option>
																	<option value="Grenada(+1473)">Grenada(+1473)
																	</option>
																	<option value="Guadeloupe(+590)">
																		Guadeloupe(+590)
																	</option>
																	<option value="Guam(+1671)">Guam(+1671)</option>
																	<option value="Guatemala(+502)">
																		Guatemala(+502)
																	</option>
																	<option value="Guinea(+224)">Guinea(+224)</option>
																	<option value="Guinea-Bissau(+245)">
																		Guinea-Bissau(+245)
																	</option>
																	<option value="Guyana(+592)">Guyana(+592)</option>
																	<option value="Haiti(+509)">Haiti(+509)</option>
																	<option
																		value="Heard Island and Mcdonald Islands(+0)">
																		Heard Island and Mcdonald Islands(+0)
																	</option>
																	<option value="Holy See (Vatican City State)(+39)">
																		Holy See (Vatican City State)(+39)
																	</option>
																	<option value="Honduras(+504)">Honduras(+504)
																	</option>
																	<option value="Hong Kong(+852)">Hong
																		Kong(+852)
																	</option>
																	<option value="Hungary(+36)">Hungary(+36)</option>
																	<option value="Iceland(+354)">Iceland(+354)</option>
																	<option value="India(+91)">India(+91)</option>
																	<option value="Indonesia(+62)">Indonesia(+62)
																	</option>
																	<option value="Iran, Islamic Republic of(+98)">
																		Iran, Islamic Republic of(+98)
																	</option>
																	<option value="Iraq(+964)">Iraq(+964)</option>
																	<option value="Ireland(+353)">Ireland(+353)</option>
																	<option value="Israel(+972)">Israel(+972)</option>
																	<option value="Italy(+39)">Italy(+39)</option>
																	<option value="Jamaica(+1876)">Jamaica(+1876)
																	</option>
																	<option value="Japan(+81)">Japan(+81)</option>
																	<option value="Jordan(+962)">Jordan(+962)</option>
																	<option value="Kazakhstan(+7)">Kazakhstan(+7)
																	</option>
																	<option value="Kenya(+254)">Kenya(+254)</option>
																	<option value="Kiribati(+686)">Kiribati(+686)
																	</option>
																	<option value="Korea (+850)">Korea (+850)</option>
																	<option value="Korea, Republic of(+82)">Korea,
																		Republic of(+82)
																	</option>
																	<option value="Kuwait(+965)">Kuwait(+965)</option>
																	<option value="Kyrgyzstan(+996)">
																		Kyrgyzstan(+996)
																	</option>
																	<option
																		value="Lao People&#039;s Democratic Republic(+856)">
																		Lao People's Democratic Republic(+856)
																	</option>
																	<option value="Latvia(+371)">Latvia(+371)</option>
																	<option value="Lebanon(+961)">Lebanon(+961)</option>
																	<option value="Lesotho(+266)">Lesotho(+266)</option>
																	<option value="Liberia(+231)">Liberia(+231)</option>
																	<option value="Libyan Arab Jamahiriya(+218)">
																		Libyan Arab Jamahiriya(+218)
																	</option>
																	<option value="Liechtenstein(+423)">
																		Liechtenstein(+423)
																	</option>
																	<option value="Lithuania(+370)">
																		Lithuania(+370)
																	</option>
																	<option value="Luxembourg(+352)">
																		Luxembourg(+352)
																	</option>
																	<option value="Macao(+853)">Macao(+853)</option>
																	<option
																		value="Macedonia, the Former Yugoslav Republic of(+389)">
																		Macedonia, the Former Yugoslav Republic
																		of(+389)
																	</option>
																	<option value="Madagascar(+261)">
																		Madagascar(+261)
																	</option>
																	<option value="Malawi(+265)">Malawi(+265)</option>
																	<option value="Malaysia(+60)">Malaysia(+60)</option>
																	<option value="Maldives(+960)">Maldives(+960)
																	</option>
																	<option value="Mali(+223)">Mali(+223)</option>
																	<option value="Malta(+356)">Malta(+356)</option>
																	<option value="Marshall Islands(+692)">Marshall
																		Islands(+692)
																	</option>
																	<option value="Martinique(+596)">
																		Martinique(+596)
																	</option>
																	<option value="Mauritania(+222)">
																		Mauritania(+222)
																	</option>
																	<option value="Mauritius(+230)">
																		Mauritius(+230)
																	</option>
																	<option value="Mayotte(+269)">Mayotte(+269)</option>
																	<option value="Mexico(+52)">Mexico(+52)</option>
																	<option
																		value="Micronesia, Federated States of(+691)">
																		Micronesia, Federated States of(+691)
																	</option>
																	<option value="Moldova, Republic of(+373)">
																		Moldova, Republic of(+373)
																	</option>
																	<option value="Monaco(+377)">Monaco(+377)</option>
																	<option value="Mongolia(+976)">Mongolia(+976)
																	</option>
																	<option value="Montserrat(+1664)">
																		Montserrat(+1664)
																	</option>
																	<option value="Morocco(+212)">Morocco(+212)</option>
																	<option value="Mozambique(+258)">
																		Mozambique(+258)
																	</option>
																	<option value="Myanmar(+95)">Myanmar(+95)</option>
																	<option value="Namibia(+264)">Namibia(+264)</option>
																	<option value="Nauru(+674)">Nauru(+674)</option>
																	<option value="Nepal(+977)">Nepal(+977)</option>
																	<option value="Netherlands(+31)">
																		Netherlands(+31)
																	</option>
																	<option value="Netherlands Antilles(+599)">
																		Netherlands Antilles(+599)
																	</option>
																	<option value="New Caledonia(+687)">New
																		Caledonia(+687)
																	</option>
																	<option value="New Zealand(+64)">New
																		Zealand(+64)
																	</option>
																	<option value="Nicaragua(+505)">
																		Nicaragua(+505)
																	</option>
																	<option value="Niger(+227)">Niger(+227)</option>
																	<option value="Nigeria(+234)">Nigeria(+234)</option>
																	<option value="Niue(+683)">Niue(+683)</option>
																	<option value="Norfolk Island(+672)">Norfolk
																		Island(+672)
																	</option>
																	<option value="Northern Mariana Islands(+1670)">
																		Northern Mariana Islands(+1670)
																	</option>
																	<option value="Norway(+47)">Norway(+47)</option>
																	<option value="Oman(+968)">Oman(+968)</option>
																	<option value="Pakistan(+92)">Pakistan(+92)</option>
																	<option value="Palau(+680)">Palau(+680)</option>
																	<option
																		value="Palestinian Territory, Occupied(+970)">
																		Palestinian Territory, Occupied(+970)
																	</option>
																	<option value="Panama(+507)">Panama(+507)</option>
																	<option value="Papua New Guinea(+675)">Papua New
																		Guinea(+675)
																	</option>
																	<option value="Paraguay(+595)">Paraguay(+595)
																	</option>
																	<option value="Peru(+51)">Peru(+51)</option>
																	<option value="Philippines(+63)">
																		Philippines(+63)
																	</option>
																	<option value="Pitcairn(+0)">Pitcairn(+0)</option>
																	<option value="Poland(+48)">Poland(+48)</option>
																	<option value="Portugal(+351)">Portugal(+351)
																	</option>
																	<option value="Puerto Rico(+1787)">Puerto
																		Rico(+1787)
																	</option>
																	<option value="Qatar(+974)">Qatar(+974)</option>
																	<option value="Reunion(+262)">Reunion(+262)</option>
																	<option value="Romania(+40)">Romania(+40)</option>
																	<option value="Russian Federation(+70)">Russian
																		Federation(+70)
																	</option>
																	<option value="Rwanda(+250)">Rwanda(+250)</option>
																	<option value="Saint Helena(+290)">Saint
																		Helena(+290)
																	</option>
																	<option value="Saint Kitts and Nevis(+1869)">
																		Saint Kitts and Nevis(+1869)
																	</option>
																	<option value="Saint Lucia(+1758)">Saint
																		Lucia(+1758)
																	</option>
																	<option value="Saint Pierre and Miquelon(+508)">
																		Saint Pierre and Miquelon(+508)
																	</option>
																	<option
																		value="Saint Vincent and the Grenadines(+1784)">
																		Saint Vincent and the Grenadines(+1784)
																	</option>
																	<option value="Samoa(+684)">Samoa(+684)</option>
																	<option value="San Marino(+378)">San
																		Marino(+378)
																	</option>
																	<option value="Sao Tome and Principe(+239)">Sao
																		Tome and Principe(+239)
																	</option>
																	<option value="Saudi Arabia(+966)">Saudi
																		Arabia(+966)
																	</option>
																	<option value="Senegal(+221)">Senegal(+221)</option>
																	<option value="Serbia and Montenegro(+381)">
																		Serbia and Montenegro(+381)
																	</option>
																	<option value="Seychelles(+248)">
																		Seychelles(+248)
																	</option>
																	<option value="Sierra Leone(+232)">Sierra
																		Leone(+232)
																	</option>
																	<option value="Singapore(+65)">Singapore(+65)
																	</option>
																	<option value="Slovakia(+421)">Slovakia(+421)
																	</option>
																	<option value="Slovenia(+386)">Slovenia(+386)
																	</option>
																	<option value="Solomon Islands(+677)">Solomon
																		Islands(+677)
																	</option>
																	<option value="Somalia(+252)">Somalia(+252)</option>
																	<option value="South Africa(+27)">South
																		Africa(+27)
																	</option>
																	<option
																		value="South Georgia and the South Sandwich Islands(+0)">
																		South Georgia and the South Sandwich
																		Islands(+0)
																	</option>
																	<option value="Spain(+34)">Spain(+34)</option>
																	<option value="Sri Lanka(+94)">Sri Lanka(+94)
																	</option>
																	<option value="Sudan(+249)">Sudan(+249)</option>
																	<option value="Suriname(+597)">Suriname(+597)
																	</option>
																	<option value="Svalbard and Jan Mayen(+47)">
																		Svalbard and Jan Mayen(+47)
																	</option>
																	<option value="Swaziland(+268)">
																		Swaziland(+268)
																	</option>
																	<option value="Sweden(+46)">Sweden(+46)</option>
																	<option value="Switzerland(+41)">
																		Switzerland(+41)
																	</option>
																	<option value="Syrian Arab Republic(+963)">
																		Syrian Arab Republic(+963)
																	</option>
																	<option value="Taiwan, Province of China(+886)">
																		Taiwan, Province of China(+886)
																	</option>
																	<option value="Tajikistan(+992)">
																		Tajikistan(+992)
																	</option>
																	<option value="Tanzania, United Republic of(+255)">
																		Tanzania, United Republic of(+255)
																	</option>
																	<option value="Thailand(+66)">Thailand(+66)</option>
																	<option value="Timor-Leste(+670)">
																		Timor-Leste(+670)
																	</option>
																	<option value="Togo(+228)">Togo(+228)</option>
																	<option value="Tokelau(+690)">Tokelau(+690)</option>
																	<option value="Tonga(+676)">Tonga(+676)</option>
																	<option value="Trinidad and Tobago(+1868)">
																		Trinidad and Tobago(+1868)
																	</option>
																	<option value="Tunisia(+216)">Tunisia(+216)</option>
																	<option value="Turkey(+90)">Turkey(+90)</option>
																	<option value="Turkmenistan(+7370)">
																		Turkmenistan(+7370)
																	</option>
																	<option value="Turks and Caicos Islands(+1649)">
																		Turks and Caicos Islands(+1649)
																	</option>
																	<option value="Tuvalu(+688)">Tuvalu(+688)</option>
																	<option value="Uganda(+256)">Uganda(+256)</option>
																	<option value="Ukraine(+380)">Ukraine(+380)</option>
																	<option value="United Arab Emirates(+971)">
																		United Arab Emirates(+971)
																	</option>
																	<option value="United Kingdom(+44)">United
																		Kingdom(+44)
																	</option>
																	<option value="United States(+1)">United
																		States(+1)
																	</option>
																	<option
																		value="United States Minor Outlying Islands(+1)">
																		United States Minor Outlying Islands(+1)
																	</option>
																	<option value="Uruguay(+598)">Uruguay(+598)</option>
																	<option value="Uzbekistan(+998)">
																		Uzbekistan(+998)
																	</option>
																	<option value="Vanuatu(+678)">Vanuatu(+678)</option>
																	<option value="Venezuela(+58)">Venezuela(+58)
																	</option>
																	<option value="Viet Nam(+84)">Viet Nam(+84)</option>
																	<option value="Virgin Islands, British(+1284)">
																		Virgin Islands, British(+1284)
																	</option>
																	<option value="Virgin Islands, U.s.(+1340)">
																		Virgin Islands, U.s.(+1340)
																	</option>
																	<option value="Wallis and Futuna(+681)">Wallis
																		and Futuna(+681)
																	</option>
																	<option value="Western Sahara(+212)">Western
																		Sahara(+212)
																	</option>
																	<option value="Yemen(+967)">Yemen(+967)</option>
																	<option value="Zambia(+260)">Zambia(+260)</option>
																	<option value="Zimbabwe(+263)">Zimbabwe(+263)
																	</option>


																</select>

															</div>
														</div>

														<div class="col-lg-6">

															<div class="form-group-input-wrapper" id="emailField">
																<div class="form-group-phone-wrapper">
																	<span class="phone-code-label">@</span>
																	<input
																		class="form-control ng-untouched ng-pristine ng-invalid"
																		id="email" name="email" placeholder="Email"
																		type="email">
																</div>
															</div>

															<div class="form-group-input-wrapper" id="phoneField"
																 style="display:none">
																<div class="form-group-phone-wrapper">
																	<span class="phone-code-label">+88</span>
																	<input
																		class="form-control ng-untouched ng-pristine ng-invalid"
																		id="phone" name="phone" placeholder="Phone"
																		type="text">
																</div>
															</div>

															<!-- <div id="errorDiv"></div> -->

														</div>

														<!-- get code area -->
														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<div class="form-group-input-password-wrapper">
																	<input class="form-control" id="password"
																		   name="password" placeholder="Password"
																		   type="password">
																</div>
																<span
																	class="input-validation d-none">Password required</span>
															</div>
														</div>

														<div class="col-lg-6">

															<div class="form-group-input-wrapper" id="varCodeBtn">
																<input id="varCode" class="form-control btn"
																	   type="button" value="Send Verification Code"
																	   style="background-color:red">
															</div>

															<span id="varMessage" style="color:yellow"></span>

														</div>
														<!-- end -->


														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<div class="form-group-input-password-wrapper">
																	<input class="form-control" name="confirm_password"
																		   placeholder="Confirm Password" required=""
																		   type="password">
																</div>
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<input class="form-control" name="otp_code"
																	   placeholder="Verification Code" required=""
																	   type="text">
															</div>
														</div>

														<div class="col-lg-6">
															<div class="form-group-input-wrapper">
																<input
																	class="form-control ng-untouched ng-pristine ng-valid"
																	id="fgr_sponsorname" name="sponsorname"
																	placeholder="Sponsorname (optional)" type="text">
															</div>
														</div>

														<!-- <div class="col-lg-6">

															<div class="form-group-input-wrapper">
																<input class="form-control btn" type="button" value="Confirm" style="background-color:green">
															</div>

														</div> -->

													</div>
													<div class="rs-other-info termes-policy">
                                <span class="text-center"> By clicking "Register" I agree to Betscore24
                                    <a href="">Terms of Service</a>. and <a href="">Privacy Policy</a>.
                                </span>
													</div>
													<div class="rs-submit">
														<input name="submit" type="submit" value="Register">
													</div>
												</form>

												<div class="dropdown-divider"></div>
												<div class="rs-other-info py-3">
                            <span class="text-center"> Already have an account?
                                <span class="rs-link rs-sign-in-link">
                                    <a href="<?php echo base_url('login'); ?>">Sign In</a>
                                </span>
                            </span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</perfect-scrollbar>

			<!-- Right sidebar -->
			<?php include(APPPATH . "views/right_sidebar.php"); ?>

		</div>
	</section>
</app-game-content-area>

<?php include(APPPATH . "views/customer/footer.php"); ?>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

<script>

	$().ready(function () {

		$(".radionBtn").on("change", function () {
			var radioValue = $("input[name='verified_by']:checked").val();

			if (radioValue == 'phone') {
				$("#emailField").hide();
				$("#phoneField").show();
				$("label#email-error").remove();
			} else if (radioValue == 'email') {
				$("#phoneField").hide();
				$("#emailField").show();
				$("label#phone-error").remove();
			}
			console.log($("input[name='verified_by']:checked").val());
		});

		jQuery.validator.addMethod("validateEmail", function (value, element) {
			var emailReg = /^([\w-\.]+@@([\w-]+\.)+[\w-]{2,4})?$/;
			return emailReg.test(value);
		}, 'Please enter a valid email address.');

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			errorPlacement: function (error, element) {
				if (element.attr("name") == "email" || element.attr("name") == "phone") {
					error.insertAfter("#errorDiv");
				} else {
					error.insertAfter(element);
				}
			},

			rules: {
				full_name: "required",
				country: "required",
				otp_code: "required",
				club_id: "required",
				sponsorname: "required",
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},

			},
			messages: {
				full_name: "Please enter your full name",
				otp_code: "Verificatio code is required",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
			},
			/*submitHandler: function(e) {

			}*/
		});

		// send verification code
		function isValidEmailAddress(emailAddress) {
			var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
			return pattern.test(emailAddress);
		}

		$("#varCode").on("click", function () {

			var radioValue = $("input[name='verified_by']:checked").val();
			var emailData = $("input[name='email']").val();
			var phoneData = $("input[name='phone']").val();
			var url_prefix = "<?php echo base_url(); ?>";
			var user_data = "";

			if (radioValue == 'phone') {
				if (!$.isNumeric(phoneData)) {
					alert("Please enter a valid phone number");
					return;
				}

				if (phoneData.length != 11) {
					alert("Please enter a 11 digit phone number");
					return;
				}
				user_data = phoneData;
			} else if (radioValue == 'email') {
				if (!isValidEmailAddress(emailData)) {
					alert("Invalid email address");
					return;
				}
				user_data = emailData;
			}
			//alert("All ok");

			// ajax request
			$.ajax({
				type: "POST",
				url: url_prefix + 'get_registration_var_code',
				data: {
					verified_by: radioValue,
					user_data: user_data
				},
				success: function (data) {
					var my_data = JSON.parse(data);
					//$("#total_price").text("$"+my_data.tot_pricing);
					if (my_data.success == 1) {
						$("#varCodeBtn").remove();
					}
					$("#varMessage").text(my_data.message);
					console.log(my_data);
				}
			});

		});

	});

</script>
