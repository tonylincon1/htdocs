<?php
date_default_timezone_set('America/Araguaina');
if(!defined('INITIALIZED'))
	exit;
	
if(!$logged)
	if($action == "logout")
		$main_content .= '
			<div class="TableContainer" >  
				<table class="Table1" cellpadding="0" cellspacing="0" >    
					<div class="CaptionContainer" >      
						<div class="CaptionInnerContainer" >        
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
							<div class="Text" >Logout Successful</div>        
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      
						</div>    
					</div>    
					<tr>      
						<td>        
							<div class="InnerTableContainer" >          
								<table style="width:100%;" >
									<tr>
										<td>You have logged out of your '.htmlspecialchars($config['server']['serverName']).' account. In order to view your account you need to <a href="?subtopic=accountmanagement" >log in</a> again.</td>
									</tr>          
								</table>        
							</div>
						</td>
					</tr>  
				</table>
			</div>';
	else
	{
		$passB = '<span>Password:</span>';
		$logB = '<span>Account Name:</span>';
		if(isset($isTryingToLogin))
		{
			$main_content .= '
				<div class="SmallBox" >
					<div class="MessageContainer" >
						<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						<div class="ErrorMessage" >
							<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
							<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
							<div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div>
							<b>The Following Errors Have Occurred:</b><br/>';
			switch(Visitor::getLoginState())
			{
				case Visitor::LOGINSTATE_NO_ACCOUNT:
					$main_content .= 'Account with that name doesn\'t exist.<br/>';
					$logB = '<span style="color:red;">Account Name:</span>';
					break;
				case Visitor::LOGINSTATE_WRONG_PASSWORD:
					$main_content .= 'Wrong password to account.<br/>';
					$passB = '<span style="color:red;">Password:</span>';
					break;
			}
				$main_content .= '
					</div>
						<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" />
					</div>
				</div>
			</div><br/>';
		}
		$main_content .= '
			<form action="?subtopic=accountmanagement" method="post" style="margin: 0px; padding: 0px;">
				<div class="TableContainer" >
					<table class="Table4" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
								<div class="Text" >Account Login</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span> 
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td>
																	<table style="float: left; width: 370px;" cellpadding="0" cellspacing="0" >
																		<tr>
																			<td class="LabelV120" ><span>'.$logB.'</span></td>
																			<td><input type="password" name="account_login" size="35" maxlength="30" ></td>
																		</tr>
																		<tr>
																			<td class="LabelV120" ><span>'.$passB.'</span></td>
																			<td><input type="password" name="password_login" size="35" maxlength="29" ></td>
																		</tr>
																	</table>
																	<div style="float: right; font-size: 1px;" >
																		<input type="hidden" name="page" value="overview" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Login" alt="Login" src="'.$layout_name.'/images/buttons/_sbutton_login.gif" >
																				</div>
																			</div>
																		</form>
																		<div style="width: 2px; height: 2px;" ></div>
																		<form action="/?subtopic=lostaccount" method="post" style="padding:0px;margin:0px;" >
																			<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																					<input class="ButtonText" type="image" name="Account lost?" alt="Account lost?" src="'.$layout_name.'/images/buttons/_sbutton_accountlost.gif" >
																				</div>
																			</div>
																		</form>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>
				<br/>
				<center>
					<h1>Crie sua conta no '.$config['server']['serverName'].'</h1>
				</center>
				<div class="TableContainer" >
					<table class="Table4" cellpadding="0" cellspacing="0" >
						<div class="CaptionContainer" >
							<div class="CaptionInnerContainer" > 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>							
								<div class="Text" >Novos Players</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							</div>
						</div>
						<tr>
							<td>
								<div class="InnerTableContainer" >
									<table style="width:100%;" >
										<tr>
											<td>
												<div class="TableShadowContainerRightTop" >
													<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
												</div>
												<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >
													<div class="TableContentContainer" >
														<table class="TableContent" width="100%"  style="border:1px solid #faf0d7;" >
															<tr>
																<td >
																	<div style="float: right; margin-top: 20px;" >
																		<form class="MediumButtonForm" action="/?subtopic=createaccount" method="post" >
																			<div class="MediumButtonBackground" style="background-image:url('.$layout_name.'/images/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url('.$layout_name.'/images/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div>
																				<input class="MediumButtonText" type="image" name="Create Account" alt="Create Account" src="'.$layout_name.'/images/buttons/mediumbutton_createaccount.png" />
																			</div>
																		</form>
																	</div>
																	<div id="LoginCreateAccountBox" >
																		<p><b>'.$config['server']['serverName'].'...</b></p>
																		<div style="margin-left: 10px;" >
																			<p>Mapa proprio...</p>
																			<p>Explore quests, tasks, hunts e wars...</p>
																			<p>Totalmente dedicado a voce!</p>
																		</div>
																	</div>
														</table>
													</div>
												</div>
												<div class="TableShadowContainer" >
													<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >
														<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>
														<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</table>
						</div>
					</td>
				</tr>';
	}
