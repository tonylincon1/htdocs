<?php
if(!defined('INITIALIZED'))
	exit;

$cache_sec = 1;
date_default_timezone_set('America/Sao_Paulo'); // Definindo a zona horária
$info = array(
	0 => array($config['server']['location'], date("d/m/Y")),
	1 => array('EUA', date("d/m/Y"))
);

$id=0;
if(isset($_POST['world'])) {
	$f = null;
	foreach($config['site']['worlds'] as $k => $v)
		if($v == $_POST['world']) {
			$f = true;
			$id = $k;
			break;
		}
	if(!$f)
		$_POST['world'] = $config['site']['worlds'][0];
} else $_POST['world'] = $config['site']['worlds'][0];

$order = 'name_asc';
if(isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('name_desc', 'level_asc','level_desc','vocation_asc','vocation_desc')))
	$order = $_REQUEST['order'];

if(count($config['site']['worlds']) > 1) {
	$main_content ='
<form action="?subtopic=whoisonline" method="post">
	<div class="TableContainer">
		<table class="Table1" cellpadding="0" cellspacing="0">
			<div class="CaptionContainer">
				<div class="CaptionInnerContainer">
					<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
					<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
					<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
					<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
					<div class="Text">World Selection</div>
					<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
					<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
					<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
					<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
				</div>
			</div>
			<tr>
				<td>
					<div class="InnerTableContainer">
						<table width="100%">
							<tr>
								<td style="vertical-align:middle" class="LabelV150">World Name:</td>
								<td style="width:170px">
									<select size="1" name="world" style="width:165px">';
foreach($config['site']['worlds'] as $v)
	$main_content .= '<option value="'.$v.'"'.($v == $_POST['world'] ? ' selected="selected"' : '').'>'.$v.'</option>';
$main_content .= '
									</select>
								</td>
								<td style="text-align:left">
									<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)">
										<div onmouseover="MouseOverBigButton(this)" onmouseout="MouseOutBigButton(this)"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif)"></div>
											<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif"/>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
</form><br/>
';
}
$main_content .=
'<div class="TableContainer">
	<table class="Table1" cellpadding="0" cellspacing="0">
		<div class="CaptionContainer">
			<div class="CaptionInnerContainer">
				<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
				<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
				<div class="Text">World Information</div>
				<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
				<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
				<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
				<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
			</div>
		</div>
		<tr>
			<td>
				<div class="InnerTableContainer">
					<table width="100%">
						<tr>
							<td class="LabelV150"><b>Status:</b></td>
							<td>O'.($config['status']['serverStatus_online'] == 1 ? 'n' : 'ff').'line</td>
						</tr>
						<tr>
							<td class="LabelV150"><b>Players Online:</b></td>
							<td>';
$f = 'cache/whoisonline-'.$_POST['world'].'-'.$order.'.tmp';
$ff = 'cache/whoisonline-'.$_POST['world'].'-record.tmp';
if(file_exists($f) && filemtime($f) > (time() - $cache_sec)) {
	$cp = file_get_contents($f);
	$cached = null;
	if(file_exists($f) && filemtime($f) > (time() - $cache_sec)) {
		$e = explode('|', file_get_contents($ff));
		$n = $e[0];
		$c = $e[1];
		$cached = true;
	}
}
else {
	$cp = '';
	$n = 0;
	$q = 'SELECT * FROM players WHERE world_id='.$id.' AND online=1';
	if(in_array($order, array('name_asc','name_desc','level_asc','level_desc')))
		$q .= ' ORDER BY '.str_replace('_', ' ', $order);

	if(in_array($order, array('vocation_asc','vocation_desc'))) {
		$a = array();
		foreach($SQL->query($q)->fetchAll() as $p)
			$a[] = array($p['name'], $p['level'], $vocation_name[$p['promotion']][$p['vocation']]);
		function cmp($a, $b) {
			$r = strcmp($a[2], $b[2]);
			$r = $GLOBALS['order'] == 'vocation_desc' ? ($r == 1 ? -1 : ($r == -1 ? 1 : 0)) : $r;
			return ($r == 0 && $a[1] < $b[1]) ? 1 : $r;
		}
		usort($a, 'cmp');
		foreach($a as $p) {
			$n++;
			$cp .= '<tr class="'.(is_int($n/2)?'Odd':'Even').'" style="text-align:right"><td style="width:70%;text-align:left"><a href="?subtopic=characters&name='.urlencode($p[0]).'">'.$p[0].'</a></td><td style="width:10%">'.$p[1].'</td><td style="width:20%">'.str_replace(' ','&#160;',$p[2]).'</td></tr>';
		}

	}
	else {
		$l = array();
		
		foreach($SQL->query($q)->fetchAll() as $p) {
			$n++;
			$cp .= '<tr class="'.(is_int($n/2)?'Odd':'Even').'" style="text-align:right">';
			$cp .= '<td style="width:70%;text-align:left">';
			if($order == 'name_asc') {
				$tmp = strtoupper($p['name'][0]);
				if(!in_array($tmp, $l)) {
					$l[] = $tmp;
					$cp .= '<a name="'.$tmp.'"></a>';
				}
			}
			$cp .= '<a href="?subtopic=characters&name='.urlencode($p['name']).'">'.$p['name'].'</a></td><td style="width: 10%">'.$p['level'].'</td><td style="width:20%">'.str_replace(' ','&#160;',$vocation_name[$p['promotion']][$p['vocation']]).'</td></tr>';
		}
		
	}
	file_put_contents($f, $cp);
}
if(!$cached) {
	$r=$SQL->query('SELECT MAX(record) as r,MAX(timestamp) as t FROM server_record WHERE world_id='.$id)->fetch();
	$c = $r['r'].' players (on '.date('M&#160;d&#160;Y,&#160;H:i:s&#160;T', $r['t']).')';
	file_put_contents($ff, $n.'|'.$c);
}
$main_content .= $n.' Players Online</td>
						</tr>
						<tr>
							<td class="LabelV150"><b>Online Record:</b></td>
							<td>'.$c.'</td>
						</tr>
						<tr>
							<td class="LabelV150"><b>Creation Date:</b></td>
							<td>19/04/2024</td>
						</tr>
						<tr>
							<td class="LabelV150"><b>Location:</b></td>
							<td>Brasil</td>
						</tr>
						<tr>
							<td class="LabelV150"><b>PvP Type:</b></td>
							<td>';
