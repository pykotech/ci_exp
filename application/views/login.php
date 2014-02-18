<?php $this->load->view('tpl/head');?>
<body>

<div id="container">
	<h1>Login</h1>

	<div id="body">
<?php if(isset($result)) echo $result; 
	  else echo "?";

if(isset($results)) {
	var_dump($results);
}
?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
