const inputs = document.querySelectorAll(".input");

function addColor(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remColor(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addColor);
	input.addEventListener("blur", remColor);
});