else
{
	
	
	//Here start our new accountmanagement ;D
	if($action == "")
	{
		if($account_logged->getCustomField('vip_time') > 0)
			$account_statusOver = '
				<span class="green">
					<span class="BigBoldText">VIP Account</span>
				</span>';
		else
			$account_statusOver = '
				<span class="red">
					<span class="BigBoldText">Free Account</span>
				</span>';
				
		if($account_logged->getCustomField('vip_time') > 0)
			$account_statusPic = '<img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_green.gif" alt="free account">';
		else
			$account_statusPic = '<img class="AccountStatusImage" src="'.$layout_name.'/images/account/account-status_red.gif" alt="free account">';
			
		$main_content .= '
			<center>
				<table>
					<tbody>
						<tr>
							<td><img src="'.$layout_name.'/images/content/headline-bracer-left.gif"></td>
							<td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;">Welcome to your account '.$account_logged->getRLName().'!<br></td>
							<td><img src="'.$layout_name.'/images/content/headline-bracer-right.gif"></td>
						</tr>
					</tbody>
				</table>
			</center>
			<br>';
		$main_content .= '
			<div class="TableContainer">
				<div class="CaptionContainer">
					<div class="CaptionInnerContainer"> 
						<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
						<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
						<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span> 
						<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
						<div class="Text">Account Status</div>
						<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span> 
						<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span> 
						<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
						<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
					</div>
				</div>
				<table class="Table5" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td>
								<div class="InnerTableContainer">
									<table style="width:100%;">
										<tbody>
											<tr>
												<td>
													<div class="TableShadowContainerRightTop">
														<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);"></div>
													</div>
													<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);">
														<div class="TableContentContainer">
															<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																<tbody>
																	<tr>
																		<td>'.$account_statusPic.'</td>
																		<td width="100%" valign="middle">
																			'.$account_statusOver.'';
																		$main_content .= '
																			<small><br>Your VIP time expires at <font style="text-transform:capitalize;">'.date('d/m/Y, H:i:s', $account_logged->getCustomField('vip_time')).'</font></small>';
																		$main_content .= '
																		</td>
																		<td>
																			<form action="?subtopic=accountmanagement&action=manage" method="post" style="padding:0px;margin:0px;">
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);">
																						</div>
																						<input class="ButtonText" type="image" name="Manage Account" alt="Manage Account" src="'.$layout_name.'/images/buttons/_sbutton_manageaccount.gif">
																					</div>
																				</div>
																			</form>
																			<div style="font-size:1px;height:4px;"></div>
																				<form action="?subtopic=doacao" method="post" style="padding:0px;margin:0px;">
										
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_green_over.gif);"></div>																			</div>
																					</div>
																				</form>
																				<div style="font-size:1px;height:4px;"></div>
																				<form action="?subtopic=accountmanagement&action=logout" method="post" style="padding:0px;margin:0px;">
																					<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton_red.gif)">
																						<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_red_over.gif);"></div>
																							<input class="ButtonText" type="image" name="Logout" alt="Logout" src="'.$layout_name.'/images/buttons/_sbutton_logout.gif">
																						</div>
																					</div>
																				</form>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="TableShadowContainer">
															<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);">
															<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);"></div>
															<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);"></div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>';
			//REGISTRAR
			$account_reckey = $account_logged->getCustomField("key");
			if(empty($account_reckey))
			$main_content .= '
				<div class="SmallBox" >
					<div class="MessageContainer" >
						<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
						<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						<div class="Message" >
							<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
							<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
							<table class="HintBox" >
								<tr>
									<td>
										<div class="BoxButtons" >
											<form action="?subtopic=accountmanagement&action=registeraccount" method="post" style="padding:0px;margin:0px;" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
														<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Register Account" alt="Register Account" src="'.$layout_name.'/images/buttons/_sbutton_registeraccount.gif" >
													</div>
												</div>
											</form>
											<div style="font-size:1px;height:4px;" ></div>
										</div>
										<p><b>Your account is not registered!</b></p>
										<p>You need to click here to register your account and receive your recovery key. Please take carefull your Recovery Key.</p>
										<p>In case you have lost your Recovery Key, you can request the new recovery key for your account again.</p>
									</td>
								<tr>
							</table>
						</div>
						<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
							<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
						</div>
					</div><br/>
			';
			//CHARACTERS
			$main_content .= '
				<div class="RowsWithOverEffect">
					<div class="TableContainer">
						<div class="CaptionContainer">
							<div class="CaptionInnerContainer"> 
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span> 
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span>
								<div class="Text">Characters</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></span> 
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);"></span> 
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></span> 
							</div>
						</div>
						<table class="Table3" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td>
										<div class="InnerTableContainer">
											<table style="width:100%;">
												<tbody>
													<tr>
														<td>
															<div class="TableShadowContainerRightTop">
																<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);"></div>
															</div>
															<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);">
																<div class="TableContentContainer">
																	<table class="TableContent" width="100%" style="border:1px solid #faf0d7;">
																		<tbody>
																			<tr class="LabelH">
																				<td></td>
																				<td style="width:40%;">Name</td>
																				<td style="width:120px!important;">World</td>
																				<td style="width:90px!important;">Status</td>
																				<td style="width:90px!important;">&nbsp;</td>
																			</tr>';
																			
																	$account_players = $account_logged->getPlayersList();
																	//show list of players on account
																	$var = 0;
																	foreach($account_players as $account_player)
																		{
																			$player_number_counter++;
																			if($var==0) {
																					$preview = ' previewstate="0"';
																			} else {
																					$preview = '';
																			}
																			
																			if($var==0) {
																				$display = 'block';
																			} else {
																				$display = 'none';
																			}
																			
																			if($var==0) {
																				$displayNum = 'none';
																			} else {
																				$displayNum = 'inline';
																			}
																			
																			if($var==0) {
																				$displayBold = 'bold';
																			} else {
																				$displayBold = 'normal';
																			}
																			
																			if($var==0) {
																				$displayFont = '13';
																			} else {
																				$displayFont = '10';
																			}
																			
																			$main_content .='
																			<tr id="CharacterRow_'.$player_number_counter.'" 
																				onmouseover="InRowWithOverEffect(&#39;CharacterRow_'.$player_number_counter.'&#39;,';
																				
																				if(is_int($player_number_counter / 2))
																					$main_content .= '&#39;#e7d1af&#39;';
																				else
																					$main_content .= '&#39;#ffedd1&#39;'; 
																				
																				
																				$main_content .='
																				);"
																				onmouseout="OutRowWithOverEffect(&#39;CharacterRow_'.$player_number_counter.'&#39;,'; 
																				
																				if(is_int($player_number_counter / 2))
																					$main_content .= '&#39;#d5c0a1&#39;';
																				else
																					$main_content .= '&#39;#f1e0c6&#39;';																				
																				
																				$main_content .='
																				);" 
																				onclick="FocusCharacter('.$player_number_counter.', &#39;'.urlencode($account_player->getName()).'&#39;, '.$config['site']['max_players_per_account'].');" 
																				class="Odd" style="font-weight: '.$displayBold.';';
																				
																				if(is_int($player_number_counter / 2))
																					$main_content .= 'background-color: #d5c0a1;">';
																				else
																					$main_content .= 'background-color: #f1e0c6;">';
																				
																				$main_content .='
																				<td style="width:40px;text-align:center;padding:2px;">
																					<span id="CharacterNumberOf_'.$player_number_counter.'" style="display: '.$displayNum.';">'.$player_number_counter.'.</span>
																					<span id="PlayButtonOf_'.$player_number_counter.'" style="display: '.$display.';">
																						<span name="FlashClientPlayButton" id="FlashClientPlayButton" playlink="#" ' . $preview . '>';
																						
																						if($account_player->isDeleted())
																							{
																								$main_content .= '<img style="border:0px;" src="'.$layout_name.'/images/account/play-not-button.gif">';
																							} else {
																								$main_content .= '
																								<a href="#" >
																									<img style="border:0px;" onmouseover="InMiniButton(this, &#39;&#39;);" onmouseout="OutMiniButton(this, &#39;&#39;);" src="'.$layout_name.'/images/account/play-button.gif">
																								</a>';
																							}
																							
																						$main_content .='
																						</span>
																					</span>
																				</td>
																				<td id="CharacterCell2_'.$player_number_counter.'">
																					<span style="white-space:nowrap;vertical-align:middle;">
																						<span id="CharacterNameOf_'.$player_number_counter.'" style="font-size: '.$displayFont.'pt;">'.htmlspecialchars($account_player->getName()).'</span><br>
																						<span id="CharacterNameOf_'.$player_number_counter.'"><small>'.htmlspecialchars($vocation_name[$account_player->getPromotion()][$account_player->getVocation()]).' - Level '.$account_player->getLevel().'</small></span>
																					</span>
																				</td>
																				<td id="CharacterCell2_'.$player_number_counter.'">
																					<span style="white-space:nowrap;">'.htmlspecialchars($config['server']['serverName']).'</span>
																				</td>
																				<td id="CharacterCell3_'.$player_number_counter.'">';
																					if(!$account_player->isOnline())
																						$main_content .= '';
																					else
																						$main_content .= '<font color="#00CD00"><b>online</b></font>';
																					if($account_player->isDeleted())
																						{
																							$main_content .= 'deleted';
																						}
																				$main_content .='
																				</td>
																				<td id="CharacterCell4_'.$player_number_counter.'" style="text-align:center;">
																					<span id="CharacterOptionsOf_'.$player_number_counter.'" style="display: '.$display.';">
																						<span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=changecomment&name='.urlencode($account_player->getName()).'">Edit</a>]</span>';
																						if($account_player->isDeleted())
																						{
																							$main_content .= '<br><span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=undelete&name='.urlencode($account_player->getName()).'">Undelete</a>]</span>';
																						} else {
																							$main_content .= '<br><span style="font-weight:normal;">[<a href="?subtopic=accountmanagement&action=deletecharacter&name='.urlencode($account_player->getName()).'">Delete</a>]</span>';
																						}
																						
																					$main_content .= '
																					</span>
																				</td>
																			</tr>';
																			$var++;
																		}																		
																		$main_content .='
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="TableShadowContainer">
																<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);">
																	<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);"></div>
																	<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);"></div>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0">
																<tbody>
																	<tr>
																		<td></td>
																		<td align="right" style="padding-right:7px;width:100%;">
																			<form action="?subtopic=accountmanagement&action=createcharacter" method="post" style="padding:0px;margin:0px;">
																				<input type="hidden" name="selectedcharacter" value="Draz Mytos">
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)">
																					<div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);"></div>
																						<input class="ButtonText" type="image" name="Create Character" alt="Create Character" src="'.$layout_name.'/images/buttons/_sbutton_createcharacter.gif">
																					</div>
																				</div>
																			</form>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<br><br>';
				//MIGRATION TOOL ;D
				if($group_id_of_acc_logged >= $config['site']['access_admin_panel']){
				$main_content .= '
					<div class="SmallBox">
						<div class="MessageContainer">
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="Message">
								<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></div>
								<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></div>
								<table class="HintBox">
									<tbody>
										<tr>
											<td>
												<p><b>Admin Panel</b></p>
												<p>Click <a href="?subtopic=cpanel">here</a> to go your new <strong>Admin Panel</strong></p>
											</td>
										</tr>
										<tr></tr>
									</tbody>
								</table>
							</div>
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
						</div>
					</div>
					<br>';
				}else{
					$main_content .= '
					<div class="SmallBox">
						<div class="MessageContainer">
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="Message">
								<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></div>
								<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);"></div>
								<table class="HintBox">
									<tbody>
										<tr>
											<td>
												<p><b>Small Server</b></p>
												<p>O server Small RPG e constantemente atualizado para trazer novidades aos jogadores, nele voce vai explorar o "rpg", encontrar "hunts" escondidas e aproveitar o melhor do "pvp"! </p>
											</td>
										</tr>
										<tr></tr>
									</tbody>
								</table>
							</div>
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);"></div>
							<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);"></div>
						</div>
					</div>
					<br>';
				}
	}
	//Here finish our new account management
	
	if($action == "manage")
	{
		$account_reckey = $account_logged->getCustomField("key");
		$dataAtual = time();
		$dataProxima = $account_logged->getCustomField('vip_time');
		$data1 = $dataProxima - $dataAtual;
		$dataCerta = $data1 / 86400;
		if($account_logged->getCustomField('vip_time') > 0)
			$account_status = '<b><font color="#00CD00">VIP Account, '. floor($dataCerta) .' days left</font></b>';
		else
			$account_status = '<b><font color="red">Free Account</font></b>';
		if(empty($account_reckey))
			$account_registred = '<b><font color="red">No</font></b>';
		else
			if($config['site']['generate_new_reckey'] && $config['site']['send_emails'])
				$account_registred = '<b><font color="green">Yes ( <a href="?subtopic=accountmanagement&action=newreckey"> Buy new Rec key </a> )</font></b>';
			else
				$account_registred = '<b><font color="green">Yes</font></b>';
				
		$account_created = $account_logged->getCreateDate();
		$account_email = $account_logged->getEMail();
		$account_email_new_time = $account_logged->getCustomField("email_new_time");
		if($account_email_new_time > 1)
			$account_email_new = $account_logged->getCustomField("email_new");
		$account_rlname = $account_logged->getRLName();
		$account_location = $account_logged->getLocation();
		
		$main_content .= '
			<div class="SmallBox" >
				<div class="MessageContainer" >
					<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
					<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
					<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
					<div class="Message" >
						<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" />
					</div>
					<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
					<table style="width:100%;" >
						<td style="width:100%;text-align:center;" >
							<nobr>[<a href="#General+Information" >General Information</a>]</nobr> 
							<nobr>[<a href="#Registration" >Registration</a>]</nobr> 
						</td>
						<td>
							<form action="?subtopic=doacao" method="post" style="padding:0px;margin:0px;" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >></div>
									</div>
								</div>
							</form>
							<div style="font-size:1px;height:4px;" ></div>
							<table border="0" cellspacing="0" cellpadding="0" >
								<form action="?subtopic=accountmanagement" method="post" >
									<tr>
										<td style="border:0px;" >
											<input type="hidden" name=page value=overview >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Overview" alt="Overview" src="'.$layout_name.'/images/buttons/_sbutton_overview.gif" >
												</div>
											</div>
										</td>
									</tr>
								</form>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>
			<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
			<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>
		</div>
	</div><br/>';
		$main_content .= '
			<a name="General+Information" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >
				<table class="Table3" cellpadding="0" cellspacing="0" >
					<div class="CaptionContainer" >
						<div class="CaptionInnerContainer" > 
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>				
							<div class="Text" >General Information</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span> 
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
						</div>
					</div>
					<tr>		
						<td>		
							<div class="InnerTableContainer" >
								<table style="width:100%;" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >
													<table class="TableContent" width="100%" >
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Account Name:</td>
															<td style="width:90%;" >
																<div style="position:relative;width:100%;" >
																	<span id="DisplayAccountID" >'.str_repeat('*', strlen(htmlspecialchars($account_logged->getName()))).'</span>
																	<span id="MaskedAccountID" style="visibility:hidden;display:none" >'.str_repeat('*', strlen(htmlspecialchars($account_logged->getName()))).'</span>
																	<span id="ReadableAccountID" style="visibility:hidden;display:none" >'.htmlspecialchars($account_logged->getName()).'</span>
																	<img id="ButtonAccountID" onMouseDown="ToggleMaskedText(\'AccountID\');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="'.$layout_name.'/images/general/show.gif" />
																</div>
															</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV" >Email Address:</td>
															<td style="width:90%;" >
																<div style="position:relative;width:100%;" >
																	<span id="DisplayEMail" >'.str_repeat('*', strlen(htmlspecialchars($account_email))).'</span>
																	<span id="MaskedEMail" style="visibility:hidden;display:none" >'.str_repeat('*', strlen(htmlspecialchars($account_email))).'</span>
																	<span id="ReadableEMail" style="visibility:hidden;display:none" >'.htmlspecialchars($account_email).'</span>
																	<img id="ButtonEMail" onMouseDown="ToggleMaskedText(\'EMail\');" style="position:absolute;right:0px;top:2px;cursor:pointer;" src="'.$layout_name.'/images/general/show.gif" />
																</div>
															</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Created:</td>
																<td>'.date("M d Y, G:i:s", $account_created).'</td>
														</tr>
														<tr style="background-color:#F1E0C6;" >
															<td class="LabelV" >Last Login:</td>
															<td>'.date("M d Y, G:i:s", time()).'</td>
														</tr>
														<tr style="background-color:#D4C0A1;" >
															<td class="LabelV" >Account Status:</td>
															<td>'.$account_status;
															if($account_logged->getCustomField('vip_time') <= time()){
																
																$main_content .= '<br/><font style="font-size:8pt">(VIP time expired at ' .date('d/m/Y, H:i:s', $account_logged->getCustomField('vip_time')). ')</font>';
															}else{
																$main_content .= '<br/><font style="font-size:8pt">(VIP time expires at ' .date('d/m/Y, H:i:s', $account_logged->getCustomField('vip_time')). ')</font>';
															}
														$main_content .= '
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="TableShadowContainer" >
												<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >
													<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>
													<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" >
												<tr>
													<td>
														<table border="0" cellspacing="0" cellpadding="0" >
															<form action="?subtopic=accountmanagement&action=changepassword" method="post" >
																<tr>
																	<td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																				<input class="ButtonText" type="image" name="Change Password" alt="Change Password" src="'.$layout_name.'/images/buttons/_sbutton_changepassword.gif" >
																			</div>
																		</div>
																	</td>
																</tr>
															</form>
														</table>
													<td></td>
													<td>
														<table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" >
															<form action="?subtopic=accountmanagement&action=changeemail" method="post" >
																<tr>
																	<td style="border:0px;" ><input type="hidden" name=step value=changename >
																		<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
																			<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																				<input class="ButtonText" type="image" name="Change Email" alt="Rename Account" src="'.$layout_name.'/images/buttons/_sbutton_changeemail.gif" >
																			</div>
																		</div>
																	</td>
																</tr>
															</form>
														</table>
													</td>											
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</table>
					</div>
				</td>
			</tr><br/><br/>'; 
		if($account_email_new_time > 1)
			if($account_email_new_time < time())
				$account_email_change = '<br>(You can accept <b>'.htmlspecialchars($account_email_new).'</b> as a new email.)';
			else
			{
				$account_email_change = ' <br>You can accept <b>new e-mail after '.date("j F Y", $account_email_new_time).".</b>";
				
				$main_content .= '
					<div class="SmallBox" >  
						<div class="MessageContainer" >    
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    
							<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
							<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
							<div class="Message" >      
								<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      
								<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>
								<table>
									<tr>
										<td class="LabelV" >Note:</td>
										<td style="width:100%;" >A request has been submitted to change the email address of this account to <b>'.htmlspecialchars($account_email_new).'</b>. After <b>'.date("j F Y, G:i:s", $account_email_new_time).'</b> you can accept the new email address and finish the process. Please cancel the request if you do not want your email address to be changed! Also cancel the request if you have no access to the new email address!</td>
									</tr>
								</table>
								<div align="center" >
									<table border="0" cellspacing="0" cellpadding="0" >
										<form action="?subtopic=accountmanagement&action=changeemail" method="post" >
											<tr>
												<td style="border:0px;" >
													<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
														<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
															<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
															<input class="ButtonText" type="image" name="Edit" alt="Edit" src="'.$layout_name.'/images/buttons/_sbutton_edit.gif" >
														</div>
													</div>
												</td>
											</tr>
										</form>
									</table>
								</div>    
							</div>    
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    
							<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
							<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  
						</div>
					</div>
				<br/><br/>';
			}
			
		//REGISTRATION
		$main_content .= '
			<a name="Registration" ></a>
			<div class="TopButtonContainer" >
				<div class="TopButton" >
					<a href="#top" >
						<image style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif" />
					</a>
				</div>
			</div>
			<div class="TableContainer" >  
				<table class="Table5" cellpadding="0" cellspacing="0" >    
					<div class="CaptionContainer" >      
						<div class="CaptionInnerContainer" >
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<div class="Text" >Registration</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
						</div>    
					</div>    
					<tr>      
						<td>        
							<div class="InnerTableContainer" >          
								<table style="width:100%;" >
									<tr>
										<td>
											<div class="TableShadowContainerRightTop" >  
												<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
											</div>
											<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >
												<div class="TableContentContainer" >    
													<table class="TableContent" width="100%" >
														<tr>
															<td>
																<table style="width:100%;">
																	<tr>
																		<td class="LabelV" >Real Name:</td>
																		<td style="width:90%;" >'.$account_rlname.'</td>
																	</tr>
																	<tr>
																		<td class="LabelV" >Location:</td>
																		<td style="width:90%;" >'.$account_location.'</td>
																	</tr>
																</table>
															</td>
															<td align=right>
																<table border="0" cellspacing="0" cellpadding="0" >
																	<form action="?subtopic=accountmanagement&action=changeinfo" method="post" >
																		<tr>
																			<td style="border:0px;" >
																				<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
																					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
																						<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																						<input class="ButtonText" type="image" name="Edit" alt="Edit" src="'.$layout_name.'/images/buttons/_sbutton_edit.gif" >
																					</div>
																				</div>
																			</td>
																		</tr>
																	</form>
																</table>
															</td>
														</tr>    
													</table>  
												</div>
											</div>
											<div class="TableShadowContainer" >  
											<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    
												<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    
												<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  
											</div>
										</div>
									</td>
								</tr>          
							</table>        
						</div>  
					</table>
				</div>
			</td>
		</tr><br/>';
	}