$w=strtolower($config['server']['worldType']);
if(in_array($w, array('pvp','2','normal','open','openpvp')))
	$main_content .= 'Open PvP';
elseif(in_array($w, array('no-pvp','nopvp','non-pvp','nonpvp','1','safe','optional','optionalpvp')))
	$main_content .= 'Optional PvP';
elseif(in_array($w, array('pvp-enforced','pvpenforced','pvp-enfo','pvpenfo','pvpe','enforced','enfo','3','war','hardcore','hardcorepvp')))
	$main_content .= 'Hardcore PvP';
$main_content .= '</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div><br/>
	<div class="TableContainer">
		<table class="Table2" cellpadding="0" cellspacing="0">
		<div class="CaptionContainer">
		<div class="CaptionInnerContainer">
		<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
		<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
		<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
		<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
		<div class="Text">Players Online';
if($order == 'name_asc')
	$main_content .= '<span class="TableHeadlineNavigation"> [
	<a href="#A">A</a>
	<a href="#B">B</a>
	<a href="#C">C</a>
	<a href="#D">D</a>
	<a href="#E">E</a>
	<a href="#F">F</a>
	<a href="#G">G</a>
	<a href="#H">H</a>
	<a href="#I">I</a>
	<a href="#J">J</a>
	<a href="#K">K</a>
	<a href="#L">L</a>
	<a href="#M">M</a>
	<a href="#N">N</a>
	<a href="#O">O</a>
	<a href="#P">P</a>
	<a href="#Q">Q</a>
	<a href="#R">R</a>
	<a href="#S">S</a>
	<a href="#T">T</a>
	<a href="#U">U</a>
	<a href="#V">V</a>
	<a href="#W">W</a>
	<a href="#X">X</a>
	<a href="#Y">Y</a>
	<a href="#Z">Z</a> ]&#160;&#160;</span>';
$main_content .= '</div>
<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>
<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>
<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>
</div>
</div>
<tr>
<td>
<div class="InnerTableContainer">
<table width="100%">
<tr class="LabelH">
<td style="text-align:left;width:50%">Name&#160;&#160;<small style="font-weight:normal">[<a href="?subtopic=whoisonline&world='.$_POST['world'].'&order=name_'.($order == 'name_asc' ? 'desc' : 'asc').'">sort</a>]</small>
<img class="sortarrow" src="'.$layout_name.'/images/'.($order == 'name_asc' ? 'content/order_desc' : ($order == 'name_desc' ? 'content/order_asc' : 'news/blank')).'.gif"/></td>
<td style="text-align:left;width:30%">Level&#160;&#160;
<small style="font-weight:normal">[<a href="?subtopic=whoisonline&world='.$_POST['world'].'&order=level_'.($order == 'level_asc' ? 'desc' : 'asc').'">sort</a>]</small>
<img class="sortarrow" src="'.$layout_name.'/images/'.($order == 'level_asc' ? 'content/order_desc' : ($order == 'level_desc' ? 'content/order_asc' : 'news/blank')).'.gif"/></td>
<td style="text-align:left;width:50%">Vocation&#160;&#160;<small style="font-weight:normal">[<a href="?subtopic=whoisonline&world='.$_POST['world'].'&order=vocation_'.($order == 'vocation_asc' ? 'desc' : 'asc').'">sort</a>]</small>
<img class="sortarrow" src="'.$layout_name.'/images/'.($order == 'vocation_asc' ? 'content/order_desc' : ($order == 'vocation_desc' ? 'content/order_asc' : 'news/blank')).'.gif"/></td>
</tr>';

$main_content .= $cp;
if (!$cp){$main_content .='<tr><td colspan="3" align="center"><i>Nao tem nenhum player online.</i></td></tr>';}
$main_content .='
</table>
</div>
</table>
</div>
</td>
</tr>
<br/>
<form action="?subtopic=characters" method="post"><div class="TableContainer">  <table class="Table1" cellpadding="0" cellspacing="0">    <div class="CaptionContainer">      <div class="CaptionInnerContainer">        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>        <div class="Text">Procure por um Player</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif)"></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif)"></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif)"></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer">          <table width="100%"><tr><td style="vertical-align:middle" class="LabelV150"><b>Character Name:</b></td><td style="width:170px"><input style="width:165px" name="name" value="" size="29" maxlength="29"/></td><td><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)"><div onmouseover="MouseOverBigButton(this)" onmouseout="MouseOutBigButton(this)"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif)"></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif"></div></div></td></tr>          </table>        </div>  </table></div></td></tr></form></center>';
?>