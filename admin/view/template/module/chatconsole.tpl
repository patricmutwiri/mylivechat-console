<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<a href="<?php echo $cancel; ?>" data-toggle="tooltip"
					title="Back" class="btn btn-default">
					<i class="fa fa-reply"></i></a>
			</div>
			<h1><?php echo $heading_title; ?></h1>
			<ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
	</div>
	</div>
	<div class="container-fluid">
    <?php if ($error_warning) { ?>
	    <div class="alert alert-danger">
				<i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
	      		<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
    <?php } ?>
    <div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-ok"></i>Live Chat</h3>
			</div>
			<script type="text/javascript">
			  function resize(iFrame) {
			   iFrame.style.height = iFrame.contentWindow.document.body.scrollHeight + 'px';
			  }
			</script>
			<div class="panel-body">
				<div class="col-xs-12">
					Login with your respective credentials:
						<br/>*Live Chat ID
						<br/>*Agent name
						<br/>*Password
				</div>
				<div class="col-xs-12"> &nbsp; </div>
				<div class="col-xs-12">
					<iframe style="width:100%;height:700px" id="consoleSite" src="https://www.mylivechat.com/webconsole/" onload="resize(document.getElementById('consoleSite') );">Error Loading</iframe>
				</div>
			</div>
		</div>
	</div>
<?php echo $footer; ?>