//########### CHANGE PASSWORD ##########
	if($action == "changepassword") {
		$new_password = trim($_POST['newpassword']);
		$new_password2 = trim($_POST['newpassword2']);
		$old_password = trim($_POST['oldpassword']);
		if(empty($new_password) && empty($new_password2) && empty($old_password))
		{
			$main_content .= 'Please enter your current password and a new password. For your security, please enter the new password twice.<br/><br/><form action="?subtopic=accountmanagement&action=changepassword" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Change Password</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >New Password:</span></td><td style="width:90%;" ><input type="password" name="newpassword" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >New Password Again:</span></td><td><input type="password" name="newpassword2" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >Current Password:</span></td><td><input type="password" name="oldpassword" size="30" maxlength="29" ></td></tr></table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
		else
		{
			if(empty($new_password) || empty($new_password2) || empty($old_password))
			{
				$show_msgs[] = "Please fill in form.";
			}
			if($new_password != $new_password2)
			{
				$show_msgs[] = "The new passwords do not match!";
			}
			if(empty($show_msgs))
			{
				if(!check_password($new_password))
				{
					$show_msgs[] = "New password contains illegal chars (a-z, A-Z and 0-9 only!) or lenght.";
				}
				if(!$account_logged->isValidPassword($old_password))
				{
					$show_msgs[] = "Current password is incorrect!";
				}
			}
			if(!empty($show_msgs))
			{
				//show errors
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
				foreach($show_msgs as $show_msg) {
					$main_content .= '<li>'.$show_msg;
				}
				$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
				//show form
				$main_content .= 'Please enter your current password and a new password. For your security, please enter the new password twice.<br/><br/><form action="?subtopic=accountmanagement&action=changepassword" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Change Password</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >New Password:</span></td><td style="width:90%;" ><input type="password" name="newpassword" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >New Password Again:</span></td><td><input type="password" name="newpassword2" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >Current Password:</span></td><td><input type="password" name="oldpassword" size="30" maxlength="29" ></td></tr></table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
			else
			{
				$org_pass = $new_password;
				$account_logged->setPassword($new_password);
				$account_logged->save();
				$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Password Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your password has been changed.';
				if($config['site']['send_emails'] && $config['site']['send_mail_when_change_password'])
				{
					$mailBody = '<html>
					<body>
					<h3>Password to account changed!</h3>
					<p>You or someone else changed password to your account on server <a href="'.$config['server']['url'].'"><b>'.htmlspecialchars($config['server']['serverName']).'</b></a>.</p>
					<p>New password: <b>'.htmlspecialchars($org_pass).'</b></p>
					</body>
					</html>';
					$mail = new PHPMailer();
					if ($config['site']['smtp_enabled'])
					{
						$mail->IsSMTP();
						$mail->Host = $config['site']['smtp_host'];
						$mail->Port = (int)$config['site']['smtp_port'];
						$mail->SMTPAuth = $config['site']['smtp_auth'];
						$mail->Username = $config['site']['smtp_user'];
						$mail->Password = $config['site']['smtp_pass'];
					}
					else
						$mail->IsMail();
					$mail->IsHTML(true);
					$mail->From = $config['site']['mail_address'];
					$mail->AddAddress($account_logged->getEMail());
					$mail->Subject = $config['server']['serverName']." - Changed password";
					$mail->Body = $mailBody;
					if($mail->Send())
						$main_content .= '<br /><small>Your new password were send on email address <b>'.htmlspecialchars($account_logged->getEMail()).'</b>.</small>';
					else
						$main_content .= '<br /><small>An error occorred while sending email with password!</small>';
				}
				$main_content .= '</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				$_SESSION['password'] = $new_password;
			}
		}
	}

//############# CHANGE E-MAIL ###################
	if($action == "changeemail")
	{
		$account_email_new_time = $account_logged->getCustomField("email_new_time");
		if($account_email_new_time > 10) {$account_email_new = $account_logged->getCustomField("email_new"); }
		if($account_email_new_time < 10)
		{
			if($_POST['changeemailsave'] == 1)
			{
				$account_email_new = trim($_POST['new_email']);
				$post_password = trim($_POST['password']);
				if(empty($account_email_new))
				{
					$change_email_errors[] = "Please enter your new email address.";
				}
				else
				{
					if(!check_mail($account_email_new))
					{
						$change_email_errors[] = "E-mail address is not correct.";
					}
				}
				if(empty($post_password))
				{
					$change_email_errors[] = "Please enter password to your account.";
				}
				else
				{
					if(!$account_logged->isValidPassword($post_password))
					{
						$change_email_errors[] = "Wrong password to account.";
					}
				}
				if(empty($change_email_errors))
				{
					$account_email_new_time = time() + $config['site']['email_days_to_change'] * 24 * 3600;
					$account_logged->set("email_new", $account_email_new);
					$account_logged->set("email_new_time", $account_email_new_time);
					$account_logged->save();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >New Email Address Requested</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have requested to change your email address to <b>'.htmlspecialchars($account_email_new).'</b>. The actual change will take place after <b>'.date("j F Y, G:i:s", $account_email_new_time).'</b>, during which you can cancel the request at any time.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
				{
					//show errors
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
					foreach($change_email_errors as $change_email_error)
					{
						$main_content .= '<li>'.$change_email_error.'</li>';
					}
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
					//show form
					$main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <b>For security reasons, the actual change will be finalised after a waiting period of '.$config['site']['email_days_to_change'].' days.</b><br/><br/><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="'.htmlspecialchars($_POST['new_email']).'" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
				}
			}
			else
			{
				$main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <b>For security reasons, the actual change will be finalised after a waiting period of '.$config['site']['email_days_to_change'].' days.</b><br/><br/><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="'.htmlspecialchars($_POST['new_email']).'" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
		}
		else
		{
			if($account_email_new_time < time())
			{
				if($_POST['changeemailsave'] == 1)
				{
					$account_logged->set("email_new", "");
					$account_logged->set("email_new_time", 0);
					$account_logged->setEmail($account_email_new);
					$account_logged->save();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have accepted <b>'.htmlspecialchars($account_logged->getEmail()).'</b> as your new email adress.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
				{
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Do you accept <b>'.htmlspecialchars($account_email_new).'</b> as your new email adress?</td></tr>          </table>        </div>  </table></div></td></tr><br /><table width="100%"><tr><td width="30">&nbsp;</td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="changeemailsave" value=1 ><INPUT TYPE=image NAME="I Agree" SRC="'.$layout_name.'/images/buttons/sbutton_iagree.gif" BORDER=0 WIDTH=120 HEIGHT=17></FORM></td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="emailchangecancel" value=1 ><input type=image name="Cancel" src="'.$layout_name.'/images/buttons/sbutton_cancel.gif" BORDER=0 WIDTH=120 HEIGHT=17></form></td><td align=right><form action="?subtopic=accountmanagement" method="post" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></td><td width="30">&nbsp;</td></tr></table>';
				}
			}
			else
			{
				$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change of Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>A request has been submitted to change the email address of this account to <b>'.htmlspecialchars($account_email_new).'</b>.<br/>The actual change will take place on <b>'.date("j F Y, G:i:s", $account_email_new_time).'</b>.<br>If you do not want to change your email address, please click on "Cancel".</td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><tr><td style="border:0px;" ><input type="hidden" name="emailchangecancel" value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Cancel" alt="Cancel" src="'.$layout_name.'/images/buttons/_sbutton_cancel.gif" ></div></div></td></tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
		}
		if($_POST['emailchangecancel'] == 1)
		{
			$account_logged->set("email_new", "");
			$account_logged->set("email_new_time", 0);
			$account_logged->save();
			$main_content = '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Cancelled</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your request to change the email address of your account has been cancelled. The email address will not be changed.</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
		}
	}
	
//########### CHANGE PUBLIC INFORMATION (about account owner) ######################
	if($action == "changeinfo") {
		$new_rlname = htmlspecialchars(trim($_POST['info_rlname']));
		$new_location = htmlspecialchars(trim($_POST['info_location']));
		if($_POST['changeinfosave'] == 1) {
		//save data from form
			$account_logged->set("rlname", $new_rlname);
			$account_logged->set("location", $new_location);
			$account_logged->save();
			$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Public Information Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your public information has been changed.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
		}
		else
		{
		//show form
			$account_rlname = $account_logged->getCustomField("rlname");
			$account_location = $account_logged->getCustomField("location");
			$main_content .= 'Here you can tell other players about yourself. This information will be displayed alongside the data of your characters. If you do not want to fill in a certain field, just leave it blank.<br/><br/><form action="?subtopic=accountmanagement&action=changeinfo" method=post><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Public Information</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" >Real Name:</td><td style="width:90%;" ><input name="info_rlname" value="'.$account_rlname.'" size="30" maxlength="50" ></td></tr><tr><td class="LabelV" >Location:</td><td><input name="info_location" value="'.$account_location.'" size="30" maxlength="50" ></td></tr></table>        </div>  </table></div></td></tr><br/><table width="100%"><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name="changeinfosave" value="1" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
	}

//############## GENERATE RECOVERY KEY ###########
	if($action == "registeraccount")
	{
		$reg_password = trim($_POST['reg_password']);
		$old_key = $account_logged->getCustomField("key");
		if($_POST['registeraccountsave'] == "1")
		{
			if($account_logged->isValidPassword($reg_password))
			{
				if(empty($old_key))
				{
					$dontshowtableagain = 1;
					$acceptedChars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
					$max = strlen($acceptedChars)-1;
					$new_rec_key = NULL;
					// 10 = number of chars in generated key
					for($i=0; $i < 10; $i++) {
						$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
						$new_rec_key .= $cnum[$i];
					}
					$account_logged->set("key", $new_rec_key);
					$account_logged->save();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Account Registered</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" >Thank you for registering your account! You can now recover your account if you have lost access to the assigned email address by using the following<br/><br/><font size="5">&nbsp;&nbsp;&nbsp;<b>Recovery Key: '.htmlspecialchars($new_rec_key).'</b></font><br/><br/><br/><b>Important:</b><ul><li>Write down this recovery key carefully.</li><li>Store it at a safe place!</li>';
					if($config['site']['send_emails'] && $config['site']['send_mail_when_generate_reckey'])
					{
						$mailBody = '<html>
						<body>
						<h3>New recovery key!</h3>
						<p>You or someone else generated recovery key to your account on server <a href="'.$config['server']['url'].'"><b>'.htmlspecialchars($config['server']['serverName']).'</b></a>.</p>
						<p>Recovery key: <b>'.htmlspecialchars($new_rec_key).'</b></p>
						</body>
						</html>';
						$mail = new PHPMailer();
						if ($config['site']['smtp_enabled'])
						{
							$mail->IsSMTP();
							$mail->Host = $config['site']['smtp_host'];
							$mail->Port = (int)$config['site']['smtp_port'];
							$mail->SMTPAuth = $config['site']['smtp_auth'];
							$mail->Username = $config['site']['smtp_user'];
							$mail->Password = $config['site']['smtp_pass'];
						}
						else
							$mail->IsMail();
						$mail->IsHTML(true);
						$mail->From = $config['site']['mail_address'];
						$mail->AddAddress($account_logged->getEMail());
						$mail->Subject = $config['server']['serverName']." - recovery key";
						$mail->Body = $mailBody;
						if($mail->Send())
							$main_content .= '<br /><small>Your recovery key were send on email address <b>'.htmlspecialchars($account_logged->getEMail()).'</b>.</small>';
						else
							$main_content .= '<br /><small>An error occorred while sending email with recovery key! You will not receive e-mail with this key.</small>';
					}
					$main_content .= '</ul>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
					$reg_errors[] = 'Your account is already registred.';
			}
			else
				$reg_errors[] = 'Wrong password to account.';
		}
		if($dontshowtableagain != 1)
		{
			//show errors if not empty
			if(!empty($reg_errors))
			{
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
				foreach($reg_errors as $reg_error)
					$main_content .= '<li>'.$reg_error;
				$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
			}
			//show form
			$main_content .= 'To generate recovery key for your account please enter your password.<br/><br/><form action="?subtopic=accountmanagement&action=registeraccount" method="post" ><input type="hidden" name="registeraccountsave" value="1"><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Generate recovery key</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Password:</td><td><input type="password" name="reg_password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
	}

//############## GENERATE NEW RECOVERY KEY ###########
	if($action == "newreckey")
	{
		$reg_password = trim($_POST['reg_password']);
		$reckey = $account_logged->getCustomField("key");
		if((!$config['site']['generate_new_reckey'] || !$config['site']['send_emails']) || empty($reckey))
			$main_content .= 'You cant get new rec key';
		else
		{
			$points = $account_logged->getCustomField('vip_time');
			if($_POST['registeraccountsave'] == "1")
			{
				if($account_logged->isValidPassword($reg_password))
				{
					if($points >= $config['site']['generate_new_reckey_price'])
					{
							$dontshowtableagain = 1;
							$acceptedChars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
							$max = strlen($acceptedChars)-1;
							$new_rec_key = NULL;
							// 10 = number of chars in generated key
							for($i=0; $i < 10; $i++) {
								$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
								$new_rec_key .= $cnum[$i];
							}
							$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Account Registered</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><ul>';
								$mailBody = '<html>
								<body>
								<h3>New recovery key!</h3>
								<p>You or someone else generated recovery key to your account on server <a href="'.$config['server']['url'].'"><b>'.htmlspecialchars($config['server']['serverName']).'</b></a>.</p>
								<p>Recovery key: <b>'.htmlspecialchars($new_rec_key).'</b></p>
								</body>
								</html>';
								$mail = new PHPMailer();
								if ($config['site']['smtp_enabled'])
								{
									$mail->IsSMTP();
									$mail->Host = $config['site']['smtp_host'];
									$mail->Port = (int)$config['site']['smtp_port'];
									$mail->SMTPAuth = $config['site']['smtp_auth'];
									$mail->Username = $config['site']['smtp_user'];
									$mail->Password = $config['site']['smtp_pass'];
								}
								else
									$mail->IsMail();
								$mail->IsHTML(true);
								$mail->From = $config['site']['mail_address'];
								$mail->AddAddress($account_logged->getEMail());
								$mail->Subject = $config['server']['serverName']." - new recovery key";
								$mail->Body = $mailBody;
								if($mail->Send())
								{
									$account_logged->set("key", $new_rec_key);
									$account_logged->set("vip_time", $account_logged->get("vip_time")-$config['site']['generate_new_reckey_price']);
									$account_logged->save();
									$main_content .= '<br />Your recovery key were send on email address <b>'.htmlspecialchars($account_logged->getEMail()).'</b> for '.$config['site']['generate_new_reckey_price'].' premium points.';
								}
								else
									$main_content .= '<br />An error occorred while sending email ( <b>'.htmlspecialchars($account_logged->getEMail()).'</b> ) with recovery key! Recovery key not changed. Try again.';
							$main_content .= '</ul>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
						$reg_errors[] = 'You need '.$config['site']['generate_new_reckey_price'].' premium points to generate new recovery key. You have <b>'.$points.'<b> premium points.';
				}
				else
					$reg_errors[] = 'Wrong password to account.';
			}
			if($dontshowtableagain != 1)
			{
				//show errors if not empty
				if(!empty($reg_errors))
				{
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
					foreach($reg_errors as $reg_error)
						$main_content .= '<li>'.$reg_error.'</li>';
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
				}
				//show form
				$main_content .= 'To generate NEW recovery key for your account please enter your password.<br/><font color="red"><b>New recovery key cost '.$config['site']['generate_new_reckey_price'].' Premium Points.</font> You have '.$points.' premium points. You will receive e-mail with this recovery key.</b><br/><form action="?subtopic=accountmanagement&action=newreckey" method="post" ><input type="hidden" name="registeraccountsave" value="1"><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Generate recovery key</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Password:</td><td><input type="password" name="reg_password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br/><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
		}
	}

	
	
//###### CHANGE CHARACTER COMMENT ######
	if($action == "changecomment")
	{
		$player_name = $_REQUEST['name'];
		$signature = htmlspecialchars(substr(trim($_POST['signature']),0,2000));
		$new_comment = htmlspecialchars(substr(trim($_POST['comment']),0,2000));
		$new_hideacc = (int) $_POST['accountvisible'];
		if(check_name($player_name))
		{
			$player = new Player();
			$player->find($player_name);
			if($player->isLoaded())
			{
				$player_account = $player->getAccount();
				if($account_logged->getId() == $player_account->getId())
				{
					if($_POST['changecommentsave'] == 1)
					{
						$player->set("hide_char", $new_hideacc);
						$player->set("comment", $new_comment);
						$player->set("signature", $signature);
						$player->save();
						$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Information Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character information has been changed.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
					{
						$main_content .= '
							Here you can see and edit the information about your character.<br/>If you do not want to specify a certain field, just leave it blank.<br/><br/>
							<form action="?subtopic=accountmanagement&action=changecomment" method="post" >
								<div class="TableContainer" >  
									<table class="Table5" cellpadding="0" cellspacing="0" >    
										<div class="CaptionContainer" >      
											<div class="CaptionInnerContainer" >        
												span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
												<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
												<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
												<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
												<div class="Text" >Edit Character Information</div>        
												<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
												<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
												<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>       
												<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      
											</div>    
										</div>    
										<tr>      
											<td>        
												<div class="InnerTableContainer" >          
													<table style="width:100%;" >
														<tr>
															<td>
																<div class="TableShadowContainerRightTop" >  
																	<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  
																	<div class="TableContentContainer" >    
																		<table class="TableContent" width="100%" >
																			<tr>
																				<td class="LabelV" >Name:</td>
																				<td style="width:80%;" >'.htmlspecialchars($player_name).'</td>
																			</tr>
																			<tr>
																				<td class="LabelV" >Hide Account:</td><td>';
																		if($player->getCustomField("hide_char") == 1)
																		{
																			$main_content .= '
																				<input type="checkbox" name="accountvisible"  value="1" checked="checked">';
																		}
																		else
																		{
																			$main_content .= '
																				<input type="checkbox" name="accountvisible"  value="1" >';
																		}
																				$main_content .= ' 
																					check to hide your account information
																				</td>
																			</tr>    
																		</table>  
																	</div>
																</div>
																<div class="TableShadowContainer" >  
																	<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    
																		<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    																	<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="TableShadowContainerRightTop" >  
																	<div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div>
																</div>
																<div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  
																	<div class="TableContentContainer" >    
																		<table class="TableContent" width="100%" >
																			<tr>
																				<td class="LabelV" ><span >Comment:</span></td>
																				<td style="width:80%;" >
																					<textarea name="comment" rows="10" cols="50" wrap="virtual" >'.$player->getCustomField("comment").'</textarea><br>
																				</td>
																			</tr>
																			<tr>
																				<td class="LabelV" style="white-space:normal;" ><span >Forum Signature:</span></td>
																				<td style="width:80%;" >
																					<textarea name="signature" rows="4" cols="50" wrap="virtual" >'.$player->getCustomField("signature").'</textarea>
																				</td>
																			</tr>    
																		</table>  
																	</div>
																</div>
																<div class="TableShadowContainer" >  
																	<div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >
																		<div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>
																		<div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>
																	</div>
																</div>
															</td>
														</tr>
													</td>
												</tr>          
											</table>        
										</div>  
									</table>
								</div>
							</td>
						</tr><br/>
						<table style="width:100%" >
							<tr align="center" >
								<td>
									<table border="0" cellspacing="0" cellpadding="0" >
										<tr>
											<td style="border:0px;" >
												<input type="hidden" name="name" value="'.htmlspecialchars($player->getName()).'">
												<input type="hidden" name="changecommentsave" value="1">
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
												<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" >
											</div>
										</div>
									</td>
								<tr>
							</form>
						</table>
					</td>
					<td>
						<table border="0" cellspacing="0" cellpadding="0" >
							<form action="?subtopic=accountmanagement" method="post" >
								<tr>
									<td style="border:0px;" >
										<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
										<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div>
									</td>
								</tr>
								
							</form>
						</table>
					</td>
				</tr>
			</table>';
					}
				}
				else
				{
					$main_content .= "Error. Character <b>".htmlspecialchars($player_name)."</b> is not on your account.";
				}
			}
			else
			{
				$main_content .= "Error. Character with this name doesn't exist.";
			}
		}
		else
		{
			$main_content .= "Error. Name contain illegal characters.";
		}
	}

//### DELETE character from account ###
	if($action == "deletecharacter")
	{
		$player_name = trim($_POST['delete_name']);
		$password_verify = trim($_POST['delete_password']);
		if($_POST['deletecharactersave'] == 1)
		{
			if(!empty($player_name) && !empty($password_verify))
			{
				if(check_name($player_name))
				{
					$player = new Player();
					$player->find($player_name);
					if($player->isLoaded())
					{
						$player_account = $player->getAccount();
						if($account_logged->getId() == $player_account->getId())
						{
							if($account_logged->isValidPassword($password_verify))
							{
								if(!$player->isOnline())
								{
									//dont show table "delete character" again
									$dontshowtableagain = 1;
									//delete player
									$player->set('deleted', 1);
									$player->save();
									$main_content .= '
										<div class="TableContainer" >  
											<table class="Table1" cellpadding="0" cellspacing="0" >    
												<div class="CaptionContainer" >      
													<div class="CaptionInnerContainer" >        
														<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
														<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
														<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
														<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
														<div class="Text" >Character Deleted</div>        
														<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
														<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
														<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
														<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      
													</div>    
												</div>    
												<tr>      
													<td>        
														<div class="InnerTableContainer" >          
															<table style="width:100%;" >
																<tr>
																	<td>The character <b>'.htmlspecialchars($player_name).'</b> has been deleted.</td>
																</tr>          
															</table>        
														</div>  
													</table>
												</div>
											</td>
										</tr>
										<br>
										<center>
											<table border="0" cellspacing="0" cellpadding="0" >
												<form action="?subtopic=accountmanagement" method="post" >
													<tr>
														<td style="border:0px;" >
															<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
																<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
																	<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
																	<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" >
																</div>
															</div>
														</td>
													</tr>
												</form>
											</table>
										</center>';
								}
								else
									$delete_errors[] = 'This character is online.';
							}
							else
							{
								$delete_errors[] = 'Wrong password to account.';
							}
						}
						else
						{
							$delete_errors[] = 'Character <b>'.htmlspecialchars($player_name).'</b> is not on your account.';
						}
					}
					else
					{
						$delete_errors[] = 'Character with this name doesn\'t exist.';
					}
				}
				else
				{
					$delete_errors[] = 'Name contain illegal characters.';
				}
			}
			else
			{
			$delete_errors[] = 'Character name or/and password is empty. Please fill in form.';
			}
		}
		if($dontshowtableagain != 1)
		{
			if(!empty($delete_errors))
			{
				$main_content .= '
					<div class="SmallBox" >  
						<div class="MessageContainer" >    
							<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    
							<div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
							<div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
							<div class="ErrorMessage" >      
								<div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      
								<div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      
								<div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div>
								<b>The Following Errors Have Occurred:</b><br/>';
				foreach($delete_errors as $delete_error)
				{
					$main_content .= '<li>'.$delete_error;
				}
				$main_content .= '
					</div>    
					<div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    
					<div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    
					<div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  
				</div>
			</div><br/>';
			}
			$main_content .= 'To delete this character enter your password and click on "Submit". You can undelete the character within the first 2 months (60 days) after the deletion. After this time the character is deleted for good and cannot be restored anymore!.<br/><br/>
				<form action="?subtopic=accountmanagement&action=deletecharacter" method="post" >
					<input type="hidden" name="deletecharactersave" value="1">
					<div class="TableContainer" >  
						<table class="Table1" cellpadding="0" cellspacing="0" >    
							<div class="CaptionContainer" >      
								<div class="CaptionInnerContainer" >        
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
									<div class="Text" >Delete Character</div>        
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      
								</div>    
							</div>    
							<tr>     
								<td>        
									<div class="InnerTableContainer" >          
										<table style="width:100%;" >
											<tr>
												<td class="LabelV" ><span >Character Name:</td>
												<td style="width:90%;" >
													<input type="hidden" name="delete_name" value="'.$_GET['name'].'" size="30" maxlength="29" >
													<p>'.$_GET['name'].'</p>
												</td>
											</tr>
											<tr>
												<td class="LabelV" ><span >Password:</td>
												<td>
													<input type="password" name="delete_password" size="30" maxlength="29" >
												</td>
											</tr>          
										</table>        
									</div>  
								</table>
							</div>
						</td>
					</tr><br/>
					<table style="width:100%" >
						<tr align="center" >
							<td>
								<table border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td style="border:0px;" >
											<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
												<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
													<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
													<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" >
												</div>
											</div>
										</td>
										<tr>
									</form>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="0" cellpadding="0" >
									<form action="?subtopic=accountmanagement" method="post" >
										<tr>
											<td style="border:0px;" >
												<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
													<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
														<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div>
														<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" >
													</div>
												</div>
											</td>
										</tr>
									</form>
								</table>
							</td>
						</tr>
					</table>';
		}
	}

	
//### UNDELETE character from account ###
	if($action == "undelete")
	{
		$player_name = trim($_GET['name']);
		if(!empty($player_name))
		{
			if(check_name($player_name))
			{
				$player = new Player();
				$player->find($player_name);
				if($player->isLoaded())
				{
					$player_account = $player->getAccount();
					if($account_logged->getId() == $player_account->getId())
					{
						if(!$player->isOnline())
						{
							$player->set('deleted', 0);
							$player->save();
							$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Undeleted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <b>'.htmlspecialchars($player_name).'</b> has been undeleted.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
						}
						else
							$delete_errors[] = 'This character is online.';
					}
					else
						$delete_errors[] = 'Character <b>'.htmlspecialchars($player_name).'</b> is not on your account.';
				}
				else
					$delete_errors[] = 'Character with this name doesn\'t exist.';
			}
			else
				$delete_errors[] = 'Name contain illegal characters.';
		}
	}	

//## CREATE CHARACTER on account ###
	if($action == "createcharacter")
	{
		if(count($config['site']['worlds']) > 1)
		{
			if(isset($_REQUEST['world']))
				$world_id = (int) $_REQUEST['world'];
		}
		else
			$world_id = 0;
		if(!isset($world_id))
		{
			$main_content .= 'Before you can create character you must select world: ';
			foreach($config['site']['worlds'] as $id => $world_n)
				$main_content .= '<br /><a href="?subtopic=accountmanagement&action=createcharacter&world='.$id.'">- '.htmlspecialchars($world_n).'</a>';
			$main_content .= '<br /><h3><a href="?subtopic=accountmanagement">BACK</a></h3>';
		}
		else
		{
			$main_content .= '<script type="text/javascript">
			var nameHttp;

function checkName()
{
		if(document.getElementById("newcharname").value=="")
		{
			document.getElementById("name_check").innerHTML = \'<b><font color="red">Please enter new character name.</font></b>\';
			return;
		}
		nameHttp=GetXmlHttpObject();
		if (nameHttp==null)
		{
			return;
		}
		var newcharname = document.getElementById("newcharname").value;
		var url="?subtopic=ajax_check_name&name=" + newcharname + "&uid="+Math.random();
		nameHttp.onreadystatechange=NameStateChanged;
		nameHttp.open("GET",url,true);
		nameHttp.send(null);
} 

function NameStateChanged() 
{ 
		if (nameHttp.readyState==4)
		{ 
			document.getElementById("name_check").innerHTML=nameHttp.responseText;
		}
}
</script>';
			$newchar_name = ucwords(strtolower(trim($_POST['newcharname'])));
			$newchar_sex = $_POST['newcharsex'];
			$newchar_vocation = $_POST['newcharvocation'];
			$newchar_town = $_POST['newchartown'];
			if($_POST['savecharacter'] != 1)
			{
				$main_content .= 'Please choose a name';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= ', vocation';
				$main_content .= ' and sex for your character. <br/>In any case the name must not violate the naming conventions stated in the <a href="?subtopic=tibiarules" target="_blank" >'.htmlspecialchars($config['server']['serverName']).' Rules</a>, or your character might get deleted or name locked.';
				if($account_logged->getPlayersList()->count() >= $config['site']['max_players_per_account'])
					$main_content .= '<b><font color="red"> You have maximum number of characters per account on your account. Delete one before you make new.</font></b>';
				$main_content .= '<br/><br/><form action="?subtopic=accountmanagement&action=createcharacter" method="post" ><input type="hidden" name="world" value="'.$world_id.'" ><input type="hidden" name=savecharacter value="1" ><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Create Character</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div><tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" ><table class="TableContent" width="100%" ><tr class="LabelH" ><td style="width:50%;" ><span >Name</td><td><span >Sex</td></tr><tr class="Odd" ><td><input id="newcharname" name="newcharname" onkeyup="checkName();" value="'.htmlspecialchars($newchar_name).'" size="30" maxlength="29" ><BR><font size="1" face="verdana,arial,helvetica"><div id="name_check">Please enter your character name.</div></font></td><td>';
				$main_content .= '<input type="radio" name="newcharsex" value="1" ';
				if($newchar_sex == 1)
					$main_content .= 'checked="checked" ';
				$main_content .= '>male<br/>';
				$main_content .= '<input type="radio" name="newcharsex" value="0" ';
				if($newchar_sex == "0")
					$main_content .= 'checked="checked" ';
				$main_content .= '>female<br/></td></tr></table></div></div></table></div>';
				if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
				{
					$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your vocation:</b></td><td><table class="TableContent" width="100%" >';
					foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
					{
						$main_content .= '<tr><td><input type="radio" name="newcharvocation" value="'.$char_vocation_key.'" ';
						if($newchar_vocation == $char_vocation_key)
							$main_content .= 'checked="checked" ';
						$main_content .= '>'.htmlspecialchars($vocation_name[0][$char_vocation_key]).'</td></tr>';
					}
					$main_content .= '</table></table></td>';
				}
				if(count($config['site']['newchar_towns'][$world_id]) > 1)
				{
					$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your city:</b></td><td><table class="TableContent" width="100%" >';
					foreach($config['site']['newchar_towns'][$world_id] as $town_id)
					{
						$main_content .= '<tr><td><input type="radio" name="newchartown" value="'.$town_id.'" ';
						if($newchar_town == $town_id)
							$main_content .= 'checked="checked" ';
						$main_content .= '>'.htmlspecialchars($towns_list[$world_id][$town_id]).'</td></tr>';
					}
					$main_content .= '</table></table></td>';
				}
				if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= '</tr></table></div>';
				$main_content .= '</table></div></td></tr><br/><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
			else
			{	
				if(empty($newchar_name))
					$newchar_errors[] = 'Please enter a name for your character!';
				if(empty($newchar_sex) && $newchar_sex != "0")
					$newchar_errors[] = 'Please select the sex for your character!';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
				{
					if(empty($newchar_vocation))
						$newchar_errors[] = 'Please select a vocation for your character.';
				}
				else
					$newchar_vocation = $config['site']['newchar_vocations'][$world_id][0];
				if(count($config['site']['newchar_towns'][$world_id]) > 1)
				{
					if(empty($newchar_town))
						$newchar_errors[] = 'Please select a town for your character.';
				}
				else
					$newchar_town = $config['site']['newchar_towns'][$world_id][0];
				if(empty($newchar_errors))
				{
					if(!check_name_new_char($newchar_name))
						$newchar_errors[] = 'This name contains invalid letters, words or format. Please use only a-Z, - , \' and space.';
					if($newchar_sex != 1 && $newchar_sex != "0")
						$newchar_errors[] = 'Sex must be equal <b>0 (female)</b> or <b>1 (male)</b>.';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					{
						$newchar_vocation_check = FALSE;
						foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
							if($newchar_vocation == $char_vocation_key)
								$newchar_vocation_check = TRUE;
						if(!$newchar_vocation_check)
							$newchar_errors[] = 'Unknown vocation. Please fill in form again.';
					}
					else
						$newchar_vocation = 0;
				}
				if(empty($newchar_errors))
				{
					$check_name_in_database = new Player();
					$check_name_in_database->find($newchar_name);
					if($check_name_in_database->isLoaded())
						$newchar_errors[] .= 'This name is already used. Please choose another name!';
					$number_of_players_on_account = $account_logged->getPlayersList()->count();
					if($number_of_players_on_account >= $config['site']['max_players_per_account'])
						$newchar_errors[] .= 'You have too many characters on your account <b>('.$number_of_players_on_account.'/'.$config['site']['max_players_per_account'].')</b>!';
				}
				if(empty($newchar_errors))
				{
					$char_to_copy_name = $config['site']['newchar_vocations'][$world_id][$newchar_vocation];
					$char_to_copy = new Player();
					$char_to_copy->find($char_to_copy_name);
					if(!$char_to_copy->isLoaded())
						$newchar_errors[] .= 'Wrong characters configuration. Try again or contact with admin. ADMIN: Edit file config/config.php and set valid characters to copy names. Character to copy <b>'.htmlspecialchars($char_to_copy_name).'</b> doesn\'t exist.';
				}
				if(empty($newchar_errors))
				{
					// load items and skills of player before we change ID
					$char_to_copy->getItems()->load();
					$char_to_copy->loadSkills();
					
					if($newchar_sex == "0")
						$char_to_copy->setLookType(136);
					$char_to_copy->setID(null); // save as new character
					$char_to_copy->setLastIP(0);
					$char_to_copy->setLastLogin(0);
					$char_to_copy->setLastLogout(0);
				    $char_to_copy->setName($newchar_name);
				    $char_to_copy->setAccount($account_logged);
				    $char_to_copy->setSex($newchar_sex);
				    $char_to_copy->setTown($newchar_town);
					$char_to_copy->setPosX(0);
					$char_to_copy->setPosY(0);
					$char_to_copy->setPosZ(0);
					$char_to_copy->setBalance(0);
					$char_to_copy->setWorldID((int) $world_id);
					$char_to_copy->setCreateIP(Visitor::getIP());
					$char_to_copy->setCreateDate(time());
					$char_to_copy->setSave(); // make character saveable
					$char_to_copy->save(); // now it will load 'id' of new player
					if($char_to_copy->isLoaded())
					{
						$char_to_copy->saveItems();
						$char_to_copy->saveSkills();
						$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Created</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <b>'.htmlspecialchars($newchar_name).'</b> has been created.<br/>Please select the outfit when you log in for the first time.<br/><br/><b>See you on '.$config['server']['serverName'].'!</b></td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
					{
						echo "Error. Can\'t create character. Probably problem with database. Try again or contact with admin.";
						exit;
					}
				}
				else
				{
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
					foreach($newchar_errors as $newchar_error)
						$main_content .= '<li>'.$newchar_error;
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
					$main_content .= 'Please choose a name';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= ', vocation';
					$main_content .= ' and sex for your character. <br/>In any case the name must not violate the naming conventions stated in the <a href="?subtopic=tibiarules" target="_blank" >'.$config['server']['serverName'].' Rules</a>, or your character might get deleted or name locked.<br/><br/><form action="?subtopic=accountmanagement&action=createcharacter" method="post" ><input type="hidden" name="world" value="'.$world_id.'" ><input type="hidden" name=savecharacter value="1" ><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Create Character</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div><tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" ><table class="TableContent" width="100%" ><tr class="LabelH" ><td style="width:50%;" ><span >Name</td><td><span >Sex</td></tr><tr class="Odd" ><td><input id="newcharname" name="newcharname" onkeyup="checkName();" value="'.$newchar_name.'" size="30" maxlength="29" ><BR><font size="1" face="verdana,arial,helvetica"><div id="name_check">Please enter your character name.</div></font></td><td>';
					$main_content .= '<input type="radio" name="newcharsex" value="1" ';
					if($newchar_sex == 1)
						$main_content .= 'checked="checked" ';
					$main_content .= '>male<br/>';
					$main_content .= '<input type="radio" name="newcharsex" value="0" ';
					if($newchar_sex == "0")
						$main_content .= 'checked="checked" ';
					$main_content .= '>female<br/></td></tr></table></div></div></table></div>';
					if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					{
						$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your vocation:</b></td><td><table class="TableContent" width="100%" >';
						foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
						{
							$main_content .= '<tr><td><input type="radio" name="newcharvocation" value="'.htmlspecialchars($char_vocation_key).'" ';
							if($newchar_vocation == $char_vocation_key)
								$main_content .= 'checked="checked" ';
							$main_content .= '>'.htmlspecialchars($vocation_name[0][$char_vocation_key]).'</td></tr>';
						}
						$main_content .= '</table></table></td>';
					}
					if(count($config['site']['newchar_towns'][$world_id]) > 1)
					{
						$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><b>Select your city:</b></td><td><table class="TableContent" width="100%" >';
						foreach($config['site']['newchar_towns'][$world_id] as $town_id)
						{
							$main_content .= '<tr><td><input type="radio" name="newchartown" value="'.htmlspecialchars($town_id).'" ';
							if($newchar_town == $town_id)
								$main_content .= 'checked="checked" ';
							$main_content .= '>'.htmlspecialchars($towns_list[$world_id][$town_id]).'</td></tr>';
						}
						$main_content .= '</table></table></td>';
					}
					if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= '</tr></table></div>';
					$main_content .= '</table></div></td></tr><br/><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
				}
			}
		}
	}
}
