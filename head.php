<?php
require_once 'connect.php';
if(!isset($_SESSION['username'])){
  header('location: index.php');
}
if($_SESSION['position']!=1){
  header('location: subHead.php');
}
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Taskbook</title>
	<link rel="shortcut icon" href="favicon.png">
	<script src="jquery.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="head.js"></script>
	<link rel="stylesheet" href="user.css">
</head>
<body data-title="head">
	<div class="navbar-fixed">
		<nav class="cyan accent-4">
			<div class="container">
			    <div class="nav-wrapper black-text">
			      	<a href="#!" class="brand-logo" style="font-weight: 300;">Taskbook</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			      	<ul id="dropdown1" class="dropdown-content">
  						<li><a href="#!">one</a></li>
  						<li><a href="#!">two</a></li>
						<li class="divider"></li>
					    <li><a href="#!">three</a></li>
					</ul>
			      	<ul class="right hide-on-med-and-down">
			        	
			        	<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Notification<span class="new badge blue">4</span></a></li>
			        	<li><a href="logout.php" >Logout</a></li>
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        	<li><a href="logout.php">Logout</a></li>
			        	<li><a href="logout.php" >Logout</a></li>
			      </ul>
			</div>
	    </div>
	  </nav>
	</div>
	<nav class="cyan accent-2">
		<div class="container">
		    <div class="nav-wrapper black-text">
		      	<a href="#!" class="brand-logo black-text" style="font-weight: 300;"><i class="small material-icons">supervisor_account</i>Loggedin head</a>
			</div>
			<button class="btn waves-effect waves-light cyan right modal-trigger" data-target="modal1" 
			id="assign" >Assign Task</button>
			
	    </div>
	</nav>
	<div id="modal1" class="modal modal-fixed-footer">
    			<div class="modal-content">
      				<h4>Assign Task</h4>
      				<div class="row">
        				<div class="input-field col s12">
          					<textarea id="textarea1" class="materialize-textarea"></textarea>
          					<label for="textarea1">Write the task</label>
        				</div>
        				<p class="input-field col s4">
      						<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
      						<label for="filled-in-box">Filled in</label>
    					</p>
    					<p class="input-field col s4">
      						<input type="checkbox" class="filled-in" id="filled-in-box" disabled="disabled" checked="checked" />
      						<label for="filled-in-box">Filled in</label>
    					</p>
    					<p class="input-field col s4">
      						<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
      						<label for="filled-in-box">Filled in</label>
    					</p>
    					<p class="input-field col s4">
      						<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
      						<label for="filled-in-box">Filled in</label>
    					</p>
  					</div>
    			</div>
    			<div class="modal-footer">
    				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">submit</a>
      				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">dismiss</a>
    			</div>
  	</div>
	<div class="container">
		<div class="row">
			<div class="col s12 otherBox z-depth-1" style="padding: 0;">
				<div class="taskHead cyan accent-4" ><h5>Assigned Tasks</h5></div>
				<table class="striped">
        			<thead>
          				<tr>
              				<th data-field="name">Name</th>
              				<th data-field="event">Event Assigned</th>
              				<th data-field="action">Action</th>
          				</tr>
        			</thead>
        			<tbody>
          				<tr>
            				<td>teammate1</td>
            				<td>Lorem ipsum dolor sit amet, audiam accusam ut has, ne meis liber ius. Petentium quaerendum ei mel, sea mutat causae legendos te. Ne deserunt pertinax signiferumque eos.</td>
            				<td>
            					<button class="btn waves-effect waves-light" type="submit" name="action">edit
  								</button>
  							</td>
          				</tr>
          				<tr>
            				<td>teammate1</td>
            				<td>Lorem ipsum dolor sit amet, audiam accusam ut has, ne meis liber ius. Petentium quaerendum ei mel, sea mutat causae legendos te. Ne deserunt pertinax signiferumque eos.</td>
            				<td>
            					<button class="btn waves-effect waves-light" type="submit" name="action">edit
    							<i class="material-icons right">send</i>
  								</button>
  							</td>
          				</tr>
          				<tr>
            				<td>teammate1</td>
            				<td>Lorem ipsum dolor sit amet, audiam accusam ut has, ne meis liber ius. Petentium quaerendum ei mel, sea mutat causae legendos te. Ne deserunt pertinax signiferumque eos.</td>
            				<td>
            					<button class="btn waves-effect waves-light" type="submit" name="action">edit
    							<i class="material-icons right">send</i>
  								</button>
  							</td>
          				</tr>
          				<tr>
            				<td>teammate1</td>
            				<td>Lorem ipsum dolor sit amet, audiam accusam ut has, ne meis liber ius. Petentium quaerendum ei mel, sea mutat causae legendos te. Ne deserunt pertinax signiferumque eos.</td>
            				<td>
            					<button class="btn waves-effect waves-light" type="submit" name="action">edit
    							<i class="material-icons right">send</i>
  								</button>
  							</td>
          				</tr>
          				<tr>
            				<td>teammate1</td>
            				<td>Lorem ipsum dolor sit amet, audiam accusam ut has, ne meis liber ius. Petentium quaerendum ei mel, sea mutat causae legendos te. Ne deserunt pertinax signiferumque eos.</td>
            				<td>
            					<button class="btn waves-effect waves-light" type="submit" name="action">edit
    							<i class="material-icons right">send</i>
  								</button>
  							</td>
          				</tr>
        			</tbody>
      			</table>
			</div>
		</div>
	</div>
</body>
</html>











