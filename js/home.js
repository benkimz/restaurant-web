window.addEventListener("load", (() => {
	this.document.getElementById("signIn").onclick = (() => {
		this.parent.location.assign("signin/");
	});
	this.document.getElementById("signUp").onclick = (() => {
		this.parent.location.assign("signup/?rdr=restaurant");
	});
	this.document.getElementById("aboutPage").onclick = (() => {
		this.parent.location.assign("aboutus/");
	});
	this.document.getElementById("menuItems").onclick = (() => {
		this.parent.location.assign("menu/");
	});
	this.document.getElementById("adminLogin").onclick = (() => {
		this.parent.location.assign("admin/");
	});		
}));