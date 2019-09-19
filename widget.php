<form class="form-horizontal js-snda-widget" data-example="<?php echo SNDA_URL . 'example.php?' ?>">
	<div class="form-group">
		<label class="col-sm-2">Account ID.</label>
		<div class="col-sm-10">
			<input class="form-control js-snda-affid" value=""/>
			<span class="help-block">Don't have an account ID? <a href="https://classic.leadconduit.com/signup?sponsorId=054ns07ee" target="_blank">Sign up Here</a></span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2">Widget Type</label>
		<div class="col-sm-10">
			<select class="form-control js-snda-type">
				<option selected value="sidebar">Full</option>
				<option value="widget">Minimal</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2">Theme</label>
		<div class="col-sm-10">
			<select class="form-control js-snda-theme">
				<option selected value="default">Default</option>
				<option value="blue">Purple</option>
				<option value="green">Green</option>
				<option value="blue-white">Blue</option>
			</select>
		</div>
	</div>
	<iframe class="js-snda-iframe" frameborder="0" style="width:100%; height:500px; border:1px solid #eee;" src="<?php echo SNDA_URL . 'example.php?type=sidebar&theme=default' ?>"></iframe>
	<button class="btn btn-orange">Get Code</button>
	<br>
	<br>
	<div style="display:none;" class="js-snda-codebox">
		<p>Add this before your closing head tag <code><?php echo htmlentities('</head>') ?></code> </p>
		<textarea readonly class="form-control js-snda-script-tag" rows="1"></textarea>
		<br>
		<p>Add this where you want the widget to be displayed</p>
		<textarea readonly class="form-control js-snda-widget-tag" rows="1"></textarea>
	</div>
</form>
<br>
