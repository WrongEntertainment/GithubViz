<!-- GithubViz -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php include("../static/head.php"); ?>
<script src="../js/libs/processing-1.3.6.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<!-- ? $HTTP_GET_VARS["Vorname"]; ?> -->

<script type="text/javascript">  
function drawSomeText(id) {  
  var pjs = Processing.getInstanceById(id);  
  var text = document.getElementById('inputtext').value;


  /*
   * Creates an unordered list containing Github user data.
   * Will be placed inside a div-element with id "github_userinfo"
   */
  var gitUsername = "Powder";
  var gitBaseUrl = "http://github.com/api/v2/json/";
  var gitUserUrl = "user/show/";
  var gitRepoUrl = "repos/show/";
  var callback = "?callback=?";	
  var gravatarUrl = "http://www.gravatar.com/avatar/";
  $.getJSON(gitBaseUrl + gitUserUrl + gitUsername + callback,
  function(json, statuts) {			
    var user_data = json.user;
    // TODO: fix whitespace bug (if no whitespace available, table style broken.)
	/*$("#github_userinfo").append("<table id='github_userinfo-list' border='1' width='750'></table>");
	
	$("#github_userinfo-list").append(" <tr>");
	$("#github_userinfo-list").append("    <th>Company:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.company + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>Name:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.name + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>Created at:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.created_at + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>location:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.location + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>public_repo_count:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.public_repo_count + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>public_gist_count:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.public_gist_count + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>Blog:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.blog + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>following_count:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.following_count + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>ID:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.id + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>Type:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.type + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>permission:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.permission + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>followers_count:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.followers_count + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>login:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.login + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$("#github_userinfo-list").append("  <tr>");
	$("#github_userinfo-list").append("    <th>email:</th>");
	$("#github_userinfo-list").append("    <th>" + user_data.email + "</th>");
	$("#github_userinfo-list").append("  </tr>");
	
	$('#github_userinfo').prepend('<img id="github_avatar" src="' + gravatarUrl + user_data.gravatar_id + '" />');*/
	
    // binding processing.js function
    pjs.userdata(user_data.gravatar_id,
	user_data.company,
	user_data.name,
	user_data.created_at,
	user_data.location,
	user_data.public_repo_count,
	user_data.public_gist_count,
	user_data.blog,
	user_data.following_count,
	user_data.id,
	user_data.type,
	user_data.permission,
	user_data.followers_count,
	user_data.login,
	user_data.email);
  });

  /**
   * Generates an unordered list containing all the repositories of a certain user.
   * The list will be added to the div-element with id "github_repositories".
   */
  //var username = "Powder";
  $.getJSON("http://github.com/api/v2/json/repos/show/" + gitUsername + "?callback=?",
  function(json, statuts) {
    //$("#github_repositories").append("<ul id='repositoriy-list'></ul>");
	$.each(json.repositories, function(i){
		var type = this['type'];
		var language = this['language'];
		var has_downloads = this['has_downloads'];
		var url = this['url']
		var homepage = this['homepage']
		var pushed_at = this['pushed_at']
		var created_at = this['created_at']
		var fork = this['fork']
		var has_wiki = this['has_wiki']
		var score = this['score']
		var size = this['size']
		var private_repo = this['private_repo']
		var name = this['name'];
		var watchers = this['watchers'];
		var owner = this['owner'];
		var open_issues = this['open_issues'];
		var description = this['description'];
		var forks = this['forks'];
		var has_issues = this['has_issues'];
		var followers = this['followers'];
		var pushed = this['pushed'];
		var created = this['created'];
		var username = this['username'];
		// binding processing.js function
		pjs.repodata(type,
		  language,
		  has_downloads,
		  url,
		  homepage,
		  pushed_at,
		  created_at,
		  fork,
		  has_wiki,
		  score,
		  size,
		  private_repo,
		  name,
		  watchers,
		  owner,
		  open_issues,
		  description,
		  forks,
		  has_issues,
		  followers,
		  pushed,
		  created,
		  username);
    });
  });

  //pjs.drawText(text);
}
</script>
</head>
	
<body>
<?php include("../static/header.php"); ?>
<?php include("../static/nav.php"); ?>

<!-- CONTENT begin -->
<div id="github_repositories"></div>

<section>
<h1>Processing.js Test</h1>
<!-- Processing canvas-->
<canvas id="sketch1" data-processing-sources="../js/githubviz.pde"></canvas><br><br>
<input type="textfield" value="Powder" id="inputtext"/>  
<button onclick="drawSomeText('sketch1')" id="button4"/>Send</button>
<div id="github_userinfo"></div>

<!-- <table id="github_userinfo-list" border="1" width="750">
	<tr>
		<th>email:</th>
		<th> <script type="text/javascript">document.write(gitUsername);</script> </th>
	</tr>
</table> -->



</section>
<!-- CONTENT end -->

<?php include("../static/footer.php"); ?>
</body>
</html>
