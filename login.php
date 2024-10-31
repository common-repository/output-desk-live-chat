<div class="postbox">
        <div style='line-height:3;'><?php $messages->display('error'); ?></div>
        <form method="post" action="admin.php?page=outputdesk_configure">
            <?php wp_nonce_field("outputdesk_login","secret") ?>
          <input type="hidden" name="action" value="login">
	
          <table class="form-table" cellpadding=5 cellspacing=5 style="width:700px;" align="center">
            <tr valign="top">
              <td colspan=2 style="font-weight:bold;font-size:21px;text-align:center;"><?php echo "Welcome to Output Desk Live Chat"; ?></td>
            </tr>
            <tr valign="top">
              <td colspan=2 style="text-align:center;padding:0;"><img src="<?php echo plugins_url();?>/output-desk-live-chat/icon.png"></td>
            </tr>
            <tr valign="top">
              <td colspan=2 style="font-weight:bold;font-size:25px;text-align:center;color:#58c2d5;padding:0;">Congratulations</td>
            </tr>
            <tr valign="top">
              <td colspan=2 style="font-weight:bold;font-size:18px;text-align:center;">on successfully installed Output Desk Live Chat Wordpress Plug-in!<br>&nbsp;</td>
            </tr>
            <tr valign="top">
              <td colspan=2 style="font-weight:bold;font-size:18px;text-align:center;padding:0;">Link with your Output Desk Account</td>
            </tr>
            <tr valign="top">
              <td colspan=2 style="font-weight:bold;font-size:18px;text-align:center;">
		 <table class="form-table" cellpadding=5 cellspacing=5 align="center" style="width:90%;border:1px solid;background:#58c2d5;color:#fff;border-style:dotted;">
			    <tr valign="top">
			      <td style="font-weight:bold;width:38%;text-align:right;"><?php echo "Output Desk Username"; ?></td>
			      <td align="left"><input style="height:26px;padding:0 5px;" type="text" name="ODC_USER" placeholder="E-mail"/>
			      </td>
			    </tr>
			    <tr valign="top">
			      <td style="font-weight:bold;width:38%;text-align:right;"><?php echo "Output Desk Password"; ?></td>
			      <td align="left"><input style="height:26px;padding:0 5px;" type="password" name="password" value="" placeholder="Password"/></td>
			    </tr>
			      <td align="center" colspan=2>
				    <input type="submit" class="button" value="<?php echo 'Link Output Desk' ?>"/>
				    <br><br>Don't have a outputdesk account?&nbsp;&nbsp;<a href="<?php echo ODC_SIGNUP_URL; ?>" target="_blank"><?php echo "Sign Up"; ?></a> now.
				</td>
			    </tr>
			    <tr valign="top">
			      <td colspan=2 style="font-weight:bold;font-size:12px;text-align:center;padding-top:0px;">The Live Chat box will automatically be enabled on your website after your account is linked.</td>
			    </tr>
			</table>
		</td>
            </tr>
          </table>
        </form>
</div>
