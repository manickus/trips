 var menuBtn = document.querySelector(".call-to-menu");

 menuBtn.addEventListener("click",function(){
 	var menuList = document.querySelector(".menu-list");
 	menuList.classList.toggle("nav-opened");
 },false );


var openReplyFormBtn = document.querySelectorAll(".reply");

for(var i=0;i<openReplyFormBtn.length;i++)
{
	openReplyFormBtn[i].addEventListener("click", function(event){

	}, false);
}



var showCommentReplyBtns = document.querySelectorAll(".show-comment-answers");

var notLoged = document.querySelectorAll('.not-loged');

for(var i=0;i<notLoged.length;i++)
{
	notLoged[i].addEventListener("click", function(event) {
		showNotLoginModal(event);
	}, false);
}

for(var i=0;i<showCommentReplyBtns.length;i++)
{
	showCommentReplyBtns[i].addEventListener("click",function(event){
		showCommentAnwsers(event); 
	} , false);
}

function showCommentAnwsers(e)
{
	const $this = e.target;	
	$this.classList.add('hidden');
	$this.parentNode.querySelector('.comment-replys').classList.remove('hidden');
}


function showNotLoginModal(el)
{
	var csrf = document.querySelector('[name="_token"]').value;
	el.preventDefault;
	var modal = document.createElement('div');
	modal.classList.add('modal-login');
	var wrapper = document.createElement('div');
	wrapper.classList.add('wrapper-modal');
	wrapper.appendChild(modal);

	var closeIcon = document.createElement('i');
	closeIcon.classList.add('fa-window-close')
	closeIcon.classList.add('fa');
	closeIcon.classList.add('close-modal');

	modal.appendChild(closeIcon);
	var header = document.createElement('header');
	header.classList.add('modal-header');
	var headerText = document.createElement('h3');
	headerText.innerText = "Musisz się zalogować";
	header.appendChild(headerText);
	modal.appendChild(header);

	var formWrapper = document.createElement('div');
	formWrapper.classList.add('form-modal-login-wrapper');
	var form = document.createElement('form');
	form.action = "/login";
	form.method = "POST";
	var csrfToken = document.createElement('input');
	csrfToken.type = "hidden";
	csrfToken.value = csrf;
	csrfToken.name = "_token";

	var nameWrapper = document.createElement('div');
	nameWrapper.classList.add('login-modal-form-group');
	var nameLabel = document.createElement('label');
	nameLabel.innerText = "Nazwa:";
	nameLabel.for = "email";
	nameLabel.classList.add('modal-label');
	var nameInput = document.createElement('input');
	nameInput.type = "text";
	nameInput.name = "email";
	nameWrapper.appendChild(nameLabel);
	nameWrapper.appendChild(nameInput);

	var passwordWrapper = document.createElement('div');
	passwordWrapper.classList.add('login-modal-form-group');
	var passwordLabel = document.createElement('label');
	passwordLabel.innerText = "Hasło:";
	passwordLabel.for = "password";
	passwordLabel.classList.add('modal-label');
	var passwordInput = document.createElement('input');
	passwordInput.type = "password";
	passwordInput.name = "password";
	passwordWrapper.appendChild(passwordLabel);
	passwordWrapper.appendChild(passwordInput);

	var loginSubmit = document.createElement('input');
	loginSubmit.type = "submit";
	loginSubmit.innerText = "Zaloguj";
	loginSubmit.classList.add('btn');

	form.appendChild(csrfToken);
	form.appendChild(nameWrapper);
	form.appendChild(passwordWrapper);
	form.appendChild(loginSubmit);

	formWrapper.appendChild(form);
	modal.appendChild(formWrapper);
	var body = document.querySelector('body');
	body.appendChild(wrapper);

	closeIcon.addEventListener("click",function() {
		body.removeChild(wrapper);
	},false)

	wrapper.addEventListener("click",function(e) {
		if(e.target == e.currentTarget) {
			body.removeChild(wrapper);
		}
	},false);
}