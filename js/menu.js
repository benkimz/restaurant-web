window.addEventListener("load", (() => {
	this.document.getElementById("goHome").onclick = (() => {
		this.parent.location.assign("../");
	});
	this.document.getElementById("getIn").onclick = (() => {
		this.parent.location.assign("../signin/");
	});
	this.document.getElementById("getOut").onclick = (() => {
		this.parent.location.assign("../signout/");
	});
	this.document.getElementById("diveIn").onclick = (() => {
		this.parent.location.assign("../signup/");
	});	
}));