<?php $this->load->view('tpl/head');?>
<body>

<div id="container">
	<h1>Login</h1>

	<div id="body">
		<p>Platform to record all my expenses.</p>

	    <?php echo form_open('members/login'); ?>
		<label> username</label>
		<?php
			$data = array('name' => 'username','placeholder'=>'user','id' => 'usr');
			echo form_input($data); 
		?>
		<br>
		<label>password</label>
        <?php
			$data = array('name' => 'password','id' => 'pwd');
			echo form_password($data);
		?>
		<br>
		<?php
			echo form_submit('submit', ' Login ');
		?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
