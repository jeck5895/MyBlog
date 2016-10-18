$(function(){
	var Application = {
		api: window.location.protocol +"//" + window.location.hostname + "/oopa_api",
		path: window.location.protocol +"//" + window.location.hostname + "/oopa",
		initialize: function(){
			
		}
	}

	Path.map("#/home/(:param)").to(function() {
		var db = new localStorageDB("oopa", localStorage);
		var param = this.params["param"] || "";

		if(db.isNew()){
			db.createTable("user", 
	        	[
	        		"uid", 
	        		"username",
	        		"firstname", 
	        		"lastname", 
	        		"email_address", 
	        		"contact_no", 
	        		"login_date", 
	        		"token"
	        	]
	        );

	        db.commit();

		}


		setTimeout(function(){
			var user = db.query("user");
			if(user.length == 0){
				if(param.length > 1){
					var a = param.split(".");
					window.location = "auth/index.html#/users/login/" + a[0] + "." + a[1];
				}else{
					window.location = "auth/index.html#/users/login/";
				}
			}else{
				window.location = "app/index.html#/dashboard/";
			}
		}, 500);
	});

	Path.root("/home/");
	Path.listen();
});