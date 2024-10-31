<div class="postbox">
	<div style="padding-left:10px;line-height:1.5;">
		<h3 style="color:#58c2d5;font-size:27px;margin:0;"><?php echo "Welcome  " ?><b><?php echo $accountDetails["name"]; ?>!</b></h3>
		<!--<div style="font-size:20px;">Plan : <?php echo ucwords($accountDetails["plan"]); ?></div>-->
		<br><br><?php echo "Launch Output Desk Dashboard to access all features, including Chat Box customization!'"; ?>
		<br><br>
		<div style="white-space:nowrap;font-size:14px;line-height:2.5;">
			<a href="<?php echo ODC_DASHBOARD_LINK . "?username=" . $accountDetails['name']; ?>" target="_blank">
				<div class="outputdesk_btn_orange" style="float:left;padding:0px;"><input style="font-weight: bold; width: 100px; height: 30px; font-size: 18px; background: rgb(88, 194, 213) none repeat scroll 0% 0%; color: rgb(255, 255, 255); border: medium none;" type="button" class="button" value="Launch"/></div>
			</a>&nbsp;&nbsp;(<?php echo "This will open up a new browser tab"; ?>)
		</div>
		<br><br>
		<div style="white-space:nowrap;font-size:14px;">Having issues? <a target="_blank" href="https://support.outputdesk.com/outputdesk/">Visit our Support Site.</a></div>
		<div style="font-size:14px;">
			And we are happy to help you! Just chat with us through our site <a target="_blank" href="https://www.outputdesk.com">https://www.outputdesk.com</a> or email us at <a href="mailto:support@srimax.com">support@srimax.com</a>
		</div>
	</div>
</div>
<style>
div.postbox{padding-left:50px;}
div.postbox div{padding:10px 0;font-size:20px;}
</style